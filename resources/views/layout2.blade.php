<!DOCTYPE html>
<html>
<head>
  <!-- Do you need Material Icons? -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">

  <!-- Do you need Fontawesome? -->
  <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

  <!-- Do you need MDI? -->
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@^2.0.0/css/materialdesignicons.min.css" rel="stylesheet">

  <!-- Do you need all animations? -->
  <link href="https://cdn.jsdelivr.net/npm/animate.css@^3.5.2/animate.min.css" rel="stylesheet">


  <!--
    Finally, add Quasar's CSS:
    Replace version below (0.17.8) with your desired version of Quasar.
    Replace ".mat" with ".ios" for the iOS theme.
    Add ".rtl" for the RTL support (example: quasar.mat.rtl.min.css).
  -->
  <link href="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/quasar.ios.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- <span>
    <div id="q-app">
        <div class="q-ma-md">
            Fork and make your own!
            Do NOT use self-closing tags here on jsFiddle.
        </div>
        <q-btn color="primary" icon="warning" label="Notify" @click="notify" class="q-ma-md"></q-btn>
        <div class="q-ma-md">
            Running Quasar v@{{ version }}
        </div>
    </div>
</span> -->

  </div>


  <!-- Do you want IE support? Replace "0.17.8" with your desired Quasar version -->
  <script src="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/quasar.ie.polyfills.umd.min.js"></script>

  <!-- You need Vue too -->
  <script src="https://cdn.jsdelivr.net/npm/vue@latest/dist/vue.min.js"></script>

  <!--
    Add Quasar's JS:
    Replace version below (0.17.8) with your desired version of Quasar.
    Replace ".mat" with ".ios" for the iOS theme.
  -->
  <script src="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/quasar.ios.umd.min.js"></script>

  <!--
    If you want to add a Quasar I18n language pack (other than "en-us").
    Notice "pt-br" in "i18n.pt-br.umd.min.js" for Brazilian Portuguese language pack.
    Replace version below (0.17.8) with your desired version of Quasar.
    Also check final <script> tag below to enable the language
    Language pack list: https://github.com/quasarframework/quasar/tree/dev/i18n
  -->
  <script src="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/i18n.pt-br.umd.min.js"></script>

  <!--
    If you want to make Quasar use a specific set of icons (unless you're using Material Icons already).
    Replace version below (0.17.8) with your desired version of Quasar.
    Icon sets list: https://github.com/quasarframework/quasar/tree/dev/icons
  -->
  <script src="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/icons.fontawesome.umd.min.js"></script>

  <script>
    // if using a Quasar language pack other than the default "en-us";
    // requires the language pack style tag from above
    Quasar.i18n.set(Quasar.i18n.ptBr) // notice camel-case "ptBr"

    // if you want Quasar components to use a specific icon library
    // other than the default Material Icons;
    // requires the icon set style tag from above
    Quasar.icons.set(Quasar.icons.fontawesome) // fontawesome is just an example

    /*
      Example kicking off the UI.
      Obviously, adapt this your specific needs.
     */

    // custom component example, assumes you have a <div id="my-page"></div> in your <body>
    Vue.component('my-page', {
      template: '#my-page'
    })

    // Definindo novo componente chamado button-counter
    Vue.component('button-counter', {
      data: function () {
        return {
          count: 0
        }
      },
      template: '<button v-on:click="count++">Você clicou em mim @{{ count }} vezes.</button>'
    })

    // start the UI; assumes you have a <div id="q-app"></div> in your <body>
    new Vue({
      el: '#q-app2',
      data: function () {
        return {}
      },
      methods: {},
      // ...etc
    })


    new Vue({
      el: '#q-app',
      data: function () {
        return {
          version: Quasar.version
        }
      },
      methods: {
        notify: function () {
          this.$q.notify('Running on Quasar v' + this.$q.version)
        }
      }
    })
  </script>
</body>
</html>