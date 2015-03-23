# CakeAutoAdmin plugin for CakePHP
[![Build Status](https://travis-ci.org/KarlJakober/CakeAutoAdmin.svg)](https://travis-ci.org/KarlJakober/CakeAutoAdmin)

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require KarlJakober/CakeAutoAdmin
```

You will need to define a function called AutoAdminIsAuthorized in the Table file through which you
authenticate.

This function can be as simple as

```
public function AutoAdminIsAuthorized($user) {
    // Admin can access every action in AutoAdmin
    if (isset($user['level']) && $user['level'] === 'admin') {
        return true;
    }

    // Default deny
    return false;
}
```

## Configuration

You may define a autoAdminConfig variable in any table in which to customize further

Some recommended configurations are

UsersTable.php
```
public $autoAdminConfig = [
    'fields' => [
        'password' => [
            'passwd' => true
        ]
    ]
];
```


autoAdminConfig Variables

'fields' Array of specific rows in a table in which to attach an attribute to
    'password' (boolean) Will exclude the password field from CakeAutoAdmin and include a
    new field in which to update the password of an authenticated model
    'email' (boolean) Will define the field as an email address, requiring proper formatting

'paginate' Array of configuration to change the paginated index of the table.
    'limit' (integer) Defaulted to 20, you can override this in your table to increase the
    number of results shown on a paginated page.

'actions' Array of actions that can be performed by a specific model. If all actions are false
table will not be included in the admin panel.
    'index' (boolean)
    'add' (boolean)
    'edit' (boolean)
    'delete' (boolean)

'default' Array of fields you can specify a default value for
