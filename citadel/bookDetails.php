<?php
    $id = $_GET['id'];
    if($id == null)
    {
        echo "Invalid Command";
    }
    else
    {
	    $HOST_NAME = "";
	    $DB_USER = "";
	    $DB_PASSWORD = "";
	    $DB_NAME = "";
	    $conn = mysqli_connect("","","","");

        $query = "SELECT * FROM books where id=".$id;
        $result = mysqli_query($conn, $query);
        $book = mysqli_fetch_object($result);
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citadel</title>
    
    <?php
        include("./shared/addCSSJS.html");
    ?>

</head>
<body class="">
    
    <header>
        <?php
           include("./_navbar.php");
        ?>
    </header>

    <?php
        if($result != null)
        {
    ?>

    <form>
        <div class="row p-3 border">
            <div class="col-12 border-bottom">
                <h2 class="text-primary"><?php echo $book->title ?></h2>
                <input type="hidden" asp-for="Product.Id" />
            </div>
            <br />

            <div class="col-8 pt-4">
                <div class="form-group row">
                    <div class="col-4">
                        <label>Book Title</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" value = "<?php echo $book->title ?>" readonly/>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <div class="col-4">
                        <label>Author Name</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" value = "<?php echo $book->author ?>" readonly/>
                        <span  class="text-danger"></span>
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <div class="col-4">
                        <label>Book Description</label>
                    </div>
                    <div class="col-8">
                        <textarea  class="form-control" readonly><?php echo $book->disc ?></textarea>
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <div class="col-4">
                        <label>Book Review</label>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control" readonly><?php echo $book->review ?></textarea>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <div class="col-4">
                        <label>Date of Read</label>
                    </div>
                    <div class="col-8">
                                    <input class="form-control" value = "<?php echo $book->readDate ?>" readonly/>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <div class="col-4">
                        <label>Book Price</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" value = "<?php echo $book->price ?>" readonly/>
                        <span  class="text-danger"></span>
                    </div>
                </div>
                <br />

            </div>

            <div class="col-3 offset-1 pt-4">
                <img src="<?php echo $book->imagePath ?>" width="100%" style="border-radius:5px; border: 1px solid #bbb9b9" />
            </div>

        </div>
    </form>

    <?php
        }
        else
        {
    ?>

    <p>No Data Found</p>

    <?php
        }
    ?>

    <br></br>

    <footer class="border-top footer text-white-50 bg-primary">
        <div class="container">
            &copy; 2021 - Citadel - <a href="" class="link-info text-white-50">Privacy</a>
        </div>
    </footer>
        
</body>
</html>
