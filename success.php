<?php include 'inc/header.php'; ?>
<?php 
     
     $login=Session::get("cuslogin");
     if ($login==false) {
      header("Location:login.php");
     }

 ?>

 <style type="text/css">
 	.psuccess{
 		width: 500px;
 		min-height: 200px;
 		text-align: center;
 		border:1px solid #ddd;
 		margin:0 auto;
 		padding: 20px;

 	}
 	.psuccess h2{

      border-bottom: 1px solid #ddd;
      margin-bottom: 20px;
      padding-bottom: 10px;
 	}
 	.psuccess p{
 	font-size: 18px;
line-height: 25px;
text-align: left;
 	}
 	
 </style>

 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="psuccess">
            	<h2>Success</h2>
              <?php 
              $cmrId=Session::get("cmrId");
              $amount=$ct->PayableAmount($cmrId);
              if ($amount) {
                $sum=0;
                   while ( $result=$amount->fetch_assoc()) {
                     $price=$result['price'];
                     $sum=$sum+$price;
                   }
              }
               ?>
            	<p style="color:red ">Total Payable Amount(Includint Vat):$

            <?php 

            $vat= $sum * 0.1;
            $total=$sum+$vat;
            echo $total;

             ?>
            
              </p>
              <p>Thank's for purchase.Just Recieved your order successfully,We will contract you as soon as possible with delivary details.Here is your order details <a href="orderdetails.php">Visit Here</a></p>
            </div>
 		</div>
 	</div>
	</div>
   <?php include 'inc/footer.php'; ?>