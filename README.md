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

# Installation

* Add the files to your modules folder and enable in bootstrap.php

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

* Run create-tables.sql (and orm/auth-schema-*.sql if you haven't already done so)
* Make sure that your Model_User (if overwritten) uses the trait ACL_Trait_User
* Create some permissions and start calling one of the permission methods on Model_User