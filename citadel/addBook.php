<?php
session_start();
if(isset($_SESSION['valid']) && $_SESSION['valid'] === 'true')
{	
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
      
<?php
include("./shared/addCSSJS.html");
?>

<head>
	<title >Add Book</title>
</head>

<body>
	<header>
		<?php
           include("./_navbar.php");
        ?>
    </header>
    
	<h1 class="p-3">Add Book</h1>
	<div class="row p-3">
    	<div class="col-md-4">
			<form action="addBookToDb.php" method="post" id="submit" class="form" enctype="multipart/form-data">
				
				<div class="form-group">
				<p>
					<label for="title">Title:</label>
					<input type="text" name="title" id="title" class="form-control">
				</p>
				</div>

				<div class="form-group">
				<p>
					<label for="author">Author Name:</label>
					<input type="text" name="author" id="author" class="form-control">
				</p>
				</div>

				<div class="form-group">
				<p>
					<label for="desc">Description:</label>
					<input type="textbox" name="desc" id="desc" class="form-control">
				</p>
				</div>
			
				<div class="form-group">
				<p>
					<label for="review">Review:</label>
					<input type="textbox" name="review" id="review" class="form-control">
				</p>
				</div>

				<div class="form-group">
				<p>
					<label for="review">Date of Read:</label>
					<input type="date" name="readDate" id="readDate" class="form-control">
				</p>
				</div>

				<div class="form-group">
				<p>
					<label for="review">Price:</label>
					<input type="text" name="price" id="price" class="form-control">
				</p>
				</div>		
			
				<div class="form-group">
				<p>
					<label for="cover">Cover Image:</label>
					<input type="file" name="cover" id="cover" class="form-control">
				</p>
				</div>

				<input type="hidden" name="id" value="0"/>
				<input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary">
			</form>
		</div>
	</div>

	<br></br><br>

	<footer class="border-top footer text-white-50 bg-primary">
        <div class="container">
            &copy; 2021 - Citadel - <a href="" class="link-info text-white-50">Privacy</a>
        </div>
    </footer>

</body>
</html>

<?php
}
else
{
	echo isset($_SESSION['valid']);
	header('Location: gateway.php');
}
?>
