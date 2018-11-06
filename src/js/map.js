ymaps.ready(function () {

    var map = new ymaps.Map('map', {
        center: [57.810600093791365,28.335409004299127],
        zoom: 17,
        controls: []
    });

    map.controls.add('zoomControl', {
        position: {top: 100, left: 15}
    });
    map.behaviors.disable('scrollZoom');

    var placemark = new ymaps.Placemark([57.810600093791365,28.335409004299127], {
        balloonContent: '<p>г.Псков,</p><p>ул. Советская, дом 39, офис 1001</p>' +
        '<p>&nbsp;</p>' +
        '<p><a href="tel:+7 (964) 675-00-01">+7 (964) <b>675-00-01</b></a></p>' +
        '<p><a href="tel:+7 (8112) 66-23-24">+7 (8112) <b>66-23-24</b></a></p>' +
        '<p>&nbsp;</p>' +
        '<p><a href="mailto:service@lmgroup.pro">service@lmgroup.pro</a></p>'
    }, {
        iconLayout: 'default#image',
        iconImageHref: 'images/map-pin.png',
        iconImageSize: [58, 69],
        iconImageOffset: [-29, -69]
    });

    map.geoObjects
        .add(placemark);

});
