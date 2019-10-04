let paginationLeftPos = "20px";
let paginationOpacity = 0;
let checkPaginationClick = 0;
 
$(".pagination-page-number").click(function () {
  $(".pagination-page-number").removeClass("active");
  $(this).addClass("active");
  paginationLeftPos = $(this).prop("offsetLeft") + "px";
  paginationOpacity = 1;
  checkPaginationClick = 1;
 
  $(".pagination-hover-overlay").css({
    left: paginationLeftPos,
    backgroundColor: "#e60023",
    opacity: paginationOpacity });
 
  $(this).css({
    color: "#fff" });
 
});
 
$(".pagination-page-number").hover(
function () {
  paginationOpacity = 1;
  $(".pagination-hover-overlay").css({
    backgroundColor: "#fa4949",
    left: $(this).prop("offsetLeft") + "px",
    opacity: paginationOpacity });
 
 
  $(".pagination-page-number.active").css({
    color: "#212121" });
 
 
  $(this).css({
    color: "#fff" });
 
},
function () {
  if (checkPaginationClick) {
    paginationOpacity = 1;
  } else {
    paginationOpacity = 0;
  }
 
  $(".pagination-hover-overlay").css({
    backgroundColor: "#e60023",
    opacity: paginationOpacity,
    left: paginationLeftPos });
 
 
  $(this).css({
    color: "#212121" });
 
 
  $(".pagination-page-number.active").css({
    color: "#fff" });
 
});

// breadcrumb insert/delete james
var pathname = window.location.pathname.split("/");
var last = pathname[pathname.length - 1];
if (last == "journey.php") {
  $(".pagination-container").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".pagination-container").append('<a href="" class="pagination-page-number">Home</a>');
} else if (last == "game.php") {
  $(".pagination-container").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".pagination-container").append('<a href="journey.php" class="pagination-page-number">Home</a>');
  $(".pagination-container").append('<a href="" class="pagination-page-number">Game</a>');
} else if (last == "scoreboard.php") {
  $(".pagination-container").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".pagination-container").append('<a href="journey.php" class="pagination-page-number">Home</a>');
  $(".pagination-container").append('<a href="" class="pagination-page-number">Leaderboard</a>');
} else if (last == "ending.php") {
  $(".pagination-container").append('<a href="index.php" class="pagination-page-number">Welcome</a>');
  $(".pagination-container").append('<a href="journey.php" class="pagination-page-number">Home</a>');
  $(".pagination-container").append('<a href="" class="pagination-page-number">Game</a>');
  $(".pagination-container").append('<a href="" class="pagination-page-number">Finish</a>');
}