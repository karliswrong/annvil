<?php

  include("vars.php");

  $offices = get_field('offices');

  console_log($offices);

?>

<div class="contact-wrapper">

  <div class="contact-title">
    <?php the_field('footer_text', 'options'); ?>

    <?php if ($offices): ?>

      <div class="offices">
        <?php foreach ($offices as $o): ?>
          <div class="single-office">
            <span><?php echo $o['title']; ?></span>
            <div class="text">
              <?php echo $o['contacts']; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>

  </div>

  <div class="contact-info">

    <div class="map" id="map"></div>

    <div class="directions">
      <p>Directions in:</p>
      <ul>
        <li><a target="_blank" href="<?php the_field('directions_google'); ?>">Google Maps</a></li>
        <li><a target="_blank" href="<?php the_field('directions_waze'); ?>">Waze</a></li>
      </ul>
    </div>

  </div>

</div>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAPrUtcOi4tAep19uCPtCbLLUCJ3xXEdMA&"></script>
<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/gmaps.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  var lat = <?php the_field('map_lat'); ?>;
	var lng = <?php the_field('map_lng'); ?>;

  var map = new GMaps({
		el: '#map',
		lat: lat,
		lng: lng,
		zoom: 17,
		zoomControl: false,
		scrollwheel: false,
		panControl: false,
		streetViewControl: false,
		gestureHandling: 'none',
		mapTypeControl: false,
		overviewMapControl: false,
		fullscreenControl: false
	});

  var styles = [
      {
          "featureType": "all",
          "elementType": "labels",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "all",
          "elementType": "labels.text",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "all",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#65622D"
              }
          ]
      },
      {
          "featureType": "all",
          "elementType": "labels.text.stroke",
          "stylers": [
              {
                  "color": "#FCF671"
              }
          ]
      },
      {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "administrative",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "simplified"
              }
          ]
      },
      {
          "featureType": "administrative",
          "elementType": "labels.text",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "administrative",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "visibility": "on"
              },
              {
                  "color": "#65622D"
              }
          ]
      },
      {
          "featureType": "administrative",
          "elementType": "labels.text.stroke",
          "stylers": [
              {
                  "visibility": "on"
              },
              {
                  "color": "#FCF671"
              }
          ]
      },
      {
          "featureType": "landscape",
          "elementType": "all",
          "stylers": [
              {
                  "color": "#FCF671"
              },
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "poi",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "geometry.fill",
          "stylers": [
              {
                  "color": "#65622D"
              },
              {
                  "weight": 1
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "geometry.stroke",
          "stylers": [
              {
                  "color": "#65622D"
              },
              {
                  "weight": 0.8
              },
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "labels",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "labels.text.stroke",
          "stylers": [
              {
                  "color": "#FCF671"
              }
          ]
      },
      {
          "featureType": "road.highway",
          "elementType": "labels.icon",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "road.arterial",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "road.arterial",
          "elementType": "labels.icon",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "transit",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "water",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#ECE548"
              },
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "water",
          "elementType": "labels",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      }
  ];

	map.addStyle({
		styledMapName: "Styled Map",
		styles: styles,
		mapTypeId: "map_style"
	});

	map.setStyle("map_style");

	map.addMarker({
    lat: lat,
		lng: lng,
		icon: "/wp-content/themes/annvil/assets/images/marker.png",
		click: function() {
			window.open(
				'https://www.google.lv/maps/place/Tukuma+piens+,+AS/@56.9622643,23.1699902,17z/data=!3m1!4b1!4m5!3m4!1s0x46eefe3fbfe09019:0x31a4e53560f2274b!8m2!3d56.9622614!4d23.1721842?hl=en',
				'_blank'
			);
		}
	});

map.panBy(0, -120);

});
</script>
