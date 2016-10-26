<?php
namespace app\controller;
class MainController 
{
	function __construct() 
	{
		$page_query = filter_input(INPUT_SERVER, 'REQUEST_URI');
		var_dump($page_query);
	}
}

new MainController();
