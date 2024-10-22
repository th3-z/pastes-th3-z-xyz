<?php
require_once "config.php";
require_once "includes/utils.php";

$paste = $_POST['paste'];
if (empty($paste)) die("Empty paste.");

$ip_id = shafrag($_SERVER['REMOTE_ADDR']);
$filepath = $webroot.$paste_path;
$filename = $ip_id.shafrag($paste);

if (count_pastes($filepath, $ip_id) > $daily_paste_limit)
    die("Error, exceeded paste limit.");

# Log valid requests
$paste_log = "[NEW_PASTE]"
           . "\n\tAddress: {$_SERVER['REMOTE_ADDR']}"
           . "\n\tFile: {$filename}";
error_log($paste_log);

# The existance of this file means pastes_path is mounted
if (!file_exists($filepath.".mnt_token")) die("Error, resource not mounted.");

# Save paste, if theres available space
$file = fopen($filepath.$filename, "w")
        or die("Error, couldn't open file.");

fwrite($file, $paste);
fclose($file);

# Redirect to their new paste
header(
    "Location: $paste_path$filename"
);

