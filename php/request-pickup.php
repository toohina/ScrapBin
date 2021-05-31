<?php

    session_start();
    if(isset($_SESSION['id'])){
        require('config/db.php');
        $query='SELECT * FROM customer WHERE cid="'.$_SESSION['id'].'"';
        $result=mysqli_query($conn, $query);
        $customer=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        $name=$customer[0]['cname'];
        $email=$customer[0]['cemail'];
        $address=$customer[0]['caddress'];
        $city=$customer[0]['ccity'];
        $state=$customer[0]['cstate'];
        $pin=$customer[0]['cpincode'];
        $mobile=$customer[0]['cmobile'];
        $disable="disabled";
        $msg="NOTE: To edit Profile information go to profile.";

        //Check for submit
        if(filter_has_var(INPUT_POST,'submit')){
            //Get Form Data
            $qty=$_POST['qty'];
            $type=$_POST['type'];
            $date=$_POST['date'];
            $id=$_SESSION['id'];
            $query="insert into  reg_seller(cid,quantity,type,date) values($id,$qty,'$type','$date')";
            if(mysqli_query($conn,$query)){

                $query='SELECT * FROM customer WHERE cid="'.$_SESSION['id'].'"';
                $result=mysqli_query($conn, $query);
                $customer=mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                $evs=$customer[0]['isenvironmentalist'];
                $points=$customer[0]['cpoints'];
                
                if($evs=="Yes"){
                    $points = $points + 500;
                }else{
                    $points = $points + 100;
                }
                
                $update_points_query = "update customer set cpoints='$points' where cid={$_SESSION['id']}";

                            if(mysqli_query($conn,$update_points_query)){
                                    $_SESSION['name']=$name;      
                                    header('Location:request-pickup-success.php?');
                            }else{
                                    echo "ERROR:".mysqli_error($conn);
                            }

             
            }else{
                echo "ERROR:".mysqli_error($conn);
            }
        }
    }else{
        $name="";
        $email="";
        $address="";
        $city="";
        $state="";
        $pin="";
        $mobile="";
        $disable="required";
        $msg="";


        //Check for submit
        if(filter_has_var(INPUT_POST,'submit')){
            //Get Form Data
            $name=$_POST['name'];
            $email=$_POST['email'];
            $qty=$_POST['qty'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $pin=$_POST['pin'];
            $mobile=$_POST['mobile'];
            $date=$_POST['date'];
            $type=$_POST['type'];

            require('config/db.php');
            $query="insert into  unreg_seller(uname,uemail,uaddress,ucity,ustate,upincode,umobile,quantity,type,date) values('$name','$email','$address','$city','$state',$pin,$mobile,$qty,'$type','$date')";
            if(mysqli_query($conn,$query)){
             
                header('Location:request-pickup-success.php');
            }else{
              
                echo "ERROR:".mysqli_error($conn);
            }
        }
    }

 
   
    //pickup date 
    $pickup_date=date("Y-m-d",strtotime("tomorrow"));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Pickup</title>

 
 
 <!-- font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">


  <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- custom css -->
    <link rel="stylesheet" href="../css/request-pickup.css">

</head>
<body>

<!-- navbar include -->

  <link rel="stylesheet" href="../css/navbar.css">
  <?php include 'inc/navbar.php' ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>REQUEST PICKUP</h1>

       
        <div class="request-pickup-form px-3 py-5 p-sm-5 mt-5">
       
            <div class="row row-cols-1 row-cols-md-2 g-5">
                <div class="col">
                    <h6>Name: </h6>
                    <!-- pattern="[a-zA-Z ]*" -->
                    <input type="text" pattern="[a-zA-Z ]*" name="name" value="<?php echo $name;?>" class="col-12"  title="This field should only contain letters" <?php echo $disable; ?> >
                    <h6>Email: </h6>
                    <input type="email" name="email"  id="" value="<?php echo $email;?>" class="col-12" <?php echo $disable;?> >
                    <h6>Approx Quantity (in Kgs): </h6>
                    <input type="text" pattern="[0-9]+([.][0-9]+)?" title="Example: 0.25" name="qty" value="" id="" class="col-12" required>
                    <h6>Type/types of waste: </h6>
                    <textarea name="type"  id="" cols="20" class="col-12" required></textarea>
                    <h6>Address: </h6>
                    <textarea name="address"  id="" cols="20" class="col-12" <?php echo $disable;?>><?php echo $address;?></textarea>
                    <h6>City: </h6>
                    <input type="text" pattern="[a-zA-Z ]*" title="This field should only contain letters" name="city" value="<?php echo $city;?>" class="col-12" <?php echo $disable;?>>
                </div>
                <div class="col">
                    <h6>State: </h6>
                    <input type="text" pattern="[a-zA-Z ]*" title="This field should only contain letters" class="col-12" name="state" value="<?php echo $state;?>" <?php echo $disable;?>>
                    <h6>Pincode: </h6>
                    <input type="text" pattern="[0-9]{6}" title="Please enter a six digit pincode" class="col-12" name="pin" value="<?php echo $pin;?>"<?php echo $disable;?>>
                    <h6>Mobile Number: </h6>
                    <input type="text"  pattern="[7-9]{1}[0-9]{9}" title="Please Enter Valid Mobile Number" class="col-12" name="mobile" value="<?php echo $mobile;?>" <?php echo $disable;?>>
                    <h6>Appointment Date: </h6>
                    <input type="date" class="col-12" name="date" min="<?php echo $pickup_date; ?>" required>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-style col-12" name="submit">Pickup!</button>
                    </div>
                    <h5 class="pt-2"><?php echo $msg?></h5>
                </div>
            </div>
        </div>

      
           
           
        </form>
    </div>
   


</body>


<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>

</html>