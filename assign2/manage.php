<!--
    filename:       manage.php
    authors:        Reuben Holmes
    created:        29/05/2023
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
    <title>Manage Data Page</title>
    <link href="styles/base.css" rel="stylesheet">
    <link href="styles/manage.css" rel="stylesheet">
</head>
<body>
    <h1>Manage Data</h1>
    <?php 
        include("header.inc.php");
        include("navigation.inc.php"); 
    ?>

    <!-- User Menu -->
<!--
    <section>
        <form action="manage.php" method="get">
            <p>Choose an option:</p>

            <p>
                <input type="radio" id="all" name="choice" value="all" required="required">
                <label for="all">List all attempts</label>
            </p>
            <p>
                <input type="radio" id="perfect" name="choice" value="perfect">
                <label for="perfect">List the students who got a perfect score on their first go</label>
            </p>
            <p>
                <input type="radio" id="fail" name="choice" value="fail">
                <label for="fail">List the students who failed on their second go</label>
            </p>
            <p>
                <input type="radio" id="individual" name="choice" value="individual">
                <label for="individual">List a student's attempts</label>
            </p>
            <p>
                <input type="radio" id="delete" name="choice" value="delete">
                <label for="delete">Delete a student's attempts</label>
            </p>
            <p>
                <input type="radio" id="change score" name="choice" value="change score">
                <label for="change score">Change the score of a student's attempt</label>
            </p>
            
            <p><input type="submit" value="Select"></p>
        </form>
    </section>
-->

<?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (isset($_GET["choice"]))
    {
        $choice = $_GET["choice"];
        $query = "SELECT * FROM attempts ORDER BY \"f name\", \"l name\"";

        if ($choice = "all")
        {
            //output all the data
        }
        else if ($choice = "perfect")
        {
            //output all perfect first scores
            $query .= " WHERE attempt = 1 AND score = 5";
        }
        else if ($choice = "fail")
        {
            //output all second attempts under 50%
            $query .= " WHERE attempt = 2 AND score <= 2.5";
        }
        else if ($choice = "individual")
        {
            //output some data
            $query .= " WHERE f name LIKE ";
        }
        else if ($choice = "delete")
        {
            //delete a student and output a message
        }
        else if ($choice = "change score")
        {
            //change a score and output a message
        }
        else if ($choice = "")
        {
            echo "<section><p>Error: Please select an option</p></section>";
        }

        $result = mysqli_query($conn, $query);
    }
?>

    <section>
        <!-- List 1 student's attempts using student id or first name -->
        <form action="manage.php" method="post"><p>
            <label for="firstname">First Name&nbsp;</label>
            <input type="text" name="first name" id="firstname"
            pattern="[A-Za-z-']{1-30}" title="Must have only a-z, A-Z, - and ', maximum of 30 characters">

            <label for="id">&nbsp;or Student ID&nbsp;</label>
            <input type="text" name="student id" id="id"
            pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">
            
            <p><input type="submit" value="List student's attempts"></p>
        </p></form>
    </section>
    <section>
        <!-- list all students with perfect score or fail -->
        <form action="manage.php" method="post"><p>
            <input type="submit" value="List all students who scored 100% first try">
        </p></form>
    </section>
    <section>
        <form action="manage.php" method="post"><p>
            <input type="submit" value="List all students who scored < 50% second try">
        </p></form>
    </section>
    <section>
        <!-- Delete a student's attempts using id -->
        <form action="manage.php" method="post"><p>
            <label for="id">Student ID</label>
            <input type="text" name="student id" id="id" required="required"
            pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">
            
            <p><input type="submit" value="Delete student's attempts"></p>
        </p></form>
    </section>
    <section>
        <!-- Change a student's attempt score using id, attempt number and the new score -->
        <form action="manage.php" method="post"><p>
            <label for="id">Student ID</label>
            <input type="text" name="student id" id="id" required="required"
            pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">

            <label for="attempt number">Attempt Number</label>
            <input type="number" name="attempt number" id="attempt number" required="required">

            <label for="score">New Score</label>
            <input type="number" name="score" id="score" required="required">
            
            <p><input type="submit" value="Change score for an attempt"></p>
        </p></form>
    </section>
</body>
</html>