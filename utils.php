<?php

/**
 * Returns the last 8 bytes of a sha256 digest
 */
function shafrag($str) {
    $hash = hash("sha256", $str);
    return substr($hash, -8, 8);
}

/**
 * Count pastes that have some substring in their name
 */
function count_pastes($path, $substr="") {
	$count = 0;
   
	if ($handle = opendir($path)) {
    	while (false !== ($entry = readdir($handle))) {
        	if (false !== strpos($entry, $substr)) $count++;
    	}

    	closedir($handle);
	} else {
		die("Couldn't open directory handle.");
	}
	
	return $count;
}

