let demo = document.querySelector(".demo"),
    demoinfo = document.querySelector("#demoinfo"),
    democlose = document.querySelector("#democlose");

$(document).ready(function () {

demo.addEventListener('click', function(){
    $(demoinfo).show("blind");
})

democlose.addEventListener('click', function(){
    $(demoinfo).hide("blind");
})

})