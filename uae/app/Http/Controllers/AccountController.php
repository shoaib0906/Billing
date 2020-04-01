<?php

namespace App\Http\Controllers;

use DB;

use File;

use Config;
use Auth;
use Entrust;
use Activity;
use App\Classes\Helper;

use Illuminate\Http\Request;

use App\Http\Requests\ConfigurationTimeRequest;


use App\Sales;
use App\LeaveType;

use App\LeaveMaster;

use App\TimeMaster;

use App\SalaryType;
use Session;
use App\DocumentType;
use App\Asset;//by Dev@4489
use App\Alias;//by Dev@4489
use App\ExpenseHead;
use App\Purchase;
use App\Role;
//use PDF;
use Validator;
//use PDF1;
use ZanySoft\LaravelPDF\PDF;

Class AccountController extends Controller{

	public function view_collection($id)
	{
		$data['collection'] = DB::table('collection')->select('collection.*',
			'sales_master.net_amout','sales_master.paid_amount','sales_master.collected_amout','sales_master.bill_to','sales_master.billing_address','sales_master.attention','sales_master.mobile','sales_master.designation','sales_master.order_no')
								->join('sales_master','sales_master.id','=','collection.bill_id')
								->where('collection.id','=',$id)->first();
		$html = view('erp.account.receipt',$data)->render();
		
		$pdf = new PDF();
		//$pdf->SetWatermarkText("Paid");
		$pdf->loadHTML($html);

		return $pdf->Stream('document.pdf');
	}
	public function collection()
	{
		
			$data['collection'] = DB::table('collection')->select('id','bill_id','collection_no','collected_amount','date','entry_username','branch_name')->where('date','=',date('Y-m-d'))->get();
		
			$sl_no=DB::table('collection')->where('branch_id','=',Auth::user()->property_id)->where('year','=',date('Y'))->max('collection_id');
			if($sl_no == null)
			{
				$sl_no=0;
			}
			$sl_no = $sl_no+1;			
			$data['collection_no']  = 'DTC-COLLECTION-'.str_pad($sl_no,4,"0",STR_PAD_LEFT);			
		$data['sales_master'] = DB::select('SELECT id,order_no,paid_amount,collected_amout FROM sales_master WHERE net_amout >paid_amount+collected_amout ');
		return view('erp.account.collection',$data);
		
		
	}
	public function post_collection(Request $request)
	{
		if(auth::check()){
		Session::put('collection_no',$request->collection_no);
		$this->validate($request,[			        
			        'collection_no' => 'required'	,
			       	'collected_amount'=>'required',
			        'date' => 'required',
			        'bill_id'=>'required'
			]); 
		
		$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();
		$sl_no=DB::table('collection')->where('branch_id','=',Auth::user()->property_id)->where('year','=',date('Y'))->max('collection_id');
		if($sl_no ==null)
		{
			$sl_no=0;
		}
		$sl_no=$sl_no+1;
		$created_at = date('Y-m-d H:i:s');

		$entry_user_id = Auth::user()->id;
		$entry_username = Auth::user()->username;
		$branch_id = Auth::user()->property_id;
		$branch_name = $tenants_name->department_name;
		$date = date('Y-m-d',strtotime($request->date));
		//dd($request->purchase_date);
		 //$data = $request->all();
		DB::table('sales_master')->where('id','=',$request->bill_id)->increment('collected_amout',$request->collected_amount);
        //$purchase->fill($data);
		DB::table('collection')->insert([
						'collection_id'=>$sl_no,
						'collection_no'=>$request->collection_no,
						'bill_id'=>$request->bill_id,	
						'year' =>date('Y'),					
						'collected_amount'=>$request->collected_amount,
						'remarks'=>$request->remarks,
						'date'=>$date,
						'branch_name'=>$branch_name,
						'branch_id'=>$branch_id,
						'entry_username'=>$entry_username,
						'entry_user_id'=>$entry_user_id,
						'created_at'=>$created_at

			]);
		//$purchase->fill($request->all())->save();

		Activity::log('COllection made'.$request->collection_no);
		Session::flash('success','Collection Made successfully.ID- '.$request->collection_no);
		return redirect()->back()->withSuccess('Product Purchased successfully.INV- ' .$request->sup_invoice_no);
	}
	}
	public function payment()
	{
		//$payment_no = Session::get('payment_no');
		$data['buyer'] = DB::table('buyer')->select('id','BuyBuyerName')->get();
		/*if(!empty($payment_no))
		{			
			$data['payment_no']  = $payment_no;
			$data['payment'] = DB::table('payment')
							->select('id','payment_no', 'invoice_id', 'payment_amount', 'date', 'remarks', 'entry_username', 'branch_name')
							->where('payment_no','=',$payment_no)->get();
			$data['purchased_master'] = DB::select('SELECT id,sup_invoice_no,paid_amount,payment_made FROM purchased_master WHERE net_amout >paid_amount+payment_made ');
			return view('erp.account.payment',$data);
		}*/	
		//else{
			$sl_no=DB::table('payment')->where('branch_id','=',Auth::user()->property_id)->where('year','=',date('Y'))->max('payment_id');
			if($sl_no ==null)
			{
				$sl_no=0;
			}
			$sl_no=$sl_no+1;

			$data['payment'] = DB::table('payment')
							->select('id','payment_no', 'invoice_id', 'payment_amount', 'date', 'remarks', 'entry_username', 'branch_name')
							->where('date','=',date('Y-m-d'))->get();

			$data['payment_no']  = 'DTC-PAYMENT-'.str_pad($sl_no,4,"0",STR_PAD_LEFT);
			
			$data['purchased_master'] = DB::select('SELECT id,sup_invoice_no,paid_amount,payment_made FROM purchased_master WHERE net_amout >paid_amount+payment_made ');
		//}
		return view('erp.account.payment',$data);
	}
	public function post_payment(Request $request)
	{
		if(auth::check()){
		Session::put('payment_no',$request->payment_no);
		$this->validate($request,[			        
			        'payment_no' => 'required'	,
			       	'payment_amount'=>'required',
			        'date' => 'required',
			        'invoice_id'=>'required'
			]); 
		
		$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();
		$sl_no=DB::table('payment')->where('branch_id','=',Auth::user()->property_id)->where('year','=',date('Y'))->max('payment_id');
		if($sl_no ==null)
		{
			$sl_no=0;
		}
		$sl_no=$sl_no+1;
		$created_at = date('Y-m-d H:i:s');

		$entry_user_id = Auth::user()->id;
		$entry_username = Auth::user()->username;
		$branch_id = Auth::user()->property_id;
		$branch_name = $tenants_name->department_name;
		$date = date('Y-m-d',strtotime($request->date));
		//dd($request->purchase_date);
		 //$data = $request->all();
		DB::table('purchased_master')->where('id','=',$request->invoice_id)->increment('payment_made',$request->payment_amount);
        //$purchase->fill($data);
		DB::table('payment')->insert([
						'payment_id'=>$sl_no,
						'payment_no'=>$request->payment_no,
						'invoice_id'=>$request->invoice_id,	
						'year' =>date('Y'),					
						'payment_amount'=>$request->payment_amount,
						'remarks'=>$request->remarks,
						'date'=>$date,
						'branch_name'=>$branch_name,
						'branch_id'=>$branch_id,
						'entry_username'=>$entry_username,
						'entry_user_id'=>$entry_user_id,
						'created_at'=>$created_at

			]);
		
		Activity::log('Payment made'.$request->collection_no);
		Session::flash('success','Payment Made successfully.ID- '.$request->collection_no);
		return redirect()->back();
	}
	}
	public function get_invoice_det($id)
	{
		$invoic_det = DB::table('purchased_master')->select('id','sup_invoice_no','net_amout','paid_amount','payment_made')
					->where('id','=',$id)->get();
		return $invoic_det;
	}
	public function get_bill_det($id)
	{
		$bill_det = DB::table('sales_master')->select('id','order_no','net_amout','paid_amount','collected_amout')
					->where('id','=',$id)->get();
		return $bill_det;
	}

	
	public function Day_Book()
	{

		$data['day_date'] = $day_date = date('Y-m-d'); 
		$data['sales'] = DB::table('sales_master')->select('order_no','bill_to','buyer_id', 'net_amout', 'paid_amount', 'created_at', 'entry_username', 'branch_name')
			->where('created_at','=',$day_date)
			->get();
		$data['collection'] = DB::table('collection AS c')
									->select('c.collection_no', 'c.bill_id', 'c.collected_amount', 
										'c.date', 'c.entry_username', 'c.branch_name', 'c.created_at',
										's.order_no', 's.net_amout', 's.paid_amount', 's.collected_amout', 's.bill_to')
									->where('c.date','=',$day_date)
									->join('sales_master AS s','s.id','=','c.bill_id')
									->get();

		$data['purchase'] = DB::table('purchased_master as p')
							->select('p.sup_invoice_no','p.supplier_id', 'p.net_amout', 'p.paid_amount', 
								'p.created_at', 'p.entry_username', 'p.branch_name','s.SupSupplierName')
							->join('supplier as s','s.id','=','p.supplier_id')
							->where('p.created_at','=',$day_date)
							->get();
		

		$data['payment'] = DB::table('payment AS p')
							->select('p.payment_no', 'p.payment_amount', 'p.date', 'p.entry_username', 'p.branch_name',
								'pur.sup_invoice_no', 'pur.supplier_id', 'pur.net_amout', 'pur.paid_amount', 'pur.payment_made', 'pur.entry_username', 'pur.branch_name',
								'su.SupSupplierName'
								)
							->where('p.date','=',$day_date)
							->join('purchased_master as pur','pur.id','=','p.invoice_id')
							->join('supplier as su','su.id','=','pur.supplier_id')
							->get();
		//return view('erp.daybook',$data);
		//$html = view('erp.bill',$data)->render();		
		$pdf = new PDF();
		$pdf->SetProtection(array('print'));
		$pdf->loadView('erp.daybook', $data);
		return $pdf->Stream('document.pdf');
	}
	

}

?>