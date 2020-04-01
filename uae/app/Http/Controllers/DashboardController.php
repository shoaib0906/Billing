<?php



namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use DB;

use Auth;

use Entrust;
use App\User;

use App\Department;

use App\Designation;

use App\Holiday;

use App\Todo;
use App\Document;//by Dev@4489
use App\Dependent;//by Dev@4489
use App\Classes\Helper;
use Session;


class DashboardController extends Controller

{

    public function post_signup(Request $request)
    {
        //$companyData = \DB::table('company')->where('company_id', $request->company)->first();
        //$companyData = objectToArray($companyData);
        
        //selectDatabase1($companyData['host'], $companyData['db_user'], $companyData['db_password'], $companyData['db_name']);
        
        $this->validate($request, User::$login_validation_rule);
       // dd($request->username);
        $data  = array('username' => $request->username,'password' => $request->password );
        //dd($data);
         //$data = $request->only('email', 'password');
        //Session::set('',$request->input('username'));
         
        if (Auth::attempt($data)) {
            

            $role_id = DB::table('role_user')->select('role_id')->where('user_id','=',Auth::user()->id)->get();
            $user_id = DB::table('users')->select('status')->where('id','=',Auth::user()->id)->get();
            $role_id = $role_id[0]->role_id;
            $status = $user_id[0]->status;
           // dd($role_id);
            if($role_id == 1)
            {
                
                Session::put('key', $request->username);
                 Auth::logout();
                $data = Session::get('key');
                return view('auth.login')->with('data',$data)->withSuccess('Admin Logged In Successfully.'.$role_id);
            }
            else
            {
                Auth::logout();
                Session::put('key', null);
                Session::flash('error','THis user is not privileged.');
                return back()->withInput()->withSuccess('THis user is not privileged.');
            }
        }
        else{
            //dd("asf");
            return back()->withInput()->withErrors('Username/Password Error. ');
        }
        //dd($data);
        //consol.log($data);

        //return back()->withInput()->withErrors(['Error' => "Invalid Username/Password"]);
    }

   public function index(){

       

        $user_count = User::count();

        $dept_count = Department::count();

        

        $employee = User::find(Auth::user()->id);
        //dd($employee->status);
        //if ($employee->status == 0 )
             //return redirect('/login')->withErrors('You are not Authorized anymore.');


        $users = User::join('designations','designations.id','=','users.designation_id')

            ->join('departments','departments.id','=','designations.department_id')

            ->select(DB::raw('CONCAT(first_name," ",last_name," "," (",department_name,")") AS name,username'))

            ->lists('name','username');

        

        $query = DB::table('activity_log')

            ->join('users','users.id','=','activity_log.user_id')

            ->select(DB::raw('CONCAT(first_name, " ", last_name) AS employee_name,activity_log.created_at AS created_at,text,user_id'));





        $child_designation = Helper::childDesignation(Auth::user()->designation_id,1);

        $child_staff_count = User::whereIn('designation_id',$child_designation)->count();



        $child_users = User::whereIn('designation_id',$child_designation)->lists('id')->all();

        array_push($child_users,Auth::user()->id);



        if(!Entrust::hasRole('admin'))

            $query->whereIn('user_id',$child_users);



        $activities = $query->latest()->limit(100)->get();



        $compose_users = DB::table('users')

            ->where('users.id','!=',Auth::user()->id)

            ->join('designations','designations.id','=','users.designation_id')

            ->join('departments','departments.id','=','designations.department_id')

            ->select(DB::raw('CONCAT(first_name, " ", last_name, " (",  department_name, " )") AS full_name,users.id AS user_id'))

            ->lists('full_name','user_id');




		//by Dev@4489
		//Expire Documents before 30days
		$exdate = date('Y-m-d');
		//$docexpire_count = Document::whereRaw("(expiry_date - INTERVAL 30 DAY)<='".$exdate."'")->count();
		//$empdepend_expire_count = Dependent::whereRaw("(expiry_date - INTERVAL 30 DAY)<='".$exdate."'")->count();
		//$expire_count=$docexpire_count+$empdepend_expire_count;
		////


        $assets = ['graph','calendar'];

        $present_count =  DB::table('users')->count();
        $expire_count  = DB::table('users')->count();

        $product = DB::table('product')->get();
        //dd($product);
        return view('erp.index',compact(

            'user_count','dept_count','present_count',
            'product',
            'employee','compose_users','expire_count',

           'users'

            ));
    

   }

}