
(function() {
	"use strict";

	var markers = [];
	var map;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			zoom: 11,
			center: {lat: 29.433200, lng: -98.399330},
			mapTypeId: google.maps.MapTypeId.HYBRID

		});

		setTimeout(function() {

			var TalkingTree = {lat: 29.453410, lng: -98.296599};
			var Villita = {lat: 29.421904, lng: -98.489198};
			var Pius = {lat: 29.5059374, lng: -98.4377622};

			var contentTalkingTree = '<h5><b>Talking Tree Farm</b>: <a href="https://www.google.com/maps/dir//29.453410,++-98.296599/@29.4533033,-98.2988222,515m/data=!3m1!1e3!4m6!4m5!1m0!1m3!2m2!1d-98.296599!2d29.45341"  target="_blank">9611 Green Rd., Converse TX</a></h5>' + 
			'<p>Learn permaculture gardening from Sylvain here.</p>' 

			var infoTalkingTree = new google.maps.InfoWindow({
				content: contentTalkingTree
			});
			var markerTalkingTree = new google.maps.Marker({
				position: TalkingTree,
				map: map,
				title: 'Talking Tree Farm',
				animation: google.maps.Animation.DROP
			});
			markerTalkingTree.addListener('click', function() {
				infoTalkingTree.open(map, markerTalkingTree);
			});

			var contentVillita = '<h5><b>La Villita</b>: <a href="https://www.google.com/maps/dir//418+Villita+Street,+San+Antonio,+TX/@29.4217536,-98.4935028,1031m/data=!3m2!1e3!4b1!4m8!4m7!1m0!1m5!1m1!1s0x865c58ab8652894f:0xfa19577e929192bf!2m2!1d-98.4891147!2d29.4217537" target="_blank">418 Villita St, San Antonio, TX 78205</a></h5>' +
			'<p>Make your basket with us at the People\'s Nite Market.</p>'
			''
			var infoVillita = new google.maps.InfoWindow({
				content: contentVillita
			});
			var markerVillita = new google.maps.Marker({
				position: Villita,
				map: map,
				title: 'La Villita Nite Market',
				animation: google.maps.Animation.DROP
			});
			markerVillita.addListener('click', function() {
				infoVillita.open(map, markerVillita);
			});

			var contentPius = '<h5><b>St. Pius X Catholic Church</b>: <a href="https://www.google.com/maps/dir//St+Pius+X+Catholic+Church,+San+Antonio,+TX/@29.505919,-98.5057815,16479m/data=!3m2!1e3!4b1!4m8!4m7!1m0!1m5!1m1!1s0x865cf4dbd936d911:0xa8eb753f7b563e14!2m2!1d-98.4355681!2d29.5059374" target="_blank">3907 Harry Wurzbach, San Antonio, TX 78209</a></h5>' +
			'<p>Make your basket with us at St. Pius.</p>';
			var infoPius = new google.maps.InfoWindow({
				content: contentPius
			});
			var markerPius = new google.maps.Marker({
				position: Pius,
				map: map,
				title: 'St. Pius X Catholic Church',
				animation: google.maps.Animation.DROP
			});
			markerPius.addListener('click', function() {
				infoPius.open(map, markerPius);
			});
		});
	}

	function detectBrowser() {
		var useragent = navigator.userAgent;
		var mapdiv = document.getElementById("map-canvas");

		if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
			mapdiv.style.width = '50%';
			mapdiv.style.height = '50%';
		} else {
			mapdiv.style.width = '500px';
			mapdiv.style.height = '700px';
		}
	}

	initMap();
	// drop();
}());


