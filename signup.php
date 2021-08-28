<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/utils.css" type="text/css">
  <link rel="stylesheet" href="css/signin.css" type="text/css">
  <link rel="stylesheet" href="css/signup.css" type="text/css">
  <title>Document</title>
</head>
</head>
<body>
  <header>
    <div class="logo">
      <h1>Kalā</h1>
    </div>
    <nav>
      <ul>
        <li><a href="#">HOME</a> </li>
        <li><a href="#">ABOUT US</a> </li>
        <li><a href="#">CONTACT US</a> </li>
        <li><a href="#">PROFILE</a> </li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="signup-container">
      <h1>SIGN UP </h1>
      <form action="includes/signup.inc.php" method="post">
  
        <h2>E-mail</h2>
        <input type="email" name="email" id="" placeholder="example@remail.com"><br>

        <h2>Username</h2>
        <input type="text" name="uname" id="" placeholder="username123"><br>

        <h2>Password</h2>
        <input type="password" name="pword" id="" placeholder="........"><br>

        <button type="submit" name="signup_submit">Sign Up</button>
        <button> Sign In </button>
      </form>
    </div>  
    
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Fill in all the fields </p>";
    }
    elseif ($_GET["error"] == "invalid") {
     echo "<p> Choose a proper username</p>";
    }
    elseif ($_GET["error"] == "invalidemail") {
      echo "<p> Choose a proper email</p>";
    }
    elseif ($_GET["error"] == "stmtfailed") {
      echo "<p> Something went wrong, try again!</p>";
    }
    elseif ($_GET["error"] == "usernametaken") {
      echo "<p> This username is already taken. Try something else.</p>";
    }
    elseif ($_GET["error"] == "none") {
      echo "<p> You have signed up.</p>";
    }
  }
  ?>
  </main>
  
  <footer>
    
    <div class="copyright">
      <h1>  © All rights reserved 2021</h1>
    </div>
    
  </footer>
  </body>
  </html>



