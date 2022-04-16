<?php
    
$server= "localhost";
$username="root";
$password="";
$con= mysqli_connect($server,$username,$password,'wt_database');
if(!$con){
    die("Error : Connection not made due to".mqsqli_connect_error());
}

?>
