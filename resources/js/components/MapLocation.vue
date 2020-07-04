<template>
    <div class="map">
       <l-map
        :zoom="zoom"
        :center="center"
        :options="mapOptions"
       >
            <l-tile-layer :url="url" :attribution = "attribution" ></l-tile-layer>
            <l-marker 
                :lat-lng="{lat, lng}"
                :icon="localIcon()"
                > 
                <l-tooltip>
                    <div>
                        GAFA
                    </div>
                </l-tooltip>
            </l-marker>
       </l-map>
    </div>
</template>

<script>
import { latLng } from 'leaflet';
import { LMap, LTileLayer, LMarker, LTooltip, LIcon } from 'vue2-leaflet';
export default {
    components:{
        LMap,
        LTileLayer,
        LMarker,
        LTooltip,
        LIcon
    },
     data() {
        return {
        zoom: 15,
        center: latLng(-36.7426175, 174.6955246),
        url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        attribution:
            '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        currentZoom: 11.5,
        mapOptions: {
            zoomSnap: 0.5
        },
        showMap: true,
        lat: -36.7426175,
        lng: 174.6955246
        };
    },
    methods:{
        localIcon(){
            return L.icon({
                iconUrl:`images/gafaPin.png`,
                iconSize:[40,50]
            })
        }
    }
}
</script>
<style scope>
    @import 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css';
    .map{
        height: 300px;
        width: 100%;
    }
</style>