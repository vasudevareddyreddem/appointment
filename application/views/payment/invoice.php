<!doctype html>

<?php //echo '<pre>';print_r($billing_details);exit; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>hospital invoice</title>
    
    <style>
	.page-invoice{
	    
			position:relative;
	}
    .invoice-box {
   
        <!-- margin: auto; -->
        <!-- padding: 30px; -->
        <!-- border: 1px solid #eee; -->
        <!-- box-shadow: 0 0 10px rgba(0, 0, 0, .15); -->
        font-size: 14px;
        line-height: 20px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
	
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    <!-- .invoice-box table tr td:nth-child(2) { -->
        <!-- text-align: right; -->
    <!-- } -->
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 10px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
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
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
	table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 10px;
}
    </style>
</head>

<body>
    <div class="page-invoice">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" >
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo base_url(); ?>assets/vendor/img/fav.png" style=" width:100px;">
                            </td>
							<td >
                               <h1 style="text-align:center;">PrachaTech Software Solutions </h1>
                               <p style="text-align:center;color:#F80">BY PRACHA TECHNOLOGIES PVT LTD.  </p>
                            </td>
                            
                          
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                             <div>
								<strong>BILL TO : </strong> <?php echo $billing_details['name']; ?>, 
							 </div>
							 <div>
								<strong>PROJECT : </strong> <?php echo $billing_details['project']; ?>, 
							 </div>
							 <div>
								<strong>CLIENT Email DETAILS:  </strong> <?php echo $billing_details['email_id']; ?> 
							 </div> 
							 <div>
								<strong>CLIENT MOBILE DETAILS:  </strong> <?php echo $billing_details['mobile_no']; ?> 
							 </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
		<h2>INVOICE </h2>


<table class="bodered-table">
  <tr>
    <td>Invoice# </td>
    <td colspan="3">INV-PT-<?php echo $billing_details['b_id']; ?></td>
  
  </tr>
  <tr>
    <td>Invoice Date </td>
    <td colspan="3"><?php echo $billing_details['create_at']; ?></td>
  
  </tr>
  <tr>
    <td>Payment Mode </td>
    <td colspan="3"><?php if($billing_details['payment_type']==1){ echo "Online bank"; }else if($billing_details['payment_type']==2){ echo "Cash";}else if($billing_details['payment_type']==3){ echo "Other"; } ?></td>
  
  </tr>
  <tr>
    <th># </th>
    <th>Items & Descirption</th>
    <th>Price</th>
  </tr>
  <tr>
    <td>1 </td>
    <td><?php echo $billing_details['project']; ?></td>
    <td><?php echo $billing_details['amount']; ?> </td>
  </tr> 
   

  <tr>
    <td colspan="2"> Total </td>
    <td>Rs. <?php echo $billing_details['amount']; ?></td>
  </tr> 
  <tr>
    <th colspan="2">Pay Price </th>
    <th>Rs. <?php echo $billing_details['pay']; ?></th>
  </tr>
  <tr>
     <th colspan="2">Paid Amount </th>
    <th>Rs. <?php echo $billing_details['pay']; ?></th>
  </tr> 
    <tr>
     <th colspan="2">Balance Due  </td>
    <td> Rs. <?php echo $billing_details['due']; ?></td>
  </tr> 
  

</table>
<p style="text-align:center;margin-top:50px;">This is a system generated invoice and hence physical signature is not required</p>


    </div>
	<div style="clear:both">&nbsp;</div>
	<br>
	
	
	<div style="background:#333;width:100%;">
		<p style="color:#fff;padding:10px 20px;text-align:center;">Office Address: Plot No-177, Sri Vani Nilayam, Sardar Patel Nagar, Opp to Nizampet X Roads, KPHB-500090, Hyderabad, Telangana, India Office Phone: 040-48541273 / +91 9494422779, Office Email: info@prachatech.com WebSite: www.prachatech.com 
  </p>
	</div>
    </div>
</body>
</html>