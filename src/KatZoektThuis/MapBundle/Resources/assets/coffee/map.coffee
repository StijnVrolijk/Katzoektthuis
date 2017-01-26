class Map extends Framework

  @map

  @onDomReady [
    'initMap'
  ]

  initMap: =>
    mapOptions =
      zoom: 11,
      center:
        lat: 51.0547253
        lng: 3.7129203

    @map = new google.maps.Map $('[data-role="kzt-map"]').get(0), mapOptions

    geocoder = new google.maps.Geocoder()

    for user in users
      geocoder.geocode {'address': user.address}, (results, status) =>
        if (status != google.maps.GeocoderStatus.OK)
          return true

        @map.setCenter(results[0].geometry.location)

        new google.maps.Marker({
          map: @map,
          position: results[0].geometry.location
        });

Map.current = new Map()

$ ->
  Map.current.domReady()

window.Map = Map
