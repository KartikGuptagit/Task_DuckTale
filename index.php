<?php include("connection.php");
error_reporting(0);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Task</title>
</head>
<body>

	<div class="container">
		<form action="#" method="POST"  enctype="multipart/form-data">

     <div class="input_field">
      <label>Name</label>
      <input type="text" class="input" name="name" autocomplete="off">
    </div><br>

    <div class="hobbies">
      <label>Hobbies</label><br><br>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Playing">
      <label for="hobbies"> Playing</label><br>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Reading">
      <label for="hobbies"> Reading</label><br>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Singing">
      <label for="hobbies"> Singing</label><br><br>
    </div>

    <div class="input_field">
      <label>Upload Image</label>
      <input type="file" class="input" name="uploadfile">
    </div>

    <div class="input_field">
     <input type="submit" value="submit" class="btn" name="submit">
   </div>
 </form>
</div>

</body>
</html>


<?php


if(isset($_POST['submit']))
{

  $name=$_POST['name'];
  $hobbies=$_POST['hobbies'];
  $check=implode(",",$hobbies);
 // echo $check;
  $filename=$_FILES["uploadfile"]["name"];
  $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="student/".$filename;
  move_uploaded_file($tempname,$folder);



  $query="INSERT INTO user_records(name,hobbies,image) values('$name','$check','$folder')";

  $data=mysqli_query($conn,$query);


  if($data)
  {
    echo "data inserted into database";

   header('Location:display.php');
    
  }
  else
  {
    echo "failed";
  }
}
?> 