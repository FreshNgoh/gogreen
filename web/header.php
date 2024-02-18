<?php
include './php/dbConn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoGreen</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    <?php include 'index.css' ?>
  </style>
</head>

<body id="blur-start">
  <header>
    <nav class="navbar" id="blur-header">
      <a href="home.php" class="logo">
        <img src="./images/logo.png" alt="logo" />
        <h2>GoGreen</h2>
      </a>
      <ul class="links">
        <li><a href="about.php">About Us</a></li>
        <li><a href="program.php">Programs</a></li>
        <li><a href="donate.php">Donate</a></li>
        <li><a href="home.php#blur-contact">Contact</a></li>
      </ul>
      <?php
      if (isset($_GET['logout'])) {
        echo '<script>
                    location.href = "./php/logout.php";
                  </script>';
        exit();
      }

      if (isset($_SESSION['username'])) {
        echo '
                <div class="dropdown">
                  <button id="login-btn">' . $_SESSION['username'] . '</button>
                  <div class="dropdown-content" id="profileDropdown">
                    <a href="?logout=true" id="logoutLink">Logout</a>
                  </div>
                </div>';
      } else {
        echo '<button id="login-btn">LOG IN</button>';
      }
      ?>
    </nav>
    <div id="login-page">
      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <form class="login-form" action="./php/signUp.php" method="post">
            <i class="fa-solid fa-xmark" id="close-btn-sign-up"></i>
            <h1>Create Account</h1>
            <input type="text" placeholder="Username" name="signUpName" />
            <input type="email" placeholder="Email" name="signUpEmail" />
            <input type="password" placeholder="Password" name="signUpPassword" />
            <button type="submit" value="signUp" name="signUpBtn">
              Sign Up
            </button>
            <?php
            if (isset($_SESSION['signUpError'])) {
              echo '<script>
                      alert("' . $_SESSION['signUpError'] . '");
                      </script>';
              unset($_SESSION['signUpError']);
            }
            ?>
          </form>
        </div>
        <div class="form-container sign-in-container">
          <form class="login-form" action="./php/signIn.php" method="post">
            <h1>Sign in</h1>
            <input type="email" placeholder="Email" name="signInEmail" />
            <input type="password" placeholder="Password" name="signInPassword" />
            <button type="submit" value="signIn" name="signInBtn">
              Sign In
            </button>
            <?php
            if (isset($_SESSION['signInError'])) {
              echo '<script>
                      alert("' . $_SESSION['signInError'] . '");
                      </script>';
              unset($_SESSION['signInError']);
            }
            ?>
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back</h1>
              <p>
                To keep connected with us please login with your personal info
              </p>
              <button class="overlay-btn" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <i class="fa-solid fa-xmark" id="close-btn-overlay"></i>
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="overlay-btn" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</body>
<script type="module" src="./javascript/loginPage.js"></script>

</html>