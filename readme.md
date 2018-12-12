# Wordavel

Laravel PHP Framework v5.3 with [Corcel](https://github.com/corcel/corcel) plugin.
Configured and ready for WordPress use.

## Install
- After git clone, run
```
$ composer install
```
- Set your `Homestead.yaml` file and define sites and databases. For example:
```
sites:
    - map: wordavel.dev
      to: "/home/vagrant/wordavel/public"
    - map: admin.wordavel.dev
      to: "/home/vagrant/wordavel/admin"

databases:
    - homestead
    - wordpress
```
- Check your hosts file and add second virtual host for WP admin side.
- Set values in your .env file for WP params. Generate your unique keys to [Roots.io](https://roots.io/salts.html)
- If you move wordpress's directory, set `$bootstrapFilePath` in `app/Providers/WordPressServiceProvider.php`
- Run
```
$ vagrant up
$ vagrant ssh
$ cd wordavel
$ composer start
```
- Install WordPress from dedicated virtual host. http://admin.wordavel.dev in this case.
- Try your test page /testme. http://wordavel.dev/testme in this case.

## Authors
- [Giorgio Grasso](https://grag.io)

## Contributors
- [Gianmarco Simone](https://github.com/gsimone)
