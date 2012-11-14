<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @since 1.0
 * @author Ando Roots <ando@roots.ee>
 */
class ACL_Model_Permission extends ORM {

	protected $_has_many = [
		'roles'=> ['through'=> 'permissions_roles']
	];

	// Permission modes for User::can
	const ANY = 1; // Any permission from a list of permissions allows the user to do sth
	const ALL = 2; // The user must have all specified permissions

	// Add your permission constants here
	// const EDIT_USER = 1; // Roles with this permission can edit user accounts.
}