# Lexar

An all-in-one CRM/CMS Web Application, written by [Callan P Milne](https://github.com/callanpmilne/), for PHP 8.3 and above.

## Requirements

* PHP 8.3+
* PostgreSQL 2.6+

## Start the application (local)

Assumes you've already copied the `config` file and updated it to point to your Postgres DB.

E.g.
```
cp ./config.inc.php.new ./config.inc.php
```

### Windows

This guide assumes [PHP](https://www.php.net) is already installed and the windows PATH environment variable is set correctly for it.

1. Open Terminal
2. Check PHP version
  ```
  > php -v
  PHP 8.3...
  ```
3. Navigate to the project's root directory
4. Open the `pub` directory
  ```
  > cd pub
  ```
5. Start the development server using PHP's [Built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php)
  ```
  > php -S localhost:8282 lexar-www.php
  ```

### OSX

This guide assumes [PHP](https://www.php.net) is already installed and that your PATH environment variable is set correctly for it.

1. Open Terminal
2. Check PHP version
  ```
  > php -v
  PHP 8.3...
  ```
3. Navigate to the project's root directory
  ```
  > cd /path/to/lexar
  ```
4. Start the development server
  ```
  > ./bin/www-local.zsh
  ```

### *nix

This guide assumes [PHP](https://www.php.net) is already installed and your *nix PATH environment variable is set correctly for it.

1. Open Windows PowerShell
2. Check PHP version
  ```
  > php -v
  PHP 8.3...
  ```
3. Navigate to the project's root directory
  ```
  > cd /path/to/lexar
  ```
4. Start the development server
  ```
  > ./bin/www-local
  ```

## License

### UNLICENSED

This software is currently provided **UNLICENSED**.

Please contact me via GitHub or email for a license. 
