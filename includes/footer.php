<footer class="ftr">

<ul class="breadcrumb">

<li><a href="index.php"class="fas fa-door-open">  Welcome</a></li>

<li><a href="journey.php" class="fas fa-home">  Home</a></li>

<!-- Doesn't keep the current game running -- resets it -->
<li><a>
<form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="fas fa-gamepad">  Game</button></form></a>
</li>

<li><a href="map.php" class="fas fa-map-marked-alt">  Map</a></li>

<li><a href="scoreboard.php" class="fas fa-bullhorn">  Leaderboard</a></li>

</ul>

</footer>
</div>
</body>
</html>
