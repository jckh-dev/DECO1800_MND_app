var title = document.querySelector(".txtbox");
var demo = document.querySelector(".demo");
var demoinfo = document.querySelector("#demoinfo");
var democlose = document.querySelector("#democlose");
var welinfo = document.querySelector("#welcomeinfo");
var welbtns = document.querySelector(".gridwrapper3");
var gamedemo = document.querySelector("#gamedemo");
var demogif = document.querySelector("#demogif");

demo.addEventListener('click', function () {
    $(title).hide("fade", function(){
        $(title).html("<h1>GAME HELP</h1>");
        $(title).show("fade");
    })
    $(welbtns).hide("fade", function(){
        $(".wrapper").css("grid-template-rows", "185px 1fr 0.03fr")
    });
    $(welinfo).hide("blind", function(){
        $(demoinfo).show("blind");
    });
})

democlose.addEventListener('click', function () {
    $(title).hide("fade", function(){
        $(title).html("<h1>WELCOME</h1>");
        $(title).show("fade");
    })
    $(welbtns).show("fade", function(){
        $(".wrapper").css("grid-template-rows", "185px 1fr 0.1fr")
    });
    $(demoinfo).hide("blind", function(){
        $(welinfo).show("blind");
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