<?php 
require_once('dbconnection.php');
$email='a@g.n';
$sponserid='a';
$username='al';
 

//Insert into Users
     $query = mysqli_query($con,"update users set account_no='1900000', account_holder_name='alok' where email='anujmaurya26062005@gmail.com'");
 


if($query){
    echo "all ok" ;
}
else{ 
echo "something wrong";
}
?>