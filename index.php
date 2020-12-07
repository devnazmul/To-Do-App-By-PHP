<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>To Do List</title>
  </head>
  <style>
    .underline{text-decoration: line-through!important;}
    #done:hover{text-decoration: none; font-weight: bold;}
  </style>
  <body style="min-height:100vh; display:flex; justify-contant:center; align-items:center;">
    <div class="container shadow-lg p-3 mb-5 rounded" style="background-color: #fff!important;">
        <div class="row">
            <div class="col-12 text-dark text-center">
                <h1>To Do List</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mx-0">
                <form class="d-inline" action="add.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="work" class="form-control my-3" id="task" placeholder="Add task">
                    </div>
                    <button type="submit" name="add" class="col-12 mb-3 btn btn-primary">Add</button>
                </form>
            </div>
            <div class="pt-10  col-12 text-dark">
                <h3>Tasks</h3>
            </div>
            <div class="col-12 px-3 mb-3 text-white">
                <ul class="list-group">


                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $db = "todo";
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $db);
                    // Check connection
                    $sql1 = "SELECT * FROM task ORDER BY task_id DESC";
                    $result = mysqli_query($conn,$sql1);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <li class="list-group-item list-group-item-primary shadow-lg p-2 mb-2 border-0">
                        <div class="row">
                            <div class="col-11">
                                <h4 id="tas-<?php echo $row['task_id']; ?>" class="" >
                                    <input class="mr-5" onclick="myFunction<?php echo $row['task_id']; ?>()" type="checkbox">
                                    <?php echo $row['task_name']; ?>
                                </h4>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a style="color: red;" id="done" href="delete.php?id=<?php echo $row['task_id']; ?>">Done</a>
                            </div>
                        </div>
                    </li>
                    <script>
                        function myFunction<?php echo $row['task_id']; ?>(){
                            var element = document.getElementById("tas-<?php echo $row['task_id']; ?>");
                            element.classList.toggle("underline");
                        }
                        
                    </script>
                <?php
                        }
                    } else {
                        echo '<li style="text-align:center;" class="list-group-item list-group-item-danger shadow-lg p-2 mb-2 border-0">
                        
                        <h4>No Task Available</h4>
                        
                        </li>';

                    }
                ?>
                </ul>

                
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>