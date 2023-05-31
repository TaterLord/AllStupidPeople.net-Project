<!--
    filename:       managetable.php
    authors:        Reuben Holmes
    created:        30/05/2023
    last modified:  30/05/2023
    description:    Group 03 - Project
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Page for managing the contents of the SQL table">
    <meta name="keywords" content="ASP.net, tags, php, mysql, database, table, data">
    <meta name="author" content="Reuben Holmes">
    <title>Data Output Page</title>
    <link href="styles/base.css" rel="stylesheet">
    <link href="styles/manage.css" rel="stylesheet">
</head>
<body>
<?php 
    $pagetitle = "Data Output";
    include("header.inc.php");
?>

<?php   //Functions
    //Create Table Function
    function CreateTable($query)
    {
        echo "<table border=\"1\" >\n<tr>\n"
        . "<th scope=\"col\">First Name</th>"
        . "<th scope=\"col\">Last Name</th>"
        . "<th scope=\"col\">Attempts</th>"
        . "<th scope=\"col\">Score</th>"
        . "</tr>\n";
        while ($row = mysqli_fetch_assoc($query))
        {
            echo "<tr>\n"
                ."<td>", $row["f name"], "</td>\n"
                ."<td>", $row["l name"], "</td>\n"
                ."<td>", $row["student id"], "</td>\n"
                ."<td>", $row["no attempts"], "</td>\n"
                ."<td>", $row["score"], "</td>\n"
                ."<td>", $row["date and time"], "</td>\n"
                ."</tr>\n";
        }
        echo "</table>\n";
        mysqli_free_result($query);
    }

    //output all the data
    function DisplayAll($conn, $query)
    {
        

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
        }
    }

    //output all perfect first scores
    function DisplayPerfect($conn, $query)
    {
        

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
        }
    }

    //output all second attempts under 50%
    function DisplayFail($conn, $query)
    {
        

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
        }
    }

    //output a student's data
    function DisplayOne($conn, $query)
    {
        

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
        }
    }

    //delete a student and output a message
    function Delete()
    {
        

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
        }
    }

    //change a score and output a message
    function ChangeScore()
    {
        

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
        }
    }
?>
    
    <!-- Table Output -->
<?php
    require("sanitise.php");

    $query = "SELECT * FROM attempts ORDER BY \"f name\", \"l name\"";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!isset($_POST["query"]))
    {
        echo "<p>Data transported incorrectly</p>";
    }
    else
    {
        if (!$conn) {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            $querytype = $_POST["query"];
    
            switch ($querytype)
            {
                case "A":
                    DisplayAll();
                    break;
                case "B":
                    DisplayPerfect();
                    break;
                case "C":
                    DisplayFail();
                    break;
                case "D":
                    DisplayOne();
                    break;
                case "E":
                    Delete();
                    break;
                case "D":
                    ChangeScore();
                    break;
            }
        }
    }
?>
</body>
</html>