
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "todo";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    $id = $_GET['id'];
    $sql = "DELETE  FROM task WHERE task_id = '{$id}'";
    // die();
    if (mysqli_query($conn,$sql)) {
        header('Location: http://localhost/devnazmul.com/To-Do%20App/index.php');
    }

    

    
?>