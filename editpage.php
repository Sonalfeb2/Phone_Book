<?php
include('connect.php');
$nameErr=$phnErr=$emailErr="";
if(isset($_POST['done']))
{
    // $name=$_POST['uname'];
    // $email=$_POST['email'];
    // $mobile=$_POST['mobile'];
	extract($_POST);
  $row=0;

    if(!preg_match("/^[A-Z][a-zA-Z ]+$/",$Name)){
        $nameErr="<span style='color:red'; >Only letters and white spaces allowed</span><br>";
        $row=$row+1;
    }
    if(!preg_match('/^[0-9]{10}+$/',$Phone_number)){
        $phnErr="<span style='color:red'; >Number should be in 10 digit  - . , </span><br>";
        $row=$row+1;
    }
    if(!preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $Email)){
        $emailErr="<span style='color:red'; >Email Should be in format .</span><br>";
        $row=$row+1;
    }
    if($row=0){
$sql=mysqli_query($conn,"UPDATE `contact` SET `Name`='$Name',`Email`='$Email',`Phone_number`='$Phone_number',`DOB`='$DOB' WHERE id='$id'");
if($sql)
  header("location:homepage.php");

}
}
$sql=mysqli_fetch_array(mysqli_query($conn,"select * from contact where id='$_GET[id]'"));
?>

<html>

<head>
<title>edit the contact</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap.css">

<style type="text/css">
  
   #box{
  

  
  
font-family:Times New Roman;
font-style: bold;


}
</style>
</head>
<body>
 


  <div class="col-lg-6 m-auto">
  <form method="post"><br><br><br>
  <div class="card" style="background-color: grey;">
  <div class="card-header bg-primary">
  <h6 class="text-dark"> RM-PHONEBOOK</h6></div><br>
  <div class="col-lg-4 m-auto bg-white">
    <label>Name:</label>
    <input type="hidden"name="id" class="text-dark" value="<?php echo $sql['id']; ?>"  required><br>
    
    <input type="text"name="Name" class="text-dark" value="<?php echo $sql['Name']; ?>" placeholder="Enter your name" required><br>
    <?php echo $nameErr;?>

    <label>Email :</label>
    <input type="text"  name="Email" placeholder="xyz@gmail.com" value="<?php echo $sql['Email']; ?>" class="text-dark" required><br>
    <?php echo $emailErr;?>

   <label> Mobile Number :</label>
   <input type="text" placeholder="xxxxxxxxxx"class="text-dark" value="<?php echo $sql['Phone_number']; ?>" name="Phone_number" required><br>
   <?php echo $phnErr;?>
    
   <label> DOB</label>
    <input type="date" name="DOB" value="<?php echo $sql['DOB']; ?>" required><br><br>

  <input type="submit" value="save" name="done"  class="btn-success">
  
  </div>
</div>
</form>
 </div>
  
</body>
</html>