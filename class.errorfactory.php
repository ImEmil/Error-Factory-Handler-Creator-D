<?php

class ErrorFactory
{
	private $errors = [];
	private $customUserInterface = [];

	public function __construct()
	{
	}

	public function createUserInterface($html, $custom)
	{
		$this->customUserInterface = ["html" => $html, "template" => $custom];
	}

	public function getUserInterface()
	{
		return $this->customUserInterface;
	}

	public function createCustomInterface(Closure $closure)
	{
		return $closure(new stdClass);
	}
}
