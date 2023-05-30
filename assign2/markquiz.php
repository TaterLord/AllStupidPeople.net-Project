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

            // Initialize updatedAttempt
            $updatedAttempt = 1;

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

            require_once("settings.php"); // Import database information from settings

            // Create connection
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if the table exists
            $checkTable = mysqli_query($conn, "SHOW TABLES LIKE 'attempts'");
            if (mysqli_num_rows($checkTable) == 0) {

                // Create the table if it doesn't exist
                $sql = "CREATE TABLE attempts (
                    attempt_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    date_and_time DATETIME,
                    f_name VARCHAR(30),
                    l_name VARCHAR(30),
                    student_id VARCHAR(30),
                    no_attempts INT(2),
                    score INT(11)
                )";

                if (mysqli_query($conn, $sql)) {
                    echo "Table attempts created successfully";
                } else {
                    echo "Error creating table: " . mysqli_error($conn);
                }
            }

            // Check if the student exists in the database
            $query = "SELECT * FROM attempts WHERE student_id = '$studentId'";
            $findStudent = mysqli_query($conn, $query);
            $student = mysqli_fetch_assoc($findStudent);

            if (!$student) {
                // Insert new student
                $query = "INSERT INTO attempts (date_and_time, f_name, l_name, student_id, no_attempts, score) VALUES (NOW(), '$firstName', '$lastName', '$studentId', '$updatedAttempt', '$score')";
                mysqli_query($conn, $query);
            } elseif ($student["no_attempts"] < 2) {
                // Increment the attempt number and update the record
                $updatedAttempt = $student["no_attempts"] + 1;
                $query = "UPDATE attempts SET no_attempts = $updatedAttempt, date_and_time = NOW() WHERE student_id = '$studentId'";
                mysqli_query($conn, $query);
            } else {
                // Maximum attempts reached, display an error message
                echo "<h2>Maximum attempts reached. Further updates are not allowed.</h2>";
                $updatedAttempt = $student["no_attempts"];
            }

            // Display details after insertion/update
            echo "<h2>Details:</h2>";
            echo "<table border=\"1\" >\n";
            echo "<tr>\n"
                . "<th scope=\"col\">First Name</th>"
                . "<th scope=\"col\">Last Name</th>"
                . "<th scope=\"col\">Attempts</th>"
                . "<th scope=\"col\">Score</th>"
                . "</tr>\n";

            echo "<tr>\n"
                . "<td>{$firstName}</td>"
                . "<td>{$lastName}</td>"
                . "<td>{$updatedAttempt}</td>"
                . "<td>{$score}</td>"
                . "</tr>\n";

            echo "</table>";

            echo "<p>Quiz data has been successfully inserted/updated in the database.</p>";

            mysqli_free_result($findStudent);
            mysqli_close($conn);
        }
    ?>
</body>
</html>