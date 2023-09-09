<?php
session_start();
include'dbconnection.php';

// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
?>
<?php
//Clicked on send buton
if(isset($_POST['send'])){
    $userid = mysqli_real_escape_string($con,$_POST['userid']);
    $amount = mysqli_real_escape_string($con,$_POST['amount']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    
    
    
    //update pin request status
    mysqli_query($con,"update withdrawal_request set status='close' where id='$id' limit 1");
    
    echo '<script>alert("Money send successfully.");window.location.assign("withdrawal_request.php");</script>';    
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
            <h3><i class="fa fa-angle-right"></i> Admin - View Withdrawal request</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>S.n.</th>
                                    <th>Userid</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Send</th>
                                    <th>Cancel</th>
                                </tr>
                                <?php
                                    $query = mysqli_query($con,"select * from withdrawal_request where status='open'");
                                    if(mysqli_num_rows($query)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_array($query)){
                                            $id = $row['id'];
                                            $email = $row['email'];
                                            $amount = $row['amount'];
                                            $date = $row['date'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <form method="post">
                                                    <input type="hidden" name="userid" value="<?php echo $email ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                                    <td><input type="submit" name="send" value="Send" class="btn btn-primary"></td>
                                                </form>
                                                <td>Cancel</td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="6" align="center">You have  request.</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
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