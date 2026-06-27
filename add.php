<?php
include 'db.php';

$message = "";

if(isset($_POST['save']))
{
    $employee_name = trim($_POST['employee_name']);
    $department    = trim($_POST['department']);
    $designation   = trim($_POST['designation']);
    $email         = trim($_POST['email']);
    $phone         = trim($_POST['phone']);

    $salary = ($_POST['salary'] == "") ? NULL : $_POST['salary'];
    $joining_date = ($_POST['joining_date'] == "") ? NULL : $_POST['joining_date'];

    $stmt = mysqli_prepare($conn,
    "INSERT INTO employees
    (employee_name, department, designation, email, phone, salary, joining_date)
    VALUES (?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param(
        $stmt,
        "sssssss",
        $employee_name,
        $department,
        $designation,
        $email,
        $phone,
        $salary,
        $joining_date
    );

    if(mysqli_stmt_execute($stmt))
    {
        header("Location: index.php?msg=added");
        exit();
    }
    else
    {
        $message = mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Add Employee</h3>

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

<label class="form-label">Employee Name</label>

<input
type="text"
name="employee_name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Department</label>

<select
name="department"
class="form-select"
required>

<option value="">Select Department</option>
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

<label class="form-label">Designation</label>

<input
type="text"
name="designation"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Phone</label>

<input
type="text"
name="phone"
class="form-control"
placeholder="9876543210">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Salary</label>

<input
type="number"
step="0.01"
name="salary"
class="form-control"
placeholder="50000">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Joining Date</label>

<input
type="date"
name="joining_date"
class="form-control">

</div>

</div>

<button
type="submit"
name="save"
class="btn btn-success">

Save Employee

</button>

<a
href="index.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>
