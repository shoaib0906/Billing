<?php
namespace App;
use Eloquent;

class Purchase extends Eloquent {

	protected $fillable = [
							'sup_invoice_no',
							'supplier_id',
							'product_code',
							'cost_price',
							'purchase_date',
							'remarks',
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
	protected $table = 'purchase';

	
}
