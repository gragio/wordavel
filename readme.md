# Wordavel

Laravel PHP Framework v5.3 with [Corcel](https://github.com/corcel/corcel) and [ACF](https://github.com/corcel/acf) plugin.
Configured and ready for WordPress use.

## Install
- After git clone, run
```
$ composer install
```
- Set your Homestead.yaml file and define sites and databases. For example:
```
sites:
    - map: wordavel.dev
      to: "/home/vagrant/wordavel/public"
    - map: admin.wordavel.dev
      to: "/home/vagrant/wordavel/wordpress"

databases:
    - homestead
    - wordpress
```
- Check your hosts file and add second virtual host for WP admin side.
- Set values in your .env file for DB and WPDB connections.
- If you move wordpress's directory, Set $bootstrapFilePath in app/Providers/WordPressServiceProvider.php
- Run
```
$ vagrant up
$ composer start
```
- Install WordPress from dedicated virtual host. http://admin.wordavel.dev in this case.
- Try your test page /testme. http://wordavel.dev/testme in this case.

## Authors
- [Giorgio Grasso](http://giorgiograsso.com)
