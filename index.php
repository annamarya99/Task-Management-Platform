<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $.ajax({
            url: 'fetch_tasks.php',
            type: 'GET',
            success: function(data) {
                $('#taskTable').html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    </script>
</head>
<body>
    <div id="taskTable"></div>
</body>
</html>
