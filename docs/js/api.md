## Classes

<dl>
<dt><a href="#Dom">Dom</a></dt>
<dd><p>This file provides a replacement for jquery.</p>
</dd>
</dl>

## Functions

<dl>
<dt><a href="#dom">dom(selector)</a> ⇒ <code><a href="#Dom">Dom</a></code></dt>
<dd><p>Return a new instance of _dom (the jquery clone) so the code could</p>
</dd>
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

<a name="Dom"></a>

## Dom
This file provides a replacement for jquery.

**Kind**: global class  

* [Dom](#Dom)
    * [new Dom(selector)](#new_Dom_new)
    * [.on](#Dom+on)
    * [.hide()](#Dom+hide)
    * [.show()](#Dom+show)
    * [.get()](#Dom+get) ⇒ <code>HTMLElement</code> \| <code>HTMLSelectElement</code> \| <code>HTMLLegendElement</code> \| <code>HTMLTableCaptionElement</code> \| <code>HTMLTextAreaElement</code> \| <code>HTMLModElement</code> \| <code>HTMLHRElement</code> \| <code>HTMLOutputElement</code> \| <code>HTMLPreElement</code> \| <code>HTMLEmbedElement</code> \| <code>HTMLCanvasElement</code> \| <code>HTMLFrameSetElement</code> \| <code>HTMLMarqueeElement</code> \| <code>HTMLScriptElement</code> \| <code>HTMLInputElement</code> \| <code>HTMLUnknownElement</code> \| <code>HTMLMetaElement</code> \| <code>HTMLStyleElement</code> \| <code>HTMLObjectElement</code> \| <code>HTMLTemplateElement</code> \| <code>HTMLBRElement</code> \| <code>HTMLAudioElement</code> \| <code>HTMLIFrameElement</code> \| <code>HTMLMapElement</code> \| <code>HTMLTableElement</code> \| <code>HTMLAnchorElement</code> \| <code>HTMLMenuElement</code> \| <code>HTMLPictureElement</code> \| <code>HTMLParagraphElement</code> \| <code>HTMLTableDataCellElement</code> \| <code>HTMLTableSectionElement</code> \| <code>HTMLQuoteElement</code> \| <code>HTMLTableHeaderCellElement</code> \| <code>HTMLProgressElement</code> \| <code>HTMLLIElement</code> \| <code>HTMLTableRowElement</code> \| <code>HTMLFontElement</code> \| <code>HTMLSpanElement</code> \| <code>HTMLTableColElement</code> \| <code>HTMLOptGroupElement</code> \| <code>HTMLDataElement</code> \| <code>HTMLDListElement</code> \| <code>HTMLFieldSetElement</code> \| <code>HTMLSourceElement</code> \| <code>HTMLBodyElement</code> \| <code>HTMLDirectoryElement</code> \| <code>HTMLDivElement</code> \| <code>HTMLUListElement</code> \| <code>HTMLHtmlElement</code> \| <code>HTMLAreaElement</code> \| <code>HTMLMeterElement</code> \| <code>HTMLAppletElement</code> \| <code>HTMLFrameElement</code> \| <code>HTMLOptionElement</code> \| <code>HTMLImageElement</code> \| <code>HTMLLinkElement</code> \| <code>HTMLHeadingElement</code> \| <code>HTMLSlotElement</code> \| <code>HTMLVideoElement</code> \| <code>HTMLBaseFontElement</code> \| <code>HTMLTitleElement</code> \| <code>HTMLButtonElement</code> \| <code>HTMLHeadElement</code> \| <code>HTMLParamElement</code> \| <code>HTMLTrackElement</code> \| <code>HTMLOListElement</code> \| <code>HTMLDataListElement</code> \| <code>HTMLLabelElement</code> \| <code>HTMLFormElement</code> \| <code>HTMLTimeElement</code> \| <code>HTMLBaseElement</code> \| <code>null</code> \| <code>\*</code>
    * [.prop(attribute, [value])](#Dom+prop) ⇒ <code>string</code> \| <code>null</code>
    * [.removeAttr(attribute)](#Dom+removeAttr)
    * [.append(html)](#Dom+append)
    * [.val([value])](#Dom+val) ⇒ <code>string</code> \| <code>number</code>
    * [.text([value])](#Dom+text) ⇒ <code>string</code> \| <code>number</code>
    * [.addClass(className)](#Dom+addClass)
    * [.removeClass(className)](#Dom+removeClass)

<a name="new_Dom_new"></a>

### new Dom(selector)
Construct with a selector that's all to it.


| Param | Type | Description |
| --- | --- | --- |
| selector | <code>string</code> | The selector for the element to query. |

<a name="Dom+on"></a>

### dom.on
Ad a EventListener for the dom element

**Kind**: instance property of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| event | <code>Event</code> | The event name. |
| callback |  |  |

<a name="Dom+hide"></a>

### dom.hide()
Put display style block on the current element.

**Kind**: instance method of [<code>Dom</code>](#Dom)  
<a name="Dom+show"></a>

### dom.show()
Put display style block on the current element.

**Kind**: instance method of [<code>Dom</code>](#Dom)  
<a name="Dom+get"></a>

### dom.get() ⇒ <code>HTMLElement</code> \| <code>HTMLSelectElement</code> \| <code>HTMLLegendElement</code> \| <code>HTMLTableCaptionElement</code> \| <code>HTMLTextAreaElement</code> \| <code>HTMLModElement</code> \| <code>HTMLHRElement</code> \| <code>HTMLOutputElement</code> \| <code>HTMLPreElement</code> \| <code>HTMLEmbedElement</code> \| <code>HTMLCanvasElement</code> \| <code>HTMLFrameSetElement</code> \| <code>HTMLMarqueeElement</code> \| <code>HTMLScriptElement</code> \| <code>HTMLInputElement</code> \| <code>HTMLUnknownElement</code> \| <code>HTMLMetaElement</code> \| <code>HTMLStyleElement</code> \| <code>HTMLObjectElement</code> \| <code>HTMLTemplateElement</code> \| <code>HTMLBRElement</code> \| <code>HTMLAudioElement</code> \| <code>HTMLIFrameElement</code> \| <code>HTMLMapElement</code> \| <code>HTMLTableElement</code> \| <code>HTMLAnchorElement</code> \| <code>HTMLMenuElement</code> \| <code>HTMLPictureElement</code> \| <code>HTMLParagraphElement</code> \| <code>HTMLTableDataCellElement</code> \| <code>HTMLTableSectionElement</code> \| <code>HTMLQuoteElement</code> \| <code>HTMLTableHeaderCellElement</code> \| <code>HTMLProgressElement</code> \| <code>HTMLLIElement</code> \| <code>HTMLTableRowElement</code> \| <code>HTMLFontElement</code> \| <code>HTMLSpanElement</code> \| <code>HTMLTableColElement</code> \| <code>HTMLOptGroupElement</code> \| <code>HTMLDataElement</code> \| <code>HTMLDListElement</code> \| <code>HTMLFieldSetElement</code> \| <code>HTMLSourceElement</code> \| <code>HTMLBodyElement</code> \| <code>HTMLDirectoryElement</code> \| <code>HTMLDivElement</code> \| <code>HTMLUListElement</code> \| <code>HTMLHtmlElement</code> \| <code>HTMLAreaElement</code> \| <code>HTMLMeterElement</code> \| <code>HTMLAppletElement</code> \| <code>HTMLFrameElement</code> \| <code>HTMLOptionElement</code> \| <code>HTMLImageElement</code> \| <code>HTMLLinkElement</code> \| <code>HTMLHeadingElement</code> \| <code>HTMLSlotElement</code> \| <code>HTMLVideoElement</code> \| <code>HTMLBaseFontElement</code> \| <code>HTMLTitleElement</code> \| <code>HTMLButtonElement</code> \| <code>HTMLHeadElement</code> \| <code>HTMLParamElement</code> \| <code>HTMLTrackElement</code> \| <code>HTMLOListElement</code> \| <code>HTMLDataListElement</code> \| <code>HTMLLabelElement</code> \| <code>HTMLFormElement</code> \| <code>HTMLTimeElement</code> \| <code>HTMLBaseElement</code> \| <code>null</code> \| <code>\*</code>
Return the actual dom element.

**Kind**: instance method of [<code>Dom</code>](#Dom)  
<a name="Dom+prop"></a>

### dom.prop(attribute, [value]) ⇒ <code>string</code> \| <code>null</code>
Get or set a property on a dom element. Don't passthe value parameter if you want to get the value.If you want to set the value pass the value.

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Default | Description |
| --- | --- | --- | --- |
| attribute | <code>string</code> |  | The attribute name |
| [value] | <code>string</code> | <code>null</code> | Value to set (optional) |

<a name="Dom+removeAttr"></a>

### dom.removeAttr(attribute)
Remove an attribute from on a dom element.

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| attribute | <code>string</code> | The attribute to remove. |

<a name="Dom+append"></a>

### dom.append(html)
Append a html string to the end if the element.

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| html | <code>string</code> | Html string to append to the element |

<a name="Dom+val"></a>

### dom.val([value]) ⇒ <code>string</code> \| <code>number</code>
Get the value of element. If value is passed the value will be setto this value instead.

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Default | Description |
| --- | --- | --- | --- |
| [value] | <code>string</code> | <code>null</code> | value - If set this value will be set on the element. (optional) |

<a name="Dom+text"></a>

### dom.text([value]) ⇒ <code>string</code> \| <code>number</code>
Set the text value of the element.

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| [value] | <code>string</code> | value - The text to set as innerText for the element. |

<a name="Dom+addClass"></a>

### dom.addClass(className)
Add a class to the given element

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| className | <code>string</code> | Classname to add. |

<a name="Dom+removeClass"></a>

### dom.removeClass(className)
Remove a class from the given element

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| className | <code>string</code> | Classname to remove. |

<a name="dom"></a>

## dom(selector) ⇒ [<code>Dom</code>](#Dom)
Return a new instance of _dom (the jquery clone) so the code could

**Kind**: global function  

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
