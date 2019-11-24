<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!--<div v-for="item in usersData">{{item.name}}</div> -->
                 
                    <div class="card-body" id="map">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</template>

<style>
    
</style>

<script>
    export default {
        name: "Mapa",
        props:['route'],
        data: () => {
            return {
            usersData: []
            }
        },
        methods:{
                       
        },
       

        mounted() {
            
            axios.get(`${this.route}`).then((response) => {
                this.usersData = response.data;
                var location = {lat: 45.745, lng:21.228};
                var map = new google.maps.Map(document.getElementById("map"),{
                    zoom:8,
                    center: location
                });
                var infowindow = new google.maps.InfoWindow();

            var marker, i;
            
            this.usersData.forEach(element => {
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(element.lat, element.lng),
                    map: map
                });
                var i=element.id;
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var content = '<div class="card"><div class="row">'+
                        '<img id="ava" src="'+element.avatar+'" class="img-fluid col">'+
                        '<h5 class="card-title text-center font-weight-bold mt-4 col">'+element.name+'</h5>'+
                        '<hr/>'+
                        '</div><a class="btn btn-primary w-100" href="/user-profil/' + element.id+'">Vezi profil</a></div>';
                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                
                    }
                })(marker, i));
                }); 
                

            
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(
                position => marker = new google.maps.Marker({
                    position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                    map: map
                }),
                err => alert(`Error (${err.code}): ${err.message}`)
                );
            } else {
                alert('Geolocatia nu este suportata.');
            }

               
            });

            
            
        }
    }
</script>

<style>
 #map{
     height:500px
 }
 #ava{
     height:80px;
     width:100px
 }
</style>
