<?php
include('includes/indexlogic.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Museum Of Natural Disasters</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/head.js"></script>
    <noscript>
        <style>
            body {
                opacity: 1;
            }
        </style>
    </noscript>
</head>

<body>

    <div class="wrapper">

        <section class="gridwrap1">
            <header class="box header">
                <a href="journey.php"><img src="images/mndlogo.png" alt="Go Back Home" class="homelogo" height="80" width="130" /></a>
            </header>
        </section>

        <section class="gridwraptitle">
            <aside class="gamebox">
            <a href="journey.php"><button class="cluepointbtn"><i class="fas fa-home"></i><br>HOME</button></a>
            <a href="scoreboard.php"><button class="cluepointbtn"><i class="fas fa-star"></i><br>SCORES</button></a>
        </aside>
        </section>

        <main class="gridwrap2 tourpages">
            <div class="tourPageSlider">
                <section class="tourpage tourstart">
                    <article class="infobox">
                        <h1>Welcome to the Tour</h1>
                        <img class="tourgraph" src="images\temprising.gif" alt="Global Temperature Rise Over Time">
                        <p>Welcome to the guided tour companion.</p>
                        <p>This tour will take you through each of the five major natural disaster      types most commonly impacting the Australian continent seen in the context of rising average local and global temperatures. At the end of   the tour you will have the chance to play the Higher or Lower game.</p>
                        <p>For participating in the exhbit and learning about Australia's natural disasters, the Natural Disaster Musuem will donate a dollar figure to the Climate Education Foundation based on the score you get on the Higher or Lower game.</p>
                        <p>Good luck!</p>
                    </article>
                </section>

                <section class="tourpage bushfires">
                    <article class="infobox">
                        <h1>BUSHFIRES</h1>

                        <img class="tourgraph" src="images\bushfiregraph.PNG" alt="Major Bushfire Events Over Time">

                        <p>Peak bushfire season varies across Australia depending on season."</p>
                        <p>Weather plays a significant role in the behaviour of bushfires</p>
                        <p>Climate change influences the severity of bushfires across Australia</p>
                        <p>Results already demonstrate that in southern and eastern Australia, bushfire season commences earlier
                        </p>

                    </article>
                </section>

                <section class="tourpage floods">
                    <article class="infobox">
                        <h1>FLOODS</h1>

                        <img class="tourgraph" src="images\floodgraph.png" alt="Major Environmental Events Over Time">

                        <p>Floods in Australia are mainly caused by heavy rainfall</p>
                        <p>Catchment, rainfall and moisture are the main contributors to river flooding</p>
                        <p>The risk of disruptions to pacific rainfall have been increased as a result of global warming
                        </p>

                    </article>
                </section>

                <section class="tourpage cyclones">
                    <article class="infobox">
                        <h1>CYCLONES</h1>

                        <img class="tourgraph" src="images\cyclonegraph.png" alt="Major Environmental Events Over Time">

                        <p>Cyclones are low pressure systems forming over tropical waters</p>
                        <p>The moisture from the ocean acts as fuel</p>
                        <p>Cyclonic weather can also bring about heavy storms and increase sea-levels</p>

                    </article>
                </section>

                <section class="tourpage storms">
                    <article class="infobox">
                        <h1>SEVERE STORMS</h1>

                        <img class="tourgraph" src="images\stormgraph.png" alt="Major Environmental Events Over Time">

                        <p>Severe storms can be accompanied by strong winds, hail and rainfall</p>
                        <p>t is predicted that there will be an increase in high-intensity storms and heavier rainfall</p>
                        <p>Thunderstorms occur most frequently in northern parts of Australia</p>
                        <p>Thunderstorms are most likely to occur in the warmer parts of the year throughout the majority of Australia
                        </P>

                    </article>
                </section>

                <section class="tourpage majevents">
                    <article class="infobox">
                        <h1>MAJOR ENVIRONMENTAL EVENTS</h1>

                        <img class="tourgraph" src="images\envirograph.png" alt="Major Environmental Events Over Time">

                        <p>Three or more days of high maximums and minimums is considered a heatwave
                        </p>
                        <p>Heatwaves can lead to serious health problems</p>
                        <p>Research indicates that there will be an expected increase in the number of extreme heat events</p>
                    </article>
                </section>

                <section class="tourpage tourfinish">
                    <article class="infobox">
                        <h1>YOU HAVE FINISHED!</h1>

                        <p>You've reached the end of the guided tour. You can still navigate back and forward if you wish to keep browsing the exhibit. </p>

                        <p>Otherwise you can start the Higher or Lower game that will ask questions about these disaster types</p>

                        <p>Remember, the more points you score the more donations $$ you will generate for the Climate Education Foundation!</p>
               
                        <aside class="cntrbtnwrap gamestart">
                            <form id="start" action="game.php" method="POST">
                            <input type="hidden" name="game" value='<?php echo $tourGame; ?>'>
                            <input type="hidden" name="init" value=1> 
                            <button type="submit" class="largebtn">Start Game <i class="white fas fa-gamepad"></i></button>
                            </form>
                        </aside>
                    </article>
                </section>

            </div> <!-- slider wrapper end-->

            <aside class="box btnwrap">
                <button class="smallbtn prev"><i class="white fas fa-chevron-circle-left"></i></button>

                <button class="smallbtn next"><i class="white fas fa-chevron-circle-right"></i></button>
            </aside>

        </main>

        <script src="js/tour.js"></script>

        <footer class="gridwrap3">

            <button class="tab">
                <i class="fas fa-caret-up"></i>
            </button>

            <div class="bcwrapper">
                <section class="breadcrumb">
                    <!-- breadcrumb will append here -->
                </section>
            </div>

        </footer>

    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/footer.js"></script>
</body>

</html>

<!-- TURN THIS BUTTON INTO A FORM DIRECTING TO GAME.PHP INITIATED WITH TOUR GAME
        <aside class="box welcomebtns">
            <aside class="back">
                <a href=""><h1><i class="fas fa-chevron-circle-left"></i> Back</h1></a>
            </aside>

            <aside class="continue">
                <form id="start" action="game.php" method="POST">
                <input type="hidden" name="game" value='<?php echo $tourGame; ?>'>
                <input type="hidden" name="init" value=1> 
                <button type="submit" class="button">Start Game <i class="fas fa-gamepad"></i></button>
                </form>
            </aside>
        </aside> -->