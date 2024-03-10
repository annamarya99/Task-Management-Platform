<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
   <main class="table">
        <section class="table_header">
            <h1>Tasks</h1>
            <div class = "button_container">
                <button id="AddTaskButton" class="button">Add task</button>
                <button id="DeleteTaskButton" class="button">Delete task</button>
            </div>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                         <th class="title_row">Select</th>
                        <th class="title_row"> Id</th>
                        <th class="title_row"> Title</th>
                        <th class="title_row"> Description</th>
                        <th class="title_row"> Due date</th>
                        <th class="title_row"> Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('connect.php');

                        $sql = "SELECT * FROM tasks";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><input type='checkbox' class='task-checkbox' data-id='".$row["Id"]."'></td>";
                                echo "<td>".$row["Id"]."</td>";
                                echo "<td>".$row["Title"]."</td>";
                                echo "<td>".$row["Description"]."</td>";
                                echo "<td>".$row["Due date"]."</td>";
                                echo "<td data-status='".$row["Status"]."'>".$row["Status"]."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No tasks in the database.</td></tr>";
                        }
                        $con->close();
                    ?>
                </tbody>
            </table>
        </section>
        
   </main>
   <?php include('add_task_modal.php'); 
   ?>
   

   
 
</body>
</html>
