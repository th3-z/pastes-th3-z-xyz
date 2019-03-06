<?php

define("SORT_NONE", 0);
define("SORT_DATE_ASC", 1);
define("SORT_DATE_DESC", 2);

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

/**
 * Returns all paste filenames, sorted by $order, options define above
 */
function get_pastes($path, $order=SORT_NONE) {
    $files = array();

	if ($handle = opendir($path)) {
    	while (false !== ($file = readdir($handle))) {
        	if ($file[0] != ".") {
           		$files[filemtime($path.$file)] = $file;
        	}
    	}
		closedir($handle);
	} else {
		die("Couldn't open pastes path.");
	}

	switch ($order) {
		case SORT_NONE;
			break;
		case SORT_DATE_ASC:
    		ksort($files);
			break;
		case SORT_DATE_DESC:
    		krsort($files);
			break;
		default:
			die("Sort order not understood.");
	}

	return array_values($files);    
}

