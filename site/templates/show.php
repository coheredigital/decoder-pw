<?php

namespace ProcessWire;

$seasons = [];


foreach ($page->children() as $child) {
	$seasons[$child->season_select->val_int] = $child->season_select->val_int;
}
$seasons = array_reverse($seasons);


if ($input->urlSegment1){
	if ($input->urlSegment1 == 'season'){


		$limit = 10;
		$start = (int) $input->get->page ? ($limit * $input->get->page) - $limit : 0;

		$season = $pages->get("parent=/data/seasons/,name={$input->urlSegment2}");

		$page->episodes = $page->children("season_select={$season},limit={$limit},sort=episode_number, start={$start}");
		$page->output->main = $page->render('episodes');

	}
	else{
		throw new Wire404Exception();
	}

}
else{

	$page->output->main = $page->snippet('topper');
	$page->output->main .= $page->snippet('season-list', [
			'seasons' => $seasons
		]);
}
