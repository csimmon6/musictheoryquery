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
            is a major second intervalas is D to E. Despite using different notes the interval is the same.</p>
                
            <p>Using the major scale (click <a href="scales.html">here</a> if you need to brush up on the major scale!) we can find intervals by picking a note and moving 
            to another not in the same scale. Moving from one note to the next is a major second interval. Starting from the same note but moving two notes makes a major 
            third interval.</p>

            <p>The tool below will tell you what kind of an interval you have when you pick two notes from a key. Use this to test your understanding of intervals!</p>

            <div id="calculator">
                <label for="intCalcKey">First, select a key:</label>
                <select name="intCalcKey">
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                    <option>F</option>
                    <option>G</option>
                    <option>A</option>
                    <option>B</option>
                </select>
            </div>

            <!-- this button will initiate javascript function to add resrouce to home page -->
            <button>Add to Home</button>

        </div>
    </body>

</html>