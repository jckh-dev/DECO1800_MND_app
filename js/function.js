// breadcrumb insert/delete james
var pathname = window.location.pathname.split("/");
var last = pathname[pathname.length - 1];
var welcome = '<a href="index.php" class="pagination-page-number" id="fwelcome">Welcome</a>';
var home = '<a href="journey.php" class="pagination-page-number" id="fhome">Home</a>';
var tour = '<a href="guidedtour.php" class="pagination-page-number" id="ftour">Tour</a>';
var game = '<a href="game.php" class="pagination-page-number" id="fgame">Game</a>';
var map = '<a href="map.php" class="pagination-page-number" id="fmap">Map</a>';
var scores = '<a href="scoreboard.php" class="pagination-page-number id="fscores">Scores</a>';
var finish = '<a href="ending.php" class="pagination-page-number" id="fending">Finish</a> ';

if (last == "journey.php") {
  $(".breadcrumb").append(welcome);
  $(".breadcrumb").append(home);
  $("#fhome").addClass("footer-active")
} else if (last == "game.php") {
  $(".breadcrumb").append(welcome);
  $(".breadcrumb").append(home);
  $(".breadcrumb").append(game);
  $("#fgame").addClass("footer-active")
} else if (last == "map.php") {
  $(".breadcrumb").append(welcome);
  $(".breadcrumb").append(home);
  $(".breadcrumb").append(map);
  $("#fmap").addClass("footer-active")
} else if (last == "scoreboard.php") {
  $(".breadcrumb").append(welcome);
  $(".breadcrumb").append(home);
  $(".breadcrumb").append(scores);
  $("#fscores").addClass("footer-active")
} else if (last == "ending.php") {
  $(".breadcrumb").append(welcome);
  $(".breadcrumb").append(home);
  $(".breadcrumb").append(game);
  $(".breadcrumb").append(finish);
  $("#fending").addClass("footer-active")
}


// if (last == "journey.php"){
//  $("#fhome")
// }
// else if (last == "game.php"){

// }
// else if (last == "scoreboard.php"){

// }
// else if (last == "ending.php"){

// }
// else if (last == "map.php"){

// }