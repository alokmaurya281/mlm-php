<?php include("dbconnection.php")?>

<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">Name</th>
                                  <th> Userame</th>
                                  <th> Email Id</th>
                                  <th>Sponser Id</th>
                                  <th>Password</th>
                                  <th>Account status</th>
                                  <th>Total Income</th>
                                  <th>Daily Income</th>
                                  <th>Direct Referral Income</th>
                                  <th>Contact no.</th>
                                  <th>Reg. Date</th>
                              </tr>
                              </thead>
                              <tbody>
<?php $ret=mysqli_query($con,"select * from users");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
							  	<?php $username= $row['username'];?>
							  	<?php $daily_income=$row['daily_income'];?>
							  	<?php $total_income=$row['total_income'];?>
							  	<?php $new_total_income = $total_income+$daily_income;?>
								<?php  $wallet_bal= $row['wallet_bal'];?>
                 <?php $new_wallet_bal=$wallet_bal+$daily_income;?>
							  	
							  	<?php $sql=mysqli_query($con,"update users set wallet_bal='$new_wallet_bal',total_income='$new_total_income' where username='$username'");?>
							  	<?php $sql=mysqli_query($con,"update income set total_income='$new_total_income' where username='$username'");?>
							  	<tr>
                              <td><?php echo $cnt;?></td>
                              <td><?php echo $row['name'];?></td>
                                  <td><?php echo $username;?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['sponserid'];?></td> 
                                  <td><?php echo $row['password'];?></td>
                                  <td><?php echo $row['account_status'];?></td>
                                  <td><?php echo $total_income;?></td>
                                  <td><?php echo $daily_income;?></td>
                                  <td><?php echo $row['direct_referral_income'];?></td>
                                  <td><?php echo $row['contactno'];?></td>
                                   <td><?php echo $row['posting_date'];?></td>
                                  <td>
                                     
                                     <a href="update-profile.php?uid=<?php echo $row['userid'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="manage-users.php?id=<?php echo $row['userid'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>