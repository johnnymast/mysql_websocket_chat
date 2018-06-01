/**
 * This file provides a replacement for jquery.
 */

/**
 *
 * @param selector
 * @private
 */
let _dom = function (selector) {
  this.elm = document.querySelector(selector)
}

/**
 *
 */
_dom.prototype.hide = function () {
  this.elm.style.display = 'none'
}

/**
 *
 * @param event
 * @param callback
 */
_dom.prototype.on = function (event, callback) {
  this.elm.addEventListener(event, callback)
}

_dom.prototype.get = function () {
  return this.elm
}

/**
 *
 * @param attribute
 * @param value
 * @returns {string | null}
 */
_dom.prototype.prop = function (attribute, value) {
  if (typeof value !== 'undefined' && value.length > -1) {
    this.elm.setAttribute(attribute, value)
  } else
    return this.elm.getAttribute(attribute)
}

/**
 * 
 * @param html
 */
_dom.prototype.append = function (html) {
  this.elm.insertAdjacentHTML('beforeend', html)
}

/**
 *
 * @param value
 * @returns {string | number}
 */
_dom.prototype.val = function (value) {
  if (typeof  value !== 'undefined') {
    this.elm.value = value
  } else
    return this.elm.value
}

/**
 *
 * @param selector
 * @returns {_dom}
 */
let dom = (selector) => {
  return new _dom(selector)
}
