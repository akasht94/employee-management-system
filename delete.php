<?php
include 'db.php';

/* Check ID */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

/* Delete Employee */
$stmt = mysqli_prepare($conn, "DELETE FROM employees WHERE id = ?");

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?msg=deleted");
    exit();
} else {
    echo "Error deleting employee: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
