# Wordavel

Laravel PHP Framework v5.3 with [Corcel](https://github.com/corcel/corcel) and [ACF](https://github.com/corcel/acf) plugin.
Configured and ready for WordPress use.

## Install
- After git clone, run
```
$ composer install
```
- Download [WordPress](https://wordpress.org/latest.zip) and copy WP files in a directory outside of THIS project directory.
- Set your Homestead.yaml file and define your folders, sites and databases. For example:
```
folders:
    - map: "/Users/username/Dev/wordavel"
      to: "/home/vagrant/wordavel"
    - map: "/Users/username/Dev/wordpress"
      to: "/home/vagrant/wp"

sites:
    - map: wordavel.dev
      to: "/home/vagrant/wordavel/public"
    - map: admin.wordavel.dev
      to: "/home/vagrant/wp"

databases:
    - homestead
    - wordpress
```

- Run
```
$ vagrant up
```
- Check your hosts file and add second virtual host for WP admin side.
- Set values in your .env file for DB and WPDB connections.
- Set $bootstrapFilePath in app/Providers/WordPressServiceProvider.php
```
protected $bootstrapFilePath = __DIR__.'/../../../wp/wp-load.php';
```
- Install WordPress from dedicated virtual host. http://admin.wordavel.dev in this case.
- Try your test page /testme. http://wordavel.dev/testme in this case.

## Authors
- [Giorgio Grasso](http://giorgiograsso.com)
