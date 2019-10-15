// This will prevent the document from loading immediately so it can then action a fade out when navigating to another page


$(document).ready(function () {
  
  $("body").fadeTo(1000, 1);

  $("a").click(function (event) {
    event.preventDefault();
    linkLocation = this.href;
    $("body").fadeOut(1000, redirectPage);
  });

  // $("form").click(function (event) {
  //   event.preventDefault();
  //   linkLocation = this.href;
  //   $("body").fadeOut(1000, redirectPage);
  // });

  function redirectPage() {
    window.location = linkLocation;
  }

});

