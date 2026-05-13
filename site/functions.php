<?php

namespace ProcessWire;


function searchPrep($str){
	$commonWords = array('of', 'the', 'that', 'anasp');
	$output = substr($str, ($pos = strpos($str, '_')) !== false ? $pos + 1 : 0);
	$output = str_ireplace($commonWords, ' ', $output);
	$output = preg_replace('/(?<!\ )[A-Z]/', ' $0', $output);
	$output = wire('sanitizer')->text($output);

	$output = trim( preg_replace(
	    "/[^a-z0-9']+([a-z0-9']{1,3}[^a-z0-9']+)*/i",
	    " ",
	    "$output"
	) );

	return $output;
}

function red($str){


	$commonWords = array('of', 'the', 'that', 'anasp');
	$output = substr($str, ($pos = strpos($str, '_')) !== false ? $pos + 1 : 0);
	$output = str_ireplace($commonWords, ' ', $output);
	$output = preg_replace('/(?<!\ )[A-Z]/', ' $0', $output);
	$output = wire('sanitizer')->text($output);

	$output = trim( preg_replace(
	    "/[^a-z0-9']+([a-z0-9']{1,3}[^a-z0-9']+)*/i",
	    " ",
	    "$output"
	) );



	if($q = wire('sanitizer')->text($output)) {

		wire('input')->whitelist('q', $q);

		$results = wire('pages')->find("title|body~=$q, limit=1, template!=show|shows|home");
		$count = count($results);
		if ($count == 1) wire('session')->redirect($results->first()->url);
	}
}
