# G52GRP - Group 35
A compentence evaluating system for Food Science graduates.

## Members

- Alexander Hambley Jones (Leader)
- Alexander Ferrandiz Hagbarth
- Hangjian Yuan
- Lee Ryan Taylor
- Victor Walker



- Peter Blanchfield (Supervisor)
- Emma Weston (Sponsor)

## Documentations

### Trello

(To view you must have been invited)

| Board | Link |
| - | - |
| Planning | https://trello.com/b/W1guhkC1 |
| Coding   | https://trello.com/b/vjlo6bSZ |
| TDD      | https://trello.com/b/AQ639kJH |


### Dropbox

https://www.dropbox.com/sh/62o9vtykx57vlge/AABwtHlL5VeTuGXVegT_d3iXa?dl=0

### Gantt Chart

https://app.teamweek.com/#pg/xHNPnwNcWA8nuJm5--z6gqOOQ6nH1IIo

## Features

- Comprehensive themes
- User-friendly interface
- Lightweight architecture

## Useful for...
- Graduates of Food Science
- Undergraduates of Food Science
- Lecturers in Food Science

## Installation

1) Install [XAMPP](https://www.apachefriends.org/index.html) or set up a [LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04) stack.

2) Clone the git repository.
  * Save this to your _htdocs_ folder. (The installer should tell you where this is)

3) Make sure that localhost is running.
  * You can do this by either running XAMPP, and then entering your public IP (or typing in localhost).   
  * If you are running a LAMP stack, then browse to your server's public IP.

4) If you are running XAMPP, then you should be greeted with a webpage similar to this:

  ![localhost](readme-img/localhost.jpg)

5) Browse to PHPMyAdmin (_your-public-ip/phpmyadmin_) and create a new database called `g52grp`.
  * Please note that the database **must** be named `g52grp`:

![db1](readme-img/database.jpg)
  * Your PHPMyAdmin may be password protected. Log in, and we will deal with that later.

6) Import the SQL file '_/grp/src/data/foodgraduates.sql_'.

![db2](readme-img/database-2.jpg)

7) If your PHPMyAdmin is password protected, then you will have to add these credentials to the `db.php` and `credentials.php` files.

* There is not much to change, just add your username and password to these files.
*  They should be similar to this afterwards:
  * `credentials.php`
  ```php
  <?php
      $db_host = 'localhost';
      $db_username = 'root';
      $db_password = '';
      $db_database = 'g52grp';
  ?>
  ```
  * `db.php`
  ```php
  <?php
  $conn = new mysqli("localhost", "root", "", "g52grp");
  if ($conn->connect_errno != 0)
    die('Failed to connect to the database.');
  ```

8) You will now need to set up a new admin user in order to edit the database.
  * We first need to create a hash of your chosen password.
  * Create a new php file with the following php code inside:
  ```php
  <?php
  echo hash('sha256', 'YOUR PASSWORD HERE');
  ?>
  ```

  * Save this as `password.php` and browse to it by the following:  '_your-public-ip/grp/src/password.php_'

  * Copy this result.
  * In PHPMyAdmin, go to the users table on the left hand side, and click Browse. You should have a page like below:

![db3](readme-img/database-3.jpg)

  * Edit the following SQL command to contain the attributes that you want. Remember to use the hash that you generated for the password.

    ```sql
    INSERT INTO 'users' (Name, Password, Phone, Email, Birthday)
    VALUES ("USERNAME", "PASSWORD", "PHONE NUMBER" "EMAIL", "BIRTHDAY")
    ```

  * Press the Edit Inline link and paste your SQL command in, pressing 'Go'.

9) Make sure you delete the password.php file.

10) That's it! You should be all set up and able to log in.
