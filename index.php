<?php

require("class.errorfactory.php");
require("class.messages.php");

// Användning :'D

$errorFactory = new ErrorFactory;

$errorFactory->createCustomInterface(function($templateBuilder) use ($errorFactory)
{
	$html = '<div class="{error.class}" style="{error.style}">{error.message}</div>';
	
	$templateBuilder->class =
	[
		"error"   => ".error red message",
		"warning" => ".error yellow message",
		"info"    => ".error blue message",
		"success" => ".error green message"
	];

	$templateBuilder->style = 
	[
		"all"     => "height:100px;width:100%;font-weight:bolder;",
		"error"   => "font-style:italic;",
		"warning" => "font-weight:300;",
		"info"    => "font-size:9px;",
		"success" => "background:green;"
	];

	$errorFactory->createUserInterface($html, $templateBuilder);
});

$messages = new Messages($errorFactory);

$messages->error("ERROR M8");

$messages->warning("WARNING M8");

$messages
->info("INFO M8")
->success("SUCCESS M8")
->info("INFO M8")
->success("testing");

echo $messages->_catchMessages();
