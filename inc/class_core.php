<?php
/**
 * MyBB 1.6
 * Copyright 2010 MyBB Group, All Rights Reserved
 *
 * Website: http://mybb.com
 * License: http://mybb.com/about/license
 *
 * $Id: class_core.php 5115 2010-07-26 02:20:41Z RyanGordon $
 */

class MyBB {
	/**
	 * The friendly version number of MyBB we're running.
	 *
	 * @var string
	 */
	public $version = "1.6.2";
	
	/**
	 * The version code of MyBB we're running.
	 *
	 * @var integer
	 */
	public $version_code = 1602;
	
	/**
	 * The current working directory.
	 *
	 * @var string
	 */
	public $cwd = ".";
	
	/**
	 * Input variables received from the outer world.
	 *
	 * @var array
	 */
	public $input = array();
	
	/**
	 * Cookie variables received from the outer world.
	 *
	 * @var array
	 */
	public $cookies = array();
	
	/**
	 * Information about the current user.
	 *
	 * @var array
	 */
	public $user = array();
	
	/**
	 * Information about the current usergroup.
	 *
	 * @var array
	 */
	public $usergroup = array();
	
	/**
	 * MyBB settings.
	 *
	 * @var array
	 */
	public $settings = array();
	
	/**
	 * Whether or not magic quotes are enabled.
	 *
	 * @var unknown_type
	 */
	public $magicquotes = 0;
	
	/**
	 * MyBB configuration.
	 *
	 * @var array
	 */
	public $config = array();
	
	/**
	 * The request method that called this page.
	 *
	 * @var string.
	 */
	public $request_method = "";

	/**
	 * Variables that need to be clean.
	 *
	 * @var array
	 */
	public $clean_variables = array(
		"int" => array(
			"tid", "pid", "uid",
			"eid", "pmid", "fid",
			"aid", "rid", "sid",
			"vid", "cid", "bid",
			"pid", "gid", "mid",
			"wid", "lid", "iid",
			"sid"),
		"a-z" => array(
			"sortby", "order"
		)
	);
	
	/**
	 * Variables that are to be ignored from cleansing process
	 *
	 * @var array
	 */
	public $ignore_clean_variables = array();
	
	/**
	 * Using built in shutdown functionality provided by register_shutdown_function for < PHP 5?
	 */
	public $use_shutdown = false;
	
	/**
	 * Debug mode?
	 */
	public $debug_mode = false;

	/**
	 * Constructor of class.
	 *
	 * @return MyBB
	 */
	function __construct()
	{
		// Set up MyBB
		$protected = array("_GET", "_POST", "_SERVER", "_COOKIE", "_FILES", "_ENV", "GLOBALS");
		foreach($protected as $var)
		{
			if(isset($_REQUEST[$var]) || isset($_FILES[$var]))
			{
				die("Hacking attempt");
			}
		}

		if(defined("IGNORE_CLEAN_VARS"))
		{
			if(!is_array(IGNORE_CLEAN_VARS))
			{
				$this->ignore_clean_variables = array(IGNORE_CLEAN_VARS);
			}
			else
			{
				$this->ignore_clean_variables = IGNORE_CLEAN_VARS;
			}
		}

		// Determine Magic Quotes Status (< PHP 6.0)
		if(version_compare(PHP_VERSION, '6.0', '<'))
		{
			if(get_magic_quotes_gpc())
			{
				$this->magicquotes = 1;
				$this->strip_slashes_array($_POST);
				$this->strip_slashes_array($_GET);
				$this->strip_slashes_array($_COOKIE);
			}
			set_magic_quotes_runtime(0);
			@ini_set("magic_quotes_gpc", 0);
			@ini_set("magic_quotes_runtime", 0);
		}
		
		// Determine input
		$this->parse_incoming($_GET);
		$this->parse_incoming($_POST);
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->request_method = "post";
		}
		else if($_SERVER['REQUEST_METHOD'] == "GET")
		{
			$this->request_method = "get";
		}
		
		// If we've got register globals on, then kill them too
		if(@ini_get("register_globals") == 1)
		{
			$this->unset_globals($_POST);
			$this->unset_globals($_GET);
			$this->unset_globals($_FILES);
			$this->unset_globals($_COOKIE);
		}
		$this->clean_input();

		if(@ini_get("safe_mode") == 1)
		{
			$this->safemode = true;
		}

		// Are we running in debug mode?
		if(isset($mybb->input['debug']) || preg_match("#[?&]debug=1#", $_SERVER['REQUEST_URI']))
		{
			$this->debug_mode = true;
		}

		if(isset($this->input['action']) && $this->input['action'] == "mybb_logo")
		{
			require_once dirname(__FILE__)."/mybb_group.php";
			output_logo();
		}
		
		if(isset($this->input['intcheck']) && $this->input['intcheck'] == 1)
		{
			die("&#077;&#089;&#066;&#066;");
		}
	}

	/**
	 * Parses the incoming variables.
	 *
	 * @param array The array of incoming variables.
	 */
	function parse_incoming($array)
	{
		if(!is_array($array))
		{
			return;
		}

		foreach($array as $key => $val)
		{
			$this->input[$key] = $val;
		}
	}
	
	/**
	 * Parses the incoming cookies
	 *
	 */
	function parse_cookies()
	{
		if(!is_array($_COOKIE))
		{
			return;
		}
		
		$prefix_length = strlen($this->settings['cookieprefix']);

		foreach($_COOKIE as $key => $val)
		{
			if($prefix_length && substr($key, 0, $prefix_length) == $this->settings['cookieprefix'])
			{
				$key = substr($key, $prefix_length);
				
				// Fixes conflicts with one board having a prefix and another that doesn't on the same domain
				// Gives priority to our cookies over others (overwrites them)
				if($this->cookies[$key])
				{
					unset($this->cookies[$key]);
				}
			}
			
			if(!$this->cookies[$key])
			{
				$this->cookies[$key] = $val;
			}
		}
	}

	/**
	 * Strips slashes out of a given array.
	 *
	 * @param array The array to strip.
	 */
	function strip_slashes_array(&$array)
	{
		foreach($array as $key => $val)
		{
			if(is_array($array[$key]))
			{
				$this->strip_slashes_array($array[$key]);
			}
			else
			{
				$array[$key] = stripslashes($array[$key]);
			}
		}
	}

	/**
	 * Unsets globals from a specific array.
	 *
	 * @param array The array to unset from.
	 */
	function unset_globals($array)
	{
		if(!is_array($array))
		{
			return;
		}

		foreach(array_keys($array) as $key)
		{
			unset($GLOBALS[$key]);
			unset($GLOBALS[$key]); // Double unset to circumvent the zend_hash_del_key_or_index hole in PHP <4.4.3 and <5.1.4
		}
	}

	/**
	 * Cleans predefined input variables.
	 *
	 */
	function clean_input()
	{
		foreach($this->clean_variables as $type => $variables)
		{
			foreach($variables as $var)
			{
				// If this variable is in the ignored array, skip and move to next.
				if(in_array($var, $this->ignore_clean_variables))
				{
					continue;
				}

				if(isset($this->input[$var]))
				{
					if($type == "int" && $this->input[$var] != "lastposter")
					{
						$this->input[$var] = intval($this->input[$var]);
					}
					else if($type == "a-z")
					{
						$this->input[$var] = preg_replace("#[^a-z\.\-_]#i", "", $this->input[$var]);
					}
				}
			}
		}
	}

	/**
	 * Triggers a generic error.
	 *
	 * @param string The error code.
	 */
	function trigger_generic_error($code)
	{
		global $error_handler;
		
		switch($code)
		{
			case "cache_no_write":
				$message = "数据缓存目录 (cache/) 必须存在并且可写。改变权限以便于该目录可写。 (Unix服务器设置为777)。";
				$error_code = MYBB_CACHE_NO_WRITE;
				break;
			case "install_directory":
				$message = "安装目录 (install/) 仍然存在并且没有被锁定。请先删除该目录或者新建一个名为\"lock\"的空文件，然后才能访问论坛。";
				$error_code = MYBB_INSTALL_DIR_EXISTS;
				break;
			case "board_not_installed":
				$message = "您的论坛尚未安装配置，请先安装完毕然后才能访问。";
				$error_code = MYBB_NOT_INSTALLED;
				break;
			case "board_not_upgraded":
				$message = "您的论坛尚未升级，请先升级完毕然后才能访问。";
				$error_code = MYBB_NOT_UPGRADED;
				break;
			case "sql_load_error":
				$message = "MyBB无法加载SQL扩展。请联系MyBB中文站寻求支持，<a href=\"http://www.mybbchina.net\">MyBB中文站</a>；或者联系<a href=\"http://www.mybb.com\">MyBB</a>(英文)寻求支持。";
				$error_code = MYBB_SQL_LOAD_ERROR;
				break;
			case "eaccelerator_load_error":
				$message = "需要在 PHP 配置文件中启用 eAccelerator 缓存支持才能使用 eAccelerator 功能。";
				$error_code = MYBB_CACHEHANDLER_LOAD_ERROR;
				break;
			case "memcache_load_error":
				$message = "您的服务器没有启用 memcache 支持。";
				$error_code = MYBB_CACHEHANDLER_LOAD_ERROR;
				break;
			case "xcache_load_error":
				$message = "需要在 PHP 配置文件中启用 Xcache 缓存支持才能使用 Xcache 功能。";
				$error_code = MYBB_CACHEHANDLER_LOAD_ERROR;
				break;
			default:
				$message = "MyBB检测到一个内部错误。请联系MyBB中文站寻求支持。<a href=\"http://www.mybbchina.net\">MyBB中文站</a>；或者联系<a href=\"http://www.mybb.com\">MyBB</a>(英文)寻求支持。";
				$error_code = MYBB_GENERAL;
		}
		$error_handler->trigger($message, $error_code);
	}
	
	function __destruct()
	{
		// Run shutdown function
		if(function_exists("run_shutdown"))
		{
			run_shutdown();
		}
	}
}

/**
 * Do this here because the core is used on every MyBB page
 */

$grouppermignore = array("gid", "type", "title", "description", "namestyle", "usertitle", "stars", "starimage", "image");
$groupzerogreater = array("pmquota", "maxpmrecipients", "maxreputationsday", "attachquota", "maxemails", "maxwarningsday");
$displaygroupfields = array("title", "description", "namestyle", "usertitle", "stars", "starimage", "image");

// These are fields in the usergroups table that are also forum permission specific.
$fpermfields = array(
	'canview',
	'canviewthreads',
	'candlattachments',
	'canpostthreads',
	'canpostreplys',
	'canpostattachments',
	'canratethreads',
	'caneditposts',
	'candeleteposts',
	'candeletethreads',
	'caneditattachments',
	'canpostpolls',
	'canvotepolls',
	'cansearch'
);

?>