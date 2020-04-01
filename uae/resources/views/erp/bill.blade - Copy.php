<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">
    <style>    </style>
</head>

<body>
    
        <table style="width:100%;">
            <tr >
                <td>
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
                                <center><span style="font-size:20px;font-weight:bold;">Bill</span></center>
                                <hr>
                            </td>
                        </tr>

                        
                    </table>

                    <table border="1" style="margin-bottom:10px;border-collapse: collapse;">
                        <tr>
                            <td  style="width:260px;padding:5px;">
                                        <strong>Bill NO: </strong>{{$sales_master->order_no}}<br>
                                        <strong>Date:    </strong>{{date('d-M-Y',strtotime($sales_master->created_at))}}

                            </td>
                            <td  align="left" style="width:260px;text-align:left;">
                                <strong>Sold By: </strong>{{strtoupper($sales_master->entry_username)}}<br>
                                        <strong>Promise Date:    </strong>{{date('d-M-Y',strtotime($sales_master->created_at))}}

                            </td>
                            <td style="width:255px;text-align:left;">
                                <strong>Branch Name : </strong>{{$sales_master->branch_name}}<br>
                                        

                            </td>
                        </tr>

                    </table>
                    <table border="1" style="border-collapse:collapse ;">
                        <tr style="">
                            <td  align="left"  style="width:385px;text-align:left;">
                                   <table >
                                            <tr>
                                            <td >Bill To <br>
                                                Address<br>
                                                Mobile<br>
                                                Attention<br>
                                                Designation
                                                </td>
                                                <td>
                                                    {{$sales_master->bill_to}} <br>
                                                {{$sales_master->billing_address}}<br>           
                                                {{$sales_master->mobile}}<br>
                                                {{$sales_master->attention}}<br>
                                                @if(!empty($sales_master->designation))
                                                {{$sales_master->designation}}
                                                @else
                                                Nill
                                                @endif
                                                </td>
                                            </tr>
                                        </table>

                            </td>
                            <td  align="left"  style="width:390px;text-align:left;">
                                   <table  border="0" style="width:390px;border-collapse:initial ;">
                                            <tr>
                                                <td >Ship To <br>
                                                Address<br>
                                                
                                                Mobile<br>
                                                
                                                Attention<br>
                                                Designation
                                                </td>
                                                <td style="text-align:left" >
                                                    {{strtoupper($sales_master->ship_to)}} <br>
                                                {{$sales_master->shipping_address}}<br>
                                                
                                                {{$sales_master->ship_mobile}}<br>
                                        
                                                {{$sales_master->ship_attention}}<br>
                                                @if(!empty($sales_master->ship_designation))
                                                {{$sales_master->ship_designation}}
                                                @else
                                                Nill
                                                @endif
                                                
                                                </td>
                                            </tr>
                                        </table>

                            </td>
                            
                        </tr>

                    </table>

                    <table  style="margin-top:10px;margin-bottom:10px;
                    border-collapse: collapse;width:100% ;height:500px;" border="1" >
                        <thead>
                        <tr>
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
                        <tbody >
                        
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
                            <td  class="number">** Total **</td>
                            <td colspan="3" class="number">{{$qty}}</td>
                            <td   class="number">{{number_format($total_amount,2)}}/=</td>    
                            
                        </tr>
                      
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
                                        <strong> </strong>{{number_format($sales_master->total_amount,2)}}<br>
                                        <strong>   </strong>{{number_format($sales_master->less,2)}}<br>
                                        <strong>   </strong>{{number_format($sales_master->vat,2)}}<br>
                                         <strong>   </strong>{{number_format($sales_master->net_amout,2)}}<br>
                                      <strong>   </strong>{{number_format($sales_master->paid_amount,2)}}<br>


                            </td>

                           
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td> As per Law, If you need  to deduct Tax and Vat please deposit the amount with Bangladesh BankiSonali Bank within 7 (Seven)Da-vs of  and send  us the originat/copy of treasury challan along with certificate within i5(fifteen) days of deposit. </td>
                        </tr>
                        <hr>
                    </table>
                    <table border="0" style="border-collapse: collapse;">
                                    <tr style="width:100%;">
                                        <td  style="width:380px;padding:5px;">


                                        <br><br><br><br>
                                        <hr>
                                                    <strong>Received with Good Condition By    </strong>

                                        </td>
                                        <td  style="text-align:right;width:380px;">
                                            For<strong> DIGITAL TECHNOLOGY CARE </strong><br><br><br><br>

                                                     <hr>
                                                    <strong>Authorized Signature and Company Stamp    </strong>

                                        </td>
                                    </tr>

                                </table>

                </td>
            </tr>                                 
            <tr>
                                
            </tr>               
        </table>
</body>


</html>
