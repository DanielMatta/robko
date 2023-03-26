<template>
<svg id = "poschodie4" xmlns="http://www.w3.org/2000/svg" width="6443" height="3026" viewBox="0 0 6443 3026">
  <defs>
  </defs>
  <path id="ucebna_64A" class="cls-1" d="M5291,1407H6315V2895H5295Z"/>
  <path id="ucebna_64B" data-name="ucebna?" class="cls-1" d="M5290.53,712.791H6314.5V1402.21H5294.53Z"/>
  <path id="kabinet_pok" class="cls-1" d="M5290.56,161.174H6314.5V721.826H5294.56Z"/>
  <path id="kabinet" class="cls-1" d="M4884.93,453.215H5286.1v503.57H4886.5Z"/>
  <path id="Vytah" class="cls-1" d="M4725.7,441.506h150.61V945.494H4726.29Z"/>
  <path id="WC_ucitel" class="cls-1" d="M4554.54,447.8h150.93V1205.2H4555.13Z"/>
  <path id="WC_ucitel2" class="cls-1" d="M4352.5,447.507h187.01V1204.49H4353.23Z"/>
  <path id="kabinet_57" class="cls-1" d="M1543.23,447.507H1845.8V1204.49H1544.41Z"/>
  <path id="miestnost_58" class="cls-1" d="M1141,447.507h387V1204.49H1142.51Z"/>
  <path id="Ucebna_59" class="cls-1" d="M115.175,171.648H1108.89v1249.7H119.057Z"/>
  <path id="ucebna_60" class="cls-1" d="M115.553,1435.48H1109.48V2884.52H119.435Z"/>
  <path id="ucebna_61" class="cls-1" d="M1146.21,1848.02H2591.8v812.96H1151.86Z"/>
  <path id="ucebna_62" class="cls-1" d="M2595.67,1848.49H3936.39v813.02H2600.91Z"/>
  <path id="ucebna_63" class="cls-1" d="M3933.67,1848.49H5274.39v813.02H3938.91Z"/>
  <path id="Obrys" class="cls-2" d="M110.6,185.007v-34.26H1144.11V424.829H5291.03V156.457H6310.27v2729.4H5281.04V2660.31H1158.39v221.26H96.323Z"/>
  <path id="schody_left" class="cls-3" d="M1860.91,437.753h419.85V611.18H2050.22v399.04h219.29v178.03H1853.42Z"/>
  <path id="schody_right" class="cls-3" d="M4345.09,1188.25H3925.24V1014.82h230.54V615.784H3936.49V437.753h416.09Z"/>
  <path id="chodba" class="cls-4" d="M1126,1220v614H5283V974H4718v238H3923V1015h217V618H3932V438H2289V626H2052V986h229v226Z"/>
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
