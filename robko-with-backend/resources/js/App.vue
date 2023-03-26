<script setup>
import { ref, render, resolveDirective, watch } from 'vue';
import { Vue3ToggleButton } from 'vue3-toggle-button'
// import '../node_modules/vue3-toggle-button/dist/style.css'
import '../../node_modules/vue3-toggle-button/dist/style.css'
import SimpleTypeahead from 'vue3-simple-typeahead';
import  MapSvg from '../maps/1.poschodie_podorys.svg'
import poschodiePodorys1 from './poschodie-podorys-1.vue'
import poschodiePodorys0 from './poschodie-podorys-0.vue'
import poschodiePodorys2 from './poschodie-podorys-2.vue'
import poschodiePodorys3 from './poschodie-podorys-3.vue'
import poschodiePodorys4 from './poschodie-podorys-4.vue'
import poschodieSuteren from './poschodie-podorys-suteren.vue'
// import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
import '../../node_modules/vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
// import 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css' integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="  crossorigin="";
import leaflet, { map, svgOverlay } from 'leaflet';
// import Routing from 'leaflet-routing-machine';
import {onMounted} from 'vue';
import Graph from './graph';
import MessageComponent from './components/MessageComponent.vue';

const nodestext = ref("");
const isActive = ref(true);
const navorient = ref(false);
const startLoc = ref(null);
const endLoc = ref(null);
const activeMap = ref(1);
const count = ref(0)
const startLocFloor = ref([])
const endLocFloor = ref([])
// let test = Array();
// ref(fetch("http://robko-with-backend.test/get_floor/64b").then(res => res.json()).then(data => console.log(data)));

async function setStartLocFloor(name) {
  let res = await fetch("http://robko-with-backend.test/get_floor/" + name);
  let finalRes = await res.json();
  startLocFloor.value = finalRes;
}
async function setEndLocFloor(name) {
  let res = await fetch("http://robko-with-backend.test/get_floor/" + name);
  let finalRes = await res.json();
  endLocFloor.value = finalRes;
}



function navigateUp(){
        // console.log(startLocFloor.value[0].floor);
        const stairsRight = document.querySelector("#schody_right")
          let pathsEnd = document.querySelectorAll('path');
          pathsEnd.forEach((element)=>{
          element.classList.remove('blink2');
          })
          stairsRight.classList.add("blink2");
}

function navigateDown(){
  const stairsLeft = document.querySelector("#schody_left")
  let pathsStart = document.querySelectorAll('path');
          pathsStart.forEach((element)=>{
          element.classList.remove('blink2');
          })
          stairsLeft.classList.add("blink2");
}

async function navigateSimple(startLoc, endLoc){
        await setStartLocFloor(startLoc)
        await setEndLocFloor(endLoc)
        startLoc = "#ucebna_" + startLoc;
        let pathsStart = document.querySelectorAll('path');
        pathsStart.forEach((element)=>{
        element.classList.remove('blink1');
      })
      let roomStart = document.querySelector(startLoc);
      roomStart.classList.add("blink1");
        endLoc = "#ucebna_" + endLoc;
        console.log(endLoc);
      let roomEnd = document.querySelector(endLoc);
      let pathsEnd = document.querySelectorAll('path');
      pathsEnd.forEach((element)=>{
        element.classList.remove('blink2');
      })
      roomEnd.classList.add("blink2");

}

watch(navorient, (navorient)=>{
  if (navorient) {
    [startLoc.value, endLoc.value] = [endLoc.value, startLoc.value]
  }else if(!navorient){
    [startLoc.value, endLoc.value] = [endLoc.value, startLoc.value]
  }
})



const props = defineProps(['shortnames'])

// function setActiveMap(e){
//     activeMap.value = e.target.id;

// }


// const rotate =ref('');
function handleClickNav(){
  navorient.value = !navorient.value;
};


let curr_alt_pt = undefined;
let curr_ctrl_pt = undefined;
let svgElement = undefined;
let shortnames = document.querySelector("#test").getAttribute('data-shortnames')  //shortnames of classrooms
let classnames = document.querySelector("#test").getAttribute('data-classnames')  //classnames

shortnames = shortnames.replaceAll('"', "");
shortnames = shortnames.replaceAll('[', "");
shortnames = shortnames.replaceAll(']', "");
shortnames = shortnames.split(",")

classnames = classnames.replaceAll('"', "");
classnames = classnames.replaceAll('[', "");
classnames = classnames.replaceAll(']', "");
classnames = classnames.split(",")
// console.log(classnames);
// for (let name in shortnames){
//     console.log(name);
// }
// console.log(getData('64b'))
onMounted(()=>{
// getData();




  // const target = document.querySelector(".target");
  // observer.observe(target);

//   let first_floor_nodes = {
//   node1 : leaflet.latLng(94.25, 250),
//   node2 : leaflet.latLng(94.25, 240),
//   node3 : leaflet.latLng(94.25, 230),
//   node4 : leaflet.latLng(94.25, 220),
//   node5 : leaflet.latLng(94.25, 210)
//   //idem spat, zajtra pokracovat v tomto tu po robote,
//   // snad david da dajaky insight bo sa zabijem asi ked ne bruh, nic nejde idk, chcem ptom
//   // tote tu node dat do toho algoritmu, ked nepojde, robim to rucne
// }

  // let externalScript = document.createElement('script')
  //   externalScript.setAttribute('src', './graph.js')


  //   document.head.appendChild(externalScript)


  let bounds = leaflet.latLngBounds([[0,0], [400,400]]);
  let svgPoschodieSuterenElement = document.querySelector('#suteren');
  let svgPoschodie0Element = document.querySelector('#poschodie0');
  let svgPoschodie1Element = document.querySelector('#poschodie1');
  let svgPoschodie2Element = document.querySelector('#poschodie2');
  let svgPoschodie3Element = document.querySelector('#poschodie3');
  let svgPoschodie4Element = document.querySelector('#poschodie4');

  let svgPoschodieSuteren = leaflet.svgOverlay(svgPoschodieSuterenElement, bounds, {
      interactive: true
  })
  let svgPoschodie0 = leaflet.svgOverlay(svgPoschodie0Element, bounds, {
          interactive: true
      })

  let svgPoschodie1 = leaflet.svgOverlay(svgPoschodie1Element, bounds, {
      interactive: true
  })
  let svgPoschodie2 = leaflet.svgOverlay(svgPoschodie2Element, bounds, {
      interactive: true
  })
  let svgPoschodie3 = leaflet.svgOverlay(svgPoschodie3Element, bounds, {
      interactive: true
  })
  let svgPoschodie4 = leaflet.svgOverlay(svgPoschodie4Element, bounds, {
      interactive: true
  })


  let overlays = {
      '4' : svgPoschodie4,
      '3' : svgPoschodie3,
      '2' : svgPoschodie2,
      '1' : svgPoschodie1,
      '0' : svgPoschodie0,
      '-1' : svgPoschodieSuteren
  }


//   let overlaysGroup = leaflet.layerGroup(svgPoschodieSuteren,svgPoschodie0,svgPoschodie1,svgPoschodie2,svgPoschodie3,svgPoschodie4);


let paths = document.querySelectorAll("path");
// console.log(paths);

  let map = leaflet.map('map', {
      crs: leaflet.CRS.Simple,
    //   layers: [overlaysGroup]
      layers: [svgPoschodieSuteren,svgPoschodie0, svgPoschodie1,svgPoschodie2,svgPoschodie3,svgPoschodie4]
      // attribution: 'ESO/INAF-VST/OmegaCAM'
    }
    );
    // function initMap(){
    //   map.removeLayer(overlays[0])
    //   overlays[-1].addTo(map);

    // }
    // initMap();
    function getActiveFloor(){
      if (map.hasLayer(svgPoschodie0)){
        activeMap.value = 0;
      }else{
        if (map.hasLayer(svgPoschodie1)){
          activeMap.value = 1;
        }else{
          if (map.hasLayer(svgPoschodie2)){
            activeMap.value = 2;
          }else{
            if (map.hasLayer(svgPoschodie3)){
              activeMap.value = 3;
            }else {
              if (map.hasLayer(svgPoschodie4)){
                activeMap.value = 4;
              }else{
                if(map.hasLayer(svgPoschodieSuteren)){
                  activeMap.value = -1;
                }
              }
            }
          }
        }
      }
    }
    function setLayer(layernumber){
      getActiveFloor()
      map.removeLayer(overlays[activeMap.value])
      overlays[layernumber].addTo(map);
    }



    paths.forEach(function(path) {
  // Get the dimensions of the path element
  var bbox = path.getBBox();

  // Calculate the x and y coordinates of the center of the path element
  var centerX = bbox.x + bbox.width / 2;
  var centerY = bbox.y + bbox.height / 2;

  // Create a new "text" element and set its attributes
  var text = document.createElementNS("http://www.w3.org/2000/svg", "text");
  text.setAttribute("x", centerX);
  text.setAttribute("y", centerY);
  text.setAttribute("text-anchor", "middle");
  var originalText = path.getAttribute("id");
//   originalText.replace("chodba", "")
  var prefix = "ucebna_";
  var modifiedText = originalText;
  if (originalText.indexOf(prefix) === 0) {
    modifiedText = originalText.substring(prefix.length);
  }

  // Add the text content to the "text" element
  text.textContent = modifiedText;
  text.setAttribute("font-size", "8em");


  // Append the "text" element to the SVG container
  path.parentNode.appendChild(text);
});


    // setLayer(0)
    // overlaysGroup.addTo(map);

//     leaflet.Control.Layers.include({
//   getOverlays: function() {
//     // create hash to hold all layers
//     let control, layers;
//     layers = {};
//     control = this;

//     // loop thru all layers in control
//     control._layers.forEach(function(obj) {
//       let layerName;

//       // check if layer is an overlay
//       if (obj.overlay) {
//         // get name of overlay
//         layerName = obj.name;
//         // store whether it's present on the map or not
//         return layers[layerName] = control.map.hasLayer(obj.layer);
//       }
//     });

//     return layers;
//     // return JSON.stringify(layers);
//   }
// });
// leaflet.Control.Layers.getOverlays()





    let control = leaflet.control.layers(overlays).addTo(map);
    // console.log("overlays: " +control.getOverlays());
    // console.log(leaflet.control.layers(overlays).getContainer());
    // leaflet.control.layers.





// map.on('click', function (e) {  //djikstra starts
//     let node = [];
//     node[0] = e.latlng.lat;
//     node[1] = e.latlng.lng;
//     // addNodes(node);
//     console.log(node[0], node[1]);
// });


// for (let key in first_floor_nodes){ //rendering nodes
//   let marker = leaflet.marker(first_floor_nodes[key]).addTo(map);
//   marker.name = key; //num = meno node?

// marker.on('click',function(e){

//   if(e.originalEvent.metaKey){
//     // console.log(target.value);
//     curr_ctrl_pt = e.latlng;
//     let oldText = nodestext.value;                      //e.target.name meno noudy
//     nodestext.value = oldText + e.target.name + ':{';
//     // $('#textarea_nodes').val(oldText + num + ':{');
//     // console.log(e.originalEvent.altKey);
//     console.log(curr_ctrl_pt);
//   }
//   if(e.originalEvent.altKey){
//     curr_alt_pt = e.latlng;
//         let oldText = nodestext.value;
//         // console.log("ctrl v alte" + curr_ctrl_pt);
//         nodestext.value = oldText + e.target.name + ':' + getDistanceFromLatLonInM(curr_alt_pt.lat, curr_alt_pt.lng ,curr_ctrl_pt.lat, curr_ctrl_pt.lng) + ',';
//         }
// });
//  function getDistanceFromLatLonInM(lat1,lon1,lat2,lon2) {
//   let R = 6371; // Radius of the earth in km
//   let dLat = deg2rad(lat2-lat1);  // deg2rad below
//   let dLon = deg2rad(lon2-lon1);
//   let a =
//     Math.sin(dLat/2) * Math.sin(dLat/2) +
//     Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
//     Math.sin(dLon/2) * Math.sin(dLon/2)
//     ;
//   let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
//   let d = R * c; // Distance in km
//   return (d * 1000).toFixed(1);
// }

// function deg2rad(deg) {
//   return deg * (Math.PI/180)
// }
// }

  map.fitBounds(bounds);




// svgOverlay.on('click',function(e){
//   console.log(e.originalEvent.path[0].id); //e.originalEvent.path[0].id path ku idcku miestnosti
//   // e.target.setStyle({fillcolor : 'red'});
//   // e.originalEvent.path[0].classList.add('blink1')
// })

for (let overlay in overlays){
//   console.log(overlays[overlay]);
  overlays[overlay].on('click', function(e){
    console.log(e.originalEvent.path[0].id);
    // setLayer(3)
    getActiveFloor()
    console.log("test ci ma overlay: " + activeMap.value);


    // console.log(map.hasLayer(overlays[overlay]));
  })
  map.removeLayer(overlays[overlay])
  setLayer(0);
}
map.on('baselayerchange', function(){


     getActiveFloor()
    console.log(endLoc.value);
     navigateSimple(startLoc.value, endLoc.value)
     console.log("zmena mapky na ", activeMap.value);
     if(activeMap.value > endLocFloor.value[0].floor){
        console.log("ifko");
        const stairsLeft = document.querySelector("#schody_left")
        const stairsRight = document.querySelector("#schody_right")
        stairsRight.classList.remove("blink2")
        stairsLeft.classList.add("blink2")
      }
      if(activeMap.value < endLocFloor.value[0].floor){
        console.log("ifko");
        const stairsRight = document.querySelector("#schody_right")
        const stairsLeft = document.querySelector("#schody_left")
        stairsLeft.classList.remove("blink2")
        stairsRight.classList.add("blink2")
      }
      if (activeMap.value == endLocFloor.value[0].floor) {
        let room = document.querySelector("#ucebna_" + endLoc.value);
        const stairsRight = document.querySelector("#schody_right")
        const stairsLeft = document.querySelector("#schody_left")
          stairsLeft.classList.remove("blink2")
        stairsRight.classList.remove("blink2")

        room.classList.add("blink2");

      }

 })
// const navigateButton = document.querySelector(".navigate");
// // console.log(navigateButton);
// navigateButton.addEventListener("click", function(){
//   while (getActiveFloor > endLoc) {

//   }
// })




// watch(activeMap, (newValue, oldValue)=>{
//     console.log("ide" , activeMap.value);
//     // map.removeLayer(svgOverlay);
//     for (let name in overlays) {
//   map.removeLayer(overlays[name]);
// }
//     // svgElement = document.querySelector('#poschodie' + activeMap.value);
//     // svgOverlay = leaflet.svgOverlay(svgElement, bounds, {
// 	// 	interactive: true
// 	// }).addTo(map);

// })
watch(startLoc, (startLoc)=>{              //horsi sposob cez watch ale reaktivny
    setStartLocFloor(startLoc).then(function(){
      setLayer(startLocFloor.value[0].floor)
    startLoc = "#ucebna_" + startLoc;
    try {
      let room = document.querySelector(startLoc);
      room.classList.add("blink1");

    } catch (error) {
        console.log(error);
        // let svgElement = document.querySelector('#poschodie' + activeMap.value);
        console.log(activeMap.value);
        console.log(startLoc);
        let pathsStart = document.querySelectorAll('path');
      pathsStart.forEach((element)=>{
        element.classList.remove('blink1');
      })

    }
  })
});


watch(endLoc, (endLoc)=>{
    setEndLocFloor(endLoc).then(function(){
    console.log("end locfloor : " , endLocFloor.value);
    let endLocnew = "#ucebna_" + endLoc;
    try {
      let room = document.querySelector(endLocnew);
      room.classList.add("blink2");
      console.log(activeMap.value, ">", endLocFloor.value[0] );
      console.log("neeror" ,activeMap.value > endLocFloor.value[0] );
    } catch (error) {
    //   let paths = document.querySelectorAll('#poschodie' + activeMap.value + ' path');
    let pathsEnd = document.querySelectorAll('path');
      pathsEnd.forEach((element)=>{
        element.classList.remove('blink2');
      })
      console.log(activeMap.value, ">", endLocFloor.value[0].floor );
      console.log("eror" ,activeMap.value > endLocFloor.value[0].floor );
      if(activeMap.value > endLocFloor.value[0].floor){
        console.log("ifko");
        const stairsLeft = document.querySelector("#schody_left")
        stairsLeft.classList.add("blink2")
      }
      if(activeMap.value < endLocFloor.value[0].floor){
        console.log("ifko");
        const stairsRight = document.querySelector("#schody_right")
        stairsRight.classList.add("blink2")
      }
    }
  })
});




// svgElement.classList.add('blink1')

//   let popup = leaflet.popup();
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
  <!-- <nav>hamburger</nav> -->

  <main>
   <div class="classContainer">
    <SimpleTypeahead id="class"  :items="classnames" v-if="!isActive" placeholder="class" :minInputLength="1"></SimpleTypeahead>
    </div>
    <div class="manual" v-if="isActive">
      <SimpleTypeahead id="start" @select-item="startLoc = $event" v-model="startLoc" placeholder="Start location" :items="shortnames" :minInputLength="1"> </SimpleTypeahead>
      <button @click="handleClickNav" :style="{transform: navorient ? 'rotate(180deg)': 'rotate(0deg)'}" ><i class="fa fa-long-arrow-right" aria-hidden="true" ></i></button>
      <SimpleTypeahead :items="shortnames" id="end" @select-item="endLoc = $event" v-model="endLoc" placeholder="End location" :minInputLength="1"></SimpleTypeahead>
    </div>
    <div class="toggle-button-container">
      <!-- <p>class mode</p> -->
    <!-- <Vue3ToggleButton v-model:isActive="isActive" :track-active-color="'#cccccc'"> </Vue3ToggleButton> -->
    <!-- <p>manual mode</p> -->
  </div>
  <!-- <img src="../maps/1.poschodie_podorys.svg" alt=""> -->
  <div id="map"></div>
  <!-- <textarea name="textarea_nodes" id="textearea_nodes" cols="30" rows="10"></textarea> -->
  <!-- <div class="target"> {{nodestext}}</div> -->

  </main>

  <poschodiePodorys1 :floor="1" ></poschodiePodorys1>
  <poschodiePodorys0 :floor="0"></poschodiePodorys0>
  <poschodiePodorys2 :floor="2" ></poschodiePodorys2>
  <poschodiePodorys3 :floor="3"></poschodiePodorys3>
  <poschodiePodorys4 :floor="4"></poschodiePodorys4>
  <poschodieSuteren :floor="-1"></poschodieSuteren>

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
    margin-bottom: 1.15em;
    margin-top: 2.5em;
    padding: 0;
  }

.toggle-button-container{
  display: flex;
  justify-content: space-evenly;
  position: absolute;
  align-items: center;
  gap: 1em;
  top: 10em;
  z-index: 2;
//   margin-bottom: 1em;
}

  .manual{
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  position: relative;
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
  margin-top: 4em;
  height: 350px;
  width: 100%;
  z-index: 1;

}
.navigate{
  position: absolute;
  bottom: 2em;
  background: none;
  color: inherit;
  border: none;
  font: inherit;
  cursor: pointer;
  outline: inherit;
  img{
    height: 3em;
    width: 3em;
  }
}
.color{
  fill: red;
}
</style>
