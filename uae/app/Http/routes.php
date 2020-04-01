<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



get('/testapi','Auth\AuthController@testapi');




get('/signin','Auth\AuthController@getSingin');
post('/authenticate', 'DashboardController@post_signup');


get('/documentation',function(){
	return view('documentation.index');
});
get('/apply', 'JobController@apply');
post('/saveApplication',array('as' => 'job.saveApplication','uses' => 'JobController@saveApplication'));

get('/login', 'Auth\AuthController@getLogin');
post('/login', 'Auth\AuthController@postLogin');
Route::group(['middleware' => 'guest'], function () {
	
	

	
	

	get('password/email', 'Auth\PasswordController@getEmail');
	post('password/email', 'Auth\PasswordController@postEmail');
	get('password/reset/{token}', 'Auth\PasswordController@getReset');
	post('password/reset', 'Auth\PasswordController@postReset');
	$config = \App\Classes\Helper::getConfiguration();
	if(array_key_exists('installation_path', $config) && $config['installation_path'] == '')
	resource('install', 'InstallController',['only' => ['index', 'store']]);
});

Route::group(['middleware' => 'auth'], function () {

	get('/', 'Auth\AuthController@getLogin');
	get('dashboard','DashboardController@index');
	/* =====================================*/
	/* ================ ERP ================*/
	/* =====================================*/
	get('/Quotation-Setup','QuationController@index');
	post('/post_quot_product','QuationController@post_quot_product');
	post('/quote_product_edit','QuationController@quote_product_edit');

	get('/Estimate','QuationController@Estimate');
	post('/add_to_estimate','QuationController@add_to_estimate');
	get('/delete-estimate/{id}','QuationController@est_product_del');
	post('/generate_estimate','QuationController@generate_estimate');

	get('/Quotation','QuationController@Quatation');
	post('/add_to_quatation','QuationController@add_to_quatation');
	get('/delete-quatation/{id}','QuationController@qut_product_del');
	post('/generate_quatation','QuationController@generate_quatation');

	get('/Estimate-Setup','QuationController@index_est');
	post('/post_est_product','QuationController@post_est_product');
	post('/est_product_edit','QuationController@est_product_edit');


	get('/Quotation_list','QuationController@Quatation_list');
	get('/view_quote/{id}','QuationController@view_quote');


	get('/Estimate_list','QuationController@estimate_list');
	get('/view_estimate/{id}','QuationController@view_estimate');
	//get('/Quatation-Setup','EstimateController@index');
	

	get('/Day_Book','AccountController@Day_Book');
	get('/collection','AccountController@collection');
	post('/post_payment','AccountController@post_payment');

	get('/payment','AccountController@payment');
	post('/post_collection','AccountController@post_collection');

	get('/collection-view/{id}','AccountController@view_collection');
	
	get('/get_invoice_det/{id}','AccountController@get_invoice_det');
	get('/get_bill_det/{id}','AccountController@get_bill_det');
	


	get('/product_purchase','PurchaseController@product_purchase');	
	post('/post_purchase','PurchaseController@post_purchase');	
	get('delete-purchase/{id}','PurchaseController@del_purchase');
	get('purchase_list','PurchaseController@purchase_list');
	get('view_invoice/{inv_no}','PurchaseController@view_invoice');


	get('/sales','SalesController@sales');	
	get('/sales_list','SalesController@sales_list');	
	get('view_bill/{id}','SalesController@view_bill');
	post('/add_to_edit','SalesController@add_to_edit');
	post('/post_barcode','SalesController@post_barcode');	
	get('get_buyer_details/{id}','SalesController@get_buyer_details');
	post('/generate_bill','SalesController@generate_bill');
	get('/delete-sales/{id}','SalesController@delete_sales');


	post('/post_purchase','PurchaseController@post_purchase');	
	get('delete-purchase/{id}','PurchaseController@del_purchase');
	post('/generate_invoice','PurchaseController@generate_bill');

	get('/supplier','setupController@supplier');
	post('/post_supplier','setupController@post_supplier');
	post('/update_supplier','setupController@update_supplier');


	get('/buyer','setupController@buyer');
	post('/post_buyer','setupController@post_buyer');
	post('/update_buyer','setupController@update_buyer');

	get('/add-attention/{id}','setupController@add_attention');
	post('/post_attention','setupController@post_attention');
	post('/post_product','setupController@post_product');
	get('/delete-product/{id}','setupController@product_del');
	post('/update_product','setupController@update_product');


	get('/product','setupController@product');
	post('/post_product','setupController@post_product');
	get('/delete-product/{id}','setupController@product_del');
	post('/update_product','setupController@update_product');


	get('/branch','setupController@branch');
	post('/post_branch','setupController@post_branch');
	get('/delete-branch/{id}','setupController@branch_del');
	post('/update_branch','setupController@update_branch');
	


	get('/zone','setupController@zone');
	post('/post_Zone','setupController@post_Zone');
	get('/delete-zone/{id}','setupController@zone_del');

	get('/brand','setupController@brand');
	post('/post_brand','setupController@post_brand');
	get('/delete-brand/{id}','setupController@brand_del');

	get('/model','setupController@category');
	post('/post_category','setupController@postcategory');
	get('/delete-category/{id}','setupController@category_del');

	get('/group','setupController@group');
	post('/post_product_group','setupController@post_product_group');
	get('/delete-group/{id}','setupController@group_del');

	get('/print_barcode','setupController@print_barcode');
	post('/post_print_barcode','setupController@post_print_barcode');



	/* =====================================*/
	/* ============== END ERP ==============*/
	/* =====================================*/
	get('expirelist','ExpireListController@index');
	get('/logout', 'Auth\AuthController@getLogout');

	
	get('/payments', 'PaymentController@index');	


	resource('language', 'LanguageController'); 
	get('setLanguage/{locale}','LanguageController@setLanguage');
	post('language/addWords',array('as'=>'language.addWords','uses'=>'LanguageController@addWords'));
	patch('language/updateTranslation/{id}', ['as' => 'language.updateTranslation','uses' => 'LanguageController@updateTranslation']);
	
	Route::model('department','\App\Department');
	resource('department', 'DepartmentController'); 
	//by Dev@4489
	Route::model('location','\App\Location');
	resource('location', 'LocationController');
	////
	
	Route::model('designation','\App\Designation');
	resource('designation', 'DesignationController'); 



	//Training Module   //
	get('training/add', 'TrainingController@add_training');	
	get('training/manage', 'TrainingController@add_new');	
	get('training/report', 'TrainingController@report');	
	
	resource('manage_training', 'Manage_TrainingController');

	get('training_type/{id}/edit','TrainingController@edit');
	resource('training', 'TrainingController');
	// end Training Module   //




	get('employee/create', 'Auth\AuthController@getRegister');
	post('auth/register', 'Auth\AuthController@postRegister');
	Route::model('employee','\App\User');
	Route::resource('employee', 'EmployeeController',['except' => ['create', 'store']]);
	patch('users/profile/{id}', ['as' => 'employee.profileUpdate', 'uses' => 'EmployeeController@profileUpdate']);
	patch('users/sms/{id}', ['as' => 'employee.sendEmployeeSMS', 'uses' => 'SMSController@sendEmployeeSMS']);

	Route::model('bank_account','\App\BankAccount');
	resource('bank_account', 'BankAccountController',['only' => ['store', 'destroy']]); 
	Route::model('document','\App\Document');
	resource('document', 'DocumentController',['only' => ['store', 'destroy']]); 
	//by Dev@4489
	Route::model('dependent','\App\Dependent');
	//resource('dependent', 'DependentController'); 
	resource('dependent', 'DependentController',['only' => ['store','edit','add','destroy']]); 
	get('/dependent/add/{eid}','DependentController@add');
	patch('/dependent',array('as'=>'dependent','uses' =>'DependentController@store'));
	////
	Route::model('salary','\App\Salary');
	resource('salary', 'SalaryController',['only' => ['store', 'destroy']]); 
	get('/employee/welcomeEmail/{user_id}/{token}','TemplateController@welcomeEmail');	
	
	Route::model('job','\App\Job');
	resource('job', 'JobController'); 

	Route::model('expense','\App\Expense');
	resource('expense', 'ExpenseController'); 

	Route::model('todo','\App\Todo');
	resource('todo', 'TodoController'); 

	Route::model('leave','\App\Leave');
	resource('leave', 'LeaveController'); 
	post('leaveUpdateStatus', ['as' => 'leave.updateStatus', 'uses' => 'LeaveController@updateStatus']);
	
	Route::model('holiday','\App\Holiday');
	resource('holiday', 'HolidayController');
	//by Dev@4489
	Route::model('employeeasset','\App\EmployeeAsset');
	resource('employeeasset', 'EmployeeAssetController'); 
	////

	get('clock/in/{token}', array('as' => 'clock.in', 'uses' => 'ClockController@in'));
	get('clock/out/{token}', array('as' => 'clock.out', 'uses' => 'ClockController@out'));
	Route::any('attendance', array('as'=>'clock.attendance','uses'=>'ClockController@attendance'));
	get('attendance_monthly', 'ClockController@attendanceMonthly');
	post('attendance_monthly', array('as'=>'clock.attendanceMonthlyReport','uses'=>'ClockController@attendanceMonthlyReport'));
	post('uploadAttendance',array('as' => 'clock.uploadAttendance','uses' => 'ClockController@uploadAttendance'));
	get('update_attendance','ClockController@updateAttendance');
	post('updateAttendance',array('as' => 'clock.updateAttendance','uses' => 'ClockController@updateStaffAttendance'));
	
	post('/payroll/store',array('as' => 'payroll.store','uses' => 'PayrollController@store'));
	get('/payroll/generate/{action}/{payroll_slip_id}','PayrollController@generate');
	get('/payroll','PayrollController@index',['only' => ['create', 'store','index']]); 
	Route::any('/payroll/create',array('as' => 'payroll.create','uses' => 'PayrollController@create'));
	get('/my_payroll','PayrollController@myPayroll');
	post('/my_payroll',array('as' => 'payroll.myPayroll','uses' => 'PayrollController@myPayroll'));
	get('/all_contribution','PayrollController@allContribution');
	post('/all_contribution',array('as' => 'payroll.allContribution','uses' => 'PayrollController@allContribution'));
		
	Route::model('ticket','\App\Ticket');
	resource('ticket', 'TicketController'); 
	post('updateTicketStatus', ['as' => 'ticket.updateTicketStatus', 'uses' => 'TicketController@updateTicketStatus']);
	Route::model('ticket_comment','\App\TicketComment');
	resource('ticket_comment', 'TicketCommentController',['only' => ['store','destroy']]); 
	resource('ticket_note', 'TicketNoteController',['only' => ['store','update']]); 
	Route::model('ticket_attachment','\App\TicketAttachment');
	resource('ticket_attachment', 'TicketAttachmentController',['only' => ['store','destroy']]); 
	
	Route::model('task','\App\Task');
	resource('task', 'TaskController'); 
	post('updateTaskProgress', ['as' => 'task.updateTaskProgress', 'uses' => 'TaskController@updateTaskProgress']);
	Route::model('comment','\App\Comment');
	resource('comment', 'CommentController',['only' => ['store','destroy']]); 
	resource('note', 'NoteController',['only' => ['store','update']]); 
	Route::model('attachment','\App\Attachment');
	resource('attachment', 'AttachmentController',['only' => ['store','destroy']]); 
	
	get('message/compose', 'MessageController@compose'); 
	post('message', ['as' => 'message.store', 'uses' => 'MessageController@store']);
	get('message/sent','MessageController@sent'); 
	get('message','MessageController@inbox'); 
	get('message/view/{id}/{token}', array('as' => 'message.view', 'uses' => 'MessageController@view'));
	get('message/{id}/delete/{token}', array('as' => 'message.delete', 'uses' => 'MessageController@delete'));
	
	Route::model('award','\App\Award');
	resource('award', 'AwardController'); 
	
	get('/application/{id}','JobController@applicationDetail');
	delete('deleteApplication/{id}',array('uses' => 'JobController@deleteApplication', 'as' => 'application.deleteApplication'));
	patch('/updateApplicationStatus/{id}', ['as' => 'application.updateApplicationStatus','uses' => 'JobController@updateApplicationStatus']);

	
	Route::model('role','\App\Role');
	resource('role', 'RoleController'); 
	post('save-permission',array('as' => 'configuration.save_permission','uses' => 'ConfigController@savePermission'));

	get('configuration', 'ConfigController@index');
	post('/configuration/leave','ConfigController@leave_details');
	post('/configuration/time','ConfigController@time_details');

	post('configuration', array('as' => 'configuration.store','uses' => 'ConfigController@store')); 
	post('office-time', array('as' => 'configuration.time','uses' => 'ConfigController@officeTime')); 
	post('sms-store', array('as' => 'configuration.smsStore','uses' => 'ConfigController@smsStore')); 
	post('mail-store', array('as' => 'configuration.mailStore','uses' => 'ConfigController@mailStore')); 
	post('job-store', array('as' => 'configuration.jobStore','uses' => 'ConfigController@jobStore')); 
	
	Route::model('award_type','\App\AwardType');
	resource('award_type', 'AwardTypeController'); 

	Route::model('custom_field','\App\CustomField');
	resource('custom_field', 'CustomFieldController'); 
	
	Route::model('leave_type','\App\LeaveType');
	resource('leave_type', 'LeaveTypeController'); 
	
	Route::model('document_type','\App\DocumentType');
	resource('document_type', 'DocumentTypeController'); 
	//by Dev@4489
	Route::model('asset','\App\Asset');
	resource('asset', 'AssetController'); 
	Route::model('alias','\App\Alias');
	resource('alias', 'AliasController'); 
	////
	
	Route::model('salary_type','\App\SalaryType');
	resource('salary_type', 'SalaryTypeController'); 
	
	Route::model('expense_head','\App\ExpenseHead');
	resource('expense_head', 'ExpenseHeadController'); 
	
	resource('template', 'TemplateController',['only' => ['index', 'update']]); 
	resource('sms_template', 'SMSTemplateController',['only' => ['index', 'update']]); 

	Route::model('notice','\App\Notice');
	resource('notice', 'NoticeController'); 

	get('sms', 'SMSController@index'); 
	get('sms/{type}', 'SMSController@index'); 
	post('sms', array('as'=>'sms.store','uses'=>'SMSController@store')); 

	get('/change_password', 'EmployeeController@changePassword');
	post('/change_password',array('as'=>'change_password','uses' =>'EmployeeController@doChangePassword'));
	patch('/change_employee_password/{id}',array('as'=>'change_employee_password','uses' =>'EmployeeController@doChangeEmployeePassword'));
});
