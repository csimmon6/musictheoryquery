<!doctype html>

<html lang="en">
    <head>
        <!-- try adding http-equiv refresh to deployed environment -->
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
            <?php
                include 'MTQservices.PHP';

                //add selected resource to user resource table in db
                $sql = "INSERT INTO `User Resources`(UserID, Source)
                    SELECT " . $_SESSION['loggedIn'] . ", Source
                    FROM Tunings
                    WHERE ResourceID = " . $_POST['addTune'] . ";";

                $conn->query($sql);

                //report success and incoming redirect
                echo '<p class="centered"> The resource has been added to your homepage! You will be redirected back to the Tunings page shortly!';
                echo $sql;
            ?>
        </div>
    </body>

</html>