var title = document.querySelector(".titlebox");
var demo = document.querySelector(".demo");
var demoinfo = document.querySelector(".demoinfo");
var democlose = document.querySelector(".democlose");
var welcinfo = document.querySelector(".welcomeinfo");
var welcbtns = document.querySelector(".gridwrapper3");
var gamedemo = document.querySelector("#gamedemo");
var demogif = document.querySelector("#demogif");

demo.addEventListener('click', function () {
    $(title).hide("fade", function(){
        $(title).html("<h1>GAME HELP</h1>");
        $(title).show("fade");
    })
    $(welcbtns).hide("fade")
    $(welcinfo).hide("blind", function(){
        $(demoinfo).show("blind", function(){
            $(demoinfo).css({ "display": "flex" });
        });     
    });
});

democlose.addEventListener('click', function () {
    $(title).hide("fade", function(){
        $(title).html("<h1>WELCOME</h1>");
        $(title).show("fade");
    });
    $(demoinfo).hide("blind", function(){
        $(welcinfo).show("blind");
        $(welcbtns).show("blind");
    });
})

gamedemo.addEventListener('click', function(){
    $(demoinfo).hide("fade", 500, function(){
        $(demogif).show("fade", 500, function(){
            $(demogif).css({"display": "flex", "justify-content": "space-around", "align-items": "center"})
        });
    })
})

demogif.addEventListener('click', function(){
    $(demogif).hide("fade", 500, function(){
        $(demoinfo).show("fade", 500)
    })
})