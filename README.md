# MYSQL WEBSOCKET CHAT

This application is a boilerplate for a Websocket based chat application. You can use it as a starting off-point for your own applications. 

[![Code Triagers Badge](https://www.codetriage.com/johnnymast/mysql_websocket_chat/badges/users.svg)](https://www.codetriage.com/johnnymast/mysql_websocket_chat)
[![ESLint](https://github.com/johnnymast/mysql_websocket_chat/actions/workflows/ESLint.yaml/badge.svg)](https://github.com/johnnymast/mysql_websocket_chat/actions/workflows/ESLint.yaml)
[![StyleLint](https://github.com/johnnymast/mysql_websocket_chat/actions/workflows/StyleLint.yaml/badge.svg)](https://github.com/johnnymast/mysql_websocket_chat/actions/workflows/StyleLint.yaml)


### Step 1: install composer

You can quickly install the boilerplate using composer like this.

```bash
$ composer create-project johnnymast/mysql_websocket_chat chat
$ cd chat
```

## Step 3: Configure the server

### Websocket configuration

This project can be split into two different components. The WebSocket server is the <code>server.php</code> in the root directory. The second part
is the frontend part located in <code>public/index.php</code>. For the WebSocket server, there are two configuration options that you can configure in <code>includes/config.php</code>.

### Websocket Server configuration

| Flag | Description |
| --- | --- |
| WEBSOCKET_SERVER_IP | This flag allows you to configure the WebSocket server's IP-address. By default the value <code>127.0.0.1</code> has been set. |
| WEBSOCKET_SERVER_PORT | This will configure what port the WebSocket server will listen on. The default value has been set to <code>8090</code>. You can change this value if it clashes with other services running on your machine. |

### Database configuration

This server can run either with or without a database. By default, I have disabled the use of a database server (<code>ENABLE_DATABASE</code>) but you can enable it by switching the <code>ENABLE_DATABASE</code> to <code>true</code>
in the [includes/config.php](https://github.com/johnnymast/mysql_websocket_chat/blob/master/includes/config.php) file. 

| Flag | Description |
| --- | --- |
| DATABASE_USERNAME | The database username goes in here. By default this has been set to <code>root</code>.|
| DATABASE_PASSWORD | Enter the password to access the database there. By default this has been set to <code>root</code>.|
| ENABLE_DATABASE | This flag will turn using the database on or off by setting its value to <code>true</code> or <code>false</code>.|
| DATABASE_HOST | The database hostname/ip goes in here. By default this has been set to <code>root</code>. |
| DATABASE_PORT | The database port. By default this has been set to <code>3306</code>. |
| DATABASE_DB | Enter the name of the database here. By default this has been set to <code>socket_chat</code>.|


***Please note*** if you enable the database make sure you update the credentials as well (see table above). Also if you enable the database make sure you have imported [database/database.sql](https://github.com/johnnymast/mysql_websocket_chat/blob/master/database/database.sql) into your database.



## Step 4: Skip step 5 and 6 with Docker!

Docker simplifies running the project by miles and still alows you to change the project files on the fly.  It goes without saying but 
make sure you have docker installed ([get docker](https://www.docker.com/)). You only need to run two commands to get the container up and running.

[more detailed info here](DOCKER.md)

```bash
$ docker-compose build
$ docker-compose up
```

Congratulations you can now directly go to step 7, start chatting and have fun running your own chat service!


## Step 5: Fire up the WebSocket server

Change direction into the chat directory and fire up the server.

```bash
$ cd chat
$ php ./server.php
Server running at 127.0.0.1:8090
```

When you see no output and the command seems to hang that's when you know its running.


## Step 6: Point a web service to the public directory

In the chat directory, you will find index.php. This file will be the client for your chat application. Make sure you set any web service its document root to the <code>public/</code> folder. Alternatively, if you don't have access to a webserver you can also try using PHP's
build-in webserver.

```bash
$ cd public
$ php -S 127.0.0.1:8080
```

<emn>This will start an webserver on port 8080</em>  

## Step 7: Chat away!

Now open up 2 chat tabs and point them to localhost (or maybe a virtual host you configured) and chat away with your self.


## Functionality

### Private chats

If you want to test private chats you can single click any user in the user list on the right of the screen. Then type your message
in the message bar, this will send a private message only to that user.


### Changes

If you wish to know what has changed in this version of Mysql WebSocket Chat you can always checkout the changelog [here](https://github.com/johnnymast/mysql_websocket_chat/blob/master/CHANELOG.md).


## Author

This package is created and maintained by [Johnny Mast](mailto:mastjohnny@gmail.com). For feature requests or suggestions you could consider sending me an e-mail. Oh and if you've come down this far, you might as well [follow me](https://twitter.com/mastjohnny) on twitter.
If you like the package you can also choose to sponsor me on GitHub and buy me a beer.

[:heart: &nbsp;Sponsor](https://github.com/sponsors/johnnymast)




## License

MIT License

Copyright (c) 2021 Johnny Mast

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

  