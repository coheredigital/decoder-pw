<?php

namespace ProcessWire;

$page->output->main = $page->snippet('video');
$page->output->main .= $page->snippet('comments');
