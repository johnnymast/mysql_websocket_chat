/***
 * This is more like a confidence setup
 * for the interface. It does not really help
 * with the chat functionality.
 */

/**
 * Before we start hide the error
 * message.
 */
$('.connection_alert').hide();


/**
 * Just to make it feel like a real chat.
 * Send the message if enter has been pressed.
 */
$('.client_chat').on('keypress', function (evt) {
    if (evt.keyCode == 13) {
        send_message();
    }
});


/**
 * Submit has been pressed execute sending
 * to server.
 */
$('.btn-send.chat_btn').on('click', function () {
    send_message();
});