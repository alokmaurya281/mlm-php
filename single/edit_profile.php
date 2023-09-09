<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
?>
<?php
// for  password change   
if(isset($_POST['Submit']))
{
$name=($_POST['name']);
$email=($_POST['email']);
$account=($_POST['account']);
$ifsc=($_POST['ifsc']);
$mobile=($_POST['mobile']);
$address=($_POST['address']);
$holder_name=($_POST['holder_name']);
$branch=($_POST['branch']);
$sql=mysqli_query($con,"SELECT * FROM user");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$uid=$_SESSION['userid'];
 $ret=mysqli_query($con,"update user set name='$name',email='$email',address='$address',ifsc='$ifsc,holder_name='$holder_name',account='$account',branch='$branch', mobile='$mobile', where email='$uid'");
$_SESSION['msg']="Profile Changed Successfully !!";
//header('location:user.php');
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

    <title>Income 899 Change Password</title>

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
                        <h1 class="page-header">Edit Your Details</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                
  <div class="row">
                	<div class="col-lg-4">
                    <?php 
								  $sql_u ="SELECT * FROM user";
$result = mysqli_query($con,$sql_u);
// Associative array
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
	<form name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"  name="name" class="form-control" value="<?php echo $num['name'];?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"  name="email" class="form-control" value="<?php echo $num['email'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text"  name="mobile" class="form-control" value="<?php echo $num['mobile'];?>" >
                            </div>
<div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $num['address'];?>" >
                            </div>
<div class="form-group">
                                <label>Account No.</label>
                                <input type="text"  name="account" class="form-control" value="<?php echo $num['account'];?>" >
                            </div>
<div class="form-group">
                                <label>IFSC Code</label>
                                <input type="text"  name="ifsc" class="form-control" value="<?php echo $num['ifsc'];?>">
                            </div>
<div class="form-group">
                                <label>Branch</label>
                                <input type="text" name="branch" class="form-control" value="<?php echo $num['branch'];?>">
                            </div>

         <div class="form-group">
                                <label>Account Holder Name</label>
                                <input type="text" name="holder_name" class="form-control" value="<?php echo $num['holder_name'];?>" >
                            </div>                              
                            <div class="form-group">
                        	<input type="submit" name="Submit" class="btn btn-primary" value="Change">
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
    
    <script language="javascript" type="text/javascript">
function valid()
{
if(document.form1.oldpass.value=="")
{
alert(" Old Password Field Empty !!");
document.form1.oldpass.focus();
return false;
}
else if(document.form1.newpass.value=="")
{
alert(" New Password Field Empty !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value=="")
{
alert(" Re-Type Password Field Empty !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value.length<6)
{
alert(" Password Field length must be atleast of 6 characters !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value.length<6)
{
alert(" Re-Type Password Field less than 6 characters !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value!= document.form1.confirmpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.form1.newpass.focus();
return false;
}
return true;
}
</script>
<script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>


</body>

</html>

  
  