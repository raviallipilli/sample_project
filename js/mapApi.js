function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:15,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}