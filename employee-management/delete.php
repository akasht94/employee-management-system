<?php
include 'db.php';

// Check if ID is passed
if(isset($_GET['id']))
{
    $id = intval($_GET['id']);

    $sql = "DELETE FROM employees WHERE id = $id";

    if(mysqli_query($conn,$sql))
    {
        header("Location:index.php?msg=deleted");
        exit();
    }
    else
    {
        echo "<h3>Unable to delete employee.</h3>";
    }
}
else
{
    header("Location:index.php");
}
?>