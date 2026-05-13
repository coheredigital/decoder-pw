<?php

namespace ProcessWire;

$page->output->main .= $page->snippet('entry');
$page->episodes = $pages->find('template=episode,sort=-date, limit=2');

$page->disablePagination = true;
$page->output->main .= $page->render('episodes');