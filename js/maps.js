var map;
function initialize()
{
    var coordenadas = new google.maps.LatLng(17.7569184,-92.5960686);
    var opt = {zoom: 12, center: coordenadas, mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById('google_maps'), opt);
    var marker = new google.maps.Marker({position: coordenadas, animation: google.maps.Animation.DROP, icon: "img/Map-Marker-Push-Pin-1-Left-Pink-icon.png"});
    marker.setMap(map);
    var text = "<h3>H. Ayuntamiento de Macuspana 2016-2018</h3>";
    var info = new google.maps.InfoWindow({content: text});
    google.maps.event.addListener(marker, 'click', function () {
        info.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);