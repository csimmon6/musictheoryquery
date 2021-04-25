<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Music Theory Query</title>

        <link rel="stylesheet" href="MTQ.CSS">
        <script type="text/javascript" src="MTQ.JS"></script>

    </head>

    <body>
        <!-- header div hosts logo image and navbar -->
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
                <a class="navlinks" href="account.PHP">Account</a>
            </div>
        </div>

        <!-- *** page content begins here *** -->
        <div id="content">
            <!-- page information and theory -->
            <p>Scales are like a pattern of notes that are played in a given key. Put very simply, keys are like groups of notes and chords that can sound good together. If you play 
            in one key and add notes from outside of that key, those notes will sound out of place. Finding notes in a major key is a simple as following a pattern: whole, 
            whole, half, whole, whole, whole, half.</p>
            
            <p>Whole and half refer to steps (also called tones). Using a piano for example, a half step is moving from one key on the keyboard to the next one 
            (left or right and including black and white keys) and a whole step is moving two keys. On string instruments with frets, like a guitar, a half step is moving one fret 
            up or down on the same string, and a whole step is two frets.</p>

            <p>Below you can see this pattern put into practice. You can use the drop down list to see the pattern in different keys, the only difference is the note that you start on. 
            For example, if you choose the key of C the pattern (W, W, H, W, W, W, H) begins on the note C.</p>
            
            <!-- this form chooses which resource to pull from the db -->
            <form action="" method="post">
                <label for="selectKey">Choose a key:</label>
                <select name="selectKey" id="selectKey">
                    <option value="0">C</option>
                    <option value="1">D</option>
                    <option value="2">E</option>
                    <option value="3">F</option>
                    <option value="4">G</option>
                    <option value="5">A</option>
                    <option value="6">B</option>
                </select>
                <input type="submit">
            </form>

            <?php
                //retrieve image source from database
                include 'MTQservices.PHP';
                $sql = "SELECT Source
                FROM Scales
                WHERE ResourceID=" . $_POST['selectKey'];
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);

                //insert image to page
                echo '<img id="scalesRes" src="';
                echo $row[0];
                echo '">'
            ?>

            <br><br>

            <!-- this button will initiate PHP function to add resource to home page -->
            <button>Add to Home</button>

        </div>
    </body>

</html>