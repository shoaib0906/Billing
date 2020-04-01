<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">
    <style>
    .invoice-box {
        max-width: 800px;
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
                                <center><span style="font-size:15px;font-weight:bold;">Bill</span></center>
                            </td>
                        </tr>

                        
                    </table>
                    <table border="1" style="border-collapse: collapse;">
                    	<tr>
                            <td colspan="3" style="padding:5px;">
                                		<strong>Bill NO: </strong>{{$sales_master->order_no}}<br>
                                		<strong>Date:    </strong>{{date('d-M-Y',strtotime($sales_master->created_at))}}

                            </td>
                            <td colspan="3" align="left" style="text-align:left;">
                                <strong>Sold By: </strong>{{$sales_master->entry_username}}<br>
                                		<strong>Promise Date:    </strong>{{date('d-M-Y',strtotime($sales_master->created_at))}}

                            </td>
                            <td colspan="4">
                                <strong>Branch Name : </strong>{{$sales_master->branch_name}}<br>
                                		

                            </td>
                        </tr>

                    </table>
                    <table border="1" style="border-collapse: ;">
                    	<tr><br>
                            <td colspan="6" style="padding:5px;">
                                		<table>
                                			<tr>
                                				<td colspan="2">Bill To <br>
                                				Address<br>
                                				
                                				Mobile<br>
                                				Email<br>
                                				Attention<br>
                                				Designation
                                				</td>
                                				<td style="text-align:left" colspan="4">
                                					{{strtoupper($sales_master->bill_to)}} <br>
                                				{{$sales_master->billing_address}}<br>
                                				
                                				{{$sales_master->BuyBusinessMobile}}<br>
                                				{{$sales_master->BuyEmail}}<br>
                                				{{$sales_master->BuyContactPerson}}<br>
                                                {{$sales_master->BuyDesignation}}
                                				</td>
                                			</tr>
                                		</table>

                            </td>
                            <td colspan="6" align="left" style="text-align:left;">
	                               <table>
                                			<tr>
                                				<td colspan="2">Ship To <br>
                                				Address<br>
                                				
                                				Mobile<br>
                                				Email<br>
                                				Attention<br>
                                				Designation
                                				</td>
                                				<td style="text-align:left" colspan="4">
                                					{{strtoupper($sales_master->ship_to)}} <br>
                                                {{$sales_master->shipping_address}}<br>
                                				
                                				Mobile<br>
                                				Email<br>
                                				{{$sales_master->name2}}<br>
                                				{{$sales_master->designation2}}
                                				</td>
                                			</tr>
                                		</table>

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
			                    </strong>Sub Total</strong>
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
			                    <strong>{{$sales->sales_price}}</strong>
			                </td>
			                <td class="number">
			                    </strong>{{$sales->sales_price * $sales->quantity}} 
                                </strong>
			                </td>
			                 <?php $total_amount = $total_amount+$sales->sales_price * $sales->quantity; 
                                    $qty = $qty+$sales->quantity;?>
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
                    	<tr class="" ><br>
                            <td class="pull-right" colspan="4"  style="text-align: right;padding:5px;" width="300px;">
                                        <strong>Total Amount:    </strong><br>
                                        <strong>less:    </strong><br>
                                        <strong>Vat:    </strong><br>
                                        <strong>Net Amount:    </strong><br>
                                        <strong>Paid Amount:    </strong><br>
                                        
                            </td>
                           <td class="pull-left" colspan="1"  style="text-align: right;padding:5px;">
                                        <strong> </strong>{{number_format($sales_master->total_amount,2)}}<br>
                                        <strong>   </strong>{{number_format($sales_master->less,2)}}<br>
                                        <strong>   </strong>{{number_format($sales_master->vat,2)}}<br>
                                         <strong>   </strong>{{number_format($sales_master->net_amout,2)}}<br>
                                      <strong>   </strong>{{number_format($sales_master->paid_amount,2)}}<br>


                            </td>

                           
                        </tr>
                    </table>
                    <table style="border-collapse: collapse;">
                        <tr>
                        	<td> As per Law, If you need  to deduct Tax and Vat please deposit the amount with Bangladesh BankiSonali Bank within 7 (Seven)Da-vs of  and send  us the originat/copy of treasury challan along with certificate within i5(fifteen) days of deposit. </td>
                        </tr>
                        <tr><hr>
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
