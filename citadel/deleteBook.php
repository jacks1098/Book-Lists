<?php
session_start();
if(isset($_SESSION['valid']) && $_SESSION['valid'] === 'true')
{
  $id = $_GET['id'];
  if($id == null)
  {
  }
  else
  {
    $HOST_NAME = "";
    $DB_USER = "";
    $DB_PASSWORD = "";
    $DB_NAME = "";
    $conn = mysqli_connect("","","","");

    $query = "select imagePath from books where id=".$id;
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_object($result);
    
    if($result != null && file_exists($book->imagePath))
    {
      unlink($book->imagePath);
    }        
        
    $query = "delete  FROM books where id=".$id;
    $result = mysqli_query($conn, $query);
    header('Location: books.php');
  }
}
?>