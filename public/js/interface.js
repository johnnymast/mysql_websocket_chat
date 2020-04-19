/* eslint-disable no-undef */
document.addEventListener('DOMContentLoaded', () => {

  let setChatTarget = (target) => {
    if (!target) {
      target = 'Channel'
    }

    dom('.chat_target').text(target)
  }

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

  dom('.client_chat').on('keyup', (evt) => {
    if (evt.target.value.length > 0) {
      register_typing(true)
    } else {
      register_typing(false)
    }
  })

  /**
   * Just to make it feel like a real chat.
   * Send the message if enter has been pressed.
   */
  dom('.client_chat').on('keypress', (evt) => {
    if (evt.key === 'Enter') {
      send_message()
    }
  })

  dom('.user_list').on('change', (evt) => {
    let list = evt.target
    let to = null

    if (list.selectedIndex >= 0) {
      to = list.options[list.selectedIndex].text
    }

    setChatTarget(to)
  })

  /**
   * Submit has been pressed execute sending
   * to server.
   */
  dom('.btn-send.chat_btn').on('click', () => {
    send_message()
    register_typing(false)
  })

  setChatTarget()
})
/* eslint-enable no-undef */