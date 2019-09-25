<footer class="footer">

<ul class="breadcrumb">

<li><a href ="index.php"><button class="footerbtn"><i class="fas fa-door-open"></i><br>Welcome</button></a></li>
<li><a href ="journey.php"><button class="footerbtn"><i class="fas fa-home"></i><br>Home</button></a></li>
<li><form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="footerbtn"><i class="fas fa-gamepad"></i><br>Game</button>
    </form>
</li>
<li><a href ="map.php"><button class="footerbtn"><i class="fas fa-map-marked-alt"></i><br>Map</button></a></li>
<li><a href ="scoreboard.php"><button class="footerbtn"><i class="fas fa-bullhorn"></i><br>Leader Board</button></a></li>
<li><a href ="ending.php"><button class="footerbtn"><i class="fas fa-crown"></i><br>End</button></a></li>

</ul>

</footer>

</div>
</body>
</html>