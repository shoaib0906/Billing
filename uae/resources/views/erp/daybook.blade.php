<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Day Book</title>
    
    <style>
    body {font-family: Tohoma;
    font-size: 10pt;
}
p { margin: 0pt; }
table.items {
    border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.1mm solid #000000;
    font-variant: small-caps;
}
.items td.blanktotal {
    background-color: #EEEEEE;
    border: 0.1mm solid #000000;
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}
.items td.cost {
    text-align: "." center;
}
    </style>
</head>

<body>
<htmlpageheader name="myheader">
<table width="100%"><tr>

</tr></table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
<div align="left">Page {PAGENO} of {nb} </div><div align="right">Developed by Shoaib Ahmed</div>


</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td colspan="12">
                    <table>
                        <tr>
                        
                            <td class="address" colspan="12"><center>
                                
                                <span style="font-size:20px;font-weight:bold;">Digital Technology Care<br></span>
                                Address : Adamjee Annex building(Ground Floor)
115-116, Motijheel Commercial AREA DHAKA-1000, Mobile:01700666999,01611631844<br>
Phone:9570549 FAX:02-47117840 E-mail: dtc_offer@yahoo.com   Web:www.copierbd.com<br>
</center><hr>
                            </td>
                            
                        </tr>
                        <tr>
                            <td colspan="12">
                                <center><span style="font-size:15px;font-weight:bold;">Day Book</span><br>Branch: Motijheel</center>
                            </td>
                        </tr>

                        
                    </table>
                    <strong>Sales Report as on : {{date('d-M-Y',strtotime($day_date))}}</strong>
                    <table  class="items" width="100%"  style=" min-height:700px;display: table-cell; font-size: 9pt; border-collapse: collapse; " cellpadding="4">
                    	<thead>
                    	<tr >
			                <td class="date">
			                   <strong> Date</strong>
			                </td>
			                <td class="date">
			                    <strong>Invoice No.</strong>
			                </td>
			                <td class="date">
			                    <strong>Customer Name</strong>
			                </td>
			                <td class="date">
			                    <strong>Sales Person</strong>
			                </td>
			                <td class="cost">
			                    </strong>Net </strong>
			                </td>
                            <td class="cost">
                                </strong>Paid </strong>
                            </td>
                           
                            <td class="cost">
                                </strong>Outstanding</strong>
                            </td>
			                
			            </tr>
			            </thead>
			            <tbody>
                        @if(!empty($sales))
                        <?php $ttl_amt=0;$col_amt=0;$out_amt=0; ?>
                        @foreach($sales as $sales)
			            <tr style="border-bottom:0px;border-top:0px;">
                        
			                <td class="date" >
			                   {{date('d-M-Y',strtotime($sales->created_at))}}
			                </td>
			                <td class="date" >
			                  {{$sales->order_no}}
			                </td>
			                <td class="date">
			                    <strong>{{strtoupper($sales->bill_to)}}</strong>
			                </td>
                            <td class="date">
                                {{strtoupper($sales->entry_username)}}
                            </td>
			                <td class="cost">
			                   {{number_format($sales->net_amout,2)}}
                                <?php $ttl_amt=$ttl_amt+$sales->net_amout; ?>
			                </td>
                            <td class="cost">
                                {{number_format($sales->paid_amount,2)}}
                                <?php $col_amt=$col_amt+$sales->paid_amount; ?>
                            </td>
                            <td class="cost">
                                {{number_format($sales->net_amout - $sales->paid_amount,2)}}
                                <?php $out_amt=$out_amt+($sales->net_amout - $sales->paid_amount); ?>
                            </td>
			               
			             
			            </tr>
			           @endforeach
                       <tr bgcolor="" style="font-weight:bold;">
                        <br>
                            <td colspan="4" class="totals">** Total **</td>
                            
                            <td  class="totals">{{number_format($ttl_amt,2)}}</td>
                            <td  class="totals">{{number_format($col_amt,2)}}</td>
                            <td  colspan="2" class="totals">{{number_format($out_amt,2)}}</td>   

                        </tr>
                       @else
                            <tr bgcolor="" style="font-weight:bold;">
                        
                            <td colspan="7" class="cost">No Sales Found</td>
                           
                        </tr>
                       @endif
			           
			            </tbody>
			            
			           	
			         <br>
			           	
                    </table>
                    <br>
                    <strong>Collection Report as on :  {{date('d-M-Y',strtotime($day_date))}}</strong>
                    <br>
                    <table  class="items" width="100%"  style=" min-height:700px;display: table-cell; font-size: 9pt; border-collapse: collapse; " cellpadding="4">
                        <thead>
                        <tr >
                            
                            <td class="date">
                                <strong>Invoice No.</strong>
                            </td>
                            <td class="date">
                                <strong>Collection ID</strong>
                            </td>
                            <td class="date">
                                <strong>Customer Name</strong>
                            </td>
                            <td class="cost">
                                </strong>Collected By</strong>
                            </td>
                            
                            <td class="cost">
                                </strong>Collected</strong>
                            </td>
                            <td class="cost">
                                </strong>Paid</strong>
                            </td>
                            <td class="cost">
                                </strong>Outstanding</strong>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($collection))
                         <?php $ttl_amt=0;$col_amt=0;$out_amt=0; ?>
                        @foreach($collection as $collection12)
                        <tr style="border-bottom:0px;border-top:0px;">
                           
                            <td class="date" >
                               {{$collection12->order_no}}
                            </td>
                            <td class="date">
                                <strong>{{$collection12->collection_no}}</strong>
                            </td>
                            <td class="date">
                                <strong>{{$collection12->bill_to}}</strong>
                            </td>
                            <td class="cost">
                                <strong>{{$collection12->entry_username}}</strong>
                            </td>
                            
                            <td class="cost">
                                {{number_format($collection12->collected_amount,2)}}
                                 <?php $ttl_amt=$ttl_amt+$collection12->collected_amount; ?>
                            </td>
                            <td class="cost">
                                {{number_format($collection12->collected_amout+$collection12->paid_amount,2)}}
                                 <?php $col_amt=$col_amt+($collection12->collected_amout+$collection12->paid_amount); ?>
                            </td>
                            <td class="cost">
                               {{number_format(($collection12->net_amout-($collection12->collected_amout+$collection12->paid_amount)),2)}}
                                 <?php $out_amt=$out_amt+($collection12->net_amout-($collection12->collected_amout+$collection12->paid_amount)); ?>
                            </td>
                            
                        </tr>
                        @endforeach
                        
                        </tbody>
                        
                        <tr bgcolor="" style="font-weight:bold;">
                        <br>
                            <td colspan="4" class="totals">** Total **</td>
                           
                            <td  class="totals">{{number_format($ttl_amt,2)}}</td>
                            <td  colspan="1" class="totals">{{number_format($col_amt,2)}}</td>   
                            <td  colspan="1" class="totals">{{number_format($out_amt,2)}}</td>   
                        </tr>
                        @else
                        <tr bgcolor="" style="font-weight:bold;">
                            
                            <td colspan="6" class="cost">No Collection Found</td>
                             
                        </tr>
                        @endif
                        
                    </table>
                    <br>


                    <strong>Purchase Report as on : {{date('d-M-Y',strtotime($day_date))}}</strong>
                    <br>
                    <table class="items" width="100%"  style=" min-height:700px;display: table-cell; font-size: 9pt; border-collapse: collapse; " cellpadding="4">
                        <thead>
                        <tr >
                            <td class="date">
                               <strong> Date</strong>
                            </td>
                            <td class="date">
                                <strong>Bill No.</strong>
                            </td>
                            <td class="date">
                                <strong>Supplier Name</strong>
                            </td>
                            <td class="date">
                                <strong>Purchase By</strong>
                            </td>
                            <td class="cost">
                                </strong>Net Amount</strong>
                            </td>
                            <td class="cost">
                                </strong>Paid</strong>
                            </td>
                            
                            <td class="cost">
                                </strong>Outstanding </strong>
                            </td>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($purchase))  
                        <?php $ttl_amt=0;$col_amt=0;$out_amt=0; ?>
                        @foreach($purchase as $purchase)
                        <tr style="border-bottom:0px;border-top:0px;">
                            <td class="date" >
                               {{date('d-M-Y',strtotime($purchase->created_at))}}
                            </td>
                            <td class="date" >
                               {{$purchase->sup_invoice_no}}
                            </td>
                            <td class="date">
                                <strong>{{strtoupper($purchase->SupSupplierName)}}</strong>
                            </td>
                            <td class="date">
                                <strong>{{strtoupper($purchase->entry_username)}}</strong>
                            </td>
                            <td class="cost">
                                {{number_format($purchase->net_amout,2)}}
                                <?php $ttl_amt=$ttl_amt+$purchase->net_amout ;?>
                            </td>
                            <td class="cost">
                           {{number_format($purchase->paid_amount,2)}}
                                <?php $col_amt=$col_amt+$purchase->paid_amount ;?>
                                
                            </td>
                           
                            <td class="cost">
                                {{number_format($purchase->net_amout - $purchase->paid_amount,2)}}
                                <?php $out_amt=$out_amt+($purchase->net_amout - $purchase->paid_amount);?>
                            </td>
                            
                        </tr>
                        @endforeach
                        <tr bgcolor="" style="font-weight:bold;">
                        <br>
                            <td colspan="4" class="totals">** Total **</td>
                            
                            <td  class="totals">{{number_format($ttl_amt,2)}}</td>
                            <td  class="totals">{{number_format($col_amt,2)}}</td>
                            <td  colspan="2" class="totals">{{number_format($out_amt,2)}}</td>   

                        </tr>
                        @else 
                        <tr bgcolor="" style="font-weight:bold;">
                            <br>
                            <td colspan="7" class="cost">No Purchase Found</td>
                             
                        </tr>

                        @endif
                        </tbody>
                        
                    </table>
                    <br>
                    <strong>Payment Report as on :  {{date('d-M-Y',strtotime($day_date))}}</strong>
                    <br>
                    <table  class="items" width="100%"  style=" min-height:700px;display: table-cell; font-size: 9pt; border-collapse: collapse; " cellpadding="4">
                        <thead>

                        <tr >
                            <td class="date">
                               <strong> Date</strong>
                            </td>
                            <td class="date">
                                <strong>Invoice No.</strong>
                            </td>
                            <td class="date">
                                <strong>Payment ID No</strong>
                            </td>
                            <td class="date">
                                <strong>Supplier Name</strong>
                            </td>
                            <td class="cost">
                                </strong>Payment By</strong>
                            </td>
                            
                            <td class="cost">
                                </strong>Payment Made</strong>
                            </td>
                            <td class="cost">
                                </strong>Total Payment</strong>
                            </td>
                            <td class="cost">
                                </strong>Outstanding</strong>
                            </td>                            
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($payment))
                        <?php $ttl_amt=0;$col_amt=0;$out_amt=0; ?>
                        @foreach($payment as $payment)
                        <tr style="border-bottom:0px;border-top:0px;">
                            <td class="date" >
                               {{$payment->date}}
                            </td>
                            <td class="date" >
                               {{$payment->sup_invoice_no}}
                            </td>
                            <td class="date">
                                <strong>{{$payment->payment_no}}</strong>
                            </td>
                            <td class="date">
                                <strong>{{$payment->SupSupplierName}}</strong>
                            </td>
                            <td class="cost">
                                <strong>{{$payment->entry_username}}</strong>
                            </td>
                           
                            <td class="cost">
                                {{number_format($payment->payment_amount,2)}}
                                <?php $ttl_amt=$ttl_amt+$payment->payment_amount ;?>
                            </td>
                            <td class="cost">
                                {{number_format($payment->paid_amount+$payment->payment_made,2)}}
                                <?php $col_amt=$col_amt+($payment->paid_amount+$payment->payment_made) ;?>
                            </td>
                            <td class="cost">
                               {{number_format($payment->net_amout -($payment->paid_amount+$payment->payment_made),2)}}
                                <?php $out_amt=$out_amt+($payment->net_amout -($payment->paid_amount+$payment->payment_made)) ;?>
                            </td>                            
                        </tr>
                        @endforeach
                        <tr bgcolor="" style="font-weight:bold;">
                        <br>
                            <td colspan="5" class="totals">** Total **</td>
                            
                            <td  class="totals">{{number_format($ttl_amt,2)}}</td>
                            <td  colspan="1" class="totals">{{number_format($col_amt,2)}}</td>   
                            <td  colspan="1" class="totals">{{number_format($out_amt,2)}}</td>   

                        </tr>
                        @else
                        
                        <tr bgcolor="" style="font-weight:bold;">
                            <br>
                            <td colspan="8" class="cost">No Payment Found</td>
                             
                        </tr>
                        @endif
                        </tbody>
                        
                        
                        
                        
                    </table>
                </td>
            </tr>                                 
            <tr>
           		           		
           	</tr>           	
        </table>
    </div>
</body>
</html>