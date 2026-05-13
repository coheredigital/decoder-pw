<?php 
namespace ProcessWire;

foreach ($value as $episode){
	$t = new TemplateFile(wire('config')->paths->templates . 'inc/episode.inc');
	$t->set('episode', $episode);
	echo $t->render();
}



$pagination = $value->renderPager(array(
    'nextItemLabel' => "NEXT",
    'previousItemLabel' => "PREV",
    'listMarkup' => "<ul class='pagination'>{out}</ul>",
    'itemMarkup' => "<li class='{class}'>{out}</li>",
    'currentItemClass' => 'current'
)); 
echo "<div class='row'>$pagination</div>";
