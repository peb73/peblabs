function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(coord.lat, coord.lng),
        zoom: 16
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);

    var markers = [];

    for(var key=0; key<stations.length; key++){
        var station = stations[key];

        markers.push(function(){
            var contentString = '<div id="content">'+
                '<div class="firstHeading">'+station.name+'</div>'+
                '<p>'+station.lastAvailableBikes+' vélo(s)</p>'+
                '</div>';

            var infoWindow = new google.maps.InfoWindow({
                content: contentString
            });


            //if(station.)
            var icon = googleMarker.empty;
            if(station.lastAvailableBikes>=3){
                var icon = googleMarker.success;
            }else if(station.lastAvailableBikes>=1){
                var icon = googleMarker.warning;
            }else if(station.lastAvailableBikes ==0){
                var icon = googleMarker.empty;
            }

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(station.positionLat,station.positionLng),
                map: map,
                title:"Station : "+station.name,
                icon: icon
            });

            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.open(map,marker);
            });

            return marker;
        }());
    }
};

google.maps.event.addDomListener(window, 'load', initialize);

var time2FusionDataLabel = function(value){
    var min = value%60;
    var hour = (value-min)/60;

    if(min!=0){
        return '';
    }
    console.log(value, min);
    return hour+'h';
};

var data2FusionDataTooltext = function(time, value){
    var min = time%60;
    var hour = (time-min)/60;

    return "Il y avait "+value+ " velib(s) disponible(s) à "+hour+"h"+(("00"+min).slice(-2));
};

var statsData2FusionData = function(data){
    var result = [];
    for(var i in data){
        result.push({
            label: time2FusionDataLabel(i),
            value: data[i],
            tooltext: data2FusionDataTooltext(i, data[i])
        });
    }

    return result;
};

$(function(){
    $('.station').on('click', function(e){
        e.preventDefault();
        $this = $(this);
        $this.toggleClass('display');

        if($this.find('span').length>0)
           return;

        number = $this.attr('data-number');
        $.ajax({
            url:rootPath+'api/stations/'+number+'/stats',
            success: function(data){
                $this.find('.chart').insertFusionCharts({
                    type: 'Area2D',
                    width: $this.width()-20,
                    height: 300,
                    dataFormat: 'json',
                    dataSource: {
                        "chart": {
                            "caption": "Statistique sur les 90 derniers jours",
                            "xAxisName": "Date",
                            "yAxisName": "Nombre de velib disponible",
                            "formatnumberscale": "1",
                            "plotgradientcolor": "34495e",
                            "bgcolor": "FFFFFF",
                            "showalternatehgridcolor": "0",
                            "showplotborder": "0",
                            "showvalues": "0",
                            "divlinecolor": "CCCCCC",
                            "suseroundedges": "1",
                            "showcanvasborder": "0",
                            "canvasborderalpha": "0",
                            "numberscalevalue": "1024,1024",
                            "palettecolors": "34495e",
                            "showborder": "0"
                        },
                        "data": statsData2FusionData(data)
                    }

                });
            }
        });
    });
});