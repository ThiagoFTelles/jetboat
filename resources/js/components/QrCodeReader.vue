<template>
  <div>
    <p class="error">{{ error }}</p>

    <p class="decode-result" style="display:none">Last result: <b>{{ result }}</b></p>

    <qrcode-stream @decode="onDecode" @init="onInit" />
  </div>
</template>

<script>
export default {
  data () {
    return {
      result: '',
      error: ''
    }
  },

  methods: {
    onDecode (result) {
      this.result = result
      
      var actionUrl = "/vehicles/"+result+"/action"
      window.location.href = actionUrl
    },

    async onInit (promise) {
      try {
        await promise
      } catch (error) {
        if (error.name === 'NotAllowedError') {
          this.error = "ERROR: you need to grant camera access permisson"
        } else if (error.name === 'NotFoundError') {
          this.error = "ERROR: no camera on this device"
        } else if (error.name === 'NotSupportedError') {
          this.error = "ERROR: secure context required (HTTPS, localhost)"
        } else if (error.name === 'NotReadableError') {
          this.error = "ERROR: is the camera already in use?"
        } else if (error.name === 'OverconstrainedError') {
          this.error = "ERROR: installed cameras are not suitable"
        } else if (error.name === 'StreamApiNotSupportedError') {
          this.error = "ERROR: Stream API is not supported in this browser"
        }
      }
    }
  }
}
</script>

<style scoped>
/* * {display:none} */
.error {
  font-weight: bold;
  color: red;
}
</style>