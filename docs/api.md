## Modules

<dl>
<dt><a href="#module_something">something</a></dt>
<dd><p>My module to do something.</p>
</dd>
</dl>

## Functions

<dl>
<dt><a href="#clear_userlist">clear_userlist()</a></dt>
<dd><p>Remove all users from the users on the
side of the screen.</p>
</dd>
<dt><a href="#dialog_output">dialog_output(pkg)</a></dt>
<dd><p>Put a package (message) on the screen
for you or others to read.</p>
</dd>
<dt><a href="#users_output">users_output(users)</a></dt>
<dd><p>Update the user list in the UI</p>
</dd>
<dt><a href="#register_client">register_client()</a></dt>
<dd><p>We need to register this browser window (client)
to the server. We do this so we can sent private
messages to other users.</p>
</dd>
<dt><a href="#request_userlist">request_userlist()</a></dt>
<dd><p>Request a list of current active
chat users. We do this every x seconds
so we can update the ui.</p>
</dd>
<dt><a href="#send_message">send_message()</a></dt>
<dd><p>Send a chat message to the server</p>
</dd>
</dl>

<a name="module_something"></a>

## something
My module to do something.

<a name="module_something..dom"></a>

### something~dom(selector) ⇒ <code>_dom</code>
Return a new instance of _dom (the jquery clone) so the code could

**Kind**: inner method of [<code>something</code>](#module_something)  

| Param | Type | Description |
| --- | --- | --- |
| selector | <code>string</code> | The selector for the dom element. |

<a name="clear_userlist"></a>

## clear_userlist()
Remove all users from the users on theside of the screen.

**Kind**: global function  
<a name="dialog_output"></a>

## dialog_output(pkg)
Put a package (message) on the screenfor you or others to read.

**Kind**: global function  

| Param | Type | Description |
| --- | --- | --- |
| pkg | <code>object</code> | The package object to display. |

<a name="users_output"></a>

## users_output(users)
Update the user list in the UI

**Kind**: global function  

| Param | Type | Description |
| --- | --- | --- |
| users | <code>array</code> | Array of uses to display in the chatroom. |

<a name="users_output..selected_user"></a>

### users_output~selected_user
First get the current select valueon the list. This is so we can restorethe selected list item after requestingfow new users.

**Kind**: inner property of [<code>users_output</code>](#users_output)  
<a name="register_client"></a>

## register_client()
We need to register this browser window (client)to the server. We do this so we can sent privatemessages to other users.

**Kind**: global function  
<a name="register_client..pkg"></a>

### register_client~pkg
Create a registration package to send to theserver.

**Kind**: inner property of [<code>register_client</code>](#register_client)  
<a name="request_userlist"></a>

## request_userlist()
Request a list of current activechat users. We do this every x secondsso we can update the ui.

**Kind**: global function  
<a name="send_message"></a>

## send_message()
Send a chat message to the server

**Kind**: global function  

* [send_message()](#send_message)
    * [~chat_message](#send_message..chat_message) : <code>string</code>
    * [~to_user](#send_message..to_user) : <code>string</code>
    * [~pkg](#send_message..pkg)
    * [~pkg_object](#send_message..pkg_object) : <code>Object</code>

<a name="send_message..chat_message"></a>

### send_message~chat_message : <code>string</code>
Catch the chat text

**Kind**: inner property of [<code>send_message</code>](#send_message)  
<a name="send_message..to_user"></a>

### send_message~to_user : <code>string</code>
When to_user is empty themessage will be sent to all usersin the chat room.

**Kind**: inner property of [<code>send_message</code>](#send_message)  
<a name="send_message..pkg"></a>

### send_message~pkg
Create a package to send to theserver.

**Kind**: inner property of [<code>send_message</code>](#send_message)  
<a name="send_message..pkg_object"></a>

### send_message~pkg_object : <code>Object</code>
We need a object copy of packageto send to dialog_output() but wealso want to turn the original packageinto a string so we can send it over thesocket to the server.

**Kind**: inner property of [<code>send_message</code>](#send_message)  
