<?php
include "db.php";

if (!isset($_GET["id"])) {
    die("No employee selected.");
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $department = $_POST["department"];
    $position = $_POST["position"];
    $phone = $_POST["phone"];

    $sql = "UPDATE employees 
            SET name='$name',
                department='$department',
                position='$position',
                phone='$phone'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating employee: " . $conn->error;
    }
}

$sql = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Employee not found.");
}

$employee = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Employee | Jufic Aluminium & Allied Ltd.</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
    <h1>JUFIC ALUMINIUM & ALLIED LTD.</h1>
    <p>SYSTEM METAL COMPLEX, IDU INDUSTRIAL AREA</p>
</header>

<main class="container">

    <section class="page-title">
        <h2>Edit Employee</h2>
        <p>Update the employee's information and save the changes.</p>
    </section>

    <section class="form-card">

        <form method="POST" action="">

            <div class="form-group">
                <label for="name">Employee Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?php echo htmlspecialchars($employee['name']); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input
                    type="text"
                    id="department"
                    name="department"
                    value="<?php echo htmlspecialchars($employee['department']); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input
                    type="text"
                    id="position"
                    name="position"
                    value="<?php echo htmlspecialchars($employee['position']); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    maxlength="20"
                    value="<?php echo htmlspecialchars($employee['phone']); ?>"
                    oninput="this.value = this.value.replace(/[^0-9+ -]/g, '')"
                    required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>

                <a href="index.php" class="btn btn-secondary">
                    &larr; Back to Employee List
                </a>
            </div>

        </form>

    </section>

</main>

<footer class="footer">
    &copy; <?php echo date("Y"); ?>
    Jufic Aluminium & Allied Ltd. All rights reserved.
</footer>

</html>
</body>