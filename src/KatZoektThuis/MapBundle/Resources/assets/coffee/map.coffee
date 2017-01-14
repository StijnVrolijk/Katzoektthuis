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

Map.current = new Map()

$ ->
  Map.current.domReady()

window.Map = Map
