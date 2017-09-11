function initMap() {
		        var map = new google.maps.Map(document.getElementById('map'), {
		          mapTypeControl: false,
		          center: {lat: -33.8799703, lng: 151.2036838},
				  scrollwheel: false,
				  zoom: 16
		        });
		
		        new AutocompleteDirectionsHandler(map);
		      }
		
		       /**
		        * @constructor
		       */
		      function AutocompleteDirectionsHandler(map) {
		        this.map = map;
		        this.originPlaceId = null;
		        this.destinationPlaceId = 'ChIJBxtMiSSuEmsR2M3ilXxI44Y';
		        this.travelMode = 'DRIVING';
		        var originInput = document.getElementById('origin-input');
		        //var destinationInput = document.getElementById('destination-input');
		        var modeSelector = document.getElementById('mode-selector');
		        this.directionsService = new google.maps.DirectionsService;
		        this.directionsDisplay = new google.maps.DirectionsRenderer;
		        this.directionsDisplay.setMap(map);
		
		        var originAutocomplete = new google.maps.places.Autocomplete(
		            originInput, {placeIdOnly: true});
		        //var destinationAutocomplete = new google.maps.places.Autocomplete(
		        //    destinationInput, {placeIdOnly: true});
		
		        this.setupClickListener('changemode-walking', 'WALKING');
		        this.setupClickListener('changemode-transit', 'TRANSIT');
		        this.setupClickListener('changemode-driving', 'DRIVING');
		
		        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
		        //this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
		
		        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
		        //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
		        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
		      }
		
		      // Sets a listener on a radio button to change the filter type on Places
		      // Autocomplete.
		      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
		        var radioButton = document.getElementById(id);
		        var me = this;
		        radioButton.addEventListener('click', function() {
		          me.travelMode = mode;
		          me.route();
		        });
		      };
		
		      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
		        var me = this;
		        autocomplete.bindTo('bounds', this.map);
		        autocomplete.addListener('place_changed', function() {
		          var place = autocomplete.getPlace();
		          if (!place.place_id) {
		            window.alert("Please select an option from the dropdown list.");
		            return;
		          }
		          if (mode === 'ORIG') {
		            me.originPlaceId = place.place_id;
		          } //else {
		            //me.destinationPlaceId = place.place_id;
		          //}
		          me.route();
		        });
		
		      };
		
		      AutocompleteDirectionsHandler.prototype.route = function() {
		        if (!this.originPlaceId || !this.destinationPlaceId) {
		          return;
		        }
		        var me = this;
		
		        this.directionsService.route({
		          origin: {'placeId': this.originPlaceId},
		          destination: {'placeId': this.destinationPlaceId},
		          travelMode: this.travelMode
		        }, function(response, status) {
		          if (status === 'OK') {
		            me.directionsDisplay.setDirections(response);
		            me.directionsDisplay.setPanel(document.getElementById('directionsPanel'));
		          } else {
		            window.alert('Directions request failed due to ' + status);
		          }
		        });
		      };
		