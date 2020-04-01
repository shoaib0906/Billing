<?php

namespace App\Http\Controllers;

use DB;

use File;

use Config;
use Auth;
use Entrust;
use Activity;
use App\Classes\Helper;
use App\Estimate;
use App\Quotation;
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
use ZanySoft\LaravelPDF\PDF;
use Validator;



Class QuationController extends Controller{


	public function index(){
		$data['product_quote'] = DB::table('product_quote')->get();
		return view('erp.qut_est.sales',$data);
	}
	public function post_quot_product(Request $request)
	{
		if(auth::check()){
		
		$this->validate($request,[			        
			        'product_name' => 'required'	,
			       	'editor1'=>'required',
			        'product_code' => 'required',
			        'price'=>'required',
			        'warrenty'=>'required'
			]); 
		
		DB::table('product_quote')->insert([
						'product_name'=>$request->product_name,	
						'description'=>$request->editor1,						
						'product_code'=>$request->product_code,						
						'price'=>$request->price,
						'warrenty'=>$request->warrenty,

			]);
		
		Session::flash('success','Product created for Quotation');
		return redirect()->back();
		}
	}
	public function quote_product_edit(Request $request)
	{
		$this->validate($request,[			        
			          'product_name' => 'required'	,
			       	'description'=>'required',
			        'product_code' => 'required',
			        'price'=>'required',
			        'warrenty'=>'required',
			        'id'=>'required'      
			]);  
		//dd($request->all());
		DB::table('product_quote')->where('id','=',$request->id)
									->update(['product_name'=>$request->product_name,
											'description'=>$request->description,
											'product_code'=>$request->product_code,
											'price'=>$request->price,
											'warrenty'=>$request->warrenty
											]);
		Session::flash('success','Quote Product Updated successfully.');
		return redirect()->back();
		//->withSuccess('New branch Created successfully.');
	}
		public function index_est(){
		$data['product_quote'] = DB::table('product_estimate')->get();
		return view('erp.qut_est.estimate_setup',$data);
	}
	public function post_est_product(Request $request)
	{
		if(auth::check()){
		
		$this->validate($request,[			        
			        'product_name' => 'required'	,
			       	'description'=>'required',
			        'product_code' => 'required',
			        'price'=>'required',
			        'warrenty'=>'required'
			]); 
		
		DB::table('product_estimate')->insert([
						'product_name'=>$request->product_name,	
						'description'=>$request->description,						
						'product_code'=>$request->product_code,						
						'price'=>$request->price,
						'warrenty'=>$request->warrenty,

			]);
		
		Session::flash('success','Estimate created for Quotation');
		return redirect()->back();
		}
	}
	public function est_product_edit(Request $request)
	{
		$this->validate($request,[			        
			          'product_name' => 'required'	,
			       	'description'=>'required',
			        'product_code' => 'required',
			        'price'=>'required',
			        'warrenty'=>'required',
			        'id'=>'required'      
			]);  
		//dd($request->all());
		DB::table('product_estimate')->where('id','=',$request->id)
									->update(['product_name'=>$request->product_name,
											'description'=>$request->description,
											'product_code'=>$request->product_code,
											'price'=>$request->price,
											'warrenty'=>$request->warrenty
											]);
		Session::flash('success','Estimate Product Updated successfully.');
		return redirect()->back();
		//->withSuccess('New branch Created successfully.');
	}
	public function Estimate()
	{
		//Session::put('order_no',null);
		$quotation_no = Session::get('quotation_no');
		
		if(!empty($quotation_no))
		{			
			$data['order_no'] = $data['order_no1'] =$quotation_no;
			$data['estimate'] = DB::table('estimate')->where('order_no','=',$quotation_no)->get();
			$data['product_det'] = DB::table('product_estimate')->get();
			$data['buyer'] = $data['buyer1']=DB::table('buyer')->select('id','BuyBuyerName')->get();		
			return view('erp.qut_est.estimate_box',$data);
		}	
		else{
			$sl_no=DB::table('estimate')->where('branch_id','=',Auth::user()->property_id)->max('bill_no');
			$sl_no = $sl_no+1;
			$data['product_det'] = DB::table('product_estimate')->get();
			$data['order_no'] = $data['order_no1'] =$order_no   = 'DTC-ESTIMATE-'.str_pad($sl_no,4,"0",STR_PAD_LEFT);
			
			return view('erp.qut_est.estimate_box',$data);
		}
	}
	public function add_to_estimate(Request $request,Estimate $estimate)
	{
		if(Auth::check())
		{
			$this->validate($request,[			        
			        'sup_invoice_no' => 'required'	,	
			        'product_id'=>'required',			
			        'quantity' =>'required',			
			]); 
		
		$Product = DB::table('product_estimate')->where('id','=',$request->product_id)->first();
		Session::put('quotation_no',$request->sup_invoice_no);
		$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();
		
		$estimate->order_no = $request->sup_invoice_no; 		
		$estimate->product_name = $Product->product_name;

		$estimate->product_code = $Product->product_code;

		$estimate->PdtDescription = $Product->description;
		$estimate->sales_price = $Product->price;
		$estimate->sales_date = date('Y-m-d');
		$estimate->created_at = date('Y-m-d H:i:s');
		$estimate->quantity = $request->quantity;
		$estimate->entry_user_id = Auth::user()->id;
		$estimate->entry_username = Auth::user()->username;
		$estimate->branch_id = Auth::user()->property_id;
		$estimate->branch_name = $tenants_name->department_name;

		 //$data = $request->all();

        //$purchase->fill($data);

		$estimate->fill($request->all())->save();

		Activity::log('Estimate in'.$request->product_code);
		Session::flash('success','Product Added successfully into Estimate.');

		return redirect()->back();
		}
	}
	public function est_product_del($id)
	{
		if(Auth::check()){
			DB::table('estimate')->where('id','=',$id)->delete();
			Activity::log('Estimate delete'.$id);
			Session::flash('success','Product delete from estimate successfully.');

		return redirect()->back();
		}
	}
	public function generate_estimate(Request $request)
	{

		if(auth::check()){

		$this->validate($request,[			        
			        'order_no' => 'required'	,	
			        'total_amount'=>'required',			       
			        'net_amout'=>'required',
			        'buyer_id'=>'required',			       
			         'name1'=>'required',
			        
			]); 

						$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();	
						$created_at = date('Y-m-d');
						$entry_user_id = Auth::user()->id;
						$entry_username = Auth::user()->username;
						$branch_id = Auth::user()->property_id;
						$branch_name = $tenants_name->department_name;

						$bill_id = $request->buyer_id;
						$attention = $request->name1;


						$v_count = DB::table('buyer_attention')->where('buyer_id','=',$bill_id)->count();
						if($v_count==0)
						{
							$buyer  = DB::table('buyer')->select('buyer.BuyBuyerName','buyer.id','buyer.BuyAddress','buyer.BuyDesignation','buyer.BuyContactPerson','buyer.BuyBusinessMobile')
									->where('buyer.id','=',$bill_id)						
									->first();
									$bill_to=$buyer->BuyBuyerName;
									$mobile = $buyer->BuyBusinessMobile;
								$designation = $buyer->BuyDesignation;
								$billing_address = $buyer->BuyAddress;
						}
						else
						{
							$buyer  = DB::table('buyer')->select('buyer.BuyBuyerName','buyer.BuyBuyerID','buyer.BuyAddress','buyer.BuyDesignation','buyer.BuyContactPerson','buyer.BuyBusinessMobile',
							'b.name2','b.designation2','b.mobile2','b.name3','b.designation3','b.mobile3')
							->where('buyer.id','=',$bill_id)
							->join('buyer_attention AS b','b.buyer_id','=','buyer.id')
							->first();
							$bill_to=$buyer->BuyBuyerName;
							$billing_address = $buyer->BuyAddress;
							if($attention == $buyer->BuyContactPerson)
							{
								$mobile = $buyer->BuyBusinessMobile;
								$designation = $buyer->BuyDesignation;
							}
							elseif ($attention == $buyer->name2) {
								$mobile = $buyer->mobile2;
								$designation = $buyer->designation2;
							}
							else {							 
								$mobile = $buyer->mobile3;
								$designation = $buyer->designation3;
							}
						}
						
						$id = DB::table('estimate_master')->insertGetId([
								'buyer_id'         	=>$request->buyer_id,
								'order_no' 			=>$request->order_no,
								'total_amount' 		=>$request->total_amount,
								'vat'				=>$request->vat,
								'less'				=>$request->less,
								'net_amout'			=>$request->net_amout,								
								'created_at'		=>$created_at,
								'entry_user_id'		=>$entry_user_id,
								'entry_username'	=>$entry_username,
								'branch_id'			=>$branch_id,
								'branch_name'		=>$branch_name,
								
								'bill_id' 			=>$bill_id,
								'bill_to'			=>$bill_to,
								'billing_address'	=>$billing_address,
								'attention'			=>$attention,
								'mobile'			=>$mobile,
								'designation'		=>$designation											
																]);
						if(!empty($id)){
							DB::table('estimate')->where('order_no','=',$request->order_no)->where('bill_no','=',null)
												->where('status','=',1)->where('entry_user_id','=',auth::user()->id)->where('branch_id','=',Auth::user()->property_id)->update(['bill_no'=>$id,'year'=>date('Y')]);
						}
						$data['sales'] = DB::table('estimate')						
						->where('estimate.order_no','=',$request->order_no)						
						->get();
						$data['sales_master']=DB::table('estimate_master')->select('estimate_master.*','buyer.BuyBuyerName','buyer.BuyContactPerson','buyer.BuyBusinessMobile'
							,'buyer.BuyCompanyName','buyer.BuyDesignation')
												->where('estimate_master.id','=',$id)
												->join('buyer','buyer.id','=','estimate_master.buyer_id')
												->first();
		//return view('',$data);
		Session::put('quotation_no',null);
		$pdf = new PDF();
		$pdf->SetProtection(array('print'));
	$pdf->loadView('erp.qut_est.estimate_bill', $data);
	return $pdf->Stream('document.pdf');

		}
	}
	public function Quatation()
	{
		//Session::put('order_no',null);
		$quotation_no = Session::get('estimate_no');
		
		if(!empty($quotation_no))
		{			
			$data['order_no'] = $data['order_no1'] =$quotation_no;
			$data['estimate'] = DB::table('quotation')->where('order_no','=',$quotation_no)->get();
			$data['product_det'] = DB::table('product_estimate')->get();
			$data['buyer'] = $data['buyer1']=DB::table('buyer')->select('id','BuyBuyerName')->get();		
			return view('erp.qut_est.quotation_box',$data);
		}	
		else{
			$sl_no=DB::table('quotation')->where('branch_id','=',Auth::user()->property_id)->max('bill_no');
			$sl_no = $sl_no+1;
			$data['product_det'] = DB::table('product_quote')->get();
			$data['order_no'] = $data['order_no1'] =$order_no   = 'DTC-QUOTE-'.str_pad($sl_no,4,"0",STR_PAD_LEFT);
			
			return view('erp.qut_est.quotation_box',$data);
		}
	}
	public function add_to_quatation(Request $request,Quotation $estimate)
	{
		if(Auth::check())
		{
			$this->validate($request,[			        
			        'sup_invoice_no' => 'required'	,	
			        'product_id'=>'required',			
			        'quantity' =>'required',			
			]); 
		
		$Product = DB::table('product_quote')->where('id','=',$request->product_id)->first();
		Session::put('estimate_no',$request->sup_invoice_no);
		$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();
		
		$estimate->order_no = $request->sup_invoice_no; 		
		$estimate->product_name = $Product->product_name;

		$estimate->product_code = $Product->product_code;

		$estimate->PdtDescription = $Product->description;
		$estimate->sales_price = $Product->price;
		$estimate->sales_date = date('Y-m-d');
		$estimate->created_at = date('Y-m-d H:i:s');
		$estimate->quantity = $request->quantity;
		$estimate->entry_user_id = Auth::user()->id;
		$estimate->entry_username = Auth::user()->username;
		$estimate->branch_id = Auth::user()->property_id;
		$estimate->branch_name = $tenants_name->department_name;

		 //$data = $request->all();

        //$purchase->fill($data);

		$estimate->fill($request->all())->save();

		Activity::log('Quotation in'.$request->product_code);
		Session::flash('success','Product Added successfully into Quotation.');

		return redirect()->back();
		}
	}
	public function qut_product_del($id)
	{
		if(Auth::check()){
			DB::table('quotation')->where('id','=',$id)->delete();
			Activity::log('Quotation delete'.$id);
			Session::flash('success','Product delete from quotation successfully.');

		return redirect()->back();
		}
	}
	public function generate_quatation(Request $request)
	{

		if(auth::check()){

		$this->validate($request,[			        
			        'order_no' => 'required'	,	
			        'total_amount'=>'required',			       
			        'net_amout'=>'required',
			        'buyer_id'=>'required',			       
			         'name1'=>'required',
			        
			]); 

						$tenants_name=DB::table('departments')->select('department_name')->where('id','=',Auth::user()->property_id)->first();	
						$created_at = date('Y-m-d');
						$entry_user_id = Auth::user()->id;
						$entry_username = Auth::user()->username;
						$branch_id = Auth::user()->property_id;
						$branch_name = $tenants_name->department_name;

						$bill_id = $request->buyer_id;
						$attention = $request->name1;


						$v_count = DB::table('buyer_attention')->where('buyer_id','=',$bill_id)->count();
						if($v_count==0)
						{
							$buyer  = DB::table('buyer')->select('buyer.BuyBuyerName','buyer.id','buyer.BuyAddress','buyer.BuyDesignation','buyer.BuyContactPerson','buyer.BuyBusinessMobile')
									->where('buyer.id','=',$bill_id)						
									->first();
									$bill_to=$buyer->BuyBuyerName;
									$mobile = $buyer->BuyBusinessMobile;
								$designation = $buyer->BuyDesignation;
								$billing_address = $buyer->BuyAddress;
						}
						else
						{
							$buyer  = DB::table('buyer')->select('buyer.BuyBuyerName','buyer.BuyBuyerID','buyer.BuyAddress','buyer.BuyDesignation','buyer.BuyContactPerson','buyer.BuyBusinessMobile',
							'b.name2','b.designation2','b.mobile2','b.name3','b.designation3','b.mobile3')
							->where('buyer.id','=',$bill_id)
							->join('buyer_attention AS b','b.buyer_id','=','buyer.id')
							->first();
							$bill_to=$buyer->BuyBuyerName;
							$billing_address = $buyer->BuyAddress;
							if($attention == $buyer->BuyContactPerson)
							{
								$mobile = $buyer->BuyBusinessMobile;
								$designation = $buyer->BuyDesignation;
							}
							elseif ($attention == $buyer->name2) {
								$mobile = $buyer->mobile2;
								$designation = $buyer->designation2;
							}
							else {							 
								$mobile = $buyer->mobile3;
								$designation = $buyer->designation3;
							}
						}
						
						$id = DB::table('quotation_master')->insertGetId([
								'buyer_id'         	=>$request->buyer_id,
								'order_no' 			=>$request->order_no,
								'total_amount' 		=>$request->total_amount,
								'vat'				=>$request->vat,
								'less'				=>$request->less,
								'net_amout'			=>$request->net_amout,								
								'created_at'		=>$created_at,
								'entry_user_id'		=>$entry_user_id,
								'entry_username'	=>$entry_username,
								'branch_id'			=>$branch_id,
								'branch_name'		=>$branch_name,
								
								'bill_id' 			=>$bill_id,
								'bill_to'			=>$bill_to,
								'billing_address'	=>$billing_address,
								'attention'			=>$attention,
								'mobile'			=>$mobile,
								'designation'		=>$designation											
																]);
						if(!empty($id)){
							DB::table('quotation')->where('order_no','=',$request->order_no)->where('bill_no','=',null)
												->where('status','=',1)->where('entry_user_id','=',auth::user()->id)->where('branch_id','=',Auth::user()->property_id)->update(['bill_no'=>$id,'year'=>date('Y')]);
						}
						$data['sales'] = DB::table('quotation')						
						->where('quotation.order_no','=',$request->order_no)						
						->get();
						$data['sales_master']=DB::table('quotation_master')->select('quotation_master.*','buyer.BuyBuyerName','buyer.BuyContactPerson','buyer.BuyBusinessMobile'
							,'buyer.BuyCompanyName','buyer.BuyDesignation')
												->where('quotation_master.id','=',$id)
												->join('buyer','buyer.id','=','quotation_master.buyer_id')
												->first();
		//return view('',$data);
		Session::put('estimate_no',null);
		$pdf = new PDF();
		$pdf->SetProtection(array('print'));
	$pdf->loadView('erp.qut_est.quotation_bill', $data);
	return $pdf->Stream('document.pdf');

		}
	}
	public function Quatation_list()
	{
		$data['sales_list'] = DB::table('quotation_master')->select('quotation_master.*','buyer.BuyBuyerName','buyer.BuyContactPerson','buyer.BuyBusinessMobile'
							,'buyer.BuyCompanyName','buyer.BuyDesignation')
												
												->join('buyer','buyer.id','=','quotation_master.buyer_id')
												->get();
		return view('erp.qut_est.quote_list',$data);
	}
	public function estimate_list()
	{
		$data['sales_list'] = DB::table('estimate_master')->select('estimate_master.*','buyer.BuyBuyerName','buyer.BuyContactPerson','buyer.BuyBusinessMobile'
							,'buyer.BuyCompanyName','buyer.BuyDesignation')
											
												->join('buyer','buyer.id','=','estimate_master.buyer_id')
												->get();
		return view('erp.qut_est.estimate_list',$data);
	}
	public function view_quote($quote_id)
	{
		
		$data['sales'] = DB::table('quotation')						
						->where('quotation.order_no','=',$quote_id)						
						->get();
						$data['sales_master']=DB::table('quotation_master')->select('quotation_master.*','buyer.BuyBuyerName','buyer.BuyContactPerson','buyer.BuyBusinessMobile'
							,'buyer.BuyCompanyName','buyer.BuyDesignation')
												->where('quotation_master.order_no','=',$quote_id)
												->join('buyer','buyer.id','=','quotation_master.buyer_id')
												->first();
		
		$pdf = new PDF();
		$pdf->SetProtection(array('print'));
		$pdf->loadView('erp.qut_est.quotation_bill', $data);
		return $pdf->Stream('document.pdf');
	}
	public function view_estimate($estimate_id)
	{
		$data['sales'] = DB::table('estimate')						
						->where('estimate.order_no','=',$estimate_id)						
						->get();
						$data['sales_master']=DB::table('estimate_master')->select('estimate_master.*','buyer.BuyBuyerName','buyer.BuyContactPerson','buyer.BuyBusinessMobile'
							,'buyer.BuyCompanyName','buyer.BuyDesignation')
												->where('estimate_master.order_no','=',$estimate_id)
												->join('buyer','buyer.id','=','estimate_master.buyer_id')
												->first();
		
		$pdf = new PDF();
		$pdf->SetProtection(array('print'));
		$pdf->loadView('erp.qut_est.estimate_bill', $data);
		return $pdf->Stream('document.pdf');

	}
}

?>