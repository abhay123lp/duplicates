<?php
# The output is a list of files on the browsers
header('Content-Type: text/plain');

# Run infinitely: use either of the below:
set_time_limit(0);
ini_set('max_execution_time', '0');

# Even if the browser has closed, continue working.
ignore_user_abort(true);

# Connect to the database
mysql_connect('localhost', 'root', 'toor');
mysql_select_db('mp3');
?>