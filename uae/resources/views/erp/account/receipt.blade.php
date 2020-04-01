<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Money Receipt</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">
    <style>
    
    
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
		    font-size: 12px;
		}
		.address span{
			display: initial;
		    font-size: 12px;
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
    <table>
                        <tr>
                        
                            <td ><center>
                                
                                <span style="font-size:20px;font-weight:bold;">Digital Technology Care<br></span>
                                Address : Adamjee Annex building(Ground Floor)
115-116, Motijheel Commercial AREA DHAKA-1000, Mobile:01700666999,01611631844<br>
Phone:9570549 FAX:02-47117840 E-mail: dtc_offer@yahoo.com   Web:www.copierbd.com<br>
</center><hr>
                            </td>
                        </tr>
                        </table>
                        <table>
                        <tr>
                          <td colspan="7" style="width:400px;"></td>
                            <td colspan="5" style="text-align:right;margin:10px!important;padding:7px 20px;background-color:#dbd4d4;">
                                <span style="text-align:right;font-size:15px;font-weight:bold;"><i>Money Receipt</i></span>

                            </td>

                        </tr>

            <br>
                        <tr>
                          <td colspan="7">
                            Colle ction Receipt No : <strong>{{$collection->collection_no}}</strong>
                          </td>
                          <td colspan="5">
                            Payments Terms : Must be full payment witl
                          </td>
                        </tr>
                       
                        <tr>
                          <td colspan="12">
                            Received with thanks from <strong style="font-size:17px;"><u>{{$collection->bill_to}}</u></strong>
                          </td>
                          
                        </tr>
                        <tr>
                          <td colspan="12">
                            Adclress:<strong style="font-size:14px;"><u> {{$collection->billing_address}}</u></strong>
                          </td>
                        </tr>
                         <tr>
                          <td colspan="12">
                            <strong>the sum of taka: <u>{{number_format($collection->collected_amount,2)}}</u></strong>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="4">
                            By : <strong><u>{{strtoupper($collection->entry_username)}}</u></strong>
                          </td>
                          <td colspan="4">
                            Date : <strong><u>{{date('M-d-Y',strtotime($collection->date))}}</u></strong>
                          </td>
                          <td colspan="4">
                            Time :<strong> <u>{{date(' H:i',strtotime($collection->created_at))}}</u></strong>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="4">
                            Invoice No. : <strong><u>{{($collection->order_no)}}</u></strong>
                          </td>
                          <td colspan="4">
                            Previous Dues :<strong> <u>{{number_format($collection->net_amout-$collection->paid_amount-$collection->collected_amout
                            +$collection->collected_amount,2)}}</u></strong>
                          </td>
                          <td colspan="4">
                            at :<strong> <u>{{$collection->branch_name}}</u></strong>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="4">
                            Payment Type : <strong><u>CASH</u></strong>
                          </td>
                          <td colspan="4">
                            Amount : <strong><u>{{number_format($collection->collected_amount,2)}}</u></strong>
                          </td>
                          <td colspan="4">
                             Collection Against lnvoice
                          </td>
                        </tr>
                    </table>
                    <hr>
<table   style="border:1px;" >
                      <tr><br>
                            <td   style="text-align:right;padding:5px;width:810px;">
                                    Total Due:   <br>
                                    Collected:   <br>
                                     
                                        Outstanding Amount:   <br>
                                    
                            </td>

                           <td   style="text-align: right;padding:5px;">
                                <strong>  {{number_format($collection->net_amout,2)}}</strong><br>
                                    <strong>   {{number_format($collection->collected_amout+$collection->paid_amount,2)}} </strong><br>
                                      
                                        <strong> {{number_format($collection->net_amout-$collection->collected_amout-$collection->paid_amount,2)}}</strong><br>
                            </td>
                       
                        </tr>
                      
                        <tr><td>
                            

                </td>
            </tr>                                 
            <tr>
                            
            </tr>             
        </table>
        <table dir="ltr" border="0" style="border-collapse: collapse;">
                            <tr>
                                  <td style="padding:5px;width:700px;">


                                  <br><br><br><br>
                                  
                                          <strong>N.B. : Subject to Realization of Chaque.  </strong>

                                  </td>
                                  
                                  <td  style="text-align:right;width:200px;">
                                      <br><br><br><br><hr>
                                          <strong>Signature and Stamp    </strong>

                                  </td>
                                  
                              </tr>

                          </table>
    </div>

</body>


</html>
