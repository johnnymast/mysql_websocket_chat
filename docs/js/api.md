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
<dt><a href="#clearUserlist">clearUserlist()</a></dt>
<dd><p>Remove all users from the users on the
side of the screen.</p>
</dd>
<dt><a href="#dialogOutput">dialogOutput(pkg)</a></dt>
<dd><p>Put a package (message) on the screen
for you or others to read.</p>
</dd>
<dt><a href="#usersOutput">usersOutput(users)</a></dt>
<dd><p>Update the user list in the UI</p>
</dd>
<dt><a href="#registerClient">registerClient()</a></dt>
<dd><p>We need to register this browser window (client)
to the server. We do this so we can sent private
messages to other users.</p>
</dd>
<dt><a href="#requestUserlist">requestUserlist()</a></dt>
<dd><p>Request a list of current active
chat users. We do this every x seconds
so we can update the ui.</p>
</dd>
<dt><a href="#sendMessage">sendMessage()</a></dt>
<dd><p>Send a chat message to the server</p>
</dd>
</dl>

<a name="Dom"></a>

## Dom
This file provides a replacement for jquery.

**Kind**: global class  

* [Dom](#Dom)
    * [new Dom(selector)](#new_Dom_new)
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
    * [.on(event, callback)](#Dom+on)

<a name="new_Dom_new"></a>

### new Dom(selector)
Construct with a selector that's all to it.


| Param | Type | Description |
| --- | --- | --- |
| selector | <code>string</code> | The selector for the element to query. |

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
| [value] | <code>string</code> | <code>&quot;&#x27;&#x27;&quot;</code> | Value to set (optional) |

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

<a name="Dom+on"></a>

### dom.on(event, callback)
Ad a EventListener for the dom element

**Kind**: instance method of [<code>Dom</code>](#Dom)  

| Param | Type | Description |
| --- | --- | --- |
| event | <code>string</code> | The event name. |
| callback |  |  |

<a name="dom"></a>

## dom(selector) ⇒ [<code>Dom</code>](#Dom)
Return a new instance of _dom (the jquery clone) so the code could

**Kind**: global function  

| Param | Type | Description |
| --- | --- | --- |
| selector | <code>string</code> | The selector for the dom element. |

<a name="clearUserlist"></a>

## clearUserlist()
Remove all users from the users on theside of the screen.

**Kind**: global function  
<a name="dialogOutput"></a>

## dialogOutput(pkg)
Put a package (message) on the screenfor you or others to read.

**Kind**: global function  

| Param | Type | Description |
| --- | --- | --- |
| pkg | <code>object</code> | The package object to display. |

<a name="usersOutput"></a>

## usersOutput(users)
Update the user list in the UI

**Kind**: global function  

| Param | Type | Description |
| --- | --- | --- |
| users | <code>array</code> | Array of uses to display in the chatroom. |

<a name="usersOutput..selectedUser"></a>

### usersOutput~selectedUser
First get the current select valueon the list. This is so we can restorethe selected list item after requestingfow new users.

**Kind**: inner constant of [<code>usersOutput</code>](#usersOutput)  
<a name="registerClient"></a>

## registerClient()
We need to register this browser window (client)to the server. We do this so we can sent privatemessages to other users.

**Kind**: global function  
<a name="registerClient..pkg"></a>

### registerClient~pkg
Create a registration package to send to theserver.

**Kind**: inner property of [<code>registerClient</code>](#registerClient)  
<a name="requestUserlist"></a>

## requestUserlist()
Request a list of current activechat users. We do this every x secondsso we can update the ui.

**Kind**: global function  
<a name="sendMessage"></a>

## sendMessage()
Send a chat message to the server

**Kind**: global function  

* [sendMessage()](#sendMessage)
    * [~toUser](#sendMessage..toUser) : <code>Object</code>
    * [~pkg](#sendMessage..pkg)
    * [~chatMessage](#sendMessage..chatMessage) : <code>string</code>
    * [~pkgObject](#sendMessage..pkgObject) : <code>Object</code>

<a name="sendMessage..toUser"></a>

### sendMessage~toUser : <code>Object</code>
When to_user is empty themessage will be sent to all usersin the chat room.

**Kind**: inner property of [<code>sendMessage</code>](#sendMessage)  
<a name="sendMessage..pkg"></a>

### sendMessage~pkg
Create a package to send to theserver.

**Kind**: inner property of [<code>sendMessage</code>](#sendMessage)  
<a name="sendMessage..chatMessage"></a>

### sendMessage~chatMessage : <code>string</code>
Catch the chat text

**Kind**: inner constant of [<code>sendMessage</code>](#sendMessage)  
<a name="sendMessage..pkgObject"></a>

### sendMessage~pkgObject : <code>Object</code>
We need a object copy of packageto send to dialog_output() but wealso want to turn the original packageinto a string so we can send it over thesocket to the server.

**Kind**: inner constant of [<code>sendMessage</code>](#sendMessage)  
