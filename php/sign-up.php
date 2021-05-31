<?php
  require('config/db.php');
	$msg="";
	$flag=0;
	$yes_status="unchecked";
	$no_status="unchecked";

	if(isset($_POST['submit'])) {
		$evs=$_POST['evs'];
		if($evs=="Yes"){
			$yes_status="checked";
		}else{
			$no_status="checked";
		}
		
		
		$fname=mysqli_real_escape_string($conn,$_POST['fname']);
		$lname=mysqli_real_escape_string($conn,$_POST['lname']);
		$name=$fname." ".$lname;
		$city=$_POST['city'];
		$state=$_POST['state'];
		if((!preg_match("/^[a-zA-Z ]*$/",$name))||(!preg_match("/^[a-zA-Z ]*$/",$city))||(!preg_match("/^[a-zA-Z ]*$/",$state))) {
		$msg.= "Invalid format ( Only letters and white space allowed in name, city, state fields )<br>";
		$flag=1;
		}
		
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg.= "Invalid email address<br>";
		$flag=1;
		}
		
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		
		$city=mysqli_real_escape_string($conn,$_POST['city']);
		
		$state=mysqli_real_escape_string($conn,$_POST['state']);
		
		$pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
		if(!preg_match("/^[1-9]{1}[0-9]{5}$/",$pincode)) {
		$msg.="Invalid pincode<br>";
		$flag=1;
		}
		
		$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
		if(!preg_match("/^[6-9]{1}[0-9]{9}$/",$mobile)) {
		$msg.="Invalid mobile number<br>";
		$flag=1;
		}
		
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
		$len=strlen($pwd);
		if($len<8) {
		$msg.="Password length must be at least 8 characters<br>";
		$flag=1;	
		}
		else if($len>25) {
		$msg.="Password length must not be greater than 25 characters<br>";
		$flag=1;
		}
		
		$cpwd=mysqli_real_escape_string($conn,$_POST['cpwd']);
		if($pwd!=$cpwd) {
		$msg.="Passwords do not match<br>";
		$flag=1;	
		}
		
		$sql="select * from customer order by cid desc limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_assoc($result);
			$last_id=$row["cid"];
			$id=$last_id + 1;
		}
		else
		{
			$id=1;
		}
		if($flag==0)
		{
			$query="insert into customer (cname,cemail,cpwd,caddress,ccity,cstate,cpincode,cmobile,cpoints,isenvironmentalist) values ('$name','$email','$pwd','$address','$city','$state',$pincode,$mobile,0,'$evs')";
			if(mysqli_query($conn,$query))
			{ 
				// $msg= "Signed Up successfully";
				// $flag=2;
				$query='SELECT * FROM customer WHERE cemail="'.$email.'" and cpwd="'.$pwd.'"';
				$result=mysqli_query($conn, $query);
				$customer=mysqli_fetch_all($result, MYSQLI_ASSOC);
				mysqli_free_result($result);
				mysqli_close($conn);
				session_start(); //Start the session
				$_SESSION['id']=$customer[0]['cid'];
				$_SESSION['name']=$customer[0]['cname'];
				header('Location:home.php');
			}
			else
			{
				$f=0;
				$q="select * from customer";
				$result=mysqli_query($conn,$q);
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$em=$row['cemail'];
						if($em==$email)
						{
							$msg="User email already exists";
							$f=1;
							break;
						}
					}
				}
				if($f=0)
					$msg="Please try again";
				$flag=1;
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Sign up</title>

<?php 
// bootstrap css
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>";

//custom css
echo "<link rel='stylesheet' href='../css/sign-up.css'>"; 

//font awesome
echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>"; ?>

</head>
<body>
   
 <!-- navbar include -->
 <link rel="stylesheet" href="../css/navbar.css">
  <?php include 'inc/navbar.php' ?>

 <main class="form-signin">
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
	  <?php
			if($flag==1)
			{	?>
				<div id = "alertId" class="alert alert-danger">
					<?php echo $msg; ?>
				</div>
		<?php	}
			if($flag==2)
			{
				?>
				<div id = "alertId" class="alert alert-success">
					<?php echo $msg; ?>
				</div>
		<?php	}	
				?>
<div class="container">
<div class="row row-cols-1 row-cols-md-2 g-5">

<div class="col">
<input type="text" id="FirstName" name="fname" class="form-control" placeholder="First Name" value="<?php echo $flag==1 ? $fname : ''; ?>" required autofocus="">
<input type="text" id="FirstName" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $flag==1 ? $lname : ''; ?>" autofocus="">
<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?php echo $flag==1 ? $email : ''; ?>" required autofocus="">
<input type="text" id="Address" name="address" class="form-control" placeholder="Address" value="<?php echo $flag==1 ? $address : ''; ?>" required autofocus="">
<input type="text" id="City" name="city" class="form-control" placeholder="City" value="<?php echo $flag==1 ? $city : ''; ?>" required autofocus="">
<input type="text" id="State" name="state" class="form-control" placeholder="State" value="<?php echo $flag==1 ? $state : ''; ?>" required autofocus="">
<input  type="text"  title="Please enter a six digit pincode" id="Pincode" name="pincode" class="form-control" placeholder="Pincode" value="<?php echo $flag==1 ? $pincode : ''; ?>" required autofocus="">
<input type="text"  pattern="[7-9]{1}[0-9]{9}" title="Please Enter Valid Mobile Number" id="Mobile" name="mobile" class="form-control" placeholder="Mobile Number" value="<?php echo $flag==1 ? $mobile : ''; ?>" required autofocus="">
</div>

<div class="col">
<p>Do you want to become an environmentalist?</p>
<!-- <input type="text" placeholder="yes/no" name="evs" class="form-control" required> -->
<input type="radio" id="Yes" name="evs" value="Yes" required <?php echo $yes_status;?>>
<label for="Yes">Yes</label><br>
<input type="radio" id="No" name="evs" value="No" <?php echo $no_status;?>>
<label for="No">No</label><br>
<a href="how-we-work.php">What is an environmentalist?</a>
<input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" value="<?php echo $flag==1 ? $pwd : ''; ?>" required> 
<input type="checkbox" onclick="myFunction()"> Show Password
<input type="password" id="inputPassword" name="cpwd" class="form-control" placeholder="Confirm Password" value="<?php echo $flag==1 ? $cpwd : ''; ?>" required>

<div class="checkbox mb-3">
<label>
<a href="sign-in.php">Already have an account?Signin!</a>
</label>
</div>

<br><input type="submit" class="w-100 btn btn-lg btn-primary signinBut" name="submit">
<br>
<br>

</div>

</div>

</div>
			
    </form>
  </main>



</body>

<script>
function myFunction() {
  var x = document.getElementById("inputPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


<!-- footer include -->
<link rel="stylesheet" href="../css/footer.css" type="text/css">
<?php include "inc/footer.php" ?>

</html>
