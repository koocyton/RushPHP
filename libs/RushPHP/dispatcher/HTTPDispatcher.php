<?phpnamespace RaftPHP\dispatcher;class HTTPDispatcher extends DispatcherBase{	protected $class_name  = "IndexControl";	protected $method_name = "main";	/**	 * index.php?act=Index.setTime	 */	public function __construct()	{        if (!empty($_REQUEST['act']) && preg_match('/^([a-z_]+)\.([a-z_]+)$/i', $_REQUEST['act'], $matchs))        {        	$this->class_name  = ucfirst($matchs[1])."Control";        	$this->method_name = $matchs[2];        }		$_REQUEST['act'] = $this->class_name . '.' . $this->method_name;	}}