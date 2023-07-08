<?php 

include "inc.connection.php";

if(isset($_GET['deleteid'])) {
    $id             = $_GET['deleteid'];
    $sql            = "DELETE FROM todolist WHERE id = $id;";
    $result         = mysqli_query($connection, $sql);

    if($result) {
        echo "
            <script>
                alert('Data Deleted Succesfully!')
                window.location = '../index.php'
            </script>
        ";
    } else {
        die(mysqli_error($connection));
    }
}