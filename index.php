<?php
require 'vendor/autoload.php';
require 'includes/config.php';

/**
 * Create a fake identity
 */
$faker = Faker\Factory::create();

$user = [
    'id' => $faker->randomDigit, /* This will create a random number */
    'username' => $faker->name /* Give the user a random name */
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Websocket chat example using jquery + php + mysql">
    <meta name="author" content="Johnny Mast">

    <title>Websocket Chat</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/css/starter-template.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" crossorigin="anonymous">
    <script type="text/javascript">
        var socket_host = '<?php print CHAT_SERVER_HOST ?>';
        var socket_port = '<?php print CHAT_SERVER_PORT ?>';
    </script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Websocket Chat</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="starter-template">
        <h1>Websockets chat example</h1>
        <p class="lead">Open this url in a second browser and chat away! Depending on includes/config.php it will report
            to the database or not. All interactions are controlled by includes/classes/Chat.php</p>
        <textarea class="chat_dialog"></textarea>

        <form method="" action="">
            <div class="input-group client">
                <span class="input-group-addon name_bit" id="basic-addon3">You: <?php print $user['username']; ?></span>
                <input type="text" class="form-control client_chat" placeholder="Type your message...">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-send" type="button">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>


    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="/js/websockets.js"/>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>


</body>
</html>

