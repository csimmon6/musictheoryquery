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

                //check if user is logged in
                if (isset($_SESSION['loggedIn'])) {
                    $sqlVerify = "SELECT *
                        FROM `User Resources`;";

                    $resultVerify = $conn->query($sqlVerify);

                    //check for resources to load in
                    if (mysqli_num_rows($resultVerify) == 0) {
                        echo '<p>
                        Welcome to Music Theory Query! It looks like you have made an account with us, but have not added any resources to your home page yet. If you would like 
                        to add resources, use the navigation bar to find the desired resource page. There you will find an option to add any resource to your home page. Look for 
                        the button at the bottom of the page that says "Add to home"!
                        </p>';
                    }

                    else {
                        //get array of resource source paths from db
                        $sql = "SELECT Source
                            FROM `User Resources`";

                        $result = $conn->query($sql);
                        
                        foreach ($result as $entry) {
                            echo '<img src="' . $entry['Source'] . '">';
                        }
                    }
                }

                //display generic site information if no user is logged in
                else {
                    echo '<p>
                    Welcome to Music Theory Query, the interactive music theory practice resource! You can use the navigation bar above to check out each page on the website. 
                    If you would like to make an account with us, you will be able to save practice resources to this page, and customize it to suit your practice needs! Click 
                    the "Account" button on the right of the navigation bar to get started or log in.
                    </p>';
                }
            ?>
        </div>
    </body>

</html>