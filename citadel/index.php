<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />

<head>
<title>Citadel</title>

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
    

<?php
include("./bookRender.php");
?>

<br></br>
<footer class="border-top footer text-white-50 bg-primary">
        <div class="container">
            &copy; 2021 - Citadel - <a href="" class="link-info text-white-50">Privacy</a>
        </div>
</footer>
        

</body>

</html>
