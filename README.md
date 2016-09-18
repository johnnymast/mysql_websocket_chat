# MYSQL WEBSOCKET CHAT

Welcome to this hackaton project i created for user hrushi on [phpclasses.org](http://www.phpclasses.org/recommend/754-I-need-to-create-realtime-user-to-user-chat.html). The idea was to create a websocket chat application
that could be logging to a database. So here is what you need to get this up and running. ***Please note*** the minimum required php version is 5.6 this is not because it wanted this but its because of the dependencies this project has.


# Step 1: install composer

First thing you is installing composer on to your system. You can get composer [here](https://getcomposer.org/download/). Don't worry it might seem intimidating but its really not.

# Step 2: Install the project

If you download this package in a zip file from [phpclasses.org](http://www.phpclasses.org/package/9947-PHP-Websocket-starter-project.html) you will have to extract the zip package to a location of your liking. Then 
CD into that directory and execute the following command on your prompt.

In this example i am using a mac so my prompt will display different then you if you are on windows. Don't worry about that to much and execute the following command.


```bash
$ cd chat
$ composer install
```

On the other hand with composer installed you could use a more confidant method by installing the project via the composer create-project option.
This will automatically download and install the project into the chat directory.

```bash
$ composer create-project johnnymast/mysql_websocket_chat chat
```

This will now download the whole project (and its dependencies) for you so you can run it.

# Step 3: Configure the server

This server can run with or without a database. By default i have disabled the use of a database server but you can enable it by switching the ENABLE_DATABASE to true
in the [includes/config.php](https://github.com/johnnymast/mysql_websocket_chat/blob/master/includes/config.php) file. ***Please note*** if you enable the database make sure you
update the credentials as well (see other defines).

Also if you enable the database make sure you have imported [database.sql](https://github.com/johnnymast/mysql_websocket_chat/blob/master/database.sql) into your database.


# Step 4: Fire up the server

CD in to the chat directory and fire up the server.

```bash
$ cd chat
$ php ./server.php
```

When you see no output and the command seems to hang that's when you know its running.


# Step 5: Point a webserver to the chat directory

In the chat directory you will find index.php. This file will be the client for your chat application. Make sure you set any
webserver its document root to this location.

# Step 6: Chat away!

Now open up 2 chat tabs and point them to localhost (or maybe a virtual host you configured) and chat away with your self.



## Author

mysql_websocket_chat is created and maintained by [Johnny Mast](mailto:mastjohnny@gmail.com). For feature requests or suggestions you could consider sending me an e-mail.

## License

mysql_websocket_chat is released under the MIT public license.

<https://github.com/johnnymast/mysql_websocket_chat/blob/master/LICENSE.md>

## Enjoy

 Oh and if you've come down this far, you might as well [follow me](https://twitter.com/mastjohnny) on twitter.
 
