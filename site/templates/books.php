<?php

namespace ProcessWire;

if ($input->pageNum() == 1) {
$page->output->hero = $page->snippet('notchs',[
		'items' => $page->children('limit=3'),
		'class' => 'hide-on-phones'
	]);
}


$page->episodes = $page->children('sort=-date, limit=6');
$page->output->main = $page->render('episodes');