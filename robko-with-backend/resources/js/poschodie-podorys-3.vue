<template>
<svg id = "poschodie3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="4573" height="2107" viewBox="0 0 4573 2107">
  <defs>
    <linearGradient id="linear-gradient" x1="2530.499" y1="1238" x2="2027.501" y2="292" gradientUnits="userSpaceOnUse">
      <stop offset="-1.92"/>
      <stop offset="2.92" stop-color="#fff"/>
    </linearGradient>
  </defs>
  <path id="obrys" class="cls-1" d="M109,105V81H833V273H3738V85h714V1997H3731V1839H843v155H99Z"/>
  <path id="ucebna_47" class="cls-2" d="M110,94H828v910H107Z"/>
  <path id="ucebna_48" class="cls-2" d="M109.531,1017.45H827.5v979.1H106.531Z"/>
  <path id="ucebna_48B" class="cls-2" d="M827.6,1246.58H1409.86v592.84h-584.7Z"/>
  <path id="ucebna_49B" class="cls-2" d="M1412.08,1246.52h625.48v592.96H1409.47Z"/>
  <path id="ucebna_50" class="cls-2" d="M2049.08,1246.52h625.48v592.96H2046.47Z"/>
  <path id="ucebna_51" class="cls-2" d="M2674.23,1246.49H3714.21v593.02H2669.89Z"/>
  <path id="ucebna_52" class="cls-2" d="M3726.68,1024.06h716.7v952.88H3723.69Z"/>
  <path id="ucebna_53" class="cls-2" d="M3726.53,535.34H4443.5v483.32H3723.53Z"/>
  <path id="kabinet_54pok" class="cls-2" d="M3726.56,80.481H4443.5V524.519H3723.57Z"/>
  <path id="kabinet_54" class="cls-2" d="M3488.04,279.592h231.92V868.408H3487.07Z"/>
  <path id="WC_ucitelia" class="cls-2" d="M3161.35,279.5h178.04v589H3160.61Z"/>
  <path id="Vytah" class="cls-2" d="M3345.82,279.5h131.91v589H3345.27Z"/>
  <path id="WC_ucitelia-2" data-name="WC_ucitelia" class="cls-2" d="M2974.35,279.5h178.04v589H2973.61Z"/>
  <path id="kabinet_47" class="cls-2" d="M1121,279.5h214.9v589H1120.1Z"/>
  <path id="random_46" class="cls-2" d="M832.98,279.5h272.18v589H831.842Z"/>
  <path id="chodba" class="cls-3" d="M839,884v354H3719V881H2680V721h144V442H2680V292H1632V433H1475V709h151V869Z"/>
  <path id="schody_left" class="cls-2" d="M1341.19,294.3h272.6V423.568H1464.1V721h142.39V853.7H1336.33Z"/>
  <path id="schody_right" class="cls-2" d="M2969.5,856.457H2696.51V726.608h149.9V427.84H2703.82v-133.3h270.55Z"/>
</svg>


</template>

<script>
  export default {
    name: 'poschodiePodorys1',

    props: {
      width: {
        type: String,
        required: false
      },

      height: {
        type: String,
        required: false
      },

      size: {
        type: String,
        required: false
      }
    },

    computed: {
      widthAttr() {
        if (this.height) return undefined;
        if (this.size) return this.size;
        return this.width || "4645px";
      },

      heightAttr() {
        if (this.width) return undefined;
        if (this.size) return this.size;
        return this.height || "2145px";
      }
    }
  }
</script>

<style lang="scss">
      .cls-1 {
        fill: #f26c4f;
      }

      .cls-1, .cls-2, .cls-3 {
        stroke: #000;
        stroke-width: 25px;
        fill-rule: evenodd;
      }

      .cls-2 {
        fill: none;
      }

      .cls-3 {
        fill: url(#linear-gradient);
      }
      .color{
        fill: red;
      }
      @keyframes blink1-anim {
  0% { fill: #800; }
  33% { fill: #f00; }
  66% { fill: #800; }
  100% { fill: #800; }
}
@keyframes blink2-anim {
  0% { fill: rgb(16, 136, 0); }
  33% { fill: rgb(47, 255, 0); }
  66% { fill: rgb(0, 136, 2); }
  100% { fill: rgb(0, 136, 48); }
}
.blink1 {
  animation: blink1-anim 1.5s infinite;
}
.blink2 {
  animation: blink2-anim 1.5s infinite;
}

    </style>
