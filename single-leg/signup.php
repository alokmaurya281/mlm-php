<?php session_start();
require_once('dbconnection.php');
//functions
function pin_check($pin){
  global $con;
  
  $query =mysqli_query($con,"select * from pin_list where pin='$pin' and status='open'");
  if(mysqli_num_rows($query)>0){
    return true;
  }
  else{
    return false;
  }
}

function username_check($username){
  global $con;
  
  $query =mysqli_query($con,"select * from users where username='$username'");
  if(mysqli_num_rows($query)>0){
    return false;
  }
  else{
    return true;
  }
}

function email_check($email){
  global $con;
  
  $query =mysqli_query($con,"select * from users where email='$email'");
  if(mysqli_num_rows($query)>0){
    return false;
  }
  else{
    return true;
  }
}
//Code for Registration 
if(isset($_POST['signup']))
{
  	$pin=$_POST['pin'];
	$sponserid=$_POST['sponserid'];
  	$username=$_POST['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;

$flag = 0;
if($pin!='' && $sponserid!='' && $username!='' && $contact!='' && $name!='' && $password!='' && $email!='' ){
    //User filled all the fields.
  if(pin_check($pin)){
      //Pin is ok
    if(email_check($email)){
      //email is ok
      if(username_check($username)){
        //username is ok
        if(!username_check($sponserid)){
          //sponser id is ok

            $flag=1;
          }
          else{
            // sponserid check
            echo '<script>alert("Invalid sponserid .");</script>';
          }
        }
        else{
          //check username
          echo '<script>alert("username not available.");</script>';
        }
      }
      else{
        //check email
        echo '<script>alert("This email already availble.");</script>';
      }
    }
    else{
      //check pin
      echo '<script>alert("Invalid pin");</script>';
    }
  }
  else{
    //check all fields are fill
    echo '<script>alert("Please fill all the fields.");</script>';
  }
  
  //Now we are heree
  //It means all the information is correct
  //Now we will save all the information
  if($flag==1){
    
    //Insert into Users
    $query = mysqli_query($con,"insert into users(`email`,`password`,`contact`,`sponserid`,`username`,`name`) values('$email','$password','$contact','$sponserid','$username', '$name')");
    
    //Insert into referrals
    //So that later on we can view tree.
    $query = mysqli_query($con,"insert into referrals(`email`,`sponserid`,`username`) values('$email','$sponserid','$username')");
    
    //Update pin status to close
    $query = mysqli_query($con,"update pin_list set status='close' where pin='$pin'");
    
    //Inset into Income
    $query = mysqli_query($con,"insert into income (`email`,`username`) values('$email','$username')");
$query = mysqli_query($con,"insert into levels (`email`,`username`,`sponserid`) values('$email','$username','$sponserid')");
$query = mysqli_query($con,"insert into bank_details (`email`) values('$email')");
    echo mysqli_error($con);

 //Update count 
    			    $q = mysqli_query($con,"select * from referrals where username='$sponserid'");
                            $result = mysqli_fetch_array($q);
                            #$data['d_cirect_count'] = $result['direct_count'];
                            $temp_ref_count=$result['direct_count']+1; 
                            $qu=mysqli_query($con,"update referrals set direct_count='$temp_ref_count' where username='$sponserid'");
                            $qu=mysqli_query($con,"update users set direct_count='$temp_ref_count' where username='$sponserid'");


 //Update level 
      $q =mysqli_query($con,"select * from referrals where username='$sponserid'");
       $result = mysqli_fetch_array($q);
       $ref_count=$result['direct_count'];
       

       if($ref_count<1){
              $temp_level_count = "0"; 
       } 
       else if(($ref_count >= "1") && ($ref_count<"3")) {
              $temp_level_count="1";
              $temp_daily_income="50";
       }
      else if(($ref_count >= "3") && ($ref_count<"5")) {
              $temp_level_count="2";
              $temp_daily_income="70";
       }
       else if(($ref_count >= "5") && ($ref_count<"10")) {
              $temp_level_count="3";
              $temp_daily_income="110";
       }
       else if(($ref_count >= "10") && ($ref_count<"20")) {
              $temp_level_count="4";
              $temp_daily_income="200";
       }
       else if(($ref_count >= "20") && ($ref_count<"30")) {
              $temp_level_count="5";
              $temp_daily_income="350";
       }
       else if(($ref_count >= "30") && ($ref_count<"40")) {
              $temp_level_count="6";
              $temp_daily_income="500";
       }
       else if($ref_count>"50") {
              $temp_level_count="7";
              $temp_daily_income="700";
       }
      
  


      $q= mysqli_query($con,"update levels set level_count='$temp_level_count' where username='$sponserid'");  
      if ($q) {
      $q = mysqli_query($con,"select * from referrals where username='$sponserid'");
       $result = mysqli_fetch_array($q);
       $ref_count=$result['direct_count'];
       
  $q = mysqli_query($con,"select * from levels where username='$sponserid'");
       $result = mysqli_fetch_array($q);
       $level_count=$result['level_count'];

      

      
      


 }   
$q = mysqli_query($con,"select * from users where username='$sponserid'");
                              $res = mysqli_fetch_array($q);


//update income
                            
                              $qu = mysqli_query($con,"select * from income where username='$sponserid'");
                              $result = mysqli_fetch_array($qu);
                              #$data['d_cirect_count'] = $result['direct_count'];
                              $temp_ref_income=$result['direct_referral_income']+30; 
                              $temp_total_income=$result['total_income']+30;
			      $new_wallet_bal=$res['wallet_bal']+30;
                              $qu=mysqli_query($con,"update income set direct_referral_income='$temp_ref_income' , total_income='$temp_total_income',daily_income='$temp_daily_income' where username='$sponserid'");
                              $qu=mysqli_query($con,"update users set wallet_bal='$new_wallet_bal',total_income='$temp_total_income',direct_referral_income='$temp_ref_income',daily_income='$temp_daily_income' where username='$sponserid'");
                            
    
    
    echo mysqli_error($con);
    
    echo '<script>alert("Joining success.");</script>';
  
  

//if($query){
//  echo '<script>alert("registration success.");</script>';
//}
//else{
//  echo '<script>alert("something is wrong.");</script>';
//}
    
    
}}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register a new account - NMG</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
   
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register an Account</h3>
                <form name="registration" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Pin No.</label>
                    <input type="text" value="" name="pin" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Sponser Id</label>
                    <input type="text" value="" name="sponserid" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Username or Referral ID</label>
                    <input type="text" value="" name="username" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control p_input" value="" name="name" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" value="" name="email" required>
                  </div>
                  <div class="form-group">
                    <label>Mobile No.</label>
                    <input type="text" class="form-control p_input" value="" name="contact" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" value="" name="password"required>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" required> Remember me </label>
                    </div>
                    <a href="forgotpassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="signup" value="Sign Up" class="btn btn-primary btn-block enter-btn">Sign Up</button>
                  </div>
                  
                  <p class="sign-up text-center">Already have an Account?<a href="index.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="policy"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
