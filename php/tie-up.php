<?php
	if(isset($_POST['submit'])){
    //Get Form Data
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $pincode=$_POST['pincode'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $address=$_POST['address'];
   
    require('config/db.php');
    $query="insert into company(comp_name,comp_email,comp_mobile,comp_pincode,comp_state,comp_city,comp_address) values('$name','$email',$phoneno,$pincode,'$state','$city','$address')";
    if(mysqli_query($conn,$query)){
        header("Location:tie-up-success.php");
    }else{
      echo "Error";
    }
  }
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Tie up</title>

 <!-- bootstrap css -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
  <!-- custon css -->
  <link rel="stylesheet" href="../css/tie-up.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

  <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
 <!-- navbar include -->
  <link rel="stylesheet" href="../css/navbar.css">
  <?php include 'inc/navbar.php' ?>

  <main>
  <div style="background-color:white;" class="back-to-home col-lg-12 col-md-12">
  </div>
  <div class="container blog">
    <div class="row">
      <div class="tie-up-heading col-sm-12">
        <h2> Tie up </h2>
        <hr>
      </div>
    </div>
    <div class="row tie-up-image">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <img class="img-responsive" src="../images/tie-up-image.png" alt="Chania" width="600" height="200">
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <p> <span class="scrapbin-color"> Scrapbin </span> intends to tie up with all the private and public corporate offices across India to recycle the scrap they generate during their daily business. Keep your premises clean by selling your scrap to Scrapbin and join our hands in reducing the hazards to the environment in return get paid standard prices for your scrap waste. Enjoy our hassle-free service, sitting at your place in just three easy steps. Tie up feature enables to place the recurring order at a predefined regular interval so that you don’t have to book every time. If you want one-time pickup please visit the home page for booking. </p>
      </div>
    </div>
    <div class="tie-up-form">
    <form id="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <input type="text" name="name" placeholder="Company Name" class="form-control"  required>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control"  required>  
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <input type="tel" name="phoneno" pattern="[7-9]{1}[0-9]{9}" placeholder="Phone No" class="form-control" required> 
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <input type="text" name="pincode" pattern="[0-9]{6}" placeholder="Pincode" class="form-control"  required> 
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <input type="text" name="state" pattern="[a-zA-Z ]*"  placeholder="State" class="form-control"  required>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="form-group">
            <input type="text" name="city" pattern="[a-zA-Z ]*"  placeholder="City" class="form-control"  required>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="form-group">
            <textarea name="address" placeholder="Address" class="form-control mg2-top" required></textarea>
          </div>
        </div>
        <div class="col-sm-12 submit-button">
          <input type="submit" name="submit" class="w-10 btn btn-lg btn-primary" style="background-color:green;">
        </div>
    </div>
  </div>
    </form>
   </div>
   </main>

</body>

<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>

</html>
