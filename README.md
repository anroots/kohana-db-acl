# Kohana DB ACL

Database-based ACL module for Kohana 3.3 / PHP 5.4. Users get access rights to perform certain actions through their roles.
Each role can have several permissions. You define new roles and permissions in the database as you see fit.

# Dependencies

1. PHP >= 5.4
2. Kohana >= 3.3
3. Default Database, Auth and ORM modules

# Usage
```php
// Check current user's permission to edit customers
$current_user = Auth::instance()->get_user();
if ($current_user->can(Permission::EDIT_CUSTOMERS)) { /** Do some stuff **/ }
```
## Checking permissions

* `$user->can($permission); // Has the permission`
* `$user->has_permissions(array $permissions); // Has all of the specified permissions`
* `$user->has_any_permission(array $permission); // Has any of the specified permissions`

## Permission constants

Override Permission in your `APPPATH` to define permission constants. Constant values correspond to the `id` column of
the `permissions` table.

```php
<?php
class Model_Permission extends ACL_Model_Permission {
	const EDIT_USERS = 1;
	const ADD_NEW_POST = 2;
}

$user->can(Model_Permission::EDIT_USERS);
```

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