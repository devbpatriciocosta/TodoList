<?php include "includes/inc.connection.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500&family=Itim&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>To Do List - Você achou que não tinha nada pra fazer?</title>
    
    <style>
        body {
            background-image: url("images/whiteSheetBG.jpg");
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
                height: 150vh;
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
                background-color: #F7F8FA;
            }
        }

        .cardBox {
            padding: 10px;
            width: 900px;
            display: flex;
            flex-direction: column;
            font-family: 'Caveat', cursive;
            font-size: 24px;
            width: 1100px;

            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
            }
        }

        .headLineTasks {
            display: flex; 
            align-items: left;
            font-weight: bold;
            border-bottom: 1px solid black;


            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
            }

        }  
        
        .bodyLineTasks{
            display: flex; 
            flex-direction: column;

            
        }

        .tasks{
            display: flex;
            align-items: left;
            border-bottom: 1px solid black;
            line-height: 60px;

             @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
            }
        }

        .addNewTaskButton {
            display: flex; 
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: bold;
            color: #F7F8FA;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background-color: #3F826D;
            height: 40px;
            width: 160px;
            border: none;
            margin-bottom: 10px;
        }

        .saveButton {
            background-color: #3F826D;
            color: #F7F8FA;
            width: 80px;
            height: 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .cancelButton {
            background-color: #ff4747;
            color: #F7F8FA;
            width: 80px;
            height: 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .actionButtons{
            display: flex;
            align-items: center;
            gap: 10px;

            @media (max-width: 1690px) {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 360px;
                margin-right: 70px;
            }
        }
        
         .modalBackdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .modalContainer {
            position: relative;
            background-color: #F7F8FA;
            width: 400px;
            margin: 400px auto;
            padding: 20px;
            border-radius: 10px;
        }

        .modalHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .modalTitle {
            margin: 0;
        }

        .closeModal {
            border: none;
            background-color: transparent;
            font-size: 20px;
            cursor: pointer;
        }

        .modalBody {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modalFooter {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }



        .TaskToDoTable {
            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
            }
        }

        .ActionsTable {
            @media (max-width: 1690px) {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 360px;
                margin-right: 70px;
            }
        }
    </style>
</head>
<body>
    <section class="structuralContainer">
        <div class="listTitle">
            <h1>To Do <span style="color: #3F826D;">List</span> <br> Do you remember that you <span style="color: #ff4747;">still have</span> things to do? </h1>
        </div>
            <div class="mainContainer">
                <h1 style="margin-top: 70px;"> Your <span style="color: #3F826D;">List</span> </h1>
                <div class="cardBox">
                    <div class="headLineTasks">
                        <div>Ordem</div>
                        <div class="TaskToDoTable" style="width: 350px; margin-left: 30px;">Taks To Do</div>
                        <div class="TaskToDoTable" style="width: 350px; margin-left: 5px;">Task Description</div>
                        <div class="TaskToDoTable" style="width: 150px; margin-left: 5px;">Task Due Date</div>
                        <div class="ActionsTable" style="width: 70px; margin-left: 80px; ">Actions</div>
                    </div>
                    <div class="bodyLineTasks">
                            <?php
                                $sql        = "SELECT * FROM todolist";
                                $result     = mysqli_query($connection, $sql); 

                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id                 = $row['id'];
                                        $fetchTasks         = $row['newTask'];
                                        $fetchDescription   = $row['taskDescription'];
                                        $fetchDueDate       = $row['taskDueDate'];

                                        // Formata a data no padrão brasileiro (DD/MM/AAAA)
                                        $formattedDueDate = date('d/m/Y', strtotime($fetchDueDate));


                                        echo "
                                            <div class='tasks'>
                                                <div scope='row'>".$id."</div>
                                                <div class='TaskToDoTable' style='width: 350px; margin-left: 60px;'>".$fetchTasks."</div>
                                                <div class='TaskToDoTable' style='width: 350px; margin-left: 5px;'>".$fetchDescription."</div>
                                                <div class='TaskToDoTable' style='width: 150px; margin-left: 5px;'>".$formattedDueDate."</div>
                                                <div class='actionButtons' style='width: 70px; margin-left: 80px;'>
                                                    <a href='includes/inc.update.php?updateid=".$id."'><span class='material-symbols-outlined'>edit_square</span></a>
                                                    <a style='margin-top: 3px;' href='includes/inc.delete.php?deleteid=".$id."'><span class='material-symbols-outlined'>delete_forever</span></a>
                                                </div>
                                            </div>
                                            ";
                                    }
                                }
                            ?>
                    </div>
                </div> 
                <div class="newTaskContainer"> 
                    <button class="addNewTaskButton" type="button" onClick="openModal()"><span class="material-symbols-outlined">add_notes</span> Add New Task </button>  
                    <div class="modalBackdrop" id="modalBackdrop">
                        <div class="modalContainer">
                            <div class="modalHeader">
                                <h3 class="modalTitle">Add New Tasks</h3>
                                <button type="button" class="closeModal" onClick="closeModal()"><span class="material-symbols-outlined">close</span></button>
                            </div>
                            <div> 
                                <form action="includes/inc.newTask.php" method="POST" class="modalBody" >  
                                    <div> 
                                        <label for="newTask" style="margin-right: 25px;">New Task:</label>
                                        <input name="newTask" type="text" id="newTask" style="width: 253px;">
                                    </div>
                                    <div> 
                                        <label for="description" style="margin-right: 10px;">Description:</label>
                                        <input name="description" type="text" id="description" style="width: 253px;">
                                    </div>
                                    <div> 
                                        <label for="dueDate" style="margin-right: 25px;">Due Date:</label>
                                        <input name="dueDate" type="date" id="dueDate" style="width: 255px;">
                                    </div>
                                    <div class="modalFooter"> 
                                        <button name="add" type="submit" class="saveButton" onClick="saveTask()"><span class="material-symbols-outlined">beenhere</span></button>
                                        <button type="button" class="cancelButton" onClick="closeModal()"><span class="material-symbols-outlined">tab_close</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

<script>
    function openModal() {
        var modal = document.getElementById("modalBackdrop");
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("modalBackdrop");
        modal.style.display = "none";
    }

    function saveTask() {
        // Handle saving the task data
        closeModal();
    }
</script>

</html>
