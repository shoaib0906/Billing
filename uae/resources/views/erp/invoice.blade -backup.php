<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">
    <style>
    .invoice-box {
        max-width: 700px;
        margin: auto;
        padding: 10px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 10px;
        line-height: 24px;
        font-family: 'Tahoma', Geneva, sans-serif;
        color: #555;
    }
    table tr{height:1px;}
table tr:last-child{height:auto;}
table td{vertical-align:top;}
    .invoice-box table {
        width: 100%;
        line-height: initial;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 2px;
        vertical-align: top;
    }
    

    
    .invoice-box table tr.top table td {
        padding-bottom: 1px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 2px;        
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    .tbody tr td{
    	height: 20px!important;
    	padding: 0px;
    }
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    br
		{   
		    margin: 2px !important;
		    padding: 2px!important;
		}
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;

        }
    }
    .invoice-box table tr.top table td.title {
    font-size: 9px;
    line-height: 20px;
    color: #333;
}
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    
    tr td span 
		{
		    display: initial;
		    font-size: 9px;
		}
		.address span{
			display: initial;
		    font-size: 9px;
		}
		.number{
			text-align: right;
		}
		.date{
			text-align: center;
		}
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td colspan="12">
                    <table>
                        <tr>
                        
                            <td class="address" colspan="12"><center>
                                
                                <span style="font-size:25px;font-weight:bold;">Digital Technology Care<br></span>
                                Address : Adamjee Annex building(Ground Floor)
115-116, Motijheel Commercial AREA DHAKA-1000, Mobile:01700666999,01611631844<br>
Phone:9570549 FAX:02-47117840 E-mail: dtc_offer@yahoo.com   Web:www.copierbd.com<br>
</center>
                            </td>
                            
                        </tr>
                        <tr>
                            <td colspan="12">
                                <center><span style="font-size:15px;font-weight:bold;">Invoice</span></center>
                            </td>
                        </tr>

                        
                    </table>
                    <table border="1" style="border-collapse: collapse;">
                    	<tr>
                            <td colspan="3" style="padding:5px;">
                                		<strong>Invoice NO: </strong>{{$invo_detail->sup_invoice_no}}<br>
                                		<strong>Date:    </strong>{{$invo_detail->created_at}}

                            </td>
                            <td colspan="3" align="left" style="text-align:left;">
                                <strong>Sold By: </strong>{{strtoupper($invo_detail->entry_username)}}<br>
                                		<strong>Branch Name:    </strong>{{strtoupper($invo_detail->branch_name)}}

                            </td>
                            <td colspan="4">
                                <strong>Supplier Name: </strong>{{$invo_detail->SupSupplierName}}<br>
                                <strong>Supplier Address:    </strong>{{$invo_detail->SupAddress}}                                		

                            </td>
                        </tr>

                    </table>
                    
                    <table  style="border-collapse: collapse;min-height:470px;" border="1">
                    	<thead>
                    	<tr >
			                <td class="date">
			                   <strong> SL No.</strong>
			                </td>
			                <td class="text_left">
			                    <strong>Product Description</strong>
			                </td>
			                <td class="date">
			                    <strong>Quantity</strong>
			                </td>
			                <td class="date">
			                    <strong>Unit Price</strong>
			                </td>
			                <td class="number">
			                    <strong>Sub Total</strong>
			                </td>
			                
			            </tr>
			            </thead>
			            <tbody>


 
                
                    
                        <?php $sl=0;$total_amount=0;$qty = 0; ?>
                            
                             @foreach($sales as $sales)
			            <tr style="border-bottom:0px;border-top:0px;">
			                <td class="date" >
			                   <?php echo $sl=$sl+1; ?>
			                </td>
			                <td class="text_left" >
			                   {{$sales->PdtDescription}}
			                </td>
			                <td class="date">
			                    <strong>{{$sales->quantity}}</strong>
			                </td>
			                <td class="date">
			                    <strong>{{$sales->cost_price}}</strong>
			                </td>
			                <td class="number">
			                    </strong>{{$sales->cost_price * $sales->quantity}} 
                                </strong>
			                </td>
			                <?php $total_amount = $total_amount+$sales->cost_price * $sales->quantity; 
                                    $qty = $qty+$sales->quantity;
                            ?>
			            </tr>
                        @endforeach
			            </tbody>
			            
			           	<tr bgcolor="" style="font-weight:bold;">
			           	<br>
			           		<td colspan="2" class="number">** Total **</td>
			           		<td  class="number">{{$qty}}</td>
			           		<td  colspan="2" class="number">{{number_format($total_amount,2)}}/=</td>   
                            
			           	</tr>
                      
                    </table>
                    <table width="30%"  style="border-collapse: collapse;" >
                    	<tr class="" style="width:25%"><br>
                            <td class="pull-right" colspan="1"  style="text-align: right;padding:5px;">
                                		<strong>Total Amount:    </strong><br>
                                		<strong>less:    </strong><br>
                                        <strong>Vat:    </strong><br>
                                		<strong>Net Amount:    </strong><br>
                                        <strong>Paid Amount:    </strong><br>
                                		
                            </td>
                           <td class="pull-right" colspan="2"  style="text-align: right;padding:5px;">
                                        <strong> </strong>{{number_format($invo_detail->total_amount,2)}}<br>
                                        <strong>   </strong>{{number_format($invo_detail->less,2)}}<br>
                                        <strong>   </strong>{{number_format($invo_detail->vat,2)}}<br>
                                         <strong>   </strong>{{number_format($invo_detail->net_amout,2)}}<br>
                                      <strong>   </strong>{{number_format($invo_detail->paid_amount,2)}}<br>


                            </td>

                           
                        </tr>
                        <tr>
                        	<td> As per Law, If you need  to deduct Tax and Vat please deposit the amount with Bangladesh Bank,Sonali Bank within 7 (Seven)Da-vs of  and send  us the originat/copy of treasury challan along with certificate within i5(fifteen) days of deposit. </td>
                        </tr>
                        <tr>
                        	<td>
                        		<table border="0" style="border-collapse: collapse;">
                    	<tr>
                            <td colspan="3" style="padding:5px;">


                            <br><br><br><br>
                            <hr>
                                		<strong>Received with Good Condition By    </strong>

                            </td>
                            <td colspan="3" align="left" >
                               

                            </td>
                            <td colspan="4" style="text-align:right;">
                                For<strong> DIGITAL TECHNOLOGY CARE </strong><br><br><br><br>

                                		 <hr>
                                		<strong>Authorized Signature and Company Stamp    </strong>

                            </td>
                        </tr>

                    </table>

                        	</td>
                        </tr>
                    </table>

                </td>
            </tr>                                 
            <tr>
           		           		
           	</tr>           	
        </table>
    </div>

</body>


</html>
