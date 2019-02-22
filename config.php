<?php
$base_url = "https://pastes.th3-z.xyz/";
$webroot = "/srv/www/pastes-th3-z-xyz/";
$paste_path = "pastes/";
$daily_paste_limit = 35;
$log_file = $webroot . "../pastes-th3-z-xyz.log";

// Enable all errors, configure log, disable display
error_reporting(E_ALL);
ini_set("diplay_errors", FALSE);
ini_set("log_errors", TRUE);
ini_set('log_errors_max_len', 1024);
ini_set("error_log", $log_file);

