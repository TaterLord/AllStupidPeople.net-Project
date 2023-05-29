<!--
    filename:       markquiz.php
    authors:        AllStupidPeople.net, Akhil Boda
    created:        29/05/2023
    last modified:  29/05/2023
    description:    Group 03 - Project
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Page for marking the quiz results">
    <meta name="keywords" content="ASP.net, tags, quiz, marking, php, mysql">
    <meta name="author" content="">
    <title>Quiz Marking Page</title>
    <link href="styles/base.css" rel="stylesheet">
</head>
<body>
<?php
    require_once("settings.php"); //connect to mySQL database
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    // Function to sanitize input data
    function sanitizeInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Validate and sanitize the form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = sanitizeInput($_POST["first_name"]);
        $lastName = sanitizeInput($_POST["last_name"]);
        $studentId = sanitizeInput($_POST["student_id"]);
        $whoMade = sanitizeInput($_POST["who_made"]);
        $whatPurpose = sanitizeInput($_POST["what_purpose"]);
        $excel = isset($_POST["excel"]) ? $_POST["excel"] : [];
        $language = sanitizeInput($_POST["language"]);
        $date = sanitizeInput($_POST["date"]);

        // Validate the form data
        $errors = [];
        if (empty($firstName)) {
            $errors[] = "First name is required.";
        } elseif (!preg_match("/^[A-Za-z -]{1,30}$/", $firstName)) {
            $errors[] = "First name must contain only alphabetic characters, spaces, or hyphens (maximum 30 characters).";
        }

        if (empty($lastName)) {
            $errors[] = "Last name is required.";
        } elseif (!preg_match("/^[A-Za-z -]{1,30}$/", $lastName)) {
            $errors[] = "Last name must contain only alphabetic characters, spaces, or hyphens (maximum 30 characters).";
        }

        if (empty($studentId)) {
            $errors[] = "Student ID is required.";
        } elseif (!preg_match("/^\d{7}$|^\d{10}$/", $studentId)) {
            $errors[] = "Student ID must be either 7 or 10 digits.";
        }

        if (empty($whoMade)) {
            $errors[] = "Answer to question 1 is required.";
        }

        if (empty($whatPurpose)) {
            $errors[] = "Answer to question 2 is required.";
        }

        if (count($excel) < 4) {
            $errors[] = "Please select at least 4 options for question 3.";
        }

        if (empty($language)) {
            $errors[] = "Answer to question 4 is required.";
        }

        if (empty($date)) {
            $errors[] = "Date is required.";
        }

        // If there are errors, display them and stop further processing
        if (!empty($errors)) {
            echo "<h2>Quiz Submission Failed:</h2>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            exit();
        }

        // Perform marking logic here (calculate the score)

        // Check if the connection was successful
        if (!$conn) {
            echo "<h2>Quiz Submission Failed:</h2>";
            echo "<p>Failed to connect to the database: " . $mysqli->connect_error . "</p>";
            exit();
        }

        // Check the number of attempts for the user
        $query = "SELECT COUNT(*) AS attempts FROM attempts WHERE student_id = $studentId";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $studentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $attemptCount = $row["attempts"];

        // Check if the user is allowed to submit another attempt
        if ($attemptCount >= 2) {
            echo "<h2>Quiz Submission Failed:</h2>";
            echo "<p>You have already reached the maximum number of quiz attempts.</p>";
            exit();
        }

        // Insert the quiz attempt record
        $query = "INSERT INTO attempts (student_id, first_name, last_name, score) VALUES ($studentId, $firstName, $lastName, $score)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssd", $studentId, $firstName, $lastName, $score);
        $stmt->execute();

        // Get the number of attempts for the user
        $attemptCount++;

        // Display the result to the user
        echo "<h2>Quiz Submission Successful:</h2>";
        echo "<p>User: $firstName $lastName (ID: $studentId)</p>";
        echo "<p>Score: $score</p>";
        echo "<p>Number of attempts: $attemptCount</p>";

        // If the user has only had one previous attempt, display a hyperlink for another attempt
        if ($attemptCount == 1) {
            echo '<a href="quiz.html">Have another attempt at the quiz</a>';
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>
</body>
</html><!--
    filename:       markquiz.php
    authors:        AllStupidPeople.net, Akhil Boda
    created:        29/05/2023
    last modified:  29/05/2023
    description:    Group 03 - Project
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Page for marking the quiz results">
    <meta name="keywords" content="ASP.net, tags, quiz, marking, php, mysql">
    <meta name="author" content="">
    <title>Quiz Marking Page</title>
    <link href="styles/base.css" rel="stylesheet">
</head>
<body>
<?php
    require_once("settings.php"); //connect to mySQL database
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    // Function to sanitize input data
    function sanitizeInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Validate and sanitize the form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = sanitizeInput($_POST["first_name"]);
        $lastName = sanitizeInput($_POST["last_name"]);
        $studentId = sanitizeInput($_POST["student_id"]);
        $whoMade = sanitizeInput($_POST["who_made"]);
        $whatPurpose = sanitizeInput($_POST["what_purpose"]);
        $excel = isset($_POST["excel"]) ? $_POST["excel"] : [];
        $language = sanitizeInput($_POST["language"]);
        $date = sanitizeInput($_POST["date"]);

        // Validate the form data
        $errors = [];
        if (empty($firstName)) {
            $errors[] = "First name is required.";
        } elseif (!preg_match("/^[A-Za-z -]{1,30}$/", $firstName)) {
            $errors[] = "First name must contain only alphabetic characters, spaces, or hyphens (maximum 30 characters).";
        }

        if (empty($lastName)) {
            $errors[] = "Last name is required.";
        } elseif (!preg_match("/^[A-Za-z -]{1,30}$/", $lastName)) {
            $errors[] = "Last name must contain only alphabetic characters, spaces, or hyphens (maximum 30 characters).";
        }

        if (empty($studentId)) {
            $errors[] = "Student ID is required.";
        } elseif (!preg_match("/^\d{7}$|^\d{10}$/", $studentId)) {
            $errors[] = "Student ID must be either 7 or 10 digits.";
        }

        if (empty($whoMade)) {
            $errors[] = "Answer to question 1 is required.";
        }

        if (empty($whatPurpose)) {
            $errors[] = "Answer to question 2 is required.";
        }

        if (count($excel) < 4) {
            $errors[] = "Please select at least 4 options for question 3.";
        }

        if (empty($language)) {
            $errors[] = "Answer to question 4 is required.";
        }

        if (empty($date)) {
            $errors[] = "Date is required.";
        }

        // If there are errors, display them and stop further processing
        if (!empty($errors)) {
            echo "<h2>Quiz Submission Failed:</h2>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            exit();
        }

        // Perform marking logic here (calculate the score)

        // Check if the connection was successful
        if (!conn) {
            echo "<h2>Quiz Submission Failed:</h2>";
            echo "<p>Failed to connect to the database: " . $mysqli->connect_error . "</p>";
            exit();
        }

        // Check the number of attempts for the user
        $query = "SELECT COUNT(*) AS attempts FROM attempts WHERE student_id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $studentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $attemptCount = $row["attempts"];

        // Check if the user is allowed to submit another attempt
        if ($attemptCount >= 2) {
            echo "<h2>Quiz Submission Failed:</h2>";
            echo "<p>You have already reached the maximum number of quiz attempts.</p>";
            exit();
        }

            //CHECK MYSQL TO MAKE SURE FIELDS HAVE BEEN ENTERED CORRECTLY!

        // Insert the quiz attempt record
        $query = "INSERT INTO attempts (student_id, first_name, last_name, score) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssd", $studentId, $firstName, $lastName, $score);
        $stmt->execute();

        // Get the number of attempts for the user
        $attemptCount++;

        // Display the result to the user
        echo "<h2>Quiz Submission Successful:</h2>";
        echo "<p>User: $firstName $lastName (ID: $studentId)</p>";
        echo "<p>Score: $score</p>";
        echo "<p>Number of attempts: $attemptCount</p>";

        // If the user has only had one previous attempt, display a hyperlink for another attempt
        if ($attemptCount == 1) {
            echo '<a href="quiz.html">Have another attempt at the quiz</a>';
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>
</body>
</html>