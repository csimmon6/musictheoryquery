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
            <?php
                include 'MTQservices.PHP';

                //for username validation
                $sqlVerifyU = "SELECT Username
                    FROM `User Accounts`
                    WHERE Username = \"" . $_POST['uname'] . "\";";

                $resultVerifyU = $conn->query($sqlVerifyU);

                //for password validation
                $sqlVerifyP = "SELECT Password
                    FROM `User Accounts`
                    WHERE Username = \"" . $_POST['uname'] . "\";";

                $resultVerifyP = $conn->query($sqlVerifyP);
                $resultVerifyPRow = mysqli_fetch_array($resultVerifyP);
                $pword = $resultVerifyPRow[0];

                if (mysqli_num_rows($resultVerifyU) == 0) {
                    echo '<p class="centered">Username: ' . $_POST['uname'] . ' not found. Please check your credentials and <a href="account.login.PHP">try again!!!</a></p>';
                }

                else {
                    if ($pword == $_POST['pword']) {
                        echo '<p class="centered">Log in successful!!!</p>';
                        echo '<p class="centered"><a href="home.PHP">Click here to return to the home page</a>, or use the navigation bar to access the rest of the site!!!</p>';

                        //get userID associated with username and store as session variable for use across site
                        $sqlGetID = "SELECT UserID
                            FROM `User Accounts`
                            WHERE Username = \"" . $_POST['uname'] . "\";";

                        $resultGetID = $conn->query($sqlGetID);
                        $rowGetID = mysqli_fetch_array($resultGetID);
                        $userID = $rowGetID[0];

                        session_start();
                        $_SESSION['loggedIn'] = $userID;
                    }

                    else {
                        echo '<p class="centered">Password incorrect for user: ' . $_POST['uname'] . '.</p>';
                        echo '<p class="centered">Please check your credentials and <a href="account.login.PHP">try again!!!</a></p>';
                    }
                }
            ?>
        </div>
    </body>

</html>