# PHP-Integration
Should be run through a server, use XAMPP. (see Exercise 3: Local Dev Environment)
https://www.notion.so/Week-6-Workshop-Outline-3f717e3e00e24dc08b8aec3eabe73a76
If you see errors, you must start from index.php first to auto access an account, then you can start from choose_journey.php, this sends an array for game.php to follow (e.g. $game = \["Bushfire","Tornado","Flood","Transport"\];), each page sends a POST to eachother (or to itself, e.g. game.php) to transfer data, WITHOUT that POST data it will show errors.
