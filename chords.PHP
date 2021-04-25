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
                <a class="navlinks" href="chords.PHP">Chord Builder</a>
                <a class="navlinks" href="account.PHP">Account</a>
            </div>
        </div>

        <!-- *** page content begins here *** -->
        <div id="content">
            <!-- page information and theory -->
            <p>We know that notes in the same key can sound good together, and we can combine those notes to create chords. A chord is just three notes played at the same time, however 
            those notes must be in the same key or the chord will not sound right.</p>

            <p>If we build a major scale with the W, W, H, W, W, W, H pattern (click <a href="scales.PHP">here</a> if you need to brush up on the major scale!), we can number those notes 
            one to eight. For example, in the key of C it would be C, D, E, F, G, A, B, C, where C is one, D is two, and so on. To build a major chord, all you need to do is play the first, 
            third, and fifth notes at the same time. Since we are in the key of C, this is a C Major chord.</p>

            <p>Of course there are many more kinds of chords than just major chords, but they can all be built using the same fundamentals. Play around with the tool below to 
            see some different kinds of chords!</p>

            <!-- this form chooses which resource to pull from the db -->
            <form action="" method="post">
                <label for="selectChord">Pick a chord here:</label>
                <select name="selectChord" id="selectChord">
                    <option value="10">C</option>
                    <option value="11">D</option>
                    <option value="12">E</option>
                    <option value="13">F</option>
                    <option value="14">G</option>
                    <option value="15">A</option>
                    <option value="16">B</option>
                </select>
                <input type="submit">
            </form>

            <?php
                //retrieve image source from database
                include 'MTQservices.PHP';
                $sql = "SELECT Source
                FROM `Chord Shapes`
                WHERE ResourceID=" . $_POST['selectChord'];
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);

                // insert image to page
                echo '<img id="scalesRes" src="';
                echo $row[0];
                echo '">'
            ?>

            <br>
            <!-- this button will initiate PHP function to add resource to home page -->
            <button>Add to Home</button>

        </div>
    </body>

</html>