<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = isset($_POST['name'])?$_POST['name']:'';
$roll = isset($_POST['roll'])?$_POST['roll']:'';
$email = isset($_POST['email'])?$_POST['email']:'';
$dob = isset($_POST['dob'])?$_POST['dob']:'';

$file_name="";

$select = mysqli_query($conn, "SELECT `email` FROM `register` WHERE `email` = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    exit('This email is already being used');
}else{

	if(isset($_FILES['images'])){

	      $errors= array();
	      $file_name = $_FILES['images']['name'];
	      $file_size =$_FILES['images']['size'];
	      $file_tmp =$_FILES['images']['tmp_name'];
	      $file_type=$_FILES['images']['type'];

	/*      $file_ext=strtolower(end(explode('.',$_FILES['images']['name'])));
	      
	      $extensions= array("jpeg","jpg","png");
	      
	      if(in_array($file_ext,$extensions)=== false){
	         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	*/      
	      if($file_size > 2097152){
	         $errors[]='File size must be excately 2 MB';
	      }
	      
	      if(empty($errors)==true){
	         move_uploaded_file($file_tmp,"upload/".$file_name);
	      }
	   }
	   $sql = "INSERT INTO register (name, roll, email, dob, photo)
	   VALUES ('$name', '$roll', '$email', '$dob', '$file_name')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

}
?>