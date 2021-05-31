<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ScrapBin - We'll pick it up!</title>
  <meta name="description" content="The ScrapBin provides free doorstep service of scrap collection and disposal to Households ,Retailers,
     Corporates, Manufacturers etc. Helping them get rid of scrap like Paper, metal, E- Waste, Carton, Plastic etc.">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
  <!-- custon css -->
  <link rel="stylesheet" href="../css/home.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

  <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


   <!-- bootstrap js cdn -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>

<body>
  
  <section class="home">

  <!-- navbar include -->
  <link rel="stylesheet" href="../css/navbar.css">
  <?php include 'inc/navbar.php' ?>

  <div class="top-body row">
    <div class="left-container col-sm">
      <h1 class="tagline-heading">LOOKING FOR CASH? SELL YOUR TRASH.</h1>
      <p class="para-heading">Tell us your location and the type of trash you want to sell or dispose off and we will send our men to pick up the trash. Sign up now to get more benefits.</p>
    
    <?php
      if($seller=="Guest"){
        echo "<a href=\"sign-up.php\"><button class=\"signup-button\" type=\"button\" name=\"button\">SIGN UP</button></a>
        <a href=\"sign-in.php\"><button class=\"login-button\" type=\"button\" name=\"button\">LOG IN</button></a>";
      }else{
        echo "<h2>Welcome, ".$seller."!</h2>";
      }?>

 
    </div>
    <div class="right-container col-sm" >
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_c7Gl35.json"  background="transparent"  speed="1"  style="width: 500px ; height:  500px"  loop  autoplay></lottie-player>
  </div>
  <!--<div class="aise-hee">

  </div>-->
      </section>

  <section class="steps">

  <div class="row text-center text-color two">
    <div class="row text-center text-color">
      <span class="text-head ">Sell your scrap in<br> 3 easy steps</span><br>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <img src="https://www.thekabadiwala.com/images/landing/step-1.svg" width="223" height="160">
      <div class="text-left heading">
        <span class="count-text-small">
          1.
          <br>Select scrap item for selling
        </span>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <img src="https://www.thekabadiwala.com/images/landing/step-2.svg" width="223" height="160">

      <div class="text-left heading">
        <span class="count-text-small">
          2.
          <br>Choose a date for scrap pickup
        </span>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <img src="https://www.thekabadiwala.com/images/landing/step-3.svg" width="223" height="160">
      <div class="text-left heading">
        <span class="count-text-small">
          3.
          <br>Pickup boys will arrive at your home
        </span>
      </div>
    </div>
  </div>

</section>


  <section id="carouselID" class="carousel-section">
    <!-- Section for Priyanka's Part Why ScrapBin and Social Cause  -->
    <!-- <h3>Priyanka</h3> -->


    <div id="carouselExample" class="carousel slide " data-ride="false">
      <ol class="carousel-indicators">
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>

        </ol>
      <div class="carousel-inner ">

        <div class="carousel-item active" >
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <h1 class="carousel-text"> Want to contribute to a healthy environment? <span id="innerText" class="InnerText"> Choose ScrapBin!</span> </h1>
              <p class="carousel-para">ScrapBin is an initiative with an aim to cleanse the environment and recycle the recylclable. ScrapBin started with a mission to make India a zero waste country, we recycle more then 150 tons of scrap and electronic waste every month and hence protecting out natural resources.</p>
            </div>
            <div class="col-lg-6 col-md-12">
              <img src="../images/environment3.jpg"  class="carousel-image"  alt="environment picture">
            </div>
          </div>
        </div>

        <div class="carousel-item ">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="carousel-text">Sell online seamlessly in just 3 simple steps. <span class="InnerText" >Request a pickup!</span></h1>
              <p class="carousel-para">Experience the world class service provided by us. With high quality interface and services, we at ScrapBin bring to you the most efficient way to dispose off your waste and earn from it.</p>
            </div>
            <div class="col-lg-6">
              <img src="../images/sellonline3.jpg" class="carousel-image"   alt="environment picture">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="carousel-text">Sell your trash with ScrapBin and get cash- <span class="InnerText">At the best price!</span> </h1>
              <p class="carousel-para">Get the best bet price for your trash at ScrapBin. Customers who sell their scrap at ScrapBin, can rely to get a trustworthy price for all the scrap materials sold.</p>
            </div>
            <div class="col-lg-6">
              <img src="../images/bestprice1.jpg" class="carousel-image" alt="environment picture">
            </div>

          </div>


        </div>

      </div>

      <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon arrowLeft" aria-hidden="true"></span>

      </a>

      <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon arrowRight"  aria-hidden="true"></span>

      </a>
    </div>
  </section>


</body>

<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>


</html>
