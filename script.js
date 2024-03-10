document.getElementById('AddTaskButton').addEventListener('click', function() {
    document.getElementById('addTaskModal').style.display = 'block';
});

document.getElementById("DeleteTaskButton").addEventListener("click", function() {
    var selectedTasks = document.querySelectorAll('.task-checkbox:checked');
    var taskIds = [];

    selectedTasks.forEach(function(checkbox) {
        taskIds.push(checkbox.getAttribute('data-id'));
    });

    if (taskIds.length > 0) {

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_tasks.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {

            if (xhr.readyState == 4 && xhr.status == 200) {
        
                console.log(xhr.responseText);
                window.location.href = 'index.php'; 
            }
        };
        xhr.send(JSON.stringify({taskIds: taskIds}));
    }
});


function closePopup() {

    var addTaskModal = document.getElementById('addTaskModal');
    var overlay = document.getElementById('overlay');

    if (addTaskModal) {
        addTaskModal.style.display = 'none';
    }

    if (overlay) {
        overlay.style.display = 'none';
    }
}

      
document.querySelectorAll(".table .table_body tr").forEach(function (row) {
    row.addEventListener("dblclick", function () {

        var id = row.querySelector("td:nth-child(2)").innerText;
        var title = row.querySelector("td:nth-child(3)").innerText;
        var description = row.querySelector("td:nth-child(4)").innerText;
        var dueDate = row.querySelector("td:nth-child(5)").innerText;
        var status = row.querySelector("td:nth-child(6)").innerText;

        console.log("ID: " + id);
        console.log("Title: " + title);
        console.log("Description: " + description);
        console.log("Due Date: " + dueDate);
        console.log("Status: " + status);

        displayEditableForm(id, title, description, dueDate, status);
    });
});

// Funcție pentru afișarea formularului de editare
function displayEditableForm(id, title, description, dueDate, status) {

    var overlay = document.createElement("div");
    overlay.id = "overlay";

    var form = document.createElement("form");
    form.id = "editForm";

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        var updatedId = id;
        var updatedTitle = document.getElementById("editTitle").value;
        var updatedDescription = document.getElementById("editDescription").value;
        var updatedDueDate = document.getElementById("editDueDate").value;
        var updatedStatus = document.getElementById("editStatus").value;
        console.log("ID_sub: " + updatedId);

        updateTask(updatedId, updatedTitle, updatedDescription, updatedDueDate, updatedStatus);
    });

    
    form.innerHTML = `
        <input type="hidden" id="editId" value="${id}">
        <label for="editTitle">Titlu:</label>
        <input type="text" id="editTitle" name="editTitle" value="${title}" required><br>
        <label for="editDescription">Description:</label>
        <input type="text" id="editDescription" name="editDescription" value="${description}" required><br>
        <label for="editDueDate">Due Date:</label>
        <input type="date" id="editDueDate" name="editDueDate" value="${dueDate}" required><br>
        <label for="editStatus">Status:</label>
        <select id="editStatus" name="editStatus" required>
             <option value="Scheduled" ${status === 'Scheduled' ? 'selected' : ''}>Scheduled</option>
             <option value="On going" ${status === 'On going' ? 'selected' : ''}>On going</option>
             <option value="Complete" ${status === 'Complete' ? 'selected' : ''}>Complete</option>
        </select>

        <input class= "button" type="submit" value="Save">
        <button class= "button" type="button" onclick="closePopup()">Close</button>
    `;

    overlay.appendChild(form);

    document.body.appendChild(overlay);
}

// Funcție pentru actualizarea task-ului în baza de date
function updateTask(id, title, description, dueDate, status) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_task.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {

        if (xhr.readyState === 4 && xhr.status === 200) {
            
            console.log(xhr.responseText); 
            closePopup()
            window.location.href = 'index.php'; 
        }
    };

    var data = "id=" + id + "&title=" + title + "&description=" + description + "&dueDate=" + dueDate + "&status=" + status;
    xhr.send(data);
}





        

