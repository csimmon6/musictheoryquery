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
            <!-- createAcct dive hosts account creation form -->
            <div id="createAcct">
                <form action="account.created.PHP" method="post">
                    <label for="uname">Enter a username: </label>
                    <input type="text" name="uname">
                    <br>
                    <label for="pword">Enter a password: </label>
                    <input type="text" name="pword">
                    <br>
                    <label for="email"> Enter an email: </label>
                    <input type="text" name="email">
                    <input type="submit" value="Create Account">
                </form>
                
                <br><br>

                <!-- this button redirects to login page -->
                Already have an account?
                <button><a class="MTQbutton" href="account.login.PHP">Log in</a></button>
            </div>
        </div>
    </body>

</html>