<!--
    filename:       sanitise.php
    author:         Reuben Holmes
    created:        29/05/2023
    last modified:  29/05/2023
    description:    Group 03 - Project
-->
<?php
    function sanitise($string, \mysqli $conn)
    {
        $string = trim($string);
        $string = htmlspecialchars($string);
        $string = mysqli_escape_string($conn, $string);

        return $string;
    }
?>