<?php 

namespace ProcessWire;

$this->addHook("Page::renderTemplateFile", function($event){

	$filename = $event->arguments(0) . ".php";

	$parameters = [
		"page" => $event->object
	];

	if (is_array($event->arguments(1))) {
		$parameters = array_merge($parameters, $event->arguments(1));
	}

	$event->return = $this->files->render($filename, $parameters);
	
});

$this->addHook("Page::snippet", function($event){
	$page = $event->object;
	$name = $event->arguments(0);
	$templateValues = $event->arguments(1);
	$filename = "inc/{$name}";
	$event->return = $page->renderTemplateFile("$filename", $templateValues);
});