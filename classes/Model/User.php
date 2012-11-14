<?php defined('SYSPATH') or die('No direct script access.');
class Model_User extends Model_Auth_User {
	use ACL_Trait_User;
}