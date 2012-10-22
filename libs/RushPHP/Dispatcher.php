<?php
namespace RushPHP;

abstract class DispatcherBase
{
	protected $class_name;

	protected $method_name;

	public function dispatch()
	{
		$controller_class  = "controller\\".$this->class_name;

        $controller_method = $this->method_name; 

		try
		{
			$controller = new $controller_class();     

			$filter_view = false;

			if ($controller instanceof ControllerBase)
			{
				$filter_view = $controller->beforeFilter();
			}

			if ($filter_view && $filter_view instanceof ViewBase)
			{
				$filter_view->display();
			}
			else
			{
				$action_view = $control->$control_method();

				if ($action_view instanceof ViewBase)
				{
					$action_view->display();
				}
			}
		
			if ($control instanceof ControlBase)
			{
				$control->afterFilter();
			}
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
}




class HTTPDispatcher extends DispatcherBase
{
	protected $class_name  = "Index";

	protected $method_name = "main";

	public function __construct()
	{
		if (!empty($_REQUEST['act']) && preg_match('/^([a-z_]+)\.([a-z_]+)$/i', $_REQUEST['act'], $matchs))
		{
			$this->class_name  = ucfirst($matchs[1]);
			$this->method_name = $matchs[2];
		}
		$_REQUEST['act'] = $this->class_name . '.' . $this->method_name;
	}
}



class ShellDispatcher extends DispatcherBase
{
	public function __construct()
	{
		if (empty($_REQUEST['act']) || !preg_match('/^([a-z_]+)\.([a-z_]+)$/i', $_REQUEST['act'], $matchs))
		{
			$this->class_name  = "Index";
			$this->method_name = "main";
		}
		else
		{
			$this->class_name  = $matchs[1];
			$this->method_name = $matchs[2];
		}
		$_REQUEST['act'] = $this->class_name . '.' . $this->method_name;
	}
}