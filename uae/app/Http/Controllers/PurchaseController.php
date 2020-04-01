<?php

namespace App\Http\Controllers;
use ZanySoft\LaravelPDF\PDF;
use DB;

use File;

use Config;
use Auth;
use Entrust;
use Activity;
use App\Classes\Helper;

use Illuminate\Http\Request;

use App\Http\Requests\ConfigurationTimeRequest;



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

use Validator;



Class PurchaseController extends Controller{

	public function view_invoice($inv_no)
	{
		if(auth::check()){
			$data['sales'] = DB::table('purchase')
						->select('purchase.*','product.PdtDescription')
						->join('product','product.PdtProductCode','=','purchase.product_code')
						->where('purchase.sup_invoice_no','=',$inv_no)
						->where('purchase.status','=',1)						
						
						->get();
			$data['invo_detail']  = DB::table('purchased_master')
												->select('purchased_master.*','supplier.SupSupplierName','supplier.SupAddress')
												->where('purchased_master.sup_invoice_no','=',$inv_no)
									->join('supplier','supplier.id','=','purchased_master.supplier_id')
									->first();
			$pdf = new PDF();
			$pdf->SetProtection(array('print'));
			$pdf->loadView('erp.invoice', $data);
			return $pdf->Stream('document.pdf');
		}
	}
	public function purchase_list()
	{
		$data['purchase_list'] = DB::table('purchased_master')->select('purchased_master.*','supplier.SupSupplierName')
									->join('supplier','supplier.id','=','purchased_master.supplier_id')
									->get();
		return view('erp.purchase_list',$data);
	}

	public function generate_bill(Request $request)
	{
		$this->validate($request,[			        
			        'sup_invoice_no' => 'required'	,
			        'supplier_id'=>'required',
			        'total_amount' => 'required'	,
			        'vat' => 'required'	,
			        'less' => 'required'	,
			        'net_amout' => 'required'	,
			        'paid_amount'=>'required',
			                
			]);  
		$created_at = date('Y-m-d');
		/*User Details*/
		$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();	

		$entry_user_id = Auth::user()->id;
		$entry_username = Auth::user()->username;
		$branch_id = Auth::user()->property_id;
		$branch_name = $tenants_name->department_name;
		/*User Details*/

		$v_count = DB::table('purchased_master')->where('sup_invoice_no','=',$request->sup_invoice_no)->count();

		if($v_count==0)
		{
		$id = DB::table('purchased_master')->insertGetId ([
											'sup_invoice_no'=>$request->sup_invoice_no,
											'supplier_id'=>$request->supplier_id,
											'total_amount'=>$request->total_amount,
											'vat'=>$request->vat,
											'less'=>$request->less,
											'net_amout'=>$request->net_amout,
											'paid_amount'=>$request->paid_amount,
											'created_at'=>$created_at,
											'entry_user_id'=>$entry_user_id,
											'entry_username'=>$entry_username,
											'branch_id'=>$branch_id,
											'branch_name'=>$branch_name
											]);
		$year= date('Y');
		DB::table('purchase')->where('sup_invoice_no','=',$request->sup_invoice_no)->where('inv_no','=',null)
												->where('status','=',1)->where('entry_user_id','=',auth::user()->id)->where('branch_id','=',Auth::user()->property_id)->update(['inv_no'=>$id,'year'=>$year]);

		Activity::log('Invoice Generated '.$request->sup_invoice_no);
		//Session::flash('success','Purchased Invoice Generated.');
		Session::put('invoice_no',null);
		$data['sales'] = DB::table('purchase')
						->select('purchase.*','product.PdtDescription')
						->join('product','product.PdtProductCode','=','purchase.product_code')
						->where('purchase.sup_invoice_no','=',$request->sup_invoice_no)
						->where('purchase.status','=',1)						
						
						->get();
						$data['invo_detail']  = DB::table('purchased_master')
												->select('purchased_master.*','supplier.SupSupplierName','supplier.SupAddress')
												->where('purchased_master.sup_invoice_no','=',$request->sup_invoice_no)
									->join('supplier','supplier.id','=','purchased_master.supplier_id')
									->first();
			
			$pdf = new PDF();
			$pdf->SetProtection(array('print'));
			$pdf->loadView('erp.invoice', $data);
			return $pdf->Stream('document.pdf');
		}
		else{
			Session::put('invoice_no',null);
			Session::flash('danger','Purchased Invoice Generated.');
		return redirect()->back();	
		}
	}
	public function product_purchase()
	{
		$inv_no = Session::get('invoice_no');
		//Session::put('invoice_no',null);
		if(!empty($inv_no))
		{
			$data['supplier_id'] = Session::get('supplier_id');
			$data['inv_no']  = $inv_no;
			$data['purchase'] = DB::table('purchase')->where('sup_invoice_no','=',$inv_no)->where('status','=',1)->get();
			$data['supplier'] = $data['supplier1'] =DB::table('supplier')->select('id','SupCompanyName')
			->get();
			$data['product'] = $data['product1'] =DB::table('product')->select('PdtProductCode')->get();			
			return view('erp.purchase',$data);
		}	
		else{
			$sl_no=DB::table('purchase')->where('branch_id','=',Auth::user()->property_id)->where('year','=',date('Y'))->max('inv_no');
			$sl_no = $sl_no+1;
			$data['supplier_id'] = null;
			$data['inv_no']  = 'DTC-INV-'.str_pad($sl_no,4,"0",STR_PAD_LEFT);
			$data['purchase'] = DB::table('purchase')->where('sup_invoice_no','=',$inv_no)->where('status','=',1)->get();
			$data['supplier'] = $data['supplier1'] =DB::table('supplier')->select('id','SupCompanyName')
			->get();
			$data['product'] = $data['product1'] =DB::table('product')->select('PdtProductCode')->get();			
			return view('erp.purchase',$data);
		}
	}
	public function post_purchase(Request $request,Purchase $purchase)
	{
		if(auth::check()){
		Session::put('invoice_no',$request->sup_invoice_no);
		$this->validate($request,[			        
			        'sup_invoice_no' => 'required'	,
			        'supplier_id' => 'required'	,
			        'product_code'     => 'required',
			        'cost_price' => 'required|max:9990000|min:1'	,
			        //'purchase_date' => 'required|date'	,			         
			        'quantity'=> 'required|max:100000|min:1',

			]); 
		Session::put('supplier_id',$request->supplier_id);
		$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();
		DB::table('product')->where('PdtProductCode','=',$request->product_code)->increment('stock',$request->quantity);
		//$request->purchase_date = date_format($request->purchase_date,"Y-m-d");
		
		$created_at = date('Y-m-d H:i:s');

		$entry_user_id = Auth::user()->id;
		$entry_username = Auth::user()->username;
		$branch_id = Auth::user()->property_id;
		$branch_name = $tenants_name->department_name;
		$purchase_date = date('Y-m-d',strtotime($request->purchase_date));
		//dd($request->purchase_date);
		 //$data = $request->all();

        //$purchase->fill($data);
		DB::table('purchase')->insert([
						'sup_invoice_no'=>$request->sup_invoice_no,
						'supplier_id'=>$request->supplier_id,
						'product_code'=>$request->product_code,
						'cost_price'=>$request->cost_price,
						'quantity'=>$request->quantity,
						'purchase_date'=>$purchase_date,
						'branch_name'=>$branch_name,
						'branch_id'=>$branch_id,
						'entry_username'=>$entry_username,
						'entry_user_id'=>$entry_user_id,
						'created_at'=>$created_at

			]);
		//$purchase->fill($request->all())->save();

		Activity::log('Purchased in'.$request->purchase_date);
		Session::flash('success','Product Purchased successfully.INV- '.$request->sup_invoice_no);
		return redirect()->back()->withSuccess('Product Purchased successfully.INV- ' .$request->sup_invoice_no);
	}
	}
	public function del_purchase($id)
	{
		$product = DB::table('purchase')->select('product_code','quantity')->where('id','=',$id)->first();

		DB::table('purchase')->where('id','=',$id)->update(['status'=>0]);

		DB::table('product')->where('PdtProductCode','=',$product->product_code)->decrement('stock',$product->quantity);
		Activity::log('Purchased delete productcode'.$product->product_code);
		Session::flash('success','Product deleted successfully from Purchase.Product Code- '.$product->product_code);
		return redirect()->back();
	}
	public function supplier()
	{
		if(auth::check()){
		$data['supplier'] = DB::table('supplier')->select('supplier.*','zone1.ZonZoneName','zone1.ZonZoneID')
							->join('zone1','zone1.ZonZoneID','=','supplier.SupZoneId')
							->orderBy('supplier.id','desc')
							->get();
		$data['zone'] =$data['zone1']  = DB::table('zone1')->get();
		return view('erp.suplier',$data);
		}
	}
	public function post_supplier(Request $request)
	{
		$this->validate($request,[			        
			        'SupSupplierName' => 'required'	,
			        'SupCompanyName' => 'required'	,
			        'SupAddress'     => 'required',
			        'SupEmail' => 'required'	,
			        'ZonZoneName' => 'required'	,
			         'SupBusinessMobile' => 'required'	,	      			        
			]);  
		
		DB::table('supplier')->insert(['SupSupplierName'=>$request->SupSupplierName,
											'SupCompanyName'=>$request->SupCompanyName,
											'SupAddress'=>$request->SupAddress,
											'SupEmail'=>$request->SupEmail,
											'SupZoneId'=>$request->ZonZoneName,
											'SupBusinessMobile'=>$request->SupBusinessMobile,
											]);
		Session::flash('success','Buyer Created successfully.');
		return redirect()->back()->withSuccess('New Buyer Created successfully.');
	}
	public function update_supplier(Request $request)
	{
		$this->validate($request,[			        
			        'id' => 'required'	,
			        'SupSupplierName' => 'required'	,
			        'SupCompanyName' => 'required'	,
			        'SupAddress'     => 'required',
			        'SupEmail' => 'required'	,
			        'ZonZoneName' => 'required'	,
			         'SupBusinessMobile' => 'required'	,
			          


			]);  
		DB::table('supplier')->where('id','=',$request->id)
									->update(['SupSupplierName'=>$request->SupSupplierName,
											'SupCompanyName'=>$request->SupCompanyName,
											'SupAddress'=>$request->SupAddress,
											'SupEmail'=>$request->SupEmail,
											'SupZoneId'=>$request->ZonZoneName,
											'SupBusinessMobile'=>$request->SupBusinessMobile,
											]);
		Session::flash('success','Buyer Updated successfully.');
		return redirect()->back();
		//->withSuccess('New branch Created successfully.');
	}
	public function product()
	{
		if(auth::check()){
		$data['group']  = DB::table('vw_product')
					//->join('category','category.CtgCategoryID','=','vw_product.PdtCategoryID')	
					->orderBy('id','desc')				
					->get();
		$data['category'] =$data['category1'] = DB::table('category')					
					->get();
		$data['productgroup'] =$data['productgroup1'] = DB::table('productgroup')					
					->get();
		//$data['model'] = DB::table('model')					
		//			->get();
				$data['brand'] =$data['brand1'] = DB::table('brand')					
					->get();
					/*$data['group'] = DB::table('product')
					->select('product.id','product.PdtModelNo','product.PdtPrice','product.PdtProductCode','product.PdtWarrantyDays','product.PdtNameDL','productgroup.PgpGroupName AS group_name','category.CtgCategoryName AS category_name'
						,'brand.BrdBrandName AS brand_name')
					->join('productgroup','productgroup.PgpGroupId','=','product.PdtGroupID')
					->join('category','category.CtgCategoryID','=','product.PdtCategoryID')
					->join('brand','brand.BrdBrandID','=','product.PdtBrandID')
					//->orderBy('PgpOrder')
					->get();
					CREATE or REPLACE VIEW vw_product AS
						SELECT p.PdtGroupID,p.PdtBrandID,p.id,p.PdtCategoryID,p.PdtModelNo,p.PdtPrice,p.PdtProductCode,p.PdtWarrantyDays,p.PdtNameDL,pg.PgpGroupName, b.BrdBrandName brand_name
						from product as p,
						brand as b,
						productgroup as pg
						WHERE
						p.PdtGroupID = pg.PgpGroupId AND
						p.PdtBrandID = b.BrdBrandID


					CREATE or REPLACE VIEW vw_product AS
						SELECT p.PdtGroupID,p.PdtBrandID,c.CtgCategoryName,p.id,p.PdtCategoryID,p.PdtModelNo,p.PdtPrice,p.PdtProductCode,p.PdtWarrantyDays,p.PdtNameDL,pg.PgpGroupName, b.BrdBrandName brand_name
						from product as p,
						brand as b,
						productgroup as pg,
                        category c
						WHERE
                        c.CtgCategoryID=p.PdtCategoryID AND
                        c.CtgGroupID = p.PdtGroupID and
						p.PdtGroupID = pg.PgpGroupId AND
						p.PdtBrandID = b.BrdBrandID
					*/
		//dd($group);
		//Session::flash('success','New Product Group Created successfully.');

		return view('erp.product',$data);
		}
	}
	public function post_product(Request $request)
	{
		$this->validate($request,[			        
			        'BrdBrandID' => 'required'	,
			        'CtgCategoryID' => 'required'	,
			        'productgroup_id' => 'required'	,
			        'PdtModelNo'=> 'required'	, 		      
			        'PdtPrice'=> 'required|min:0|max:10000000'	, 		      
			        'PdtProductCode'=> 'required'	, 		      
			        'PdtWarrantyDays'=> 'required'	, 		      

			]);  
		







		DB::table('product')->insert(['PdtBrandID'=>$request->BrdBrandID,
											'PdtCategoryID'=>$request->CtgCategoryID,
											'PdtGroupID'=>$request->productgroup_id,
											'PdtModelNo'=>$request->PdtModelNo,
											'PdtPrice'=>$request->PdtPrice,
											'PdtProductCode'=>$request->PdtProductCode,
											'PdtWarrantyDays'=>$request->PdtWarrantyDays,
											]);
		Session::flash('success','Product Created successfully.');
		return redirect()->back()->withSuccess('New Product Created successfully.');
	}
	public function update_product(Request $request)
	{
		$this->validate($request,[			        
			        'branch_Name' => 'required'	,
			        'address' => 'required'	,
			        'contact_no' => 'required'	,
			        'email'		      => 'required|email'	, 	
			        'id'=>'required',	      
			]);  
		//dd($request->all());
		DB::table('branch')->where('id','=',$request->id)
									->update(['BranchName'=>$request->branch_Name,
											'address'=>$request->address,
											'contact_no'=>$request->contact_no,
											'email'=>$request->email
											]);
		Session::flash('success','Branch Updated successfully.');
		return redirect()->back();
		//->withSuccess('New branch Created successfully.');
	}
	public function product_del($id)
	{
		if(auth::check()){
			
				DB::table('branch')->where('id','=',$id)->delete();
				Session::flash('error','Branch Deleted successfully.');
				return redirect()->back();	
			
		}
	}

	public function branch()
	{
		if(auth::check()){
		$data['group'] = DB::table('branch')
					//->orderBy('PgpOrder')
					->get();
		//dd($group);
		//Session::flash('success','New Product Group Created successfully.');

		return view('erp.branch',$data);
		}
	}
	public function post_branch(Request $request)
	{
		$this->validate($request,[			        
			        'branch_Name' => 'required'	,
			        'address' => 'required'	,
			        'contact_no' => 'required'	,
			        'email'		      => 'required|email'	, 		      
			]);  
		
		DB::table('branch')->insert(['BranchName'=>$request->branch_Name,
											'address'=>$request->address,
											'contact_no'=>$request->contact_no,
											'email'=>$request->email
											]);
		Session::flash('success','Branch Created successfully.');
		return redirect()->back()->withSuccess('New branch Created successfully.');
	}
	public function update_branch(Request $request)
	{
		$this->validate($request,[			        
			        'branch_Name' => 'required'	,
			        'address' => 'required'	,
			        'contact_no' => 'required'	,
			        'email'		      => 'required|email'	, 	
			        'id'=>'required',	      
			]);  
		//dd($request->all());
		DB::table('branch')->where('id','=',$request->id)
									->update(['BranchName'=>$request->branch_Name,
											'address'=>$request->address,
											'contact_no'=>$request->contact_no,
											'email'=>$request->email
											]);
		Session::flash('success','Branch Updated successfully.');
		return redirect()->back();
		//->withSuccess('New branch Created successfully.');
	}
	public function branch_del($id)
	{
		if(auth::check()){
			
				DB::table('branch')->where('id','=',$id)->delete();
				Session::flash('error','Branch Deleted successfully.');
				return redirect()->back();	
			
		}
	}

	public function zone()
	{
		if(auth::check()){
		$data['group'] = DB::table('zone1')
					//->orderBy('PgpOrder')
					->get();
		//dd($group);
		//Session::flash('success','New Product Group Created successfully.');

		return view('erp.zone',$data);
		}
	}
	public function post_Zone(Request $request)
	{
		$this->validate($request,[
			        'regionid' => 'required|unique:zone1,ZonZoneID',
			        'Zone_Name' => 'required'			      		      
			]);  
		DB::table('zon1')->insert(['ZonZoneID'=>$request->regionid,
											'ZonZoneName'=>$request->Zone_Name,
											
											]);
		Session::flash('success','Zone Created successfully.');
		return redirect()->back()->withSuccess('New Zone Created successfully.');
	}
	public function zone_del($id)
	{
		if(auth::check()){
			
				DB::table('region')->where('RegRegionID','=',$id)->delete();
				Session::flash('error','Zone Deleted successfully.');
				return redirect()->back();	
			
		}
	}
	public function group()
	{
		if(auth::check()){
		$data['group'] = DB::table('productgroup')->select('PgpGroupId','PgpGroupName','PgpActive','PgpCompanyID','id')
					//->orderBy('PgpOrder')
					->get();
		//dd($group);
		//Session::flash('success','New Product Group Created successfully.');

		return view('erp.group',$data);
		}
	}
	public function group_del($id)
	{
		if(auth::check()){
			$is_exist = DB::table('product')->where('PdtGroupID','=',$id)->count();
			if($is_exist >0 )
			{
				Session::flash('info','Product Group has existing product list.');
				return redirect()->back();
			}
			else {
				DB::table('productgroup')->where('PgpGroupId','=',$id)->delete();
				Session::flash('error','Product Group Deleted successfully.');
				return redirect()->back();	
			}
		}
	}
	public function post_product_group(Request $request)
	{
		$this->validate($request,[
			        'groupid' => 'required|alpha',
			        'group_name' => 'required|alpha',
			        'PgpActive' => 'required|alpha',			       
			]);  
		DB::table('productgroup')->insert(['PgpGroupId'=>$request->groupid,
											'PgpGroupName'=>$request->group_name,
											'PgpActive'=>$request->PgpActive,
											'PgpCompanyID'=>'DTC'
											]);
		return redirect()->back()->withSuccess('New Product Group Created successfully.');
	}
	public function time_details(Request $request ){
		$input=$request->all();
		//dd($input);
		$financial_year= 	$request->input('financial_year');
		$ot_emp_hour=		$request->input('ot_emp_hour');
		$non_ot_emp_hour=	$request->input('non_ot_emp_hour');	
		$commit_ot_hou=		$request->input('commit_ot_hou');
		$week_holiday=		$request->input('week_holiday');
		$staf_cal_days=		$request->input('staf_cal_days');
		$non_staf_cal_days=	$request->input('non_staf_cal_days'); 
		$normal_ot_rate=	$request->input('normal_ot_rate');
		$holiday_ot_rate=	$request->input('holiday_ot_rate');
		$special_ot_rate=	$request->input('special_ot_rate');
		$holiday=			$request->input('holiday');
		//dd($holiday);
		if($holiday == 1)
		{
			$weekend=$request->input('holiday_one');
			//dd($weekend);
		}
		if($holiday == 2)
		{
			$weekend1=$request->input('holiday_one');
			$weekend2=$request->input('holiday_two');
			$weekend=$weekend1.','.$weekend2;
			//dd($weekend);
		}
		$is_null = 0;
			$is_null=TimeMaster::where('financial_year',$financial_year)->count();	

			if($is_null == 0)
			{
				TimeMaster::create([
							'financial_year'=>$financial_year,
							'ot_emp_hour'=>$ot_emp_hour,
							'non_ot_emp_hour'=>$non_ot_emp_hour,
							'commit_ot_hou'=>$commit_ot_hou,
							'week_holiday'=>$weekend,
							'staf_cal_days'=>$staf_cal_days,
							'non_staf_cal_days'=>$non_staf_cal_days, 
							'normal_ot_rate'=>$normal_ot_rate,
							'holiday_ot_rate'=>$holiday_ot_rate,
							'special_ot_rate'=>$special_ot_rate
							]);
			}
			elseif ($is_null == 1) {
				TimeMaster::where('financial_year',$financial_year)->update([
							'financial_year'=>$financial_year,
							'ot_emp_hour'=>$ot_emp_hour,
							'non_ot_emp_hour'=>$non_ot_emp_hour,
							'commit_ot_hou'=>$commit_ot_hou,
							'week_holiday'=>$weekend,
							'staf_cal_days'=>$staf_cal_days,
							'non_staf_cal_days'=>$non_staf_cal_days, 
							'normal_ot_rate'=>$normal_ot_rate,
							'holiday_ot_rate'=>$holiday_ot_rate,
							'special_ot_rate'=>$special_ot_rate
							]);
				}
			return redirect()->back()->withSuccess('Data have successfully saved !!');	
	}
	public function leave_details(Request $request ){
		$input=$request->all();
			
		////******** Annual Leave  ********/////
		$entitled_for_annual =  	$request->input('entitled_for_annual');
		$completed_days=			$request->input('completed_days');
		$chk_is_accr_to_service=	$request->input('chk_is_accr_to_service');
		$chk_bal_accr=				$request->input('chk_bal_accr');
		$chk_min_annual_leav=		$request->input('chk_min_annual_leav');
		$min_annual_leav=			$request->input('min_annual_leav');
		$chk_ex_hou_allow=			$request->input('chk_ex_hou_allow');
		$chk_auto_anual_leav_sal=	$request->input('chk_auto_anual_leav_sal');
		$adv_annul_leav=			$request->input('adv_annul_leav');
		$l_complete_1_year=			$request->input('l_complete_1_year');
		$l_incomplete_1_year=		$request->input('l_incomplete_1_year');		
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Annual Leave")->count();			
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Annual Leave",
					'entitled_for_annual' => $entitled_for_annual[0],
					'completed_days'=>$completed_days,
					'chk_is_accr_to_service'=>$chk_is_accr_to_service[0],
					'chk_bal_accr'=>$chk_bal_accr[0],
					'chk_min_annual_leav'=>$chk_min_annual_leav[0],
					'min_annual_leav'=>$min_annual_leav,
					'chk_ex_hou_allow'=>$chk_ex_hou_allow[0],
					'chk_auto_anual_leav_sal'=>$chk_auto_anual_leav_sal[0],
					'adv_annul_leav'=>$adv_annul_leav,
					'l_complete_1_year'=>$l_complete_1_year,
					'l_incomplete_1_year'=>$l_incomplete_1_year
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Annual Leave")->update([
					'leave_name'=>"Annual Leave",
					'entitled_for_annual' => $entitled_for_annual[0],
					'completed_days'=>$completed_days,
					'chk_is_accr_to_service'=>$chk_is_accr_to_service[0],
					'chk_bal_accr'=>$chk_bal_accr[0],
					'chk_min_annual_leav'=>$chk_min_annual_leav[0],
					'min_annual_leav'=>$min_annual_leav,
					'chk_ex_hou_allow'=>$chk_ex_hou_allow[0],
					'chk_auto_anual_leav_sal'=>$chk_auto_anual_leav_sal[0],
					'adv_annul_leav'=>$adv_annul_leav,
					'l_complete_1_year'=>$l_complete_1_year,
					'l_incomplete_1_year'=>$l_incomplete_1_year
					]);
			}		
		///******* Leave Salary Include *****//
		$leav_sal_incl=$request->input('leav_sal_incl');
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Leave Salary Include")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Leave Salary Include",
					'leav_sal_incl'=>$leav_sal_incl
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Leave Salary Include")->update([
					'leave_name'=>"Leave Salary Include",
					'leav_sal_incl'=>$leav_sal_incl
					]);
			}
		///******* Leave Encashment *****//
		$leav_encash=$request->input('leav_encash');
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Leave Encashment")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Leave Encashment",
					'leav_encash'=>$leav_encash
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Leave Encashment")->update([
					'leave_name'=>"Leave Encashment",
					'leav_encash'=>$leav_encash
					]);
			}
		///*******    Sick  Leave  *****//
		$chk_sick_leav=$request->input('chk_sick_leav');
		$sick_ful_pay_days=$request->input('sick_ful_pay_days');
		$sick_haf_pay_days=$request->input('sick_haf_pay_days');
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Sick Leave")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Sick Leave",
					'chk_sick_leav'=>$chk_sick_leav[0],
					'sick_ful_pay_days'=>$sick_ful_pay_days,
					'sick_haf_pay_days'=>$sick_haf_pay_days
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Sick Leave")->update([
					'leave_name'=>"Sick Leave",
					'chk_sick_leav'=>$chk_sick_leav[0],
					'sick_ful_pay_days'=>$sick_ful_pay_days,
					'sick_haf_pay_days'=>$sick_haf_pay_days
					]);
			}
		///*******  Hajj  Leave  *****//
		$haj_leav=$request->input('haj_leav');
		$haj_how_time=$request->input('haj_how_time');
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Hajj Leave")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Hajj Leave",
					'haj_leav'=>$haj_leav,
					'haj_how_time'=>$haj_how_time
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Hajj Leave")->update([
					'leave_name'=>"Hajj Leave",
					'haj_leav'=>$haj_leav,
					'haj_how_time'=>$haj_how_time
					]);
			}
		///*******   Maternity Leave  *****//
		$mater_leav_bef_one_year=$request->input('mater_leav_bef_one_year');
		$mater_pay_bef_one_year=$request->input('mater_pay_bef_one_year');
		$mater_leav_after_one_year=$request->input('mater_leav_after_one_year');
		$mater_pay_aft_one=$request->input('mater_pay_aft_one');
		$chk_mater_and_annaul=$request->input('chk_mater_and_annaul');
		$mater_and_annaul_not_exce=$request->input('mater_and_annaul_not_exce');
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Maternity Leave")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Maternity Leave",
					'mater_leav_bef_one_year'=>$mater_leav_bef_one_year,
					'mater_pay_bef_one_year'=>$mater_pay_bef_one_year,
					'mater_leav_after_one_year'=>$mater_leav_after_one_year,
					'mater_pay_aft_one'=>$mater_pay_aft_one,
					'chk_mater_and_annaul'=>$chk_mater_and_annaul[0],
					'mater_and_annaul_not_exce'=>$mater_and_annaul_not_exce
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Maternity Leave")->update([
					'leave_name'=>"Maternity Leave",
					'mater_leav_bef_one_year'=>$mater_leav_bef_one_year,
					'mater_pay_bef_one_year'=>$mater_pay_bef_one_year,
					'mater_leav_after_one_year'=>$mater_leav_after_one_year,
					'mater_pay_aft_one'=>$mater_pay_aft_one,
					'chk_mater_and_annaul'=>$chk_mater_and_annaul[0],
					'mater_and_annaul_not_exce'=>$mater_and_annaul_not_exce
					]);
			}
		///*******   Accidental Leave  *****//
		$acci_full_pay=$request->input('acci_full_pay');
		$acci_half_pay=$request->input('acci_half_pay');
			$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Accidental Leave")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Accidental Leave",
					'acci_full_pay'=>$acci_full_pay,
					'acci_half_pay'=>$acci_half_pay
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Accidental Leave")->update([
					'leave_name'=>"Hajj Leave",
					'acci_full_pay'=>$acci_full_pay,
					'acci_half_pay'=>$acci_half_pay
					]);
			}
		///******* Personal   Leave *****//
		$person_max_leave=$request->input('person_max_leave');
		$person_conti_leave=$request->input('person_conti_leave');
		$is_null = 0;
			$is_null=LeaveMaster::where('leave_name',"Accidental Leave")->count();
			if($is_null == 0)
			{
					
					LeaveMaster::create([
					'leave_name'=>"Accidental Leave",
					'person_max_leave'=>$person_max_leave,
					'person_conti_leave'=>$person_conti_leave
					]);	
			}
			elseif ($is_null == 1) {
					LeaveMaster::where('leave_name',"Accidental Leave")->update([
					'leave_name'=>"Accidental Leave",
					'person_max_leave'=>$person_max_leave,
					'person_conti_leave'=>$person_conti_leave
					]);
			}
		return redirect()->back()->withSuccess('Data have successfully saved !!');

	}
	public function index(){

        

       
		$alias_list = Alias::all();//by Dev@4489
       
		$config = Helper::getConfiguration();
		$mail_config = Helper::getMail();

		$sms_config = Helper::getSMS();

		$services = Helper::getServices();

        $assets = ['datetimepicker','mail_config'];



        $roles = DB::table('roles')->get();

        $permissions = DB::table('permissions')->orderBy('category')->get();

        

        $permission_role = DB::table('permission_role')

        	->select(DB::raw('CONCAT(role_id,"-",permission_id) AS detail,id'))

        	->lists('detail','id');

        $data = [

        	

        	
			'alias_list' => $alias_list,//by Dev@4489

        	
        	'config' => $config,

        	'mail_config' => $mail_config,

        	'sms_config' => $sms_config,

        	'services' => $services,

        	'roles' => $roles,

        	'permissions' => $permissions,

        	'permission_role' => $permission_role,

        	'assets' => $assets,

        	'category' => null

        	];



		return view('configuration.permission',$data);

	}



	public function mailStore(Request $request){

		if(!Helper::getMode())

			return redirect()->back()->withErrors(config('constants.DISABLE_MESSAGE'));

		

		$validation = Validator::make($request->all(),[

				'from_address' => 'required|email',

				'from_name' => 'required'

				]);



		if($validation->fails()){

			return redirect()->back()->withInput()->withErrors($validation->messages());

		}

		

		$mail_config = Helper::getMail();

		$services = Helper::getServices();



		$config_type = $request->input('config_type');



		$mail_config['driver'] = $request->input('driver');

		$mail_config['from']['address'] = $request->input('from_address');

		$mail_config['from']['name'] = $request->input('from_name');



		if($request->input('driver') == 'smtp'){	

			$mail_config['host'] = $request->input('host');

			$mail_config['port'] = $request->input('port');

			$mail_config['username'] = $request->input('username');

			$mail_config['password'] = $request->input('password');

		}

		elseif($request->input('driver') == 'mandrill'){

			$services['mandrill']['secret'] = $request->input('mandrill_secret');

			$filename = base_path().'/config/services.php';

			File::put($filename,var_export($services, true));

			File::prepend($filename,'<?php return ');

			File::append($filename, ';');

		}

		elseif($request->input('driver') == 'mailgun'){

			$services['mailgun']['secret'] = $request->input('mailgun_secret');

			$services['mailgun']['domain'] = $request->input('mailgun_domain');

			$filename = base_path().'/config/services.php';

			File::put($filename,var_export($services, true));

			File::prepend($filename,'<?php return ');

			File::append($filename, ';');

		}

		$mail_config['encryption'] = 'tls';

		$mail_config['sendmail'] = '/usr/sbin/sendmail -bs';

		$mail_config['pretend'] = false;



		$filename = base_path().'/config/mail.php';

		File::put($filename,var_export($mail_config, true));

		File::prepend($filename,'<?php return ');

		File::append($filename, ';');



		return redirect('/configuration#'.$config_type)->withSuccess(config('constants.SAVED'));			



	}



	public function smsStore(Request $request){

		if(!Helper::getMode())

			return redirect()->back()->withErrors(config('constants.DISABLE_MESSAGE'));

		

		$sms_config = Helper::getSMS();



		$config_type = $request->input('config_type');



		$sms_config['sid'] = $request->input('sid');

		$sms_config['token'] = $request->input('token');

		$sms_config['from'] = $request->input('from');



		$filename = base_path().'/config/twilio.php';

		File::put($filename,var_export($sms_config, true));

		File::prepend($filename,'<?php return ');

		File::append($filename, ';');



		return redirect('/configuration#'.$config_type)->withSuccess(config('constants.SAVED'));			



	}



	public function jobStore(Request $request){

		if(!Helper::getMode())

			return redirect()->back()->withErrors(config('constants.DISABLE_MESSAGE'));

		

		$config = Helper::getConfiguration();

		$config['job_application_staff'] = $request->input('job_application_staff');

		$config['application_format'] = $request->input('application_format');



		$filename = base_path().'/config/config.php';

		File::put($filename,var_export($config, true));

		File::prepend($filename,'<?php return ');

		File::append($filename, ';');



		return redirect('/configuration#'.$request->input('config_type'))->withSuccess(config('constants.SAVED'));			

	}



	public function savePermission(Request $request){



		if(!Helper::getMode())

			return redirect()->back()->withErrors(config('constants.DISABLE_MESSAGE'));

		

		$input = $request->all();

		$permissions = array_get($input, 'permission');



		if(!Entrust::hasRole('admin'))

			return redirect('/dashboard')->withErrors(config('constants.NA'));



		DB::table('permission_role')->truncate();



		if($permissions != '')

		foreach($permissions as $r_key => $permission){

			foreach($permission as $p_key => $per){

				$values[] = $p_key;

			}

			$role = Role::find($r_key);

			if(count($values))

			$role->attachPermissions($values);

			unset($values);

		}



		return redirect('/configuration#permission')->withSuccess(config('constants.UPDATED'));

	}



	public function officeTime(ConfigurationTimeRequest $request){



		if(!Helper::getMode())

			return redirect()->back()->withErrors(config('constants.DISABLE_MESSAGE'));



		$in_time = strtotime(date('Y-m-d')." ".$request->input('in_time'));

		$out_time = strtotime(date('Y-m-d')." ".$request->input('out_time'));

		$config = Helper::getConfiguration();

		$config['in_time'] = date('H:i',$in_time);

		$config['out_time'] = date('H:i',$out_time);



		$filename = base_path().'/config/config.php';

		File::put($filename,var_export($config, true));

		File::prepend($filename,'<?php return ');

		File::append($filename, ';');



		return redirect('/configuration#'.$request->input('config_type'))->withSuccess(config('constants.SAVED'));			

	}



	public function store(Request $request){

		if(!Helper::getMode())

			return redirect()->back()->withErrors(config('constants.DISABLE_MESSAGE'));

		

		$config = Helper::getConfiguration();



		$config_type = $request->input('config_type');

		$input = $request->all();

		foreach($input as $key => $value){

			if($key != '_token' && $key != 'config_type')

			$config[$key] = $value;

		}



		$filename = base_path().'/config/config.php';

		File::put($filename,var_export($config, true));

		File::prepend($filename,'<?php return ');

		File::append($filename, ';');



		return redirect('/configuration#'.$config_type)->withSuccess(config('constants.SAVED'));			

	}

}

?>