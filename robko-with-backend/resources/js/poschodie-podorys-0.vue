<template>
<svg id = "poschodie0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="4185" height="2920" viewBox="0 0 4185 2920">
  <defs>
    <linearGradient id="linear-gradient" x1="1317" y1="473.5" x2="1545" y2="473.5" gradientUnits="userSpaceOnUse">
      <stop offset="-4.5"/>
      <stop offset="5.5" stop-opacity="0"/>
    </linearGradient>
    <linearGradient id="linear-gradient-2" x1="2766" x2="2994" xlink:href="#linear-gradient"/>
    <linearGradient id="linear-gradient-3" x1="1815" y1="1831" x2="1815" y2="219" xlink:href="#linear-gradient"/>
  </defs>
  <path id="obrys" class="cls-1-0" d="M199,147V1838H115v996H724V1841H871V1652H3426v99h644V83H3429V208H861V146Z"/>
  <path id="ucebna_2" class="cls-2-0" d="M2474,1153h196v479H2474V1153h0Z"/>
  <path id="ucebna_3" class="cls-2-0" d="M2695,1156h274v479H2695V1156h0Z"/>
  <path id="ucebna_4" class="cls-2-0" d="M2993.69,1156h148.62v476H2993.69V1156h0Z"/>
  <path id="ucebna_5" class="cls-2-0" d="M3165,1155h136v207H3165V1155h0Zm0,207h254v270H3165V1362h0Z"/>
  <path id="miestnost" class="cls-2-0" d="M3444,1453h277v278H3444V1453h0Z"/>
  <path id="miestnost_2" class="cls-2-0" d="M3746,1453h313v278H3746V1453h0Z"/>
  <path id="zborovna_prizemie" class="cls-2-0" d="M3444,1148h615v281H3444V1148h0Z"/>
  <path id="ucebna_6" class="cls-2-0" d="M3444,971h615v153H3444V971h0Z"/>
  <path id="ucebna_7" class="cls-2-0" d="M3444,455h615V947H3444V455h0Z"/>
  <path id="kniznica" class="cls-2-0" d="M3444,91h615V430H3444V91h0Z"/>
  <path id="WC_ucitelia" class="cls-2-0" d="M3025.47,215.17l153.99-.339h0l1.07,486h0l-154,.339h0l-1.06-486h0Z"/>
  <path id="ucebna_8" class="cls-2-0" d="M3202.99,215.326l211.54-.339h0L3416,700.674h0l-211.54.339h0l-1.47-485.687h0Z"/>
  <path id="ucebna_11" class="cls-2-0" d="M1062,219h236V706.3H1062V219h0Z"/>
  <path id="ucebna_12" class="cls-2-0" d="M878,219h165V713H878V219h0Z"/>
  <path id="ucebna_13" class="cls-2-0" d="M208,430H859V913H208V430h0Z"/>
  <path id="miestnost_3" class="cls-2-0" d="M208,153H859V411H208V153h0Z"/>
  <path id="ucebna_14" class="cls-2-0" d="M205.012,939.015h428v261h-428V939.015h0Z"/>
  <path id="ucebna_15" class="cls-2-0" d="M204.984,1223.01H633v242.98H204.984V1223.01h0Z"/>
  <path id="ucebna_19" class="cls-2-0" d="M877.991,1153H1126v476.01H877.991V1153h0Z"/>
  <path id="schody_left" class="cls-3-0" d="M1321,229h224V342H1422V602h117V718H1317Z"/>
  <path id="schody_right" class="cls-4-0" d="M2990,718H2766V605h123V345H2772V229h222Z"/>
  <path id="ucebna_20" class="cls-2-0" d="M1153,1159h610.99v484.01H1153V1159h0Z"/>
  <path id="hlavny_vstup" class="cls-2-0" d="M1909,1156h538.99v476.01H1909V1156h0Z"/>
  <path id="vratnica" class="cls-2-0" d="M1786,1156h99v476.01h-99V1156h0Z"/>
  <path id="ucebna_17" class="cls-2-0" d="M209.988,1489.01H515v152.98H209.988V1489.01h0Z"/>
  <path id="chodba" class="cls-5-0" d="M197.981,1669.4V1831H862.455V1137.42H3324.62v211.79h107.4V708.823H2762.53v-107.4H2891V340.452H2775.58V219H1557.04V332.422H1430.57V596.405h112.42V714.846H878.514v217.81H644.644V1481.7H534.233v182.68Z"/>
  <path id="spol_miestnost" class="cls-2-0" d="M129.01,1846.99H707.993v972H129.01v-972h0Z"/>
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
 .cls-1-0 {
        fill: none;
      }

      .cls-1-0, .cls-2-0, .cls-3-0, .cls-4-0 {
        stroke: #000;
        stroke-width: 25px;
      }

      .cls-1-0, .cls-2-0, .cls-3-0, .cls-4-0, .cls-5-0 {
        fill-rule: evenodd;
      }

      .cls-2-0 {
        fill: #f27405;
      }

      .cls-3-0 {
        fill: url(#linear-gradient);
      }

      .cls-4-0 {
        fill: url(#linear-gradient-2);
      }

      .cls-5-0 {
        fill: url(#linear-gradient-3);
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
