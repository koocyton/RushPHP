<?php
namespace controller;

use RushPHP\view;

class Account extends AppController
{
	public function main()
	{
		$data = array();
		return new view\JSView("Account", $data);
	}
	
	public function save()
	{
		
	}
}