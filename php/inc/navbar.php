<?php 
if(isset($_SESSION['id'])){
  $seller=$_SESSION['name'];
}else{
  $seller="Guest";
}
?>
<!-- navigation bar -->
<nav class="navbar fixed-top  navbar-expand-lg navbar-dark px-3 px-lg-5 pb-lg-0">
    <div class="container-fluid">
      <a class="navbar-brand m" href="#">🚛 Scrap<span class="bin">Bin</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-lg-auto">
          <li class="nav-item mx-lg-2 mx-auto">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item mx-lg-2 mx-auto">
            <a class="nav-link" href="request-pickup.php">Request Pickup</a>
          </li>
          <li class="nav-item mx-lg-2 mx-auto">
            <a class="nav-link" href="price-page.php">Price</a>
          </li>
          <li class="nav-item mx-lg-2 mx-auto">
            <a class="nav-link" href="upcycled-products-test.php">Upcycled Products</a>
          </li>
          <li class="nav-item mx-lg-2 mx-auto">
            <a class="nav-link" href="tie-up.php">Tie-Up</a>
          </li>
          <li class="nav-item dropdown mx-auto mx-lg-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu dropdown-menu-success " aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="about-us.php">About us</a></li>
            <li><a class="dropdown-item" href="contact-us.php">Contact us</a></li>
            <li><a class="dropdown-item" href="how-we-work.php">How we work</a></li>
            <li><a class="dropdown-item" href="privacy-policy.php">Privacy Policy</a></li>
            <li><a class="dropdown-item" href="terms-and-conditions.php">Terms and conditions</a></li>
          </ul>
        </li>
        <?php 
          if($seller=="Guest"){
            echo "<li class=\"nav-item ms-lg-2 mx-auto\">
            <a class=\"nav-link\" href=\"sign-in.php\">Login</a>
            </li>";
          }else{
            echo "<li class=\"nav-item ms-lg-2 mx-auto\">
            <a class=\"nav-link\" href=\"profile.php\">Profile</a>
            </li>
            <li class=\"nav-item ms-lg-2 mx-auto\">
            <a class=\"nav-link\" href=\"logout.php\">Logout</a>
          </li>";
          }?>
        
         
        </ul>
      </div>
    </div>
  </nav>
