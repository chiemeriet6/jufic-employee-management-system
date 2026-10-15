<?php
include "db.php";

$sql = "SELECT * FROM employees ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jufic Aluminium & Allied Ltd. | Employee Records</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="header">
        <h1>JUFIC ALUMINIUM & ALLIED LTD.</h1>
        <p>SYSTEM METAL COMPLEX, IDU INDUSTRIAL AREA</p>
    </header>

    <main class="container">

        <section class="page-title">
            <h2>Employee Records</h2>
            <p>Employee information and records management.</p>
        </section>

        <section class="table-card">

            <a href="add.php" class="btn btn-primary">
                + Add New Employee
            </a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";

                            echo "<td class='employee-id'>" .
                                htmlspecialchars($row["id"]) . "</td>";

                            echo "<td>" .
                                htmlspecialchars($row["name"]) . "</td>";

                            echo "<td>" .
                                htmlspecialchars($row["department"]) . "</td>";

                            echo "<td>" .
                                htmlspecialchars($row["position"]) . "</td>";

                            echo "<td>" .
                                htmlspecialchars($row["phone"]) . "</td>";

                            echo "<td class='actions'>";

                            echo "<a class='btn btn-edit' href='edit.php?id=" .
                                urlencode($row["id"]) . "'>Edit</a>";

                            echo "<a class='btn btn-delete' href='delete.php?id=" .
                                urlencode($row["id"]) .
                                "' onclick=\"return confirm('Are you sure you want to delete this employee?');\">Delete</a>";

                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='6' class='empty-message'>";
                        echo "No employee records found. Add your first employee to get started.";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </section>

    </main>

    <footer class="footer">
        &copy; <?php echo date("Y"); ?>
        Jufic Aluminium & Allied Ltd. All rights reserved.
    </footer>

</body>
</html>