# Database based Access Control Module for the Kohana Framework

Database-based ACL module for Kohana 3.3 / PHP 5.4. Users get access rights to perform certain actions through their roles.
Each role can have several permissions. You define new roles and permissions in the database as you see fit.

I actually do recommend against using this module unless you specifically want the role/permission management to happen in
the database (some projects need permissions managed from the GUI, by the administrative users). For an alternative
(and much better) implementation, see [https://github.com/vendo/acl](https://github.com/vendo/acl).

# Dependencies

1. PHP >= 5.4
2. Kohana >= 3.3
3. Default Database, Auth and ORM modules

# Usage

```php
// ...
public function save_customer() {
	$current_user = Auth::instance()->get_user();

	if (!$current_user->can(Permission::EDIT_CUSTOMERS)) {
		throw new Authorization_Exception('');
	}

	// Save the Customer ORM model
	$this->save();
}
// ...
```
## Defining permissions

Create new entries in table `permissions` as you develop your application. Associate permissions with roles and
check for the user's authorization to perform some action in your code.

### Permission constants

Override `Permission` in your `APPPATH` to define permission constants. Constant values correspond to the `id` column of
the `permissions` table.

```php
<?php
class Model_Permission extends ACL_Model_Permission {
	const EDIT_USERS = 1;
	const ADD_NEW_POST = 2;
}

$user->can(Model_Permission::EDIT_USERS);
```

## Checking permissions

* `$user->can($permission); // Has the permission`
* `$user->has_permissions(array $permissions); // Has all of the specified permissions`
* `$user->has_any_permission(array $permission); // Has any of the specified permissions`


# Installation

* Add the files to your modules folder

### As a Git submodule:

```bash
git clone git://github.com/anroots/kohana-db-acl.git modules/db-acl
```
### As a [Composer dependency](http://getcomposer.org)

```javascript
{
	"require": {
		"php": ">=5.4.0",
		"composer/installers": "*",
		"anroots/db-acl":"1.*"
	}
}
```
* Enable in bootstrap.php (above/before auth/orm modules)
* Run create-tables.sql (and orm/auth-schema-*.sql if you haven't already done so)
* Make sure that your Model_User (if overwritten) uses the trait ACL_Trait_User
* Create some permissions and start calling one of the permission methods on Model_User