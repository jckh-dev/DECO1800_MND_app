<?php
  session_start(); // start $_SESSION
  // guided tour vars
  $game = [
    "Bushfire",
    "Tornado",
    "Flood"
  ];
  $game = json_encode($game);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choose Your Journey</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
</head>

<body class="indexpage">    

  <header class="box header navhd">
    <a href="index.php"><img src="images/back arrow.png" alt="Go Back" class="backarrow"/></a>
    <a href="index.php"><img src="images/logo.png" alt="Go Home" class="homelogo" height="100" width="150"/></a>
    <a href=""><img src="images/next arrow.png" alt="Next" class="nextarrow"/></a>
  </header>

  <aside class="box">
      <h1>WHERE WOULD YOU <BR>LIKE TO START?</h1>
  </aside>
            
  <aside class="box">
    <form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="button">PLAY THE GAME</button>
    </form>
  </aside>

  <footer class="box footer">PLACEHOLDER FOR BREADCRUMB</footer>

</body>

</html>