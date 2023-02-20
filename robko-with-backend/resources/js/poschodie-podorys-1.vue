<template>
<svg id= "svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="4645" height="2145" viewBox="0 0 4645 2145">
  <defs>
    <linearGradient id="linear-gradient" x1="2320.5" y1="1243" x2="2320.5" y2="293" gradientUnits="userSpaceOnUse">
      <stop offset="-2.085"/>
      <stop offset="3.085" stop-opacity="0"/>
    </linearGradient>
  </defs>
  <path id="ucebna_24" class="cls-1" d="M152,109H868v976H148Z"/>
  <path id="ucebna_25" class="cls-1" d="M151.561,1096.55H867.5v901.9H147.561Z"/>
  <path id="ucebna_26a" class="cls-1" d="M865.159,1252.02H1304.33v578.96H862.705Z"/>
  <path id="ucebna_26a_copy" data-name="ucebna_26a copy" class="cls-1" d="M1309.16,1252.02h439.17v578.96H1306.71Z"/>
  <path id="ucebna_26b" class="cls-1" d="M1307.16,1252.02h439.17v578.96H1304.71Z"/>
  <path id="ucebna_27" class="cls-1" d="M1766.96,1252.49h906.22v579.02H1761.9Z"/>
  <path id="ucebna_28a" class="cls-1" d="M2671.65,1252.49h545.82v579.02H2668.6Z"/>
  <path id="ucebna_28b" class="cls-1" d="M3231.65,1252.49h545.82v579.02H3228.6Z"/>
  <path id="ucebna_29" class="cls-1" d="M3781.05,1071.97h700.9v926.06H3777.14Z"/>
  <path id="ucebna_30" class="cls-1" d="M3781.46,338.767h701.05V1062.23H3777.55Z"/>
  <path id="kabinet_31pok" class="cls-1" d="M3781.49,113.037h701.02V346.963H3777.58Z"/>
  <path id="kabinet_31" class="cls-1" d="M3471.3,286.679h313.18V839.321H3469.55Z"/>
  <path id="WC_ucitelia" class="cls-1" d="M3129.75,286.5h191.61v553H3128.68Z"/>
  <path id="vytah" class="cls-1" d="M3331.05,286.5h141.72v553H3330.26Z"/>
  <path id="obrys" class="cls-2" d="M150,116V92H874V284H3779V96h714V2008H3772V1850H884v155H140Z"/>
  <path id="chodba" class="cls-3" d="M869,1239V844h833V717H1560V415h155V293h948V428h138V710H2666V857H3772v386Z"/>
  <path id="WC_ucitelia-2" data-name="WC_ucitelia" class="cls-1" d="M2942.43,286.5h175.16v553H2941.45Z"/>
  <path id="schody_left" class="cls-1" d="M1438.19,289.3h272.6V418.568H1561.1V716h142.39V848.7H1433.33Z"/>
  <path id="schody_right" class="cls-1" d="M2936.81,848.7h-272.6V719.432H2813.9V422H2671.51V289.3h270.16Z"/>
  <path id="WC_ziaci" class="cls-1" d="M871.29,286.5h198.53v553H870.181Z"/>
  <path id="kabinet_22" class="cls-1" d="M1094.12,286.5h336.7v553H1092.24Z"/>
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

<style>
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
    </style>