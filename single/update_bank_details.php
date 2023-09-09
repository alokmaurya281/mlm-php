<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$email = $_SESSION['userid'];
?>
<?php

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
	$accountno=$_POST['accountno'];
	$uid=$_SESSION['userid'];
	$ifsc=$_POST['ifsc'];
	$branch=$_POST['branch'];
	$bank_name=$_POST['bank_name'];
	$upi=$_POST['upi'];
	$gpay=$_POST['gpay'];
	$paytm=$_POST['paytm'];
	$phonpe=$_POST['phonepe'];

$msg=mysqli_query($con,"insert into bank_details(userid,name,accountno,ifsc,branch,bank_name,upi,gpay,paytm,phonepe) values('$uid,'$name','$accountno','$ifsc','$branch','$bank_name','$upi','$gpay','$paytm','$phonepe')");

if($msg)
{
	echo "<script>alert('Bank details updated successfully');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Income 899 Bank Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bank Details</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
               
                
  <div class="row">
                	<div class="col-lg-4">
                    	<form name="update" method="post" action=""> </div>
                            <div class="form-group">
                                <label>Account Holder Name</label>
                                <input type="text" placeholder="Enter Account Holder name" value="" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Account No.</label>
                                <input type="text" placeholder="Enter your Account No." name="accountno" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <label>IFSC Code</label>
                                <input type="text" placeholder="Enter IFSC code" name="ifsc" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <input type="text" placeholder="Enter Branch " name="branch" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" placeholder="Enter Bank Name" name="bank_name" class="form-control" value="" >
                            </div>
                             <div class="form-group">
                                <label>GPay</label>
                                <input type="text" placeholder="Enter Gpay ID" name="gpay" class="form-control" value="" >
                            </div>
                             <div class="form-group">
                                <label>UPI ID</label>
                                <input type="text" placeholder="Enter UPI id" name="upi" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Paytm No.</label>
                                <input type="text" placeholder="Enter Paytm No." name="paytm" class="form-control" value="" >
                            </div>                                     <div class="form-group">
                                <label>PhonePe</label>
                                <input type="text" placeholder="Enter phonepe" name="phonepe" class="form-control" value="">
                            </div>
                            <div class="form-group">
                        	<input type="submit" name="submit" class="btn btn-primary" value="submit">
                        </div>
                        </form>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
  


</body>

</html>

  
  