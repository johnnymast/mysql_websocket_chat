/**
 * Put a package (message) on the screen
 * for you or others to read.
 *
 * @param package
 */
function dialog_output(package) {
    $('.chat_dialog').append('<b>'+package.user.username+'</b>: '+package.message+'<br/>');
}

/**
 * Just to make it feel like a real chat.
 * Send the message if enter has been pressed.
 */
$('.client_chat').on('keypress', function(evt) {
    if (evt.keyCode == 13) {
       $('.btn-send.chat_btn').click();
    }
});

/**
 * Submit has been pressed execute sending
 * to server.
 */
$('.btn-send.chat_btn').on('click', function() {

    /**
     * Catch the chat text
     * @type {any}
     */
    var chat_message = $('.client_chat').val();

    /**
     * Create a package to send to the
     * server.
     */
    var package = {
        'user': chat_user, /* Defined in index.php */
        'message' : chat_message
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
    $('.client_chat').val('')}
);

/**
 * Before we start hide the error
 * message.
 */
$('.connection_alert').hide();

/**
 * Start the connection
 * @type {WebSocket}
 */
var conn = new WebSocket('ws://' +socket_host+':'+socket_port);

/**
 * Notify the user that the connection is closed
 * and disable the chat bar.
 *
 * @param e
 */
conn.onclose = function(e) {
    console.log("Connection closed!");

    $('.client_chat').prop('disabled', true);
    $('.connection_alert').show();
};

conn.onerror = function(e) {
    console.log("We have received an error!");

};

conn.onopen = function(e) {
    console.log("Connection established!");
    $('.client_chat').prop('disabled', false);
    conn.send('Hello Me!');
};

conn.onmessage = function (event) {
    var package = JSON.parse(event.data);
    dialog_output(package);
}

