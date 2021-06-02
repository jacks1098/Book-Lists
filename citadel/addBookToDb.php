<?php 
if (isset($_POST['submit']) || !empty($_POST['submit']))
{
	$target_dir = "./images/";

	if(!empty($_FILES['cover']['name']))
 	{
    	$target_file = $target_dir . basename($_FILES["cover"]["name"]);
    	$uploadOk = 1;
    	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
 	}
 	
	$HOST_NAME = "";
	$DB_USER = "";
	$DB_PASSWORD = "";
	$DB_NAME = "";
	$conn = mysqli_connect("","","","");

	// Check connection
	if($conn === false)
	{
		die("ERROR: Could not connect. ". mysqli_connect_error());
	}
		
	// Taking all 6 values from the form data(input)
	$title = $_POST['title'];
	$author = $_POST['author'];
	$desc = $_POST['desc'];
	$review = $_POST['review'];
	$price = $_POST['price'];
	$readDate = $_POST['readDate'];
	$id = $_POST['id'];
 		
 	if(!empty($_FILES['cover']['name']))
 	{
 		$check = getimagesize($_FILES["cover"]["tmp_name"]); 
 	}
 	else
	{
 	    $check = false;
 	}

 	if($check != false)
 	{
 		$target_file = $target_file.rand();
 	}

 	if ($check != false && move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file))
 	{
	    if($id != 0)
		{
			$sql = "update books 
			    	set title='$title',
			    		author='$author',
			    		disc='$desc',
			    		review='$review',
			    		price='$price',
			    		readDate='$readDate',
			    		imagePath='$target_file'
			    	where id=$id";
		}
		else
		{
			$sql = "INSERT INTO books (title,author,disc,review,readDate,price,imagePath) VALUES ('$title','$author','$desc','$review','$readDate','$price','$target_file')";
		}
	}
	else
	{
		if($id != 0)
		{
			$sql = "update books 
			    	set title='$title',
			    		author='$author',
			    		disc='$desc',
			    		review='$review',
			    		price='$price',
			    		readDate='$readDate'
			    	where id=$id";				
		}
		else
		{
			$sql = "INSERT INTO books (title,author,disc,review,readDate,price) VALUES ('$title','$author','$desc','$review','$readDate','$price')";					
		}
	}

	if(mysqli_query($conn, $sql))
	{
	   	mysqli_close($conn);
		header('Location: index.php');
	}
	else
	{
		mysqli_close($conn);
		header('Location: addBookToDb.php');
	}
			
}
?>