var demo = document.querySelector(".demo");
var demoinfo = document.querySelector("#demoinfo");
var democlose = document.querySelector("#democlose");

demo.addEventListener('click', function () {
    $(demoinfo).show("blind");
})

democlose.addEventListener('click', function () {
    $(demoinfo).hide("blind");
})
