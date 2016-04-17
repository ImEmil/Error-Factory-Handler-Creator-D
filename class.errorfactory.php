<?php

class ErrorFactory
{
	private $errors;
	private $customUserInterface = [];

	public function __construct()
	{
	}

	public function createUserInterface($html, $custom)
	{
		$this->customUserInterface = ["html" => $html . PHP_EOL, "template" => $custom];
	}

	public function getUserInterface()
	{
		return $this->customUserInterface;
	}

	public function createCustomInterface(Closure $next)
	{
		return $next(new stdClass);
	}
}
