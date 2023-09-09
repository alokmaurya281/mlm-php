<?php
session_start();
include'dbconnection.php';

// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
?>
<?php
$product_amount = 100;
//Pin generate
function pin_generate(){
    global $con;
    $generated_pin = rand(100000,999999);
    
    $query = mysqli_query($con,"select * from pin_list where pin = '$generated_pin'");
    if(mysqli_num_rows($query)>0){
        pin_generate();
    }
    else{
        return $generated_pin;
    }
    
}
//Clicked on send buton
if(isset($_POST['send'])){
    $userid = mysqli_real_escape_string($con,$_POST['userid']);
    $amount = mysqli_real_escape_string($con,$_POST['amount']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    
    $no_of_pin = $amount/$product_amount;
    //Insert pin
    $i=1;
    while($i<=$no_of_pin){
        $new_pin = pin_generate();
        mysqli_query($con,"insert into pin_list (`userid`,`pin`) values('$userid','$new_pin')");
        $i++;   
    }
    
    //update pin request status
    mysqli_query($con,"update pin_request set status='close' where id='$id' limit 1");
    
    echo '<script>alert("Pin send successfully.");window.location.assign("view_pin_request.php");</script>';    
}


?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
                    
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
                   <li class="mt">
                      <a href="view_pin_request.php">
                          <i class="fa fa-file"></i>
                          <span>View Pin Requests</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Admin - View pin request</h3>
               <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Userid</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = mysqli_query($con,"select * from income_received order by id desc");
                                    if(mysqli_num_rows($query)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['userid']; ?></td>
                                                <td><?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="5">No user exist</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div><!--/.table-responsive-->
                    </div>
                </div><!--/.row-->
                  </div>
              </div>
        </section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>