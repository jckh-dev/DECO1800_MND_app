<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

    <h1>WELCOME</h1>
</aside>
</section>

<main class="gridwrap2">

<article class="box" id="welcomeinfo">
        <p>Welcome to the Museum Of Natural Disasters interactive exhibit 
        application.</p>
        
        <p>This app will help guide and enrich your experience in the exhibit
        as you learn more about the ferocious and ever more frequent nature of 
        natural disasters across the Australian continent. </p>
        
        <p>Explore the five major Australian natural disaster types through the 
        'Guided Tour' option or jump straight to the 'Higher or Lower' game
        through the 'Random Play' option.</p>

        <p>Hit the Game Help button below for tips on the playing the Game.</p>
</article>

<article class="infobox" id="demoinfo">
        <h2>HIGHER OR LOWER</h2>

        <p>The Higher or Lower game is a simple game where you guess if the 
            given figure is higher or lower than the actual figure taken from 
            the disaster statistics. </p>

        <h2>GAME CLUES</h2>

        <h2>Disaster Discription Clue</h2>

        <p>Use an exerpt from the disaster records to help gauge the severity of
            the disaster. These exerpts ommit any figures that could identify an 
            answer.</p>

        <h2>Map Clue</h2>

        <p>View the location of the disaster and use the surrounding 
            geography to guage whether factors like regional vs metro location, 
            the type of surrounds (forest, desert, coast etc) and closeness to
            residential centers may point to the question being higher or 
            lower.</p>

        <p>Click this button to see a simple demo:</p>

        <button class="idbutton" id="gamedemo"><h3>Game Demo <i class="fas fa-mobile-alt"></i></h3></button>

        <button id="democlose" class="idbutton">Close</button>
    </article>

    <article class="infobox" id="demogif">
    <a href="https://gyazo.com/c9d3d2dbb16e9ba343f8c0ee99239d7b"><img src="https://i.gyazo.com/c9d3d2dbb16e9ba343f8c0ee99239d7b.gif" alt="Clue Demo" width="250"/></a>
    
    <button class="idbutton" id="gamedemo"><h3>Exit <i class="fas fa-mobile-alt"></i></h3></button>
</article>

</main>

<section class="gridwrapper3">

<aside class="box welcomebtns">
<aside class="demo">
        <h2><i class="fas fa-mobile-alt"></i> Game Help </h2>
</aside>

<aside class="continue">
    <a href="journey.php"><h3>Continue <i class="fas fa-chevron-circle-right"></i></h3>
    </a>
</aside>
</aside>
</section>
</div>

<script src="js/app.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
</body>