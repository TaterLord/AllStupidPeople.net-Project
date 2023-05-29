<!--
    filename:       manage.php
    authors:        Reuben Holmes
    created:        29/05/2023
    last modified:  29/05/2023
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
</head>
<body>
    <h1>Manage Data</h1>
    <div>
        <input type="submit" value="List all attempts">
        
        <p>
            <label for="firstname">First Name&nbsp;</label>
            <input type="text" name="first name" id="firstname" required="required"
            pattern="[A-Za-z-']{1-30}" title="Must have only a-z, A-Z, - and ', maximum of 30 characters">

            <label for="id">&nbsp;or Student ID&nbsp;</label>
            <input type="text" name="student id" id="id" required="required"
            pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">
            
            <input type="submit" value="List student's attempts">
        </p>

        <p>
            <input type="submit" value="List all students who scored 100% first try">
        </p>

        <p>
            <input type="submit" value="List all students who scored < 50% second try">
        </p>

        <p>
            <label for="id">Student ID</label>
            <input type="text" name="student id" id="id" required="required"
            pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">
            
            <input type="submit" value="Delete student's attempts">
        </p>

        <p>
            <label for="id">Student ID</label>
            <input type="text" name="student id" id="id" required="required"
            pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">

            <label for="id">Attempt Number</label>
            <input type="number" name="attempt number" id="id" required="required">

            <label for="id">New Score</label>
            <input type="number" name="score" id="id" required="required">
            
            <input type="submit" value="Change score for an attempt">
        </p>
    </div>
<?php

?>
</body>
</html>