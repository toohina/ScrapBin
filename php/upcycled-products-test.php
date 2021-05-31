<?php
     session_start();

     $buy_link="";


     require('config/db.php');
     $query="SELECT * from product";
     $result=mysqli_query($conn, $query);
     $products=mysqli_fetch_all($result, MYSQLI_ASSOC);
     mysqli_free_result($result);
     mysqli_close($conn);



     if(isset($_SESSION['id'])){
        $buy_link="buy-product.php";
     }else{
         $buy_link="sign-in.php";
     }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Upcycled Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

   <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Carter+One&display=swap" rel="stylesheet">

  <!-- boostrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <!-- custom css -->
  <link rel="stylesheet" href="../css/upcycled-products-test.css">
</head>

<body>
 

<!-- navbar include -->
  <link rel="stylesheet" href="../css/navbar.css">
  <?php include 'inc/navbar.php' ?>



<div class=" text-center w-full mb-20 Heading">
  <div>
        <h3 class=" mb-4 Heading-main-h3">Login to buy these using points!</h3>
        <h1 class=" mb-4 Heading-main text-gray-900">OUR PRODUCTS</h1>
        <p class="text-base">It's Handicrafted, Upcycled and Vintage!</p>
</div>

 <div class="container">
 <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
     <?php foreach ($products as $product): ?>
        <div class="col p-5">
            <form action="<?php echo $buy_link; ?>" method="post">
                <div><img src="<?php echo $product['p_img_url'] ?>" alt=""></div>
                <h6><?php echo $product['pname'] ; ?></h6>
                <p><?php echo $product['ptype'] ; ?></p>
                <h5><?php echo $product['ppoints'] ; ?> points</h5>
                <input type="hidden" name="pid" value="<?php echo $product['pid'] ; ?>">
                <button  name="buy">BUY NOW</button>
            </form>
        </div>
        <?php endforeach; ?>
     </div>
 </div>

    
 </body>



<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>

 </html>
