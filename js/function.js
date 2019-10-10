// breadcrumb insert/delete james
var pathname = window.location.pathname.split("/");
var last = pathname[pathname.length - 1];

if (last == "journey.php") {
  $(".breadcrumb").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".breadcrumb").append('<a href="" class="pagination-page-number">Home</a>');
  $("#fhome").addClass("footer-active")
} else if (last == "game.php") {
  $(".breadcrumb").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".breadcrumb").append('<a href="journey.php" class="pagination-page-number">Home</a>');
  $(".breadcrumb").append('<a href="" class="pagination-page-number">Game</a>');
  $("#fgame").addClass("footer-active")
} else if (last == "scoreboard.php") {
  $(".breadcrumb").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".breadcrumb").append('<a href="journey.php" class="pagination-page-number">Home</a>');
  $(".breadcrumb").append('<a href="" class="pagination-page-number">Leaderboard</a>');
  $("#fscores").addClass("footer-active")
} else if (last == "ending.php") {
  $(".breadcrumb").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".breadcrumb").append('<a href="journey.php" class="pagination-page-number">Home</a>');
  $(".breadcrumb").append('<a href="" class="pagination-page-number">Game</a>');
  $(".breadcrumb").append('<a href="" class="pagination-page-number">Finish</a>');
  $("#fending").addClass("footer-active")
}


if (last == "journey.php"){
 $("#fhome")
}
else if (last == "game.php"){

}
else if (last == "scoreboard.php"){

}
else if (last == "ending.php"){

}
else if (last == "map.php"){

}