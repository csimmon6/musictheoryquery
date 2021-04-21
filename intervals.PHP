<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Music Theory Query</title>

        <!-- add metadata later *****
        <meta name="description" content="The html5 Herald">
        <meta name="author" content="SitePoint"> -->

        <link rel="stylesheet" href="MTQ.CSS">
        <script type="text/javascript" src="MTQ.JS"></script>

    </head>

    <body>
        <!-- header div hosts logo image and navbar-->
        <div id="header">
            <div id="logoContainer">
                <a href="home.php"><img src="logo stuff/logo.PNG" id="logo"></a>
            </div>

            <div id="navbar">
                <a class="navlinks" href="home.PHP">Home</a>
                <a class="navlinks" href="tunings.PHP">Tunings</a>
                <a class="navlinks" href="scales.PHP">Scales</a>
                <a class="navlinks" href="intervals.PHP">Interval Calculator</a>
                <a class="navlinks" href="chords.PHP">Chord Builder</a>
                <a class="navlinks" href="">Account</a>
            </div>
        </div>

        <!-- *** page content begins here *** -->
        <div id="content">
            <p>Intervals can be thought of as the space between notes. Each interval has a quality to it that can be heard even if the notes are different. For example, from A to B 
            is a major second interval as is D to E. Despite using different notes the interval is the same.</p>
                
            <p>Using the major scale (click <a href="scales.PHP">here</a> if you need to brush up on the major scale!) we can find intervals by picking a note and moving 
            to another not in the same scale. Moving from one note to the next is a major second interval. Starting from the same note but moving two notes makes a major 
            third interval.</p>

            <p>The tool below will tell you what kind of an interval you have when you pick two notes from the key of C. Use this to test your understanding of intervals!</p>

            <div id="calculator">
                <form action="" method="post">
                    <!-- first note select form -->
                    <label for="intCalcOne">Select the first note:</label>
                    <select name="intCalcOne" id="intCalcOne">
                        <option value=0>c</option>
                        <option value=1>D</option>
                        <option value=2>E</option>
                        <option value=3>F</option>
                        <option value=4>G</option>
                        <option value=5>A</option>
                        <option value=6>B</option>
                    </select>

                    <!-- second note select form -->
                    <label for="intCalcTwo">Select the second note:</label>
                    <select name="intCalcTwo" id="intCalcTwo">
                        <option value=0>c</option>
                        <option value=1>D</option>
                        <option value=2>E</option>
                        <option value=3>F</option>
                        <option value=4>G</option>
                        <option value=5>A</option>
                        <option value=6>B</option>
                        <option value=7>C</option>
                    </select>
                    <input type="submit">
                </form>

                <?php
                    include 'MTQservices.PHP';

                    //before querying db, we must determine the appropriate resouce to retun

                    $difference = abs($_POST['intCalcOne'] - $_POST['intCalcTwo']);
                    
                    //switch case determinse which resource to grab from db
                    switch ($difference) {
                        case 0: $resource = 17;
                        break;

                        case 1: $resource = 18;
                        break;

                        case 2: $resource = 19;
                        break;

                        case 3: $resource = 20;
                        break;

                        case 4: $resource = 21;
                        break;

                        case 5: $resource = 22;
                        break;

                        case 6: $resource = 23;
                        break;

                        case 7: $resource = 24;
                        break;
                    }

                    $sql = "SELECT Source
                    FROM Intervals
                    WHERE ResourceID=" . $resource;
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_array($result);
    
                    // insert image to page
                    echo '<img id="scalesRes" src="';
                    echo $row[0];
                    echo '">'
                ?>

            </div>

            <!-- this button will initiate javascript function to add resrouce to home page -->
            <button>Add to Home</button>

        </div>
    </body>

</html>