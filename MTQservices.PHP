<?php
//start session for loggedin variable
session_start();

//connect to MTQ db
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "music theory query db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};

//this function pulls a resource from the db for display on resource pages - see resource pages (tunings, scales, etc)
function getResource($conn) {
    //query db for selected resource
    $sql = "SELECT Source
    FROM " . $_POST['selectTable'] . "
    WHERE ResourceID=" . $_POST['selectRes'];
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
  
    //insert image to page
    echo '<img src="' . $row[0] . '">';
  };

//this function echoes the (mostly hidden) html form which offers the user the option to add a resource to their homepage
function offerResource() {
    echo '
    <form action="addResource.PHP" method="post">
        <select name="addRes" id="addRes" style="visibility: hidden;">
            <option value="' . $_POST['selectRes'] . '"></option>
        </select>

        <!-- hidden select element passes db table variable through post -->
        <select name="tableVar" style="visibility: hidden;">
            <option value="' . $_POST['selectTable'] . '"></option>
        </select>
        <input type="submit" value="Add to home">
    </form>
    ';
};


//this function adds a resource to the user's home page - see resource pages (tunigs, scales, etc)
function addResource($conn) {
  //check if user is logged in
  if (isset($_SESSION['loggedIn'])) {
    //add selected resource to user resource table in db
    $sql = "INSERT INTO `User Resources`(UserID, Source)
        SELECT " . $_SESSION['loggedIn'] . ", Source
        FROM " . $_POST['tableVar'] . "
        WHERE ResourceID = " . $_POST['addRes'] . ";";

    $conn->query($sql);

    //report success and incoming redirect
    echo '<p class="centered"> The resource has been added to your homepage! You will be redirected back to the Tunings page shortly!';
  }

  else {
    //remind user that they need an account to use the customizable home page feature
    echo '<p class="centered">Looks like you have not create an account with us yet! If you would like to fill your home page with resources, <a href="account.PHP">click here to 
    create an account!</a></p>';
  }
};

//this function removes a resource from the user's home page - see home.remove.PHP
function remResource($conn) {
  //remove requested resource from user resources db table
  $sql = "DELETE
  FROM `User Resources`
  WHERE Source = \"" . $_POST['remRes'] . "\";";
  $conn->query($sql);

  echo 'Resource removed succesffully, you will be returned to the home page shortly!';
};

//this function determines and then pulls the appropriate interval resource - see intervals.PHP
function getInterval($conn) {

};

//this function creates a user account with data from the user - see account.created.PHP
function createAccount($conn) {
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
};

//this function loads the custom home page - see home.PHP
function loadHome($conn) {
  //check if user is logged in
  if (isset($_SESSION['loggedIn'])) {
      $sqlVerify = "SELECT *
          FROM `User Resources`
          WHERE UserID = " . $_SESSION['loggedIn'] . ";";

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
              FROM `User Resources`
              WHERE UserID = " . $_SESSION['loggedIn'] . ";";

          $result = $conn->query($sql);
          
          foreach ($result as $entry) {
              //this echo writes the html to display the resource
              echo '<div class="homeRes">';
              echo '<img src="' . $entry['Source'] . '">';

              //this echo creates the remove button
              echo '
              <form action="home.remove.PHP" method="post">
                  <select name="remRes" style="visibility: hidden">
                      <option value="' . $entry['Source'] . '">
                  <input type="submit" value="Remove">
              </form>
              ';
              echo '</div>';
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
};

//this function logs a user into their account
function logIn($conn) {
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

          $_SESSION['loggedIn'] = $userID;
      }

      else {
          echo '<p class="centered">Password incorrect for user: ' . $_POST['uname'] . '.</p>';
          echo '<p class="centered">Please check your credentials and <a href="account.login.PHP">try again!!!</a></p>';
      }
  }
};
?>