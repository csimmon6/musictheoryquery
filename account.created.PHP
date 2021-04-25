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
                //php takes user input and creates a user account db entry
                include 'MTQservices.PHP';

                //if statement verifies username availability
                $sqlVerify = "SELECT Username
                    FROM `User Accounts` 
                    WHERE Username = \"" . $_POST['uname'] . "\";";

                $resultVerify = $conn->query($sqlVerify);

                if (mysqli_num_rows($resultVerify) == 0) {
                    //retrieve and increment by one the max userID
                    $getID = "SELECT MAX(UserID)
                    FROM `user accounts`";

                    $IDresult = $conn->query($getID);
                    $IDrow = mysqli_fetch_array($IDresult);
                    $userID = $IDrow[0] + 1;

                    //insert account credentials into db
                    $sql = "INSERT INTO `user accounts`
                    VALUES
                        (" . $userID . ", \"" . $_POST['uname'] . "\", \"" . $_POST['pword'] . "\", \"" . $_POST['email'] . "\")";

                    $conn->query($sql);

                    //echo success
                    echo '<p class="centered">Account created succesfully!!!</p>';
                    echo '<p class="centered"><a href="account.login.PHP">Now click here to log in!!!</a></p>';
                }

                else {
                    echo '<p class="centered">Sorry! That username is already in use.</p>';
                    echo '<p class="centered"><a href="account.create.PHP">Click here to try again!</a></p>';
                }
                
            ?>
        </div>
    </body>

</html>