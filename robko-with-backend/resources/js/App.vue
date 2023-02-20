<script setup>
import { ref, render } from 'vue';
import { Vue3ToggleButton } from 'vue3-toggle-button'
// import '../node_modules/vue3-toggle-button/dist/style.css'
import '../../node_modules/vue3-toggle-button/dist/style.css'
import SimpleTypeahead from 'vue3-simple-typeahead';
import  MapSvg from '../maps/1.poschodie_podorys.svg'
import poschodiePodorys1 from './poschodie-podorys-1.vue'
// import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
import '../../node_modules/vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
// import 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css' integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="  crossorigin="";
import leaflet from 'leaflet';
// import Routing from 'leaflet-routing-machine';
import {onMounted} from 'vue';
import Graph from './graph';

const nodestext = ref("");
const isActive = ref(true);
const navorient = ref(false);
// const rotate =ref('');
function handleClickNav(){
  navorient.value = !navorient.value;
};
let curr_alt_pt = undefined;
let curr_ctrl_pt = undefined;
let svgElement = undefined;
onMounted(()=>{
  // const target = document.querySelector(".target");
  // observer.observe(target);
  let first_floor_nodes = {
  node1 : leaflet.latLng(94.25, 250),
  node2 : leaflet.latLng(94.25, 240),
  node3 : leaflet.latLng(94.25, 230),
  node4 : leaflet.latLng(94.25, 220),
  node5 : leaflet.latLng(94.25, 210)
  //idem spat, zajtra pokracovat v tomto tu po robote,
  // snad david da dajaky insight bo sa zabijem asi ked ne bruh, nic nejde idk, chcem ptom
  // tote tu node dat do toho algoritmu, ked nepojde, robim to rucne
}

  // let externalScript = document.createElement('script')
  //   externalScript.setAttribute('src', './graph.js')
  //   document.head.appendChild(externalScript)
  let map = leaflet.map('map', {
    crs: leaflet.CRS.Simple,
    // attribution: 'ESO/INAF-VST/OmegaCAM'
    }
  );
  let bounds = leaflet.latLngBounds([[0,0], [400,400]]);
  // let image = leaflet.imageOverlay(MapSvg, bounds,{
  //   interactive: true
  // }).addTo(map);
//   image.on('click', function(e) {
//   console.log(e);
// });

  leaflet.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();
// map.on('click', function (e) {
//     let node = [];
//     node[0] = e.latlng.lat;
//     node[1] = e.latlng.lng;
//     // addNodes(node);
//     console.log(node[0], node[1]);
// });
for (let key in first_floor_nodes){ //rendering nodes
  let marker = leaflet.marker(first_floor_nodes[key]).addTo(map);
  marker.name = key; //num = meno node?

marker.on('click',function(e){

  if(e.originalEvent.metaKey){
    // console.log(target.value);
    curr_ctrl_pt = e.latlng;
    let oldText = nodestext.value;                      //e.target.name meno noudy
    nodestext.value = oldText + e.target.name + ':{';
    // $('#textarea_nodes').val(oldText + num + ':{');
    // console.log(e.originalEvent.altKey);
    console.log(curr_ctrl_pt);
  }
  if(e.originalEvent.altKey){
    curr_alt_pt = e.latlng;
        let oldText = nodestext.value;
        // console.log("ctrl v alte" + curr_ctrl_pt);
        nodestext.value = oldText + e.target.name + ':' + getDistanceFromLatLonInM(curr_alt_pt.lat, curr_alt_pt.lng ,curr_ctrl_pt.lat, curr_ctrl_pt.lng) + ',';
        }
});
 function getDistanceFromLatLonInM(lat1,lon1,lat2,lon2) {
  let R = 6371; // Radius of the earth in km
  let dLat = deg2rad(lat2-lat1);  // deg2rad below
  let dLon = deg2rad(lon2-lon1); 
  let a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  let d = R * c; // Distance in km
  return (d * 1000).toFixed(1);
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
}
  map.fitBounds(bounds);
  let svgElement = document.querySelector('#svg');
  console.log(svgElement.children);

// console.log(svgElement);
  const svgOverlay = leaflet.svgOverlay(svgElement, bounds, {
		interactive: true
	}).addTo(map);

svgOverlay.on('click',function(e){
  console.log(e.originalEvent.path[0].id);  //e.originalEvent.path[0].id path ku idcku miestnosti
})


  // let popup = leaflet.popup();
// function addNodes(polyNodes){
// let marker = leaflet.marker([polyNodes[0], polyNodes[1]]).addTo(map);
// };

});


</script>

<template>

  <header>
    <h1>EDU-NAV</h1>
    <h3>Your pocket navigation</h3>
  </header>
  <nav>hamburger</nav>

  <main>
   <div class="class">
    <SimpleTypeahead id="class" :items="['1.A','Two','Three']" v-if="!isActive" placeholder="necau"></SimpleTypeahead>
    </div>
    <div class="manual" v-if="isActive"> 
      <SimpleTypeahead id="start" placeholder="cau" :items="['1.A','Two','Three']"></SimpleTypeahead>
      <button @click="handleClickNav" :style="{transform: navorient ? 'rotate(180deg)': 'rotate(0deg)'}" ><i class="fa fa-long-arrow-right" aria-hidden="true" ></i></button>
      <SimpleTypeahead id="end" placeholder="cau2"></SimpleTypeahead>
    </div>
    <div class="toggle-button-container">
      <p>class mode</p>
    <Vue3ToggleButton v-model:isActive="isActive" :track-active-color="'#cccccc'"> </Vue3ToggleButton>
    <p>manual mode</p>
  </div>
  <!-- <img src="../maps/1.poschodie_podorys.svg" alt=""> -->
  <div id="map"></div>
  <!-- <textarea name="textarea_nodes" id="textearea_nodes" cols="30" rows="10"></textarea> -->
  <div class="target"> {{nodestext}}</div>
  </main>
  <poschodiePodorys1></poschodiePodorys1>
</template>

<style scoped lang="scss">
@font-face {
  font-family: Montserrat;
  src: url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,600;1,100&display=swap");
}
*{
  font-family: 'Montserrat', sans-serif;
  margin: 0;
  padding: 0;

}

header{
  display: flex;
  flex-flow: column;
  align-items: center;
  width: 100vw;
  h3{
    font-weight: 100;
  }
}
main{
  display: flex;
  flex-flow: column;
  align-items: center;
  gap: 1em;
}
div#class_wrapper.simple-typeahead{
    width: 10em;
    margin: 0;
    padding: 0;
  }
// .class{
//   position: absolute;
//   height: 4em;
// }
.toggle-button-container{
  display: flex;
  justify-content: space-evenly;
  position: absolute;
  align-items: center;
  gap: 1em;
  top: 12em;
//   .toggle-slider{
//   position: absolute;
//   top: 12em;
// }
}

  .manual{
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  // position: absolute;
  // padding : 5%;
  width: 100vw;
  height: 4em;
  // gap: 1em;
  div#start_wrapper.simple-typeahead{
    width: 10em;
    // background-color: red;
    margin: 0;
    padding: 0 0 0 3%;
    // input#start.simple-typeahead-input{
    //   width: 7em;
    //   height: 3em;
    //   background-color: red;
    // }
  }
  div#end_wrapper.simple-typeahead{
    width: 10em;
    // background-color: red;
    margin: 0;
    padding: 0 3% 0 0;
    // input#start.simple-typeahead-input{
    //   width: 7em;
    //   height: 3em;
    //   background-color: red;
    // }
  }
  

  button{
    transition: 0.5s;
    width: 3em;
    height: 3em;
    border-radius: 5em;
    margin-right: 0.5em;
  }
}
#map{
  height: 200px;
  width: 100%;
  z-index: 190;
}
</style>
