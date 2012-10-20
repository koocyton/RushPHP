<?php
namespace RaftPHP\view;

class JSONView extends ViewBase
{
    public function __construct($data)
    {
		$this->decode_data = $decode_data;
    }

    public function display()
    {
        header("Content-Type:text/html; charset=utf-8");
        echo json_encode($this->decode_data);
    }
}