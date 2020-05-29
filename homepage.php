<?php
include('connect.php');
if(isset($_GET['id']))
{
	mysqli_query($conn,"delete from contact where id='$_GET[id]'");
	header("location:homepage.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	
</head>
<body>
	<center><div class="container">
	<form action="homepage.php" method="post">	<br><br><br>
		Search:<input type="text" name="search" style="border: 1px solid black">
		<input type="hidden" name="searches" value="search" style="border: 1px solid black">
		<input type="submit" class="btn btn-success" name="submit" value="search">
		<a class="btn btn-secondary" href="homepage.php?all=all">All Contact</a>
		<a href="addcontact.php" class="btn btn-outline-success badge-success ">ADD NEW CONTACT</a></td>

		</form>
	</div></center>
	<br>

        <?php
        if(isset($_POST['searches']) and !isset($_GET['all']))
        {
        $row=mysqli_query($conn,"select * from contact where Name LIKE '$_POST[search]%' or Email='$_POST[search]%'or Phone_number='$_POST[search]%'or DOB='$_POST[search]%'"
                          );

        }
        else
        {
        $row=mysqli_query($conn,"select * from contact");

        }
		while($sql=mysqli_fetch_array($row))
		{
           
        ?>
<div class="container col-6 badge-dark m-auto">
        <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $sql['Name'];?></button><br><br>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#"><?php echo $sql['Email'];?></a>
    <a class="dropdown-item" href="#"><?php echo $sql['Phone_number'];?></a>
    <a class="dropdown-item" href="#"><?php echo $sql['DOB'];?></a>
    <a href="editpage.php?id=<?php echo $sql['id']; ?>"><button   class="btn btn-outline-success badge-success ">Edit</button></a>
	<a href="homepage.php?id=<?php echo $sql['id']; ?>"><button   class="btn btn-outline-success badge-success ">Delete</button></a>
  </div>
  </div>
</div>

  <?php
	}
?>
</body>
</html>