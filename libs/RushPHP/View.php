<?php
namespace RushPHP\view;


abstract class ViewBase
{
	abstract public function display();
}

class PHPView extends ViewBase
{
	private $template;

	private $assign;

	public function __construct($template, $assign = null)
	{
		if (!defined("PHPVIEW_TEMPLATE_DIR"))
		{
			define("PHPVIEW_TEMPLATE_DIR", RUSH_SITE_DIR . DS . "template" . DS . "php_template");
		}
		$this->template = PHPVIEW_TEMPLATE_DIR . DS . $template;
		$this->assign   = $assign;
	}

	public function display()
	{
		if ($this->assign!=null)
		{
			if (is_string($this->assign))
			{
				$this->assign = array("assign"=>$this->assign);
			}
			foreach($this->assign as $key=>$value)
			{
				$$key = $value;
			}
		}
		$this->assign = null;
		header("Content-Type:text/html; charset=utf-8");
		include($this->template);
	}
}

class JSView extends ViewBase
{
	private $data = null;

	private $callback = null;

	public function __construct($callback, $data)
	{
		$this->callback = $callback;
		$this->data     = $data;
	}

	public function display()
	{
		header("Content-Type:text/html; charset=utf-8");

		echo "RushCall(\"".$this->callback."\", " . json_encode($this->data). ")";
	}
	
}

class JSONView extends ViewBase
{
	private $data = null;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function display()
	{
		header("Content-Type:text/html; charset=utf-8");

		echo json_encode($this->data);
	}
}