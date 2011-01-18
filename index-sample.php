<?php
require_once('inc.config.php');
require_once('inc.fecho.php');
require_once('inc.process_file.php');
require_once('inc.dir_enter.php');

$counter = 0;

$entry_dir = 'C:/Your/Songs/Location';
dir_enter($entry_dir);

echo 'Completed!';
?>