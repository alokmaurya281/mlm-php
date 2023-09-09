<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid= $_SESSION['userid'];

if(isset($_POST['submit'])){

    $amount=$_POST['amount'];
	$current_bal=$_POST['current_bal'];
	$method=$_POST['method'];
    $uid=$_SESSION['userid'];
    $sql="INSERT INTO withdrawal(userid,amount,method,current_bal) values('$uid,'$amount','$method','$current_bal')";

    $query=mysqli_query($sql,$con));
    if($query){
			echo '<script>alert("Withdrawal request sent successfully");window.location.assign("home.php");</script>';
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

    <title>Income 899 Withdrawal</title>

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
                        <h1 class="page-header">New Withdrawal</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
               
                
  <div class="row">
                	<div class="col-lg-4">
                    	<form method="post" action="" </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" placeholder="Enter Amount" name="amount" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label>Current Balance</label>
                                <input type="text" placeholder="Enter Current Balance" name="current_bal" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label>Method</label>
                                <select class="form-control" name="method">
<option>Gpay</option>
<option>Bank</option>
<option>Paytm</option>
<option>Phonepe</option>
<option>UPI</option> 

</select>
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

  
  