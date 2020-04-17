[![Code Triagers Badge](https://www.codetriage.com/johnnymast/mysql_websocket_chat/badges/users.svg)](https://www.codetriage.com/johnnymast/mysql_websocket_chat)
[![js-standard-style](https://img.shields.io/badge/code%20style-standard-brightgreen.svg)](http://standardjs.com)

# MYSQL WEBSOCKET CHAT

Welcome to this Hackaton project I created for user hrushi on [phpclasses.org](http://www.phpclasses.org/recommend/754-I-need-to-create-realtime-user-to-user-chat.html). The idea was to create a web socket chat application
that could be logging to a database. So here is what you need to get this up and running. ***Please note*** the minimum required PHP version is 7.0- this is not because it wanted this but it is because of the dependencies this project has.


# Step 1: install composer

First thing you is installing composer on to your system. You can get composer [here](https://getcomposer.org/download/). Don't worry it might seem intimidating but it is not.

# Step 2: Install the project 

## Using composer

Installing the project using composer is hands down the easiest way to get started. This method will download the project from GitHub
and automatically install its dependencies for you. Presuming you installed composer (step 1) execute the following commands on the command-line.

```bash
$ composer create-project johnnymast/mysql_websocket_chat chat
$ cd chat
```

<em>In the above example I am using a mac so my prompt will display different then you if you are on windows.</em>

## Downloaded from phpclasses.org

If you download this package in a zip file from [phpclasses.org](http://www.phpclasses.org/package/9947-PHP-Websocket-starter-project.html) you will have to extract the zip package to a location of your liking. Then 
change directory into that directory and execute the following command on your prompt.

```bash
$ composer install
```

<em>In the above example I am using a mac so my prompt will display different then you if you are on windows.</em>


# Step 3: Configure the server

## Websocket configuration

This project can be split into two different components. The WebSocket server is the <code>server.php</code> in the root directory. The second part
is the frontend part located in <code>public/index.php</code>. For the WebSocket server, there are two configuration options that you can configure in <code>includes/config.php</code>.

#### WEBSOCKET_SERVER_IP

This flag allows you to configure the WebSocket server's IP-address. By default the value <code>127.0.0.1</code> has been set.

#### WEBSOCKET_SERVER_PORT  

This will configure what port the WebSocket server will listen on. The default value has been set to <code>8080</code>. You can change this
value if it clashes with other services running on your machine.

## Database configuration

This server can run either with or without a database. By default i have disabled the use of a database server (<code>ENABLE_DATABASE</code>) but you can enable it by switching the <code>ENABLE_DATABASE</code> to <code>true</code>
in the [includes/config.php](https://github.com/johnnymast/mysql_websocket_chat/blob/master/includes/config.php) file. 

| Flag | Description |
| --- | --- |
| DATABASE_HOST | The database username goes in here. By default this has been set to <code>root</code>. |
| DATABASE_USERNAME | The database username goes in here. By default this has been set to <code>root</code>.|
| DATABASE_PASSWORD | Enter the password to access the database there. By default this has been set to <code>root</code>.|
| DATABASE_DB | Enter the name of the database here. By default this has been set to <code>socket_chat</code>.|
| ENABLE_DATABASE | This flag will turn using the database on or off by setting its value to <code>true</code> or <code>false</code>.|


***Please note*** if you enable the database make sure you update the credentials as well (see table above). Also if you enable the database make sure you have imported [database.sql](https://github.com/johnnymast/mysql_websocket_chat/blob/master/database.sql) into your database.


# Step 4: Fire up the WebSocket server

Change direction into the chat directory and fire up the server.

```bash
$ cd chat
$ php ./server.php
```

When you see no output and the command seems to hang that's when you know its running.


# Step 5: Point a web service to the public directory

In the chat directory, you will find index.php. This file will be the client for your chat application. Make sure you set any web service its document root to the <code>public/</code> folder. Alternatively, if you don't have access to a webserver you can also try using PHP's
build-in webserver.

```bash
$ cd public
$ php -S 127.0.0.1:8000
```

<emn>This will start an webserver on port 8000</em>  

# Step 6: Chat away!

Now open up 2 chat tabs and point them to localhost (or maybe a virtual host you configured) and chat away with your self.


## Functionality

#### Private chats

If you want to test private chats you can single click any user in the user list on the right of the screen. Then type your message
in the message bar, this will send a private message only to that user.


## Changes

If you wish to know what has changed in this version of Mysql WebSocket Chat you can always checkout the changelog [here](https://github.com/johnnymast/mysql_websocket_chat/blob/master/CHANELOG.md).


## Author

This package is created and maintained by [Johnny Mast](mailto:mastjohnny@gmail.com). For feature requests or suggestions you could consider sending me an e-mail.

## Enjoy

Oh and if you've come down this far, you might as well [follow me](https://twitter.com/mastjohnny) on twitter.
 

## License

MIT License

Copyright (c) 2020 Johnny Mast

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

  