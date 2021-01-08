/**
 * Created by FAQBILL on 19/03/16.
 */

// Avoid `console` errors in browsers that lack a console.
(function () {
    var method;
    var noop = function () {
    };
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());


(function () {


    function ready(fn) {
        if (document.readyState != 'loading') {
            fn();
        } else if (document.addEventListener) {
            document.addEventListener('DOMContentLoaded', fn);
        } else {
            document.attachEvent('onreadystatechange', function () {
                if (document.readyState != 'loading')
                    fn();
            });
        }
    }

    function addEventListener(el, eventName, handler) {
        if (el.addEventListener) {
            el.addEventListener(eventName, handler);
        } else {
            el.attachEvent('on' + eventName, function () {
                handler.call(el);
            });
        }
    }

    function toggleClass(el, className) {
        if (el.classList) {
            el.classList.toggle(className);
        } else {
            var classes = el.className.split(' ');
            var existingIndex = -1;
            for (var i = classes.length; i--;) {
                if (classes[i] === className)
                    existingIndex = i;
            }

            if (existingIndex >= 0)
                classes.splice(existingIndex, 1);
            else
                classes.push(className);

            el.className = classes.join(' ');
        }
    }

    function addClass(el, className) {
        if (el.classList)
            el.classList.add(className);
        else
            el.className += ' ' + className;
    }

    function hasClass(el, className) {
        if (el.classList)
            el.classList.contains(className);
        else
            new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
    }

    function removeClass(el, className) {
        if (el.classList)
            el.classList.remove(className);
        else
            el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }

    ready(function () {
        console.log('js start');
            var items = document.getElementsByClassName('js-add-rev__star');
            var text_box = document.getElementsByClassName('js-add-rev__text');
            var rev_btn = document.getElementsByClassName('js-add-rev__btn');
            var rev_link;
            for (var i = 0; i <= (rev_btn.length - 1); i++) {
                rev_link = rev_btn[i].getAttribute('href');
                addEventListener(rev_btn[i], 'mouseleave', function () {
                    for (var j = 0; j <= (items.length - 1); j++) {
                        removeClass(items[j], 'c-drus-add-rev__star--active');
                        items[j].innerHTML = '&#9734;';
                    }
                    for (var k = 0; k <= (text_box.length - 1); k++) {
                        text_box[k].innerHTML = text_box[k].getAttribute('data-default-text');
                    }
                });
            }
            for (var i = 0; i <= (items.length - 1); i++) {
                addEventListener(items[i], 'mouseover', function () {
                    var mark = this.getAttribute('data-star-number');
                    for (var j = 0; j <= (items.length - 1); j++) {
                        if (items[j].getAttribute('data-star-number') <= mark) {
                            addClass(items[j], 'c-drus-add-rev__star--active');
                            items[j].innerHTML = '&#9733;';
                        } else {
                            removeClass(items[j], 'c-drus-add-rev__star--active');
                            items[j].innerHTML = '&#9734;';
                        }
                    }
                    for (var k = 0; k <= (text_box.length - 1); k++) {
                        text_box[k].innerHTML = this.getAttribute('data-star-text');
                    }
                    for (var k = 0; k <= (rev_btn.length - 1); k++) {
                        rev_btn[k].href = rev_link + '?mark=' + mark;
                    }
                });
            }
    });
}());



