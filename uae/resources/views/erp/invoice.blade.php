<html>
<head>
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
<table>
                        <tr style="width:100%;">
                        
                            <td  ><center>
                                
                                <span style="font-size:25px;font-weight:bold;">Digital Technology Care<br></span>
                                Address : Adamjee Annex building(Ground Floor)
115-116, Motijheel Commercial AREA DHAKA-1000, Mobile:01700666999,01611631844<br>
Phone:9570549 FAX:02-47117840 E-mail: dtc_offer@yahoo.com   Web:www.copierbd.com<br>
</center>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                <center><span style="font-size:20px;font-weight:bold;">Invoice</span></center>
                                
                            </td>
                        </tr>

                        
                    </table>

<htmlpageheader name="myheader">
<table width="100%"><tr>

</tr></table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

<table border="1" style="margin-bottom:10px;border-collapse: collapse;" cellpadding="7">
                        <tr>
                            <td  style="width:250px;padding:5px;border: 0.1mm solid #888888;">
                                        <strong>Invoice NO: </strong>{{$invo_detail->sup_invoice_no}}<br>
                                        <strong>Date:    </strong>{{$invo_detail->created_at}}

                            </td>
                            <td  align="left" style="width:250px;text-align:left;border: 0.1mm solid #888888;">
                                 <strong>Sold By: </strong>{{strtoupper($invo_detail->entry_username)}}<br>
                                        <strong>Branch Name:    </strong>{{strtoupper($invo_detail->branch_name)}}

                            </td>
                            <td style="width:255px;text-align:left;border: 0.1mm solid #888888;">
                                <strong>Supplier Name: </strong>{{$invo_detail->SupSupplierName}}<br>
                                <strong>Supplier Address:    </strong>{{$invo_detail->SupAddress}}      

                            </td>
                        </tr>

                    </table>

<table class="items" width="100%"  style=" min-height:700px;display: table-cell; font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="15%">Sl. No.</td>
<td width="45%">Description</td>
<td width="10%">Quantity</td>
<td width="15%">Unit Price</td>
<td width="15%">Amount</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<?php $sl=0;$total_amount=0;$qty = 0; $total_rows=30;$current_row=0;?>
                            
@foreach($sales as $sales)
<tr>
<td align="center"> <?php echo $sl=$sl+1; ?></td>
<td align="center">{{$sales->PdtDescription}}</td>
<td align="center">{{$sales->quantity}}</td>
<td class="cost">{{number_format($sales->cost_price,2)}}</td>
<td class="cost">{{number_format($sales->cost_price * $sales->quantity,2)}} </td>
 <?php $total_amount = $total_amount+$sales->cost_price * $sales->quantity; 
                                    $qty = $qty+$sales->quantity;$current_row = $current_row+1;?>
</tr>
@endforeach
<!--   EMPTY ROW    -->
<?php
if($current_row < $total_rows){
    for($i=$current_row; $i<$total_rows; $i++){
       echo '<tr>
       <td align="center"> </td>
<td align="center"></td>
<td align="center"></td>
<td class="cost"></td>
<td class="cost"> </td>

       </tr>';
    }
}
?>
<!--  END EMPTY ROW    -->
<tr>
<td class="blanktotal" colspan="1" rowspan="6"></td>
<td class="totals">Total:</td>
<td class="totals cost">{{$qty}}</td>
<td class="totals">&nbsp;</td>
<td class="totals cost">{{number_format($total_amount,2)}}/=</td>
</tr>

<!-- END ITEMS HERE -->

</tbody>
</table>
<table   style="border-collapse: collapse;" >
                        <tr style="text-align:right;" ><br>
                            <td style="width:400px;"></td>
                            <td class="pull-right"   style="text-align: right;padding:5px;margin-left:500px;" width="300px;">
                                        <strong>Total Amount:    </strong><br>
                                        <strong>less:    </strong><br>
                                        <strong>Vat:    </strong><br>
                                        <strong>Net Amount:    </strong><br>
                                        <strong>Paid Amount:    </strong><br>
                                        
                            </td>
                           <td class="pull-left"   style="text-align: right;padding:5px;">
                                        <strong> </strong>{{number_format($invo_detail->total_amount,2)}}<br>
                                        <strong>   </strong>{{number_format($invo_detail->less,2)}}<br>
                                        <strong>   </strong>{{number_format($invo_detail->vat,2)}}<br>
                                         <strong>   </strong>{{number_format($invo_detail->net_amout,2)}}<br>
                                      <strong>   </strong>{{number_format($invo_detail->paid_amount,2)}}<br>
                            </td>

                           
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td> As per Law, If you need  to deduct Tax and Vat please deposit the amount with Bangladesh BankiSonali Bank within 7 (Seven)Da-vs of  and send  us the originat/copy of treasury challan along with certificate within i5(fifteen) days of deposit. </td>
                        </tr>
                        <hr>
                    </table>
                    <table border="0" style="border-collapse: collapse;">
                                    <tr style="width:100%;">
                                        <td  style="width:350px;">


                                        <br><br><br><br>
                                        <hr>
                                                    <strong>Received with Good Condition By    </strong>

                                        </td>
                                        <td  style="width:250px;">&nbsp;</td>
                                        <td  style="text-align:right;width:310px;">
                                            For<strong> DIGITAL TECHNOLOGY CARE </strong><br><br><br><br>
                                                     <hr>
                                                    <strong>Authorized Signature and Company Stamp    </strong>

                                        </td>
                                    </tr>

                    </table>                    
</body>
</html>