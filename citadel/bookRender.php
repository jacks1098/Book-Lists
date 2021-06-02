<h1>Book Catalogue</h1>
<div class="row p-3 backgroundWhite">
    <?php
        include("./shared/addCSSJS.html");
        
        $HOST_NAME = "";
        $DB_USER = "";
        $DB_PASSWORD = "";
        $DB_NAME = "";
        $conn = mysqli_connect("","","","");

        $query = "SELECT * FROM books";
        $results = mysqli_query($conn, $query);
        foreach ($results as $row) 
        {
    ?>

            <div class="col-lg-3 col-md-6">
                <div class="row p-2">
                    <div class="col-12  p-1" style="border:1px solid #008cba; border-radius: 5px;">
                        <div class="card" style="border:0px;">
                            <img src="<?php echo $row['imagePath'] ?>"" class="card-img-top rounded" height="350" />
                            <div class="pl-1">
                                <p class="card-title h5"><b style="color:#2c3e50"><?php echo  $row['title'] ?></b></p>
                                <p class="card-title text-primary">by <b> <?php  echo $row['author'] ?></b></p>
                            </div>
                            <div>
                                <p style="color:maroon">Price <b class=""><?php echo $row['price'] ?> ₹</b></p>
                            </div>
                        </div>
                        <a  class="btn btn-primary form-control" href="./bookDetails.php?id=<?php echo $row['id'] ?>">Details</a>
                    </div>
                </div>
            </div>

    <?php
        }
    ?>
</div>
