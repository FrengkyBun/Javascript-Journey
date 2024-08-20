<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory indexing</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Khula:700);

        /* Main Banner */

        .hidden {
            opacity:0;
        }

        .console-container {
            font-family:Khula;
            font-size:2em;
            text-align:center;
            align-content: center;
            height:300px;
            width:100%;
            display:block;
            color:white;
            top:0;
            bottom:0;
            left:0;
            right:0;
            margin:auto;
        }

        .console-underscore {
            display:inline-block;
            position:relative;
            top:-0.14em;
            left:10px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* background: ; */
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        .banner {
            background-image: url('resource/image/lesson-banner.png'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }
        .banner h2 {
            font-size: 3em;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        main {
            padding: 40px 20px;
            text-align: center;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Table of Content Card */
        
        .content {
            font: 1em/1.618 Inter, sans-serif;

            display: flex;
            align-items: center;
            justify-content: center;
            
            /* min-height: 100vh; */
            /* padding: 30px; */
            margin: 0;
            
            color: #224;
            background:
                url(https://source.unsplash.com/E8Ufcyxz514/2400x1823)
                center / cover no-repeat fixed;
        }

        .card {
        max-width: 300px;
        min-height: 200px;
        min-width: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        height: 150px;
        padding: 0px 15px;

        border: 1px solid rgba(255, 255, 255, .25);
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.45);
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25);

        backdrop-filter: blur(15px);
        }

        .card-footer {
        font-size: 0.65em;
        color: #446;
        }

        /* about */

        .about .right-side #about-main{
            font-family: Arial;
            
            background: linear-gradient(100deg, green, blue);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            
            font-size: 1.5em;
        }

        /* Styles for screens wider than or equal to 720px */
        @media (min-width: 720px) {
            h3 {
                font-size: 16px;
                
                /* Other styles for larger screens */
            }

            .about {
                overflow: hidden;
                padding: 20px 0px;
            }

            .about .left-side{
                background-image: url('resource/image/about-banner2.png'); /* Replace with your image URL */
                background-repeat: no-repeat;
                background-size: contain;
                background-position: right;
                width: 40%;
                height: 400px;
                float: left;
            }
            .about .right-side{
                margin: 2em 1em 0 auto; /* top right bottom left */
                width: 55%;
                text-align: left;
                float: right;
            }
        }

        /* Styles for screens narrower than 720px */
        @media (max-width: 719px) {
            h3 {
                font-size: 14px;
                /* Other styles for smaller screens */
            }

            .about {
                overflow: hidden;
            }
        }

    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="resource/script/custom.js"></script>
</head>
<body>
    <header>
        <h1></h1>
    </header>

    <div class='console-container'>
        <span id='maintextbanner'></span>
        <div class='console-underscore' id='console'>&#95;</div>
    </div>

    <div class="content">

        <!-- <div class="card">
            <p>A glass-like card to demonstrate the <strong>Glassmorphism UI design</strong> trend.</p>
            <p class="card-footer">Created by Rahul C.</p>
        </div> -->

        <?php
        $directory = '.'; // Current directory
        $files = scandir($directory);

        $ignorethis = [".git","resource"];

        foreach ($files as $file) {
            //Check whether scanned object is not included in list of variable ignorethis
            $counter = 1;
            if ($file !== '.' && $file !== '..' && !in_array($file,$ignorethis)) {
                if (is_dir($file)) {
                    echo "<div class=\"card\">";
                    echo "<p><strong>$file</strong> .</p><br>";
                    echo "<a href=\"$file/\" target=\"_blank\">Go to project</a>";
                    echo "<p class=\"card-footer\">Lesson no. $counter</p>";
                    echo "</div>";
                    // echo "<li><strong><a href=\"$file/\">[DIR] $file</a></strong></li>";
                } else { //not directory not do anything
                    // echo "<li><a href=\"$file\">$file</a></li>";
                }
            }
            $counter++;
        }
        ?>  

    </div>

    <div class="about">
        <div class="left-side">

        </div>

        <div class="right-side">
            <h2>About</h2>
            <p id="about-main">This is just a personal track of me learning javascript
                <br/>i will keep updating what i learn here
                <br>and keep the small note for me to come back, 
                <br/>if you find my note is easy to understand
                <br>I really don't mind if you fork this project.
                <br>Keep learning can help you achieve your goals, don't give up.</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 bunbun. All rights reserved.</p>
    </footer>

</body>

</html>