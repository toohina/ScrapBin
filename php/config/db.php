<?php  
  // Create Connection
   $conn = mysqli_connect('localhost','root','4Q*_u5uUrVt(wY#','scrapbin');
  //  Check Connection
  if(mysqli_connect_errno()){
    //Connection Failed
    echo "Connection Failed: ".mysqli_connect_errno();
  }
?>