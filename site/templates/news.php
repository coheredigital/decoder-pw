<?php

namespace ProcessWire;

$page->episodes = $pages->find('template=article,sort=-created,limit=6');
$page->output->main = $page->render('episodes');