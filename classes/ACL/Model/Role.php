<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @since 1.0
 * @author Ando Roots <ando@roots.ee>
 */
class ACL_Model_Role extends Model_Auth_Role
{
	// Basic Role constants
	const LOGIN = 1; // Allow login
	const ADMIN = 2; // Never-ever give this role to daily system users! Only for developers.

	protected $_has_many = [
		'permissions' => ['through' => 'permissions_roles'],
		'users'       => ['through' => 'roles_users']
	];

	/**
	 * Check whether the current role can do some action.
	 *
	 * @since 1.0
	 * @param int $permission Either an instance of ACL_Model_Permission or a numeric Permission ID
	 * @return bool True if the action is authorized for this role
	 */
	public function can($permission)
	{
		if (! $this->loaded()) {
			return false;
		}

		// The ADMIN role is all-powerful
		if ($this->pk() === self::ADMIN) {
			return true;
		}

		return $this->has('permissions', $permission);
	}
}