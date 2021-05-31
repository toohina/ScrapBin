<?php
session_start();

$allow_buy=false;
$subtract=0;

if(isset($_SESSION['id'])){
    if(isset($_POST['buy'])){
        $pid=$_POST['pid'];
    }

    require('config/db.php');

    $query='SELECT * FROM customer WHERE cid="'.$_SESSION['id'].'"';
    $result=mysqli_query($conn, $query);
    $customers=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    
    $query='SELECT * FROM product WHERE pid="'.$pid.'"';
    $result=mysqli_query($conn, $query);
    $products=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);


    if($products[0]['ppoints']<=$customers[0]['cpoints']){
        $allow_buy=true;
        $subtract=$customers[0]['cpoints']-$products[0]['ppoints'];
    }else{
        $allow_buy=false;
    }

}else{
    header("Location:sign-in.php");
}


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
  <link rel="stylesheet" href="../css/buy-product.css">

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
    
<!-- navbar include -->
<link rel="stylesheet" href="../css/navbar.css">
<?php include 'inc/navbar.php' ?>

<section>

<?php if($allow_buy):?>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="card" style="width: 18rem;">
                <img src="<?php echo $products[0]['p_img_url']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $products[0]['pname']; ?></h5>
                    <p class="card-text"><?php echo $products[0]['ptype']; ?></p>
                    <h4><?php echo $products[0]['ppoints']; ?> Points</h4>
                </div>
                </div>
            </div>
            <div class="col pt-5">
            <!-- <div class="card" style="width: 18rem;">
            <div class="card-body"> -->
                <h2>The total points you have currently: <?php echo $customers[0]['cpoints']; ?> points</h2>
                <h2>The total points you will have after buying:  <?php echo $customers[0]['cpoints']-$products[0]['ppoints']; ?> points</h2>
                <h2>Are you sure you want to get this product?</h2>
                <form method="post" action="thank-you.php">
                <input type="hidden" name="c" value="<?php echo $customers[0]['cid']; ?>"/>
                <input type="hidden" name="p" value="<?php echo $products[0]['pid']; ?>"/>
                <input type="hidden" name="amt" value="<?php echo $subtract; ?>"/>
                <button type="submit" name="confirm">CONFIRM</button>    
            </form>
               
            <!-- </div>
            </div> -->
           
            </div>
        </div>
    </div>
<?php else: ?>
<h1>You don't have enough points!</h1>
<?php endif ?>
</section>




</body>

<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>


</html>
