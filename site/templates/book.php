<?php

namespace ProcessWire;

$page->output->main  = $page->snippet('episode');
$page->output->main .= $page->snippet('comments');