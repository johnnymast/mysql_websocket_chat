/**
 * This file provides a replacement for jquery.
 */

let _dom = function (selector) {
  this.elm = document.querySelector(selector)
}

_dom.prototype.hide = function () {
  this.elm.style.display = 'none'
}

_dom.prototype.on = function (event, callback) {

}

let dom = (selector) => {
  return new _dom(selector)
}
