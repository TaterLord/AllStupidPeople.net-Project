<!--
    filename:       enhancements1.html
    authors:        AllStupidPeople.net
    created:        21/04/2023
    last modified:  21/04/2023
    description:    Group 03 - Project
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Change this stuff please -->
    <meta charset="utf-8">
    <meta name="description" content="The enhancements on our website">
    <meta name="keywords" content="enhancements, features">
    <meta name="author" content="AllStupidPeople.net">
    <title>Website Enhancements</title>
    <link href="styles/base.css" rel="stylesheet">
    <link href="styles/enhancements.css" rel="stylesheet">
</head>
<body>
    <?php
        $pagetitle = "Enhancements";
        include("header.inc.php");
        include("navigation.inc.php");
    ?>
    <br>
    <br>

    <!--   Enhancements for index.html -- Jacob T   -->
    <div>
        <h3>Enhancements by Jacob T</h3>
        <p><ul>
            <li>Parallax effect on the background image - all pages</li>
            <li>Navigation bar - all pages</li>
            <li>Zoom effect when hovering over page summaries - index.html</li>
        </ul></p>
    </div>

    <!--   Enhancements for topic.html -- Akhil B   -->
    <div>
        <h3>Enhancements by Akhil B</h3>
        <p>
            Several enhancements were made to improve the performance and visual function of the topic.html webpage. The first included the addition of a watermark. This consisted of a generic ASP.net image sourced from Google Images. It exists as a  .webp filetype which furthermore had already been created to have a transparent background on any canvas, enabling it to be an ideal implementation in our webpage. Adding it in html was a rather simple task, however the challenge presented itself in its styling in CSS.
        </p>
        <p>
            To implement the watermark, a simple selector was used by identifying the element as ‘#watermark’ from which many attributes were applied in CSS for the selected image to function as a watermark for the webpage.
        </p>
        <p>
            The hoverzoom effect found in index.html was adapted to certain objects found in topic.html to achieve a zoom effect when the cursor hovers over these elements.
        </p>
        <p>
            The embedded YouTube Video utilised an ‘iframe’ element was placed inside an aside element that was positioned inside a table. It was styled using the ‘aside’ properties which was defined as a class earlier in CSS.
        </p>
        <p>
            Finally, the custom horizontal line displayed above the footer was implemented to enhance the visual performance of the webpage which was styled in CSS using several attributes. Some examples include overflow, border style and content. Furthermore, a pseudo-element selector was also utilised to enable the line to behave in the intended manner.
        </p>
    </div>
</body>
</html>
