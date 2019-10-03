# JS-Features
Currently highly broken and requiring a volume of work to migrate features out of ending.php and clue.php into a singular game.php page. Notations have been left and cards in Trello created with major issues identified that must be resolved before other work can continue on game.php. There is a secondary focus on introducing animations and transitions to create a smoother user experience. This is being implemented incrementally and has already started on game.php and welcomemsg.php.

# PHP-Integration
Should be run through a server, use XAMPP. (see Exercise 3: Local Dev Environment)
https://www.notion.so/Week-6-Workshop-Outline-3f717e3e00e24dc08b8aec3eabe73a76
If you see errors, you must start from index.php first to auto access an account, then you can start from choose_journey.php, this sends an array for game.php to follow (e.g. $game = \["Bushfire","Tornado","Flood","Transport"\];), each page sends a POST to eachother (or to itself, e.g. game.php) to transfer data, WITHOUT that POST data it will show errors.
