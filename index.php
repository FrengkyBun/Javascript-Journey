<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory indexing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        /* Styles for screens wider than or equal to 720px */
        @media (min-width: 720px) {
            h3 {
                font-size: 16px;
                
                /* Other styles for larger screens */
            }

            .about {
                overflow: hidden;
            }

            .about .left-side{
                background-image: url('resource/image/about-banner2.png'); /* Replace with your image URL */
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center;
                width: 40%;
                height: 400px;
                float: left;
            }
            .about .right-side{
                margin: 10px;
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
</head>
<body>
    <header>
        <h1>-</h1>
    </header>

    <div class="banner">
        <h2>Learning curve of javascript in 2024.</h2>
    </div>

    <div class="content">
        
        <h1>Table Of Content</h1>
        <ul>
            <?php
            $directory = '.'; // Current directory
            $files = scandir($directory);

            foreach ($files as $file) {
                //Check whether scanned object is folder and not git folder
                if ($file !== '.' && $file !== '..' && $file !== ".git") {
                    if (is_dir($file)) {
                        echo "<li><strong><a href=\"$file/\">[DIR] $file</a></strong></li>";
                    } else { //not directory not do anything
                        // echo "<li><a href=\"$file\">$file</a></li>";
                    }
                }
            }
            ?>
        </ul>   

    </div>

    <div class="about">
        <div class="left-side">

        </div>

        <div class="right-side">
            <h2>About</h2>
            <p>This is just a personal track of me learning javascript
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