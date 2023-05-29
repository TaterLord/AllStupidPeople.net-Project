<!--
    filename:       quiz.php
    author:         Reuben Holmes, Edited with PHP by Akhil and Joel
    created:        30/03/2023
    last modified:  29/05/2023
    description:    Group 03 - Project
    enhancements:   
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Testing your knowledge on ASP.net">
    <meta name="keywords" content="ASP.net, Quiz, tags">
    <meta name="author" content="Reuben Holmes">
    <title>ASP.net Quiz Page</title>
    <link href="styles/base.css" rel="stylesheet">
    <link href="styles/quiz.css" rel="stylesheet">
</head>

<body>
    <div class="parallax">
        <h1>ASP.net Quiz</h1>
    </div>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="topic.php">About ASP.NET</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li style="float:right"><a href="enhancements1.html">Enhancements</a></li>
        </ul>
    </nav>
    <br><br>

    <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php">

        <!-- Text Input -->
        <fieldset>
            <!-- Area title -->
            <legend>Personal Information</legend>

            <!-- for corresponds to id -->
            <!-- Label for text box -->
            <p>
                <label for="firstname">First Name</label>
                <input type="text" name="first name" id="firstname" required="required"
                pattern="[A-Za-z-']{1-30}" title="Must have only a-z, A-Z, - and ', maximum of 30 characters">
            </p>
            <p>
                <label for="lastname">Last Name</label>
                <input type="text" name="last name" id="lastname" required="required"
                pattern="[A-za-z-']{1-30}" title="Must have only a-z, A-Z, - and ', maximum of 30 characters">
            </p>
            <p>
                <label for="id">Student ID</label>
                <input type="text" name="student id" id="id" required="required"
                pattern="[0-9]{7,10}" title="Must have only numbers, either 7 or 10 characters">
            </p>
        </fieldset>

        <!-- Multiple Choice (Select One) -->
        <fieldset>
            <!-- Area title -->
            <legend>Question 1</legend>

            <!-- Question -->
            <p><label for="who">Who is the creator of ASP.NET?</label></p>

            <!-- for corresponds to id, name corresponds to table LHS output, value corresponds to table RHS output -->
            <!-- Text box -->
            <p><input type="text" name="who made" id="who" required="required"
            pattern="[A-Za-z-]{1-30}" title="Can only use capital and lowercase letters"></p>
        </fieldset>

        <!-- Multiple Choice (Select One) -->
        <fieldset>
            <!-- Area title -->
            <legend>Question 2</legend>

            <!-- Question -->
            <p>What is the purpose of ASP.NET?</p>

            <!-- for corresponds to id, name corresponds to table LHS output, value corresponds to table RHS output -->
            <p>
                <input type="radio" id="A1" name="what purpose" value="A" required="required">
                <label for="A1">To help run servers for all kinds of purposes</label>
            </p>
            <p>
                <input type="radio" id="B1" name="what purpose" value="B">
                <label for="B1">To help build web pages</label>
            </p>
            <p>
                <input type="radio" id="C1" name="what purpose" value="C">
                <label for="C1">To create an interactive work environment for developers</label>
            </p>
            <p>
                <input type="radio" id="D1" name="what purpose" value="D">
                <label for="D1">To help all stupid people learn how to use nets</label>
            </p>
        </fieldset>

        <!-- Multiple Choice (Select One) -->
        <fieldset>
            <!-- Area title -->
            <legend>Question 3</legend>

            <!-- Question -->
            <p>What does ASP.NET excel at? (pick 4)</p>
            <!-- for corresponds to id, name corresponds to table LHS output in arrays style, value corresponds to table RHS output -->
            <p>
                <input type="checkbox" id="A2" name="excel[]" value="A">
                <label for="A2">Performance</label>
            </p>
            <p>
                <input type="checkbox" id="B2" name="excel[]" value="B">
                <label for="B2">Patching</label>
            </p>
            <p>
                <input type="checkbox" id="C2" name="excel[]" value="C">
                <label for="C2">Dieting</label>
            </p>
            <p>
                <input type="checkbox" id="D2" name="excel[]" value="D">
                <label for="D2">Diagnostics</label>
            </p>
            <p>
                <input type="checkbox" id="E2" name="excel[]" value="E">
                <label for="E2">Security</label>
            </p>
            <p>
                <input type="checkbox" id="F2" name="excel[]" value="F">
                <label for="F2">Dynamic</label>
            </p>
            <p>
                <input type="checkbox" id="G2" name="excel[]" value="G">
                <label for="G2">Safety</label>
            </p>
            <p>
                <input type="checkbox" id="H2" name="excel[]" value="H">
                <label for="H2">Debugging</label>
            </p>
        </fieldset>

        <!-- Dropdown Box -->
        <fieldset>
            <!-- Area Title -->
            <legend>Question 4</legend>

            <!-- Question -->
            <p>What language can ASP.net use?</p>
            
            <p>
                <!-- for corresponds to id, name corresponds to table LHS output, value corresponds to table RHS output -->
                
                <!-- Label -->
                <label for="language">Language</label>

                <!-- Options -->
                <select name="language" id="language" required="required">
                    <option value="">Please Select</option>
                    <option value="1">Javascript</option>
                    <option value="2">Python</option>
                    <option value="3">Visual Basic</option>
                </select>
            </p>
        </fieldset>

        <!-- Date -->
        <fieldset>
            <!-- Area Title -->
            <legend>Question 5</legend>

            <!-- Question -->
            <p>When was ASP.net conceived?</p>
            
            <!-- DATE -->
            <p>
                <!-- Date via date input -->
                <label for="date">Date</label>
                <input type="date" id="date" name="date" size="10">
            </p>
        </fieldset>

        <!-- Insert and Reset buttons -->
        <fieldset>
            <p>
                &nbsp&nbsp
                <input type="submit" value="Register">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="reset" value="Reset Form">
            </p>
        </fieldset>
    </form> 
</body>
</html>