<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
?>
<?php
// for  password change   
if(isset($_POST['Submit']))
{
$oldpassword=($_POST['oldpass']);
$sql=mysqli_query($con,"SELECT * FROM user WHERE password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$uid=$_SESSION['userid'];
$newpass=($_POST['newpass']);
 $ret=mysqli_query($con,"update user set password='$newpass' where email='$uid'");
$_SESSION['msg']="Password Changed Successfully !!";
//header('location:user.php');
}
else
{
$_SESSION['msg']="Old Password not match !!";
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
                        <h1 class="page-header">Change Your Password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                
  <div class="row">
                	<div class="col-lg-4">
                    	<form name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" placeholder="Enter Old Password" name="oldpass" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" placeholder="Enter New Password" name="newpass" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" placeholder="Enter Password Again" name="confirmpassword" class="form-control" value="" required>
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

  
  