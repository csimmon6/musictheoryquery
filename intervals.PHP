<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Music Theory Query</title>

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
                <a class="navlinks" href="chords.PHP">Chords</a>
                <a class="navlinks" href="account.PHP">Account</a>
            </div>
        </div>

        <!-- *** page content begins here *** -->
        <div id="content">
            <!-- page information and theory -->
            <p>Intervals can be thought of as the space between notes. Each interval has a quality to it that can be heard even if the notes are different. For example, from A to B 
            is a major second interval as is D to E. Despite using different notes the interval is the same.</p>
                
            <p>Using the major scale (click <a href="scales.PHP">here</a> if you need to brush up on the major scale!) we can find intervals by picking a note and moving 
            to another note in the same scale. Moving from one note to the next is a major second interval. Starting from the same note but moving two notes makes a major 
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
                    <button type="button" onclick="intCalc('intCalcOne', 'intCalcTwo')">Submit</button>
                </form>

                <!-- this form chooses which resource to pull from the db -->
                <form id="intCalcResForm" action="" method="post">
                    <select name="selectRes" id="selectRes" style="visibility: hidden;">
                        <option id="intSelectRes"></option>
                    </select>

                    <!-- hidden select element to post table name variable -->
                    <select name="selectTable" style="visibility: hidden;">
                        <option value="Intervals"></option>
                    </select>                
                </form>

                <?php
                    include 'MTQservices.PHP';

                    //pull resource from db using form data
                    getResource($conn);

                    //offer the user the ability to add the resource to their home screen
                    offerResource();
                ?>

            </div>
        </div>
    </body>

</html>