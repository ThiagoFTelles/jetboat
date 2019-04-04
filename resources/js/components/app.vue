<template>
  <router-view></router-view>
</template>

<script>
  
  import QrCodeReader from './QrCodeReader.vue';
  import QrDrop from './QrDrop.vue';
  import qrcodegenerator from './QrGenerator.vue'

  export default {
    name: 'app',
    data() {
      return {
        foobar: []
      }
    },
    methods: {
    },
    components: {
      QrCodeReader, QrDrop, qrcodegenerator
    }
  }
</script>