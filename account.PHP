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
        <!-- placeholder html, this will be echoed by PHP or not depending on the presence of a session variable -->
        <div id="content">
            <p class="centered">
                This is the account page, here you can create an account, log in or out of your account, and check your account credentials.

                <br><br>

            </p>

            <?php
                include 'MTQservices.PHP';
                
                //check to see if a user has logged in already
                if (isset($_SESSION['loggedIn'])) {
                    echo '<p class="centered"><button type="button"><a class="MTQbutton" href="account.loggedout.PHP">Log out</button></a></p>';
                }

                else {
                    echo '<p class="centered"><button type="button"><a class="MTQbutton" href="account.create.PHP">Create an account</a></button></p>';
                    echo '<p class="centered"><button type="button"><a class="MTQbutton" href="account.login.PHP">Login</a></button></p>';
                }
            ?>

        </div>
    </body>

</html>