<?php defined('SYSPATH') or die('No direct access allowed.');

class Rights {

	private $_permissions = array();

	public static function instance()
	{
		return new Rights();
	}

	public function __construct()
	{
		$permissions = ORM::factory('permission')->find_all()->as_array();
        	
		foreach ($permissions as $permission) {
			$perm_array = $permission->as_array();
			$perm_name = Inflector::underscore(Arr::get($perm_array, 'name'));
			$perm_id = (int) Arr::get($perm_array, 'id',0);
			
			$_permissions[UTF8::strtolower($perm_name)] = $perm_id;
		}
	}

	public function __get($name) 
	{
		return Arr::get($this->_permissions, $name, 0);
	}
}
