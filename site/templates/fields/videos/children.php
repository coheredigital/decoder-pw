<?php 

namespace ProcessWire;

foreach ($value as $p) echo $p->snippet('video');

$pagination = $value->renderPager(array(
    'nextItemLabel' => "NEXT",
    'previousItemLabel' => "PREV",
    'listMarkup' => "<ul class='pagination'>{out}</ul>",
    'itemMarkup' => "<li class='{class}'>{out}</li>",
    'currentItemClass' => 'current'
)); 
echo "<div class='row'>$pagination</div>";
