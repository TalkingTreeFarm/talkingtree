
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

			var TalkingTree = {lat: 29.453392, lng: -98.2987683};
			var Villita = {lat: 29.421904, lng: -98.489198};
			var Pius = {lat: 29.5059374, lng: -98.4377622};

			var contentTalkingTree = '<h5><b>Talking Tree Farm</b>: 9611 Green Rd., Converse TX</h5>' + 
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

			var contentVillita = '<h5><b>La Villita</b></h5>' +
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

			var contentPius = '<h5><b>St. Pius Catholic Church</b></h5>' +
			'<p>Make your basket with us at St. Pius.</p>';
			var infoPius = new google.maps.InfoWindow({
				content: contentPius
			});
			var markerPius = new google.maps.Marker({
				position: Pius,
				map: map,
				title: 'St. Pius Catholic Church',
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


