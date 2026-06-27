<?php
include 'db.php';

$message = "";

if(isset($_POST['save']))
{
    $name = mysqli_real_escape_string($conn,$_POST['employee_name']);
    $department = mysqli_real_escape_string($conn,$_POST['department']);
    $designation = mysqli_real_escape_string($conn,$_POST['designation']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $salary = mysqli_real_escape_string($conn,$_POST['salary']);
    $joining = mysqli_real_escape_string($conn,$_POST['joining_date']);

    $sql = "INSERT INTO employees
    (employee_name,department,designation,email,phone,salary,joining_date)
    VALUES
    ('$name','$department','$designation','$email','$phone','$salary','$joining')";

    if(mysqli_query($conn,$sql))
    {
        header("Location:index.php?msg=added");
        exit();
    }
    else
    {
        $message = "Unable to save employee.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Add New Employee</h3>

</div>

<div class="card-body">

<?php
if($message!="")
{
    echo "<div class='alert alert-danger'>$message</div>";
}
?>

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" required>

</div>

<div class="col-md-6 mb-3">

<label>Department</label>

<select class="form-select" name="department" required>

<option>IT</option>

<option>HR</option>

<option>Finance</option>

<option>Sales</option>

<option>Marketing</option>

</select>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Designation</label>

<input type="text" class="form-control" name="designation" required>

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input type="email" class="form-control" name="email" required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Phone</label>

<input type="text" class="form-control" name="phone">

</div>

<div class="col-md-6 mb-3">

<label>Salary</label>

<input type="number" class="form-control" name="salary">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Joining Date</label>

<input type="date" class="form-control" name="joining_date">

</div>

</div>

<button class="btn btn-success" name="save">

Save Employee

</button>

<a href="index.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>