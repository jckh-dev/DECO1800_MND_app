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
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
</head>

<body>
    <div class="grid journey">
      
          <header>
            <a href="welcome.html"><img src="images/logo.png" alt="NDM" style="width:150px;height:100px;"></a>
          </header>
            
          <aside id="playgame">
            <form id="start" action="game.php" method="POST">
              <input type="hidden" name="game" value='<?php echo $game; ?>'>
              <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
              <button type="submit" class="button">PLAY THE GAME</button>
            </form>
            
          </aside>

          <aside id="browsecontent"><button class="button"><a href="content.html">BROWSE SOME CONTENT</a></button></aside>

        <footer class="footer">PLACEHOLDER FOR BREADCRUMB LINKS</footer>

      </div>
</body>

</html>