/* eslint-disable no-undef */

/**
 * This file provides a replacement for jquery.
 */
class Dom {
  /**
   * Construct with a selector that's all to it.
   *
   * @param {string} selector - The selector for the element to query.
   */
  constructor (selector) {
    this.elm = document.querySelector(selector)
  }

  /**
   * Put display style block on the current element.
   */
  hide () {
    this.elm.style.display = 'none'
  }

  /**
   * Put display style block on the current element.
   */
  show () {
    this.elm.style.display = 'block'
  }

  /**
   * Return the actual dom element.
   *
   * @returns {HTMLElement | HTMLSelectElement | HTMLLegendElement | HTMLTableCaptionElement | HTMLTextAreaElement | HTMLModElement | HTMLHRElement | HTMLOutputElement | HTMLPreElement | HTMLEmbedElement | HTMLCanvasElement | HTMLFrameSetElement | HTMLMarqueeElement | HTMLScriptElement | HTMLInputElement | HTMLUnknownElement | HTMLMetaElement | HTMLStyleElement | HTMLObjectElement | HTMLTemplateElement | HTMLBRElement | HTMLAudioElement | HTMLIFrameElement | HTMLMapElement | HTMLTableElement | HTMLAnchorElement | HTMLMenuElement | HTMLPictureElement | HTMLParagraphElement | HTMLTableDataCellElement | HTMLTableSectionElement | HTMLQuoteElement | HTMLTableHeaderCellElement | HTMLProgressElement | HTMLLIElement | HTMLTableRowElement | HTMLFontElement | HTMLSpanElement | HTMLTableColElement | HTMLOptGroupElement | HTMLDataElement | HTMLDListElement | HTMLFieldSetElement | HTMLSourceElement | HTMLBodyElement | HTMLDirectoryElement | HTMLDivElement | HTMLUListElement | HTMLHtmlElement | HTMLAreaElement | HTMLMeterElement | HTMLAppletElement | HTMLFrameElement | HTMLOptionElement | HTMLImageElement | HTMLLinkElement | HTMLHeadingElement | HTMLSlotElement | HTMLVideoElement | HTMLBaseFontElement | HTMLTitleElement | HTMLButtonElement | HTMLHeadElement | HTMLParamElement | HTMLTrackElement | HTMLOListElement | HTMLDataListElement | HTMLLabelElement | HTMLFormElement | HTMLTimeElement | HTMLBaseElement | null | *}
   */
  get () {
    return this.elm
  }

  /**
   * Get or set a property on a dom element. Don't pass
   * the value parameter if you want to get the value.
   * If you want to set the value pass the value.
   *
   * @param {string} attribute - The attribute name
   * @param {string}[value = ''] - Value to set (optional)
   * @returns {string | null}
   */
  prop (attribute, value) {
    if (typeof value !== 'undefined') {
      this.elm.setAttribute(attribute, value)
    }
    return this.elm.getAttribute(attribute)
  }

  /**
   * Remove an attribute from on a dom element.
   *
   * @param {string} attribute - The attribute to remove.
   */
  removeAttr (attribute) {
    this.elm.removeAttribute(attribute)
  }

  /**
   * Append a html string to the end if the element.
   *
   * @param {string} html - Html string to append to the element
   */
  append (html) {
    this.elm.insertAdjacentHTML('beforeend', html)
  }

  /**
   * Get the value of element. If value is passed the value will be set
   * to this value instead.
   *
   * @param {string} [value=null] value - If set this value will be set on the element. (optional)
   * @returns {string | number}
   */
  val (value) {
    if (typeof value !== 'undefined') {
      this.elm.value = value
    }
    return this.elm.value
  }

  /**
   * Set the text value of the element.
   *
   * @param {string} [value] value - The text to set as innerText for the element.
   * @returns {string | number}
   */
  text (value = '') {
    if (typeof value !== 'undefined' && value.length > 0) {
      this.elm.innerText = value
    }
    return this.elm.innerText
  }

  /**
   * Add a class to the given element
   *
   * @param {string} className - Classname to add.
   */
  addClass (className) {
    this.elm.className += ' ' + className
  }

  /**
   * Remove a class from the given element
   *
   * @param {string} className - Classname to remove.
   */
  removeClass (className) {
    let elClass = ' ' + this.elm.className + ' '
    while (elClass.indexOf(' ' + className + ' ') !== -1) {
      elClass = elClass.replace(' ' + className + ' ', '')
    }
    this.elm.className = elClass
  }

  /**
   * Ad a EventListener for the dom element
   *
   * @param {string} event - The event name.
   * @param callback
   */
  on (event, callback) {
    this.elm.addEventListener(event, callback, false)
  }
}

/**
 * Return a new instance of _dom (the jquery clone) so the code could
 *
 * @param {string} selector - The selector for the dom element.
 * @returns {Dom}
 */
// eslint-disable-next-line no-unused-vars
const dom = (selector) => {
  return new Dom(selector)
}
/* eslint-enable no-undef */
