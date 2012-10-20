<?php
namespace RaftPHP\view;

class PHPView extends ViewBase
{
    private $template;

	private $assign;

    public function __construct($template, $assign = null)
    {
        $this->template = PHPVIEW_TEMPLATE_DIR . DIRECTORY_SEPARATOR . $template;
        $this->assign   = $assign;
    }

    public function display()
    {
        if ($this->assign!=null)
        {
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