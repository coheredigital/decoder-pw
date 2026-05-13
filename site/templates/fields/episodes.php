<?php 
namespace ProcessWire;

foreach ($value as $p){
	echo $p->snippet("episode");
}

$pagination = $value->renderPager(array(
    'nextItemLabel' => "NEXT",
    'previousItemLabel' => "PREV",
    'listMarkup' => "<ul class='pagination'>{out}</ul>",
    'itemMarkup' => "<li class='{class}'>{out}</li>",
    'currentItemClass' => 'current'
)); 


if (!$page->disablePagination && $page->template != "shows") {
	echo "<div class='row'>{$pagination}</div>";
}
