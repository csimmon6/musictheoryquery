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
            <!-- page information and theory -->
            <p>Knowing how to tune your instrument is an important part of learning that instrument. If you play a stringed instrument (or some percussion instruments), chances are you 
                will have to tune it someday. Basically, tuning an instrument means ensuring that the instrument makes the sounds that it is supposed to. For stringed instruments this means 
                tightening or loosening the strings until they produce the appropriate pitch. It's worth saying that there is no "correct" tuning, but most instruments have a standard tuning 
                that is widely accepted and will be necessary to play much music. For guitar, standard tuning is, from top string to bottom, E, A, D, G, B, E. You can use the tool below to 
                check out some other types of tunings, and tunings for different instruments!
            </p>

            <!-- this form chooses which resource to pull from the db -->
            <form action="" method="post" onchange="this.submit()">
                <label for="selectRes">Check out some standard tunings:</label>
                <select name="selectRes" id="selectRes">
                    <option></option>
                    <option value="7">Guitar</option>
                    <option value="8">Mandolin</option>
                    <option value="9">Banjo</option>
                </select>

                <!-- hidden select element to post table name variable -->
                <select name="selectTable" style="visibility: hidden;">
                    <option value="Tunings"></option>
                </select>                
            </form>

            <?php
                include 'MTQservices.PHP';

                //pull resource from db using form data
                getResource($conn);

                //offer the user the ability to add the resource to their home screen
                offerResource();
            ?>

        </div>

        <!-- footer begins here -->
        <div class="footer">
            Music Theory Query - Connor Simmons - 2021 Maryville University SWDV 691
        </div>

    </body>

</html>