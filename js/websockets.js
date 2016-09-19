/**
 * Remove all users from the users on the
 * side of the screen.
 */
function clear_userlist() {


    /**
     * First of all clear the current userlist
     */
    while (user_list.firstChild) {
        user_list.removeChild(user_list.firstChild);
    }
}


/**
 * Put a package (message) on the screen
 * for you or others to read.
 *
 * @param package
 */
function dialog_output(package) {

    if (package.to_user.length > 0) {
        $('.chat_dialog').append('<b class="priv_msg">Private message: ' + package.user.username + '</b>: ' + package.message + '<br/>');
    } else {
        $('.chat_dialog').append('<b>' + package.user.username + '</b>: ' + package.message + '<br/>');
    }

}


/**
 * Update the user list in the UI
 *
 * @param users
 */
function users_output(users) {

    /**
     * First get the current select value
     * on the list. This is so we can restore
     * the selected list item after requesting
     * fow new users.
     */
    var selected_user = user_list.value;


    /**
     * Before we start adding users
     * to the userlist make sure we erase
     * all the old users of the screen.
     */
    clear_userlist();

    for (var connid in users) {

        if (users.hasOwnProperty(connid)) {
            var user = users[connid];

            elm = document.createElement('OPTION');
            elm.value = user.id;
            elm.appendChild(document.createTextNode(user.username));


            if (elm.value == chat_user.id) {
                elm.disabled = 'disabled';
            }

            if (selected_user.length > 0 && elm.value == selected_user) {
                elm.selected = 'selected';
            }

            user_list.appendChild(elm);
        }
    }
}


/**
 * We need to register this browser window (client)
 * to the server. We do this so we can sent private
 * messages to other users.
 */
function register_client() {


    /**
     * Create a registration package to send to the
     * server.
     */
    var package = {
        'user': chat_user, /* Defined in index.php */
        'type': 'registration',
    };


    package = JSON.stringify(package);


    /**
     * Send the package to the server
     */
    conn.send(package);
}


/**
 * Request a list of current active
 * chat users. We do this every x seconds
 * so we can update the ui.
 */
function request_userlist() {
    setInterval(function () {
        if (conn.readyState != WebSocket.CLOSING && conn.readyState != WebSocket.CLOSED) {


            /**
             * Create a package to request the list of users
             */
            var package = {
                'user': chat_user, /* Defined in index.php */
                'type': 'userlist',
            };


            /**
             * We need a object copy of package
             * to send to dialog_output() but we
             * also want to turn the original package
             * into a string so we can send it over the
             * socket to the server.
             *
             * @type {{user, message: any}}
             */
            package = JSON.stringify(package);
            conn.send(package);
        }
    }, 2000);
}


/**
 * Send a chat message to the server
 */
function send_message() {


    /**
     * Catch the chat text
     * @type {any}
     */
    var chat_message = $('.client_chat').val();


    /**
     * When to_user is empty the
     * message will be sent to all users
     * in the chat room.
     * @type {number}
     */
    var to_user = '';


    /**
     *  If a user is selected in the
     *  userlist this will mean send messages
     *  to that user.
     */
    if (user_list.value) {
        to_user = user_list.value;
    }


    /**
     * Create a package to send to the
     * server.
     */
    var package = {
        'user': chat_user, /* Defined in index.php */
        'message': chat_message,
        'to_user': to_user,
        'type': 'message',
    };


    /**
     * We need a object copy of package
     * to send to dialog_output() but we
     * also want to turn the original package
     * into a string so we can send it over the
     * socket to the server.
     *
     * @type {{user, message: any}}
     */
    var package_object = package;
    package = JSON.stringify(package);


    /**
     * Send the package to the server
     */
    conn.send(package);


    /**
     * Display the message we just wrote
     * to the screen.
     */
    dialog_output(package_object);


    /**
     * Empty the chat input bar
     * we don't need it anymore.
     */
    $('.client_chat').val('')
}


/**
 * Start the connection
 * @type {WebSocket}
 */
var conn = new WebSocket('ws://' + socket_host + ':' + socket_port);
var user_list = $('.user_list').get(0);


/**
 * Notify the user that the connection is closed
 * and disable the chat bar.
 *
 * @param e
 */
conn.onclose = function (e) {
    console.log("Connection closed!");

    $('.client_chat').prop('disabled', true);
    $('.connection_alert').show();
    clear_userlist();
};


/**
 * Display a message in the terminal if
 * we run into an error.
 *
 * @param e
 */
conn.onerror = function (e) {
    console.log("We have received an error!");

};


/**
 * Connection has been established
 *
 * @param e
 */
conn.onopen = function (e) {

    console.log("Connection established!");

    $('.client_chat').prop('disabled', false);

    /**
     * Register te client to the
     * server. This allows the server
     * to return a list of chat clients
     * to list on the side.
     */
    register_client();

    /**
     * Request the user list from
     * the server. If the server replies the user list
     * will be populated.
     */
    request_userlist();
};


/**
 * A new message (read package) has been received.
 *
 * @param event
 */
conn.onmessage = function (event) {
    var package = JSON.parse(event.data);

    if (package.type == 'message') {
        dialog_output(package);
    } else if (package.type == 'userlist') {
        users_output(package.users);
    }
};