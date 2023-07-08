<?php include "inc.connection.php"; 

    $id                 = $_GET['updateid'];
    $sql                = "SELECT * FROM todolist WHERE id = '$id';";
    $result            = mysqli_query($connection, $sql);

    $row                = mysqli_fetch_assoc($result);
    $id                 = $row['id'];
    $fetchTasks         = $row['newTask'];
    $fetchDescription   = $row['taskDescription'];
    $fetchDueDate       = $row['taskDueDate'];

    if(isset($_POST['update'])){
        $updatedTask               = $_POST['newTask'];
        $updatedDescription        = $_POST['taskDescription'];
        $updatedDueDate             = $_POST['taskDueDate'];

        $formattedDate = date('Y-m-d', strtotime($updatedDueDate)); // Formata a data para o padrão do MySQL (AAAA-MM-DD)

        $sql = "UPDATE todolist SET id = '$id', newTask ='$updatedTask', taskDescription = '$updatedDescription', taskDueDate = '$updatedDueDate' WHERE id='$id';";
        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "
                <script>
                    alert('Data Updated Succesfully!')
                    window.location = '../index.php'
                </script>
            ";
        } else {
            die(mysqli_error($connection));
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <title>To Do List - Você achou que não tinha nada pra fazer?</title>
    
    <style>
        body {
            background-image: url("../images/whiteSheetBG.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Ubuntu', helvetica;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 48
        }

        .structuralContainer {
            height: 90vh;
            display: flex;
            flex-direction: column; 
            align-items: center;

            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        }
        
        .listTitle {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            height: 10vh;
            width: 600px;
            text-align: center;
            background-color: #F7F8FA;

            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
                margin-top: -20vh;
            }
        }

        .mainContainer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            gap: 50px;

            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
                padding: 10px;
                background-color: #F7F8FA;
            }
        }

        .cardBox {
            border-radius: 10px;
            padding: 10px;
            width: 900px;
            display: flex;
            flex-direction: column;
            align-items: center;

            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
            }
        }

        .cardBody {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .cardInputs {
            display: flex;
            margin-bottom: 10px;
        }

        .saveButton {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #3F826D;
            color: #F7F8FA;
            width: 80px;
            height: 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .cancelButton {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ff4747;
            color: #F7F8FA;
            width: 80px;
            height: 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
 
        .containerFooter {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        

    </style>
</head>
<body>
    <section class="structuralContainer">
        <div class="listTitle">
        <h1>To Do <span style="color: #3F826D;">List</span> <br> Do you remember that you <span style="color: #ff4747;">still have</span> things to do? </h1>
        </div>
            <div class="mainContainer">
            <h1 style="margin-top: 70px;"> Update <span style="color: #3F826D;">Task</span> </h1>
                <div class="cardBox">
                <form method="POST">  
                                    <div class="cardInputs"> 
                                        <label for="newTask" style="margin-right: 25px; ">New Task:</label>
                                        <input name="newTask" type="text" id="newTask" value="<?php echo $fetchTasks; ?>" style="width: 250px;">
                                    </div>
                                    <div class="cardInputs"> 
                                        <label for="taskDescription" style="margin-right: 10px;">Description:</label>
                                        <input name="taskDescription" type="text" id="taskDescription" value="<?php echo $fetchDescription; ?>" style="width: 250px;">
                                    </div>
                                    <div class="cardInputs"> 
                                        <label for="taskDueDate" style="margin-right: 26px;">Due Date:</label>
                                        <input name="taskDueDate" type="date" id="taskDueDate" value=" <?php echo $fetchDueDate; ?>" style="width: 253px;">
                                    </div>
                                    <div class="containerFooter"> 
                                        <button type="submit" name="update" class="saveButton"><span class="material-symbols-outlined">beenhere</span></button>
                                        <a class="cancelButton" href='../index.php'><span class="material-symbols-outlined" >arrow_back</span></a>
                                    </div>
                                </form>
                </div> 
            </div>
    </section>
</body>

</html>
