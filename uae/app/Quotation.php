<?php
namespace App;
use Eloquent;

class Quotation extends Eloquent {

	protected $fillable = [
							'product_name',
							
							'order_no',	
							'bill_no',						
							'product_code',
							'PdtDescription',
							'sales_price',
							'sales_date',							
							'quantity',
							'entry_user_id',
							'entry_username',
							'branch_name',	
							'branch_id',
							'status',						
							'created_at',
							'updated_at',
						];
	protected $primaryKey = 'id';
	protected $table = 'quotation';

	
}
