<?php  
  require('config/db.php');

  $msg="";

  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    //Create Query
    $query='SELECT * FROM customer WHERE cemail="'.$email.'" and cpwd="'.$password.'"';
    $result=mysqli_query($conn, $query);
    $customer=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    if(count($customer)>0){
      session_start(); //Start the session
      $_SESSION['id']=$customer[0]['cid'];
      $_SESSION['name']=$customer[0]['cname'];
      header('Location:home.php');
    }else{
      $msg="error";
    }
  }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>signin</title>

<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!-- custom css -->
<link rel="stylesheet" href="../css/sign-in.css">

<!-- google fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

 <!-- font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body >

  <!-- navbar include -->
  <link rel="stylesheet" href="../css/navbar.css">
  <?php include 'inc/navbar.php' ?>

  <main class="form-signin">
 

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <h1 class="h3 mb-3 fw-normal">SIGN IN</h1>
      <h6>Email:</h6>
      <input type="text" name="email" placeholder="Email" class="login-input form-control">
      <h6>Password:</h6>
      <input type="password" name="password" placeholder="Password" class="login-input mb-3 form-control">
      <?php
  if($msg=="error"){
    echo "<p class=\"alert-danger p-1\"> Wrong email or password. Please try again.</p>";
    $msg="";
  }else{}?>
        <div>
        <a href="sign-up.php">Don't have an account?Create one!</a>
        </div>
        <button name="submit" class="w-100 btn btn-lg btn-primary signinBut mt-3" type="submit">Sign in</button>
    </form>
  </main>
  

 
 
</body>


<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>

  
</html>
