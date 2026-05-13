<?php

namespace ProcessWire;

function highlightQ($query, $string){
	return preg_replace("/".$query."/i", "<strong><em>$0</em></strong>", $string);
}

$page->output->main = '';

if($q = $sanitizer->selectorValue($input->get->q)) {

	$input->whitelist('q', $q);

	$results = $pages->find("title|body~=$q, limit=50, template!=show|shows|home");

	if ($input->get->legacy == 1) $page->output->main .= "<h2>That page isn't where it used to be, maybe you can find it below?</h2><p>If not, try a search in the field above</p><hr><section>";

	$count = count($results);

	if($count) {

		if ($input->get->legacy !== 1) $page->output->main .= "<h2>Found <strong style='color: #a00 ;'>{$count}</strong> pages matching your query:</h2>" .
			"<hr><section>";

		foreach($results as $r) {
			$page->output->main .= "<h5><a href='{$r->url}'>".highlightQ($q, $r->title)."</a><br /></h5>";
			$page->output->main .= "<p><small>{$r->url}</small></p>";
		}

		$page->output->main .= "</section>";

	} else {
		$page->output->main .= "<h4>Sorry, no results were found.</h4>";
	}
} else {
	$page->output->main .= "<h2>Please enter a search term in the search box (upper right corner)</h2>";
}

$page->layout = 'wide';