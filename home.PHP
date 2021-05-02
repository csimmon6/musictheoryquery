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

            <?php
                include 'MTQservices.PHP';

                loadHome($conn);
            ?>

        </div>

        <!-- footer begins here -->
        <div class="footer">
            Music Theory Query - Connor Simmons - 2021 Maryville University SWDV 691
        </div>

    </body>

</html>