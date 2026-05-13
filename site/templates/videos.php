<?php

namespace ProcessWire;

$videos = $page->children("limit=4");
foreach ($videos as $p) {
	$page->output->main .= $p->snippet('video');
}

$pagination = $videos->renderPager(array(
    'nextItemLabel' => "NEXT",
    'previousItemLabel' => "PREV",
    'listMarkup' => "<ul class='pagination'>{out}</ul>",
    'itemMarkup' => "<li class='{class}'>{out}</li>",
    'currentItemClass' => 'current'
)); 
$page->output->main .= "<div class='row'>$pagination</div>";