# Siribooru

Siribooru is a custom fork of MyImouto, specifically the Dec 21, 2021 ver of
[MyImouto-plus](https://github.com/Yushe/myimouto-plus)

I am *trying to* patch it to PHP 8.2

I (intend to because PHP is a bitch) use this to manage my 'collection'. In past I have used MyImouto for this, with PHP 5, but I made the foolish error of updating PHP.
This setup (on my system) is just running on my LAN, and is just used for organising and centralising my photos.
It is untested elsewhere; be warned.

## Setup (Windows)

### Git

Siribooru expects you to be able to `git clone` it to a folder locally. Look up how to use Git for windows.
Do NOT forget to `--recurse-submodules`, this repo doesn't use them anymore but you should be using it anyway.
This guide expects it to be under `Y:/siribooru`

### XAMPP

The first of this repository's ignored subfolders is `./.xampp`, which is designed to hold an XAMPP install on windows.
Install it from ApacheFriends, and ensure you have Apache and MySQL enabled in the XAMPP control panel.
If you browse to <http://localhost:80> and see XAMPP's page, it is working.

### Composer

Composer is a PHP dependency manager. Install it, and direct it's PHP install to the PHP installed with XAMPP.
Once installed, run `composer install` in this folder.

Replace the railsphp and zendframework folders with the custom ones from this repo

### Config

Change XAMPP's PHP config in `./.xampp/php/php.ini`
Change:

- (on Line 853 by default) `upload_max_filesize=250M`
- (on Line 701 by default) `post_max_size=300M`
- (on Line 433 by default) `memory_limit=1024M`
- (on line 994 by defualt) `date.timezone = Asia/Tokyo` (or your timezone)
- (on lines 890-964) check that the `curl`, `gd` and `pdo_mysql` extensions are enabled

If you want to be on a port other than 80; Change Line 60 of `./.xampp/apache/conf/httpd.conf` to reflect the port you want to listen on, then add a block at approximately line 280:

```xml
<Directory "Y:/siribooru">
    AllowOverride All
    Require all granted
</Directory>
```

Open `./.xampp/apache/conf/extra/httpd-vhosts.conf` and append the following:

```xml
<VirtualHost *:80>
  DocumentRoot "Y:/siribooru/public"
</VirtualHost>
```

Restart Apache in the XAMPP control panel so that these changes will take effect.

### Create a Database

Create a database for your booru (the default expected name is myimouto). You can do so through PHPMyAdmin:

1. Go to <http://localhost/phpmyadmin> in your web browser.
2. In the top, horizontal menu, click on Databases. You will see a small text input under "Create database". Enter "myimouto" there, then in the Collation input choose "utf8_general_ci", and then click on Create.

### Further Configuration

You may want to change the database usernames and passwords in `config/database.yml`, and similarly configure the booru in `config/config.php`.
You will need to create a user for the `myimouto` database you created in phpmyadmin, unless you used the default credentials of root with no password.
The database might be set to development. You may need to change it to "production" in `config/boot.php`

### Finally setting up Siribooru

Run `php setup.php`. Setup an admin account with username and password. You might need to comment/uncomment DB creation if it's commented.

### Backups

I suggest doing backups to a file using PHPMyAdmin regularly. This is best done by performing an SQL dump under Export.
