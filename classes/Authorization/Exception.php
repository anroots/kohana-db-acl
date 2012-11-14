<?php defined('SYSPATH') or die('No direct script access.');
class Authorization_Exception extends Kohana_Exception
{
	public function __construct($message = "Unauthorized", array $variables = NULL, $code = 401, Exception $previous = NULL)
	{
		parent::__construct($message, $variables, $code, $previous);
	}

}