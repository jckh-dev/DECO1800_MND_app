<?php
include('includes/indexlogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<h1>Guided Tour</h1><br>
</aside>
</section>

<section class="gridwrap2">

<article class="infobox"> 
    <article id="tourwelcome">
            
        <h1>Welcome to the Tour</h1>
            <p>Welcome to the guided tour companion.</p>
            <p>This tour will take you through each of the five major natural disaster types most commonly impacting the Australian continent. At the end of the tour you will have the chance to play the Higher or Lower game.</p>
            <p>For participating in the exhbit and learning about Australia's natural disasters, the Natural Disaster Musuem will donate a dollar figure to the Climate Education Foundation based on the score you get on the Higher or Lower game.</p>
            <p>Good luck!</p>
    </article>

    <article id="bushfires">
        
        <img class="tourgraph" src="images\examplegraph.png" alt="Major Environmental Events Over Time">    
    
        <h1>BUSHFIRES</h1>
            <p>"THIS IS A PLACEHOLDER FOR BUSHFIIIARS Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </article>
    
    <article id="floods">
        
        <img class="tourgraph" src="images\examplegraph.png" alt="Major Environmental Events Over Time" width="500" height="600">    

        <h1>FLOODS</h1>
        <p>"THIS IS A PLACEHOLDER FOR FLOOOODS Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </article>

    <article id="cyclones">
        
        <img class="tourgraph" src="images\examplegraph.png" alt="Major Environmental Events Over Time" width="500" height="600">    
            
        <h1>CYCLONES</h1>
        <p>"THIS IS A PLACEHOLDER FOR CYCLOOOONES Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </article>

    <article id="storms">
        
        <img class="tourgraph" src="images\examplegraph.png" alt="Major Environmental Events Over Time" width="500" height="600">    
    
        <h1>SEVERE STORMS</h1>
        <p>"THIS IS A PLACEHOLDER FOR STOOOORMS Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br>
        
    </article>

    <article id="majorevents">
        <h1>MAJOR ENVIRONMENTAL EVENTS</h1>

        <img class="tourgraph" src="images\examplegraph.png" alt="Major Environmental Events Over Time" width="500" height="600">

        <p>"THIS IS A PLACEHOLDER FOR MAJOR EVEEEENTS Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </article>

    <article id="tourfinish">


        <!-- TURN THIS BUTTON INTO A FORM DIRECTING TO GAME.PHP INITIATED WITH TOUR GAME -->
        <aside class="box welcomebtns">
            <aside class="demo">
                <a href=""><h1><i class="fas fa-chevron-circle-left"></i> Back</h1></a>
            </aside>

            <aside class="continue">
                <form id="start" action="game.php" method="POST">
                <input type="hidden" name="game" value='<?php echo $tourGame; ?>'>
                <input type="hidden" name="init" value=1> 
                <button type="submit" class="button">Start Game <i class="fas fa-gamepad"></i></button>
                </form>
            </aside>
        </aside>
        
    </article>
</article>
<aside class="box tourbtns">
    <aside class="demo">
        <h1><i class="fas fa-chevron-circle-left"></i> Back</h1>
    </aside>

    <aside class="continue">
        <a href=""><h1>Continue <i class="fas fa-chevron-circle-right"></i></h1></a>
    </aside>
</aside>
</section>

<script src="js/tour.js"></script>

<?php
include('includes/footer.php');
?>
