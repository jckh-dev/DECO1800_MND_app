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

<article class="box welcomeinfo">
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

<article class="infobox demoinfo">
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

        <aside class="btnwrap">
            <button class="smallbtn" id="gamedemo"><i class="fas fa-mobile-alt"></i> Game Demo</button>

            <button class="smallbtn democlose">Close</button>
        </aside>
    </article>

    <article class="infobox" id="demogif">
    <img class="demogifimg" src="https://i.gyazo.com/c9d3d2dbb16e9ba343f8c0ee99239d7b.gif" alt="Clue Demo" width="250">

    <button class="smallbtn" id="gamedemo">Back  <i class="white far fa-times-circle"></i></button>
</article>

</main>

<section class="gridwrapper3">

<aside class="box txtbox btnwrap">
<button class="smallbtn demo"><i class="fas fa-mobile-alt"></i> Game Help</button>

<a class = "smallbtn" href="journey.php">Continue <i class="white fas fa-chevron-circle-right"></i>
    </a>

</aside>
</section>
</div>

<script src="js/app.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
</body>