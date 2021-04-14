<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Music Theory Query</title>

        <!-- add metadata later *****
        <meta name="description" content="The HTML5 Herald">
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
            <p>We know that notes in the same key can sound good together, and we can combine those notes to create chords. A chord is just three notes played at the same time, however 
            those notes must be in the same key or the chord will not sound right.</p>

            <p>If we build a major scale with the W, W, H, W, W, W, H pattern (click <a href="scales.html">here</a> if you need to brush up on the major scale!), we can number those notes 
            one to eight. For example, in the key of C it would be C, D, E, F, G, A, B, C, where C is one, D is two, and so on. To build a major chord, all you need to do is play the first, 
            third, and fifth notes at the same time. Since we are in the key of C, this is a C Major chord.</p>

            <p>Of course there are many more kinds of chords than just major chords, but they can all be built using the same fundamentals. Play around with the tool below to 
            see some different kinds of chords!</p>

            <label for="selectChord">Pick a chord here:</label>
            <select name="selectChord" id="selectChord">
                <option>C</option>
                <option>D</option>
                <option>E</option>
                <option>F</option>
                <option>G</option>
                <option>A</option>
                <option>B</option>
            </select>

            <br>
            <!-- this button will initiate javascript function to add resrouce to home page -->
            <button>Add to Home</button>

        </div>
    </body>

</html>