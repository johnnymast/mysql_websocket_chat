/**
 * This file provides a replacement for jquery.
 */

/**
 * Construct with a selector that's all to it.
 *
 * @param {string} selector
 * @private
 */
let _dom = function (selector) {
  this.elm = document.querySelector(selector)
}

/**
 * Put display style block on the current element.
 */
_dom.prototype.hide = function () {
  this.elm.style.display = 'none'
}

/**
 * Put display style block on the current element.
 */
_dom.prototype.show = function () {
  this.elm.style.display = 'block'
}

/**
 * Ad a EventListener for the dom element
 *
 * @param {Event} event The x event
 * @param callback
 */
_dom.prototype.on = function (event, callback) {
  this.elm.addEventListener(event, callback, false)
}

/**
 * Return the actual dom element.
 *
 * @returns {HTMLElement | HTMLSelectElement | HTMLLegendElement | HTMLTableCaptionElement | HTMLTextAreaElement | HTMLModElement | HTMLHRElement | HTMLOutputElement | HTMLPreElement | HTMLEmbedElement | HTMLCanvasElement | HTMLFrameSetElement | HTMLMarqueeElement | HTMLScriptElement | HTMLInputElement | HTMLUnknownElement | HTMLMetaElement | HTMLStyleElement | HTMLObjectElement | HTMLTemplateElement | HTMLBRElement | HTMLAudioElement | HTMLIFrameElement | HTMLMapElement | HTMLTableElement | HTMLAnchorElement | HTMLMenuElement | HTMLPictureElement | HTMLParagraphElement | HTMLTableDataCellElement | HTMLTableSectionElement | HTMLQuoteElement | HTMLTableHeaderCellElement | HTMLProgressElement | HTMLLIElement | HTMLTableRowElement | HTMLFontElement | HTMLSpanElement | HTMLTableColElement | HTMLOptGroupElement | HTMLDataElement | HTMLDListElement | HTMLFieldSetElement | HTMLSourceElement | HTMLBodyElement | HTMLDirectoryElement | HTMLDivElement | HTMLUListElement | HTMLHtmlElement | HTMLAreaElement | HTMLMeterElement | HTMLAppletElement | HTMLFrameElement | HTMLOptionElement | HTMLImageElement | HTMLLinkElement | HTMLHeadingElement | HTMLSlotElement | HTMLVideoElement | HTMLBaseFontElement | HTMLTitleElement | HTMLButtonElement | HTMLHeadElement | HTMLParamElement | HTMLTrackElement | HTMLOListElement | HTMLDataListElement | HTMLLabelElement | HTMLFormElement | HTMLTimeElement | HTMLBaseElement | null | *}
 */
_dom.prototype.get = function () {
  return this.elm
}

/**
 * Get or set a property on a dom element. Don't pass
 * the value parameter if you want to get the value.
 * If you want to set the value pass the value.
 *
 * @param {string} attribute The attribute name
 * @param {string}[value] Value to set (optional)
 * @returns {string | null}
 */
_dom.prototype.prop = function (attribute, value = '') {
  if (typeof value !== 'undefined' && value.length > -1) {
    this.elm.setAttribute(attribute, value)
  }
  return this.elm.getAttribute(attribute)
}

/**
 * Append a html string to the end if the element.
 *
 * @param {string} html html string to append to the element
 */
_dom.prototype.append = function (html) {
  this.elm.insertAdjacentHTML('beforeend', html)
}

/**
 * Get the value of element. If value is passed the value will be set
 * to this value instead.
 *
 * @param {string} [value] value
 * @returns {string | number}
 */
_dom.prototype.val = function (value = null) {
  if (value !== null) {
    this.elm.value = value
  }
  return this.elm.value
}

/**
 * Set the text value of the element.
 *
 * @param {string} [value] value
 * @returns {string | number}
 */
_dom.prototype.text = function (value = '') {
  if (typeof  value !== 'undefined' && value.length > 0) {
    this.elm.innerText = value
  }
  return this.elm.innerText
}

/**
 * Add a class to the given element
 *
 * @param {string} className class to add
 */
_dom.prototype.addClass = function (className) {
  this.elm.className += ' ' + className
}

/**
 * Remove a class from the given element
 *
 * @param {string} className class to remove
 */
_dom.prototype.removeClass = function (className) {
  var elClass = ' ' + this.elm.className + ' '
  while (elClass.indexOf(' ' + className + ' ') !== -1) {
    elClass = elClass.replace(' ' + className + ' ', '')
  }
  this.elm.className = elClass
}

/**
 * Return a new instance of _dom (the jquery clone) so the code could
 *
 * @param selector
 * @returns {_dom}
 */
let dom = function (selector) {
  return new _dom(selector)
}
