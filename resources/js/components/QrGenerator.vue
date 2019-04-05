<template>
<div>
  <VueQr :logoSrc="src2" :text="text" :size="300" :margin="0" :dotScale="1" :logoScale="1" :logoMargin="2" :logoCornerRadius="2"></VueQr>
</div>
  
</template>

<script>
import VueQr from 'vue-qr'

export default {
  props: ['text'],
  computed: {
    text2() {
            if (this.text) {
                return `${this.text}`
            } else {
                // No invitee is specified, display default message
                return "erro"
            }
        }
  },
  data () {
    return {
      result: null,
      error: null,
      dragover: false,
      src2: "https://lh3.googleusercontent.com/QWXKIDRpsWdM8T78fsBqK7vy4uiUtyakIrbQBO38YZ-XYyTMUXcBd-4CQPmo_DQBC1jiXVYE_iwZGd3YrmHkozj2KaEvOwxdJl14YTAXOINu-H_Gj1FbqcdrcYjryaTrHeX5CuBfYFu6CdL0gg7SCZsYUwaL7ulNWMEax7i3j1gizucjV8gCwFf-j2Fo6gP10mDqcyzQsMTX2pvow-dpMJs4EhBU6jpPViyRvaS58Iq9jvPAS2d-PZJpKK8A6LMg5G7Mn_HjZVmJU5hW_1hLGdXs1qf7G-QnqlVx7m1jiARdpev4gQc5GG8utWxPR1X2LrehSnrq2-q9jskdkk2g9-gzRbI30KnIrgdcCa4kYXMK7VQW-JKyg3Xtl9MJv-Cq_DSSndlNHJP3j175ogXDGELGPNLO2QguPBeetlcclBspUI8taRGTkYRW66xr3jt2K74fvcYLR0xX4ywYkn9mKata9ydm9aaWZ8GLaPVm2bixReANFIAjfO52p-i5e3YBtWG5wrMg_7R-c9ceqk5WtOY59hM86ATF2cMTY8Vi9YlrYCEA4q04xg1xV0zfCD6DGBhEgNJnXyuLt6yVGDLrAmoHNweQHQy-3_xLUFY=w1600-h489",
      
    }
  },

  methods:{
        test(dataUrl,id){
            console.log(url, id)
        }
    },
    components: {
    VueQr
  }
}
</script>

<style>

</style>