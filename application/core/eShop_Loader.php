<?php

class eShop_Loader extends CI_Loader
{
	public static $partials = [];

	public function __construct()
	{
		parent::__construct();
		self::$partials = $this->get_filenames(APPPATH . 'views' . DIRECTORY_SEPARATOR . PARTIALS_FOLDER);
		if (self::$partials === FALSE)
		{
			self::$partials = [];
		}
	}

	public function view($view, $vars = array(), $return = FALSE)
	{
		if (in_array($view . EXT, self::$partials))
		{
			$view = PARTIALS_FOLDER . $view;
		}
		return parent::view($view, $vars, $return);
	}

	private function get_filenames($source_dir, $include_path = FALSE, $_recursion = FALSE)
	{
		static $_filedata = array();

		if ($fp = @opendir($source_dir))
		{
			// reset the array and make sure $source_dir has a trailing slash on the initial call
			if ($_recursion === FALSE)
			{
				$_filedata  = array();
				$source_dir = rtrim(realpath($source_dir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
			}

			while (FALSE !== ($file = readdir($fp)))
			{
				if (@is_dir($source_dir . $file) && strncmp($file, '.', 1) !== 0)
				{
					$this->get_filenames($source_dir . $file . DIRECTORY_SEPARATOR, $include_path, TRUE);
				}
				elseif (strncmp($file, '.', 1) !== 0)
				{
					$_filedata[] = ($include_path == TRUE) ? $source_dir . $file : $file;
				}
			}
			return $_filedata;
		}
		else
		{
			return FALSE;
		}
	}
} 