<?php
include "inc.connection.php";

if (isset($_POST['add'])) {
    $newTask = $_POST['newTask'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];

    if (!empty($newTask) && !empty($description) && !empty($dueDate)) {
        $formattedDate = date('Y-m-d', strtotime($dueDate));
        $query = "INSERT INTO todolist (newTask, taskDescription, taskDueDate) VALUES ('$newTask', '$description', '$formattedDate');";
        $query_execution = mysqli_query($connection, $query);

        if ($query_execution) {
            echo "
            <script>
                alert('Data Successfully inserted!');
                window.location = '../index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Something went wrong!');
                window.location = '../index.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Something went wrong! :(');
            window.location = '../index.php';
        </script>
        ";
    }
}
?>
