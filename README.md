# Kohana DB ACL

Database-based ACL module for Kohana 3.3 / PHP 5.4.

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

### As a Git submodule:

1. Add to your modules folder and enable in bootstrap.php

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

2. Run create-tables.sql (and orm/auth-schema-*.sql if you haven't already done so)
3. Make sure that your Model_User (if overwritten) uses the trait ACL_Trait_User
4. Create some permissions and start calling one of the permission methods on Model_User