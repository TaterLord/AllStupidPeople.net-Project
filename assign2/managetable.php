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
    ?>
    
    <!-- Table Output -->
<?php
    require("sanitise.php");
    
    if ($POST(""))
    {

    }

    if (!$conn) {
        "echo <p>Database connection failure</p>";
    }
    else
    {
        $sql_table = "cars";
        $query = mysqli_query($conn, "SELECT * FROM attempts ORDER BY \"f name\", \"l name\"");
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Somthing is wrong with ", $query, "</p>";
        }
        else 
        {
            CreateTable($result);
            mysqli_free_result($result);
        }
    }
?>
</body>
</html>