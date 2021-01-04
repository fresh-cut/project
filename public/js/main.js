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

    function fadeIn(el) {
        el.style.opacity = 0;
        el.style.display = 'block';

        var last = +new Date();
        var tick = function () {
            el.style.opacity = +el.style.opacity + (new Date() - last) / 250;

            //console.log(el.style.opacity);

            last = +new Date();

            if (+el.style.opacity < 1) {
                (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
            } else {
                el.style.opacity = 1;
            }
        };

        tick();
    }

    function fadeOut(el) {
        el.style.opacity = 1;

        var last = +new Date();
        var tick = function () {
            el.style.opacity = +el.style.opacity - (new Date() - last) / 250;

            //console.log(el.style.opacity);

            last = +new Date();

            if (+el.style.opacity > 0) {
                (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
            } else {
                el.style.display = 'none';
                el.style.opacity = 0;
            }
        };

        tick();
    }


    ready(function () {
        console.log('js start');
        console.log('----------------');

        // if (typeof myNeedAddReview === 'undefined') {
        //     console.log('no myNeedAddReview');
        // } else
            {
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
        }

        var jsHeaderMenuBox = document.getElementById('js-header__menu--box');
        var jsHeaderMenuBtn = document.getElementById('js-header__menu--btn');
        var myFlagTopMenuOpened = false;

        addEventListener(jsHeaderMenuBtn, 'click', function () {

            toggleClass(jsHeaderMenuBtn, 'l-drus-header__menu--active');

            if (myFlagTopMenuOpened) {
                fadeOut(jsHeaderMenuBox);
            } else {
                fadeIn(jsHeaderMenuBox);
            }

            myFlagTopMenuOpened = !myFlagTopMenuOpened;

        });

        var jsHeaderFormSelectBoxText = document.getElementById('js-header__form-select-box--text');
        var jsHeaderFormSelectBoxSelect = document.getElementById('js-header__form-select-box--select');

        addEventListener(jsHeaderFormSelectBoxSelect, 'change', function () {
            jsHeaderFormSelectBoxText.innerHTML = jsHeaderFormSelectBoxSelect.options[jsHeaderFormSelectBoxSelect.options.selectedIndex].text;
        });

        var jsShareBtn = document.getElementsByClassName('js-share__btn');
        var jsShareModalBg = document.getElementById('js-share__modal-bg');
        var jsShareModalContent = document.getElementById('js-share__modal-content');
        var jsShareModalClose = document.getElementById('js-share__modal-close');

        for (var i = 0; i <= (jsShareBtn.length - 1); i++) {
            addEventListener(jsShareBtn[i], 'click', function (event) {

                console.log('Click share');

                jsShareModalBg.style.display = 'block';
                jsShareModalContent.style.display = 'flex';

            });
        }

        addEventListener(jsShareModalClose, 'click', function (event) {
            jsShareModalBg.style.display = 'none';
            jsShareModalContent.style.display = 'none';

        });


        var jsDefaultModalBg = document.getElementsByClassName('c-drus-modal__bg');
        var jsDefaultModalContent = document.getElementsByClassName('c-drus-modal__content');

        for (var i = 0; i <= (jsDefaultModalContent.length - 1); i++) {
            addEventListener(jsDefaultModalContent[i], 'click', function (event) {

                console.log('Click modal Bg');

                this.style.display = 'none';

                for (var j = 0; j <= (jsDefaultModalBg.length - 1); j++) {
                    jsDefaultModalBg[j].style.display = 'none';
                }

            });
        }

        addEventListener(document, 'keydown', function (key) {

            if (key.keyCode==27) {
                for (var i = 0; i <= (jsDefaultModalContent.length - 1); i++) {
                    jsDefaultModalContent[i].style.display = 'none';
                }

                for (var j = 0; j <= (jsDefaultModalBg.length - 1); j++) {
                    jsDefaultModalBg[j].style.display = 'none';
                }
            }

        });
    });

}());


function initMap() {
    console.log('start autocomplete');

    var jsHeaderFormInput = document.getElementById('js-header-form__input');
    var jsHeaderFormInputQuery = document.getElementById('js-header-form__input--query');
    var jsHeaderFormInputLat = document.getElementById('js-header-form__input--lat');
    var jsHeaderFormInputLng = document.getElementById('js-header-form__input--lng');

    var autocomplete = new google.maps.places.Autocomplete(
        (jsHeaderFormInput),
        {
            types: ['geocode'],
            componentRestrictions: {
                country: 'US'
            }
        });

    autocomplete.addListener('place_changed', function () {
        console.log('place selected');

        var place = autocomplete.getPlace();
        console.log(place);

        if (typeof place.formatted_address != 'undefined') {
            jsHeaderFormInputQuery.value = place.formatted_address;
            jsHeaderFormInputLat.value = place.geometry.location.lat();
            jsHeaderFormInputLng.value = place.geometry.location.lng();
        }

    });

    if (typeof myLatLng === 'undefined') {
        //console.log('no map');
        return false;
    } else {

        console.log('start map');

        var myMapElement;

        //console.log('document width: ' + document.body.clientWidth);


        myMapElement = document.getElementById('js-my-map-box');

        var map = new google.maps.Map(myMapElement, {
            zoom: 4,
            center: myLatLng,
            scrollwheel: false
        });

        var markersBounds = new google.maps.LatLngBounds();

        var infowindow = new google.maps.InfoWindow({
            content: '',
        });

        for (var i = 0; i < points.length; i++) {
            var markerPosition = new google.maps.LatLng(points[i][1], points[i][2]);

            markersBounds.extend(markerPosition);


            markers[i] = new google.maps.Marker({
                position: markerPosition,
                map: map,
                title: points[i][0],
            });

            google.maps.event.addListener(markers[i], 'click', (function (mk, ct) {
                return function () {
                    infowindow.setContent(ct);
                    infowindow.open(map, mk);
                }
            })(markers[i], points[i][3]));


        }


        if (typeof myMapZoom !== 'undefined') {
            //console.log('zoom '+myMapZoom);
            map.setCenter(markersBounds.getCenter());
            map.setZoom(myMapZoom);
        } else {
            map.setCenter(markersBounds.getCenter(), map.fitBounds(markersBounds));
        }

        if (typeof myCircle !== 'undefined') {
            //console.log(myCircle);

            myCircle.map = map;

            var searchCircle = new google.maps.Circle(myCircle);
        }

        if (typeof myNeedDirectionsAutocomplete !== 'undefined') {

            var directionsDisplay = new google.maps.DirectionsRenderer();
            var directionsService = new google.maps.DirectionsService();
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById("directionsPanel"));

            //var jsDirectionsForm = document.getElementById('js-directions-form');
            var jsDirectionsFormInput = document.getElementById('js-directions-form__input');
            //var jsDirectionsFormInputQuery = document.getElementById('js-directions-form__input--query');
            //var jsDirectionsFormInputLat = document.getElementById('js-directions-form__input--lat');
            //var jsDirectionsFormInputLng = document.getElementById('js-directions-form__input--lng');
            //var jsDirectionsFormSubmitBtn = document.getElementById('js-directions-form__submit');

            var autocomplete2 = new google.maps.places.Autocomplete(
                (jsDirectionsFormInput),
                {
                    types: ['geocode'],
                    componentRestrictions: {
                        country: 'US'
                    }
                });

            autocomplete2.addListener('place_changed', function () {
                console.log('place selected');

                var place = autocomplete2.getPlace();
                console.log(place);

                if (typeof place.formatted_address != 'undefined') {
                    //jsHeaderFormInputQuery.value = place.formatted_address;
                    //jsHeaderFormInputLat.value = place.geometry.location.lat();
                    //jsHeaderFormInputLng.value = place.geometry.location.lng();

                    var start = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
                    var end = myLatLng;
                    var request = {
                        origin: start,
                        destination: end,
                        travelMode: google.maps.TravelMode.DRIVING
                    };
                    directionsService.route(request, function (response, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(response);
                        }
                    });

                }
            });
        }
    }
}

