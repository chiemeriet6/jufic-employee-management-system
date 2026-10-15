<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $department = $_POST["department"];
    $position = $_POST["position"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO employees (name, department, position, phone)
            VALUES ('$name', '$department', '$position', '$phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | Jufic Aluminium & Allied Ltd.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
    <h1>JUFIC ALUMINIUM & ALLIED LTD.</h1>
    <p>SYSTEM METAL COMPLEX, IDU INDUSTRIAL AREA</p>
</header>

<main class="container">

    <section class="page-title">
        <h2>Add New Employee</h2>
        <p>Enter the details of the employee to add a new record.</p>
    </section>

    <section class="form-card">
        <form method="POST" action="">

            <div class="form-group">
             <label for="name">Employee Name</label>
             <input type="text" id="name" name="name"
               placeholder="Enter employee's full name"
               required>
            </div>

            <div class="form-group">
             <label for="department">Department</label>
             <input type="text" id="department" name="department"
               placeholder="Enter department"
               required>
            </div>

            <div class="form-group">
             <label for="position">Position</label>
             <input type="text" id="position" name="position"
               placeholder="Enter job position"
               required>
            </div>

            <div class="form-group">
             <label for="phone">Phone Number</label>
             <input type="tel" id="phone" name="phone"
               placeholder="Enter phone number"
               maxlength="20"
               oninput="this.value = this.value.replace(/[^0-9+ -]/g, '')"
               required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                  Save Employee
                </button>

                <a href="index.php" class="btn btn-secondary">
                  ← Back to Employee List
                </a>
            </div>

        </form>
    </section>

</main>

<footer class="footer">
    &copy; <?php echo date("Y"); ?> Jufic Aluminium & Allied Ltd. All rights reserved.
</footer>

</body>
</html>