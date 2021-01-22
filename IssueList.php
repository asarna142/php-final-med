<?php
/*
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    */

    require_once 'Connection.php';

    function insertTable(){
        //clear table first
        echo    
            '<script type="text/JavaScript">  
                var body = document.getElementById("DBDisplay");
                body.innerHTML = "";
            </script>' 
        ; 

        //call data
        $stmt = "SELECT title_issue, description, start_date, end_date FROM Issues";
        $conn = getConnection();
        $result = mysqli_query($conn, $stmt, MYSQLI_USE_RESULT);

        //display in table
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["title_issue"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "<td>" . $row["end_date"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>Link Link</th>";
            echo "<tr>";
        } 
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <title>Issue Tracker</title>
    </head>
    <body>
        <?php require_once 'header.html' ?>

        <div class="wrapper-body container">
            <h1 class="display-2">Current Issues</h1>
            <p class="lead">Current issues entered in Issue Tracker</p>

            <hr>
            <br>

            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Issue</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="DBDisplay">
                        <?php insertTable(); ?>
                    </tbody>
                </table>
            </div>

        </div>

    </body>
</html>