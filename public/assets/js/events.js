
(function() {
	"use strict";

	var markers = [];
	var map;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			zoom: 11,
			center: {lat: 29.433200, lng: -98.399330}
		});
		setTimeout(function() {

			var TalkingTree = {lat: 29.453392, lng: -98.2987683};
			var Villita = {lat: 29.421904, lng: -98.489198};
			var Pius = {lat: 29.5059374, lng: -98.4377622};

			var contentTalkingTree = '<h5>Talking Tree Farm</h5>';
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

			var contentVillita = '<h5>La Villita</h5>';
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

			var contentPius = '<h5>St. Pius Catholic Church</h5>';
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


