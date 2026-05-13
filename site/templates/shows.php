<?php

namespace ProcessWire;

$page->output->hero = $page->snippet("notchs", [
		"items" => $page->children
	]);
$page->episodes = $page->find('template=episode,sort=-date, limit=4');
$page->output->main = $page->render("episodes");