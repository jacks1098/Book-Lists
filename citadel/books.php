<?php
    session_start();
    if(isset($_SESSION['valid']) && $_SESSION['valid'] === 'true')
    {
        $HOST_NAME = "";
        $DB_USER = "";
        $DB_PASSWORD = "";
        $DB_NAME = "";
        $conn = mysqli_connect("","","","");

        $query = "SELECT * FROM books";
        $result = $conn->query($query);
        $arr_users = [];
		if ($result->num_rows > 0)
        {
    		$arr_books = $result->fetch_all(MYSQLI_ASSOC);
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    
    <?php
        include("./shared/addCSSJS.html");
    ?>
    
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
</head>
<body>

    <header>
        <?php
           include("./_navbar.php");
        ?>
    </header>
<hr>

<div class="p-4 border rounded">
    <table id="bookTable" class="table table-striped table-bordered text-center table-responsive" style="width:100%">
        <thead>
        	<tr class="table-primary">
            <th>Book Title</th>
            <th>Auhtor Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($arr_books))
                { 
            ?>
                    <?php 
                        foreach($arr_books as $book)
                        { 
                    ?>
                        <tr>
                            <td><?php echo $book['title']; ?></td>
                            <td><?php echo $book['author']; ?></td>
                            <td>  <div class="text-center">
                                <a href="./editBook.php?id=<?php echo $book['id']; ?>" class="btn btn-success text-white" style="cursor:pointer;">
                                    EDIT
                                </a>
                                <a href="./deleteBook.php?id=<?php echo $book['id']; ?>"  class="btn btn-danger text-white" style="cursor:pointer;">
                                    DELETE
                                </a>
                            </td>
                        </tr>
                    <?php 
                        } 
                    ?>
            <?php 
                } 
            ?>
        </tbody>
    </table>
</div>
<br></br>

<footer class="border-top footer text-white-50 bg-primary">
        <div class="container">
            &copy; 2021 - Citadel - <a href="" class="link-info text-white-50">Privacy</a>
        </div>
</footer>
        

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function()
    {
        $('#bookTable').DataTable();
    });
</script>
</body>
</html>

<?php
}
else
{
	header('Location: gateway.php');
}
?>