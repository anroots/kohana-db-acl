<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @since 1.0
 * @author Ando Roots <ando@roots.ee>
 */
class ACL_Model_Permission extends ORM {

	protected $_has_many = [
		'roles'=> ['through'=> 'permissions_roles']
	];
}