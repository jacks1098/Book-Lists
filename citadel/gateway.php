<?php
if (isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$code = $_POST['code'];
    // add credentials so you restrict CRUD operation
    $user_name = '';
    $password = '';

	if($uname == $user_name && $code == $password)
    {
		session_start();
		$_SESSION['valid'] = 'true';
        header('Location: index.php');
	}
	else
    {
		header('Location: gateway1.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />

<head>
<title>Gateway-2.0.9</title>
<?php
include("./shared/addCSSJS.html");
?>
</head>

<body>
    <header>
        <?php
           include("./_navbar.php");
        ?>
    </header>
    
<p class="text-danger p-3">You are not supposed to be here...</p>

<div class="row p-3">
    <div class="col-md-4">
        <form action="" method="post" class="form">

            <div class="container">
  	            <div class="form-group">
  		            <p>
                        <label for="uname"><b>Mobile Number</b></label>
                        <input class="form-control" type="text" placeholder="Enter Mobile Number" name="uname" required>
                    </p>
                </div>

                <div class="form-group">
                    <p>
                    <label for="psw"><b>OTP</b></label>
                    <input class="form-control" type="password" placeholder="Enter OTP" name="code" required>
                </p>
                </div>

                <button type="submit" class="btn btn-danger" name="submit">Login</button>
            </div>
        </form>
    </div>
</div>
<br></br>

<footer class="border-top footer text-white-50 bg-primary">
        <div class="container">
            &copy; 2021 - Citadel - <a href="" class="link-info text-white-50">Privacy</a>
        </div>
</footer>
        
</body>
</html>

