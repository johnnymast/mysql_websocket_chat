# Docker support 

With version 1.5 i have added docker support to mysql_websocket_chat. This means you no longer need to run the ```server.php``` script
by hand.


### Building the image

```bash
$ docker-compose build
```

### Running the image

```bash
$ docker-compose up
```

***Please note:*** If you are using docker for development on this project make super to configure the WEBSOCKET_SERVER_IP ```(includes/config.php)``` to be
0.0.0.0. This has to do with bridging a network connection from the virtual host to your own local machine.


### Exposed ports

| Service        | Version |Port inside virtual machine | Port available via host     |
| :---           | :--- |   :----:   | ---: |
| Apache Server  | 2.4 | 80       | 8080 |
| Mysql Server   | 5.7 | 3306     | 8083 |
| Ratchet Websocket Server   | 0.4.1 | 8090     | 8090 |