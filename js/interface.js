document.addEventListener("DOMContentLoaded", function(event) {

  /***
   * This is more like a confidence setup
   * for the interface. It does not really help
   * with the chat functionality.
   */

  /**
   * Before we start hide the error
   * message.
   */
  dom('.connection_alert').hide()

  /**
   * Just to make it feel like a real chat.
   * Send the message if enter has been pressed.
   */
  dom('.client_chat').on('keypress', function (evt) {
    if (evt.keyCode === 13) {
      send_message()
    }
  })

  /**
   * Submit has been pressed execute sending
   * to server.
   */
  dom('.btn-send.chat_btn').on('click', function () {
    send_message()
  })
});