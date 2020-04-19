/* eslint-disable no-undef */
const RECONNECT_IN_SEC = 10
let ws = {
  /**
   * Start the connection
   * @type {WebSocket}
   */
  conn: null,
}

/**
 * Handle automatically reconnecting to a websocket server
 * if the connection was interrupted.
 *
 * @param {function} callback -
 */
WebSocket.prototype['reconnect'] = (callback) => {

  if (this.readyState === WebSocket.OPEN || this.readyState !== WebSocket.CONNECTING) {
    this.close()
  }

  let seconds = RECONNECT_IN_SEC
  let container = dom('.connection_alert .error_reconnect_countdown')
  let countHandle = setInterval(() => {
    if (--seconds <= 0) {
      clearInterval(countHandle)
      callback()
      return
    }
    container.text(seconds.toString())
  }, 1000)
}

let connect = () => {

  if (ws.conn) {
    if (ws.conn.readyState === WebSocket.OPEN || ws.conn.readyState === WebSocket.CONNECTING) {
      ws.conn.close()
    }
    delete ws.conn
  }

  ws.conn = new WebSocket('ws://' + socket_host + ':' + socket_port)

  /**
   * Connection has been established
   *
   * @param {Event} event - The onopen event.
   */
  ws.conn.onopen = (event) => {

    dom('.client_chat').removeAttr('disabled')
    dom('.connection_alert').hide()

    /**
     * Register te client to the
     * server. This allows the server
     * to return a list of chat clients
     * to list on the side.
     */
    register_client()

    /**
     * Request the user list from
     * the server. If the server replies the user list
     * will be populated.
     */
    request_userlist()
  }

  /**
   * A new message (read package) has been received.
   *
   * @param {Event} event - The onmessage event.
   */
  ws.conn.onmessage = (event) => {
    let pkg = JSON.parse(event.data)

    if (pkg.type === 'message') {
      dialog_output(pkg)
    } else if (pkg.type === 'userlist') {
      users_output(pkg.users)
    } else if (pkg.type === 'typing') {
      typing_output(pkg)
    }
  }

  /**
   * Notify the user that the connection is closed
   * and disable the chat bar.
   *
   * @param {Event} event - The onclose event.
   */
  ws.conn.onclose = (event) => {
    console.log('Connection closed!')

    dom('.client_chat').prop('disabled', true)
    dom('.connection_alert').show()
    clear_userlist()

    if (event.target.readyState === WebSocket.CLOSING || event.target.readyState === WebSocket.CLOSED) {
      event.target.reconnect(connect)
    }
  }

  /**
   * Display a message in the terminal if
   * we run into an error.
   *
   * @param {Event} event - The error event.
   */
  ws.conn.onerror = (event) => {
    console.log('We have received an error!', event)
  }
}

let user_list = dom('.user_list').get()

document.addEventListener('DOMContentLoaded', connect)

/**
 * Remove all users from the users on the
 * side of the screen.
 */
clear_userlist = () => {

  /**
   * First of all clear the current userlist
   */
  while (user_list.firstChild) {
    user_list.removeChild(user_list.firstChild)
  }
}

/**
 * Put a package (message) on the screen
 * for you or others to read.
 *
 * @param {object} pkg - The package object to display.
 */
dialog_output = (pkg) => {
  if (pkg.to_user) {
    if (pkg.to_user.id === chat_user.id) {
      dom('.chat_dialog').append('<b class="priv_msg">(Private from &lt;&lt; ' + pkg.user.username + '</b>)  ' + pkg.message + '<br/>')
    } else {
      dom('.chat_dialog').append('<b class="priv_msg">(Private to &gt;&gt; ' + pkg.to_user.username + '</b>): ' + pkg.message + '<br/>')
    }
  } else {
    dom('.chat_dialog').append('<b>' + pkg.user.username + '</b>: ' + pkg.message + '<br/>')
  }
}

/**
 * Update the user list in the UI
 *
 * @param {array} users - Array of uses to display in the chatroom.
 */
users_output = (users) => {

  /**
   * First get the current select value
   * on the list. This is so we can restore
   * the selected list item after requesting
   * fow new users.
   */
  let selected_user = user_list.value

  /**
   * Before we start adding users
   * to the userlist make sure we erase
   * all the old users of the screen.
   */
  clear_userlist()

  for (let connection_id in users) {

    if (users.hasOwnProperty(connection_id)) {
      let user = users[connection_id]
      let elm = document.createElement('OPTION')

      elm.value = user.id
      elm.appendChild(document.createTextNode(user.username))

      if (elm.value === chat_user.id) {
        elm.classList = ['client_user_you']
        elm.disabled = 'disabled'
      }

      if (selected_user.length > 0 && elm.value === selected_user) {
        elm.selected = 'selected'
      }

      user_list.appendChild(elm)
    }
  }
}

typing_output = (pkg) => {

  if (typeof pkg == 'object') {
    let user = pkg.user
    let isTyping = pkg.value

    let indicator = dom('.typing_indicator').get()
    let typingMessage = dom(`.typing_indicator li[data-userid="${user.id}"]`).get()

    if (typingMessage) {
      typingMessage.parentNode.removeChild(typingMessage)
    }

    if (isTyping) {
      let msg = `${user.username} is typing a message`
      let li = document.createElement('LI')
      li.dataset.userid = user.id
      li.innerText = msg

      indicator.appendChild(li)
    }
  }
}

/**
 * We need to register this browser window (client)
 * to the server. We do this so we can sent private
 * messages to other users.
 */
register_client = () => {

  /**
   * Create a registration package to send to the
   * server.
   */
  let pkg = {
    'user': chat_user, /* Defined in index.php */
    'type': 'registration',
  }

  pkg = JSON.stringify(pkg)

  /**
   * Send the package to the server
   */
  if (ws.conn && ws.conn.readyState === WebSocket.OPEN) {
    ws.conn.send(pkg)
  }
}

/**
 * Request a list of current active
 * chat users. We do this every x seconds
 * so we can update the ui.
 */
request_userlist = () => {
  setInterval(() => {
    if (ws.conn.readyState !== WebSocket.CLOSING && ws.conn.readyState !== WebSocket.CLOSED) {

      /**
       * Create a package to request the list of users
       */
      let pkg = {
        'user': chat_user, /* Defined in index.php */
        'type': 'userlist',
      }

      /**
       * We need a object copy of package
       * to send to dialog_output() but we
       * also want to turn the original package
       * into a string so we can send it over the
       * socket to the server.
       *
       * @type {Object}
       */
      pkg = JSON.stringify(pkg)
      if (ws.conn && ws.conn.readyState === WebSocket.OPEN) {
        ws.conn.send(pkg)
      }
    }
  }, 2000)
}

register_typing = (currently) => {

  /**
   * Create a package to send to the
   * server.
   */
  let pkg = {
    'user': chat_user, /* Defined in index.php */
    'type': 'typing',
    'value': currently || false
  }

  pkg = JSON.stringify(pkg)

  /**
   * Send the package to the server
   */
  if (ws.conn && ws.conn.readyState === WebSocket.OPEN) {
    ws.conn.send(pkg)
  }
}

/**
 * Send a chat message to the server
 */
send_message = () => {

  /**
   * Catch the chat text
   *
   * @type {string}
   */
  let chat_message = dom('.client_chat').val()

  if (typeof chat_message === 'undefined' || chat_message.length === 0) {
    dom('.client_chat ').addClass('error')
    setTimeout(() => {
      dom('.client_chat ').removeClass('error')
    }, 500)
  }

  register_typing(false)

  /**
   * When to_user is empty the
   * message will be sent to all users
   * in the chat room.
   *
   * @type {Object}
   */
  let to_user = null

  /**
   *  If a user is selected in the
   *  userlist this will mean send messages
   *  to that user.
   */
  if (user_list.value) {
    to_user = {
      id: user_list.value,
      username: user_list.options[user_list.selectedIndex].text
    }
  }

  /**
   * Create a package to send to the
   * server.
   */
  let pkg = {
    'user': chat_user, /* Defined in index.php */
    'message': chat_message,
    'to_user': to_user,
    'type': 'message',
  }

  /**
   * We need a object copy of package
   * to send to dialog_output() but we
   * also want to turn the original package
   * into a string so we can send it over the
   * socket to the server.
   *
   * @type {Object}
   */
  let pkg_object = pkg
  pkg = JSON.stringify(pkg)

  /**
   * Send the package to the server
   */
  if (ws.conn && ws.conn.readyState === WebSocket.OPEN) {
    ws.conn.send(pkg)
  }

  /**
   * Display the message we just wrote
   * to the screen.
   */
  dialog_output(pkg_object)

  /**
   * Empty the chat input bar
   * we don't need it anymore.
   */
  dom('.client_chat').val('')
}
/* eslint-enable no-undef */