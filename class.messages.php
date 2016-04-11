<?php

class Messages
{
	private $types = ["error", "warning", "info", "success", "test"];
	private $factory;
	private $str;

	public function __construct(ErrorFactory $errorFactory)
	{
		session_start();
		$this->factory = $errorFactory;
	}

	public function __destruct()
	{
		$this->factory = null;
		$this->str     = null;
	}

	public function error($error)
	{
		$_SESSION["error"] = $error;
		return $this;
	}

	public function warning($warning)
	{
		$_SESSION["warning"] = $warning;
		return $this;
	}

	public function info($info)
	{
		$_SESSION["info"] = $info;
		return $this;
	}

	public function success($success)
	{
		$_SESSION["success"] = $success;
		return $this;
	}


	final public function _catchMessages()
	{
		$template = (array)$this->factory->getUserInterface();

		for ($i = 0; $i < count($this->types); $i++)
		{ 
			$type = $this->types[$i];

			if(isset($_SESSION[$type]))
			{
				$divClass = str_replace(".", null, $template["template"]->class[$type]);
				$build    =
				[
					"{error.class}"   => $divClass,
					"{error.style}"   => $template["template"]->style["all"] . $template["template"]->style[$type],
					"{error.message}" => $_SESSION[$type]
				];

				$this->str .= str_replace(array_keys($build), array_values($build), $template["html"]);
				unset($_SESSION[$type]);
			}
		}

		return $this->str;
	}
}
