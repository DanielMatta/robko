<script setup>
import { ref, render } from 'vue';
import inputClassVue from './components/input-class.vue';
import { Vue3ToggleButton } from 'vue3-toggle-button'
import '../node_modules/vue3-toggle-button/dist/style.css'
import SimpleTypeahead from 'vue3-simple-typeahead';
import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
import { transform } from '@vue/compiler-core';
// import { isSVGTag } from '@vue/shared';
// import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
// import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css';
const isActive = ref(true);
const navorient = ref(false);
// const rotate =ref('');
function handleClickNav(){
  navorient.value = !navorient.value;
};


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
  </main>
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
</style>
