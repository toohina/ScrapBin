<?php
      session_start();
      if(isset($_SESSION['id'])){
                        require('config/db.php');

     

                        if(isset($_POST['submit'])){
                        //update
                        $name=$_POST['name'];
                        $pwd=$_POST['password'];
                        $address=$_POST['address'];
                        $city=$_POST['city'];
                        $state=$_POST['state'];
                        $pin=$_POST['pincode'];
                        $mobile=$_POST['mobile'];
                        $evs=$_POST['evs'];



                        $query="UPDATE customer SET 
                        cname='$name',
                        cpwd='$pwd',
                        caddress='$address',
                        ccity='$city',
                        cstate='$state',
                        cpincode='$pin',
                        cmobile='$mobile',
                        isenvironmentalist='$evs'
                        WHERE cid={$_SESSION['id']}";

                        if(mysqli_query($conn,$query)){
                              $_SESSION['name']=$name;      
                              header('Location:home.php');
                        }else{
                              echo "ERROR:".mysqli_error($conn);
                        }
             
    }else{

      $query='SELECT * FROM customer WHERE cid="'.$_SESSION['id'].'"';
      $result=mysqli_query($conn,$query);
      $customer=mysqli_fetch_all($result, MYSQLI_ASSOC);
      mysqli_free_result($result);
      $cid=$customer[0]['cid'];
      $cname=$customer[0]['cname'];
      $cemail=$customer[0]['cemail'];
      $cpwd=$customer[0]['cpwd'];
      $caddress=$customer[0]['caddress'];
      $ccity=$customer[0]['ccity'];
      $cstate=$customer[0]['cstate'];
      $cpincode=$customer[0]['cpincode'];
      $cmobile=$customer[0]['cmobile'];
      $cpoints=$customer[0]['cpoints'];
      $evs=$customer[0]['isenvironmentalist'];

      $yes_status="unchecked";
      $no_status="unchecked";

      if($evs=="Yes"){
            $yes_status="checked";
      }else{
            $no_status="checked";
      }
          
    }

     

      }else{
          header('Location:sign-in.php');
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
  <link rel="stylesheet" href="../css/profile.css">

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
  <section class="profile">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mx-auto">
  <div class="col">
        <h6>Name:</h6>
        <input type="text" name="name"   pattern="[a-zA-Z ]*" value="<?php echo $cname; ?>" class="form-control" title="This field should only contain letters" required>
        <h6>Email:</h6>
        <input type="email" name="email" value="<?php echo $cemail; ?>" class="form-control" disabled>
        <h6>Password:</h6>
        <input type="password" name="password" value="<?php echo $cpwd; ?>" class="form-control" required>
        <h6>Address:</h6>
        <textarea name="address"  class="form-control" required><?php echo $caddress; ?></textarea>
        <h6>City:</h6>
        <input type="text" name="city" pattern="[a-zA-Z ]*" value="<?php echo $ccity; ?>" class="form-control" required>   
  </div>
  <div class="col">
        <h6>State:</h6>
        <input type="text" name="state" pattern="[a-zA-Z ]*"  value="<?php echo $cstate; ?>" class="form-control" required>
        <h6>Pincode:</h6>
        <input type="text" name="pincode" pattern="[0-9]{6}" title="Please enter a six digit pincode" value="<?php echo $cpincode; ?>" class="form-control" required>
        <h6>Mobile:</h6>
        <input type="text" name="mobile" pattern="[7-9]{1}[0-9]{9}" title="Please Enter Valid Mobile Number"value="<?php echo $cmobile; ?>" class="form-control" required>
        <h6>Points:</h6>
        <input type="text" name="points" value=<?php echo $cpoints; ?> class="form-control" disabled>
        <h6>Are you an Environmentalist?(Yes/No) :</h6>
        <!-- <input type="text" name="evs"  class="form-control" required value="<?php echo $evs; ?>"> -->
        <input type="radio" id="Yes" name="evs" value="Yes" required <?php echo $yes_status?>>
        <label for="Yes">Yes</label><br>
        <input type="radio" id="No" name="evs" value="No" <?php echo $no_status?>>
        <label for="No">No</label><br>
  </div>
  <div class="col m-auto">
  <button type="submit" name="submit" class="btn btn-success">SAVE EDIT</button>
  </div>
  </div>

  </form>
  
</section>
</body>
<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>
