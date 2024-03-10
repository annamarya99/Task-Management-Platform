<div id="addTaskModal" class="popup">
            <div class="modal-content">   
                <!-- Form for adding a task -->
                <form id="addTaskForm" action="insert_task.php" method="post">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required><br>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" required><br>
                    <label for="dueDate">Due Date:</label>
                    <input type="date" id="dueDate" name="dueDate" required><br>
                    <input class="button" type="submit" value="Submit">
                    <button class="button" onclick="closePopup()">Close</button>
                </form>
                
            </div>
            
 </div>
