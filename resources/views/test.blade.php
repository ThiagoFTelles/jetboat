<?php
  $colorDrawer = 'white';
  $colorToolbar = 'white';
  $colorText = 'black';
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'App') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Do you need Material Icons? -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet"
        type="text/css">

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
    <link href="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/quasar.mat.min.css" rel="stylesheet"
        type="text/css">
    <style>
        .row{
            margin-right: 0 !important;
            margin-left: 0  !important;
        }    
    </style>
</head>

<body>
    <div id="app">
        <q-layout view="hHh LpR fFf">
            <q-layout-header>
                <q-toolbar class='bg-{{$colorToolbar}} text-{{$colorText}}'>
                    <q-btn flat round dense @click="drawerState = !drawerState" icon="menu"></q-btn>
                    <q-toolbar-title>
                        MILGARDEN
                        <div slot="subtitle">Marina Wave app</div>
                    </q-toolbar-title>
                </q-toolbar>
            </q-layout-header>

            <q-layout-drawer v-model="drawerState" content-class="bg-{{$colorDrawer}}">
                <q-list no-border link inset-delimiter>
                    <q-list-header>Essential Links</q-list-header>
                    <q-item @click.native="launch('http://quasar-framework.org')">
                        <q-item-side icon="school"></q-item-side>
                        <q-item-main label="Docs" sublabel="quasar-framework.org"></q-item-main>
                    </q-item>
                    <q-item @click.native="launch('http://forum.quasar-framework.org')">
                        <q-item-side icon="forum"></q-item-side>
                        <q-item-main label="Forum" sublabel="forum.quasar-framework.org"></q-item-main>
                    </q-item>
                    <q-item @click.native="launch('https://gitter.im/quasarframework/Lobby')">
                        <q-item-side icon="chat"></q-item-side>
                        <q-item-main label="Gitter Channel" sublabel="Quasar Lobby"></q-item-main>
                    </q-item>
                    <q-item @click.native="launch('https://twitter.com/quasarframework')">
                        <q-item-side icon="rss feed"></q-item-side>
                        <q-item-main label="Twitter" sublabel="@quasarframework"></q-item-main>
                    </q-item>
                </q-list>
            </q-layout-drawer>

            <q-page-container>
                <q-page>
                    <div class="flex row justify-center q-pa-sm">
                        <q-btn color="red" icon="warning" label="ATENÇÃO: 10 embarcações em desuso" class="q-ma-md">
                        </q-btn>
                    </div>

                    <div class="flex row justify-center q-pa-sm">
                        <component1 class="col-xs-10 col-sm-6 col-md-4">Navegando: 17</component1>
                    </div>
                    <div class="flex row justify-center q-pa-sm">
                        <component1 class="col-xs-10 col-sm-6 col-md-4">Estacionadas: 105</component1>
                    </div>
                    <div class="flex row justify-center q-pa-sm">
                        <component1 class="col-xs-10 col-sm-6 col-md-4">Fora: 2</component1>
                    </div>
                </q-page>
            </q-page-container>

            <q-layout-footer>
                <q-toolbar color="primary" class="items-center justify-center">
                    <div class="col"></div>
                    <q-btn outline rounded icon="fullscreen" color="white" label="SCAN" />
                    </q-btn>
                    <div class="col"></div>
                </q-toolbar>
            </q-layout-footer>

        </q-layout>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Do you want IE support? Replace "0.17.8" with your desired Quasar version -->
    <script src="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/quasar.ie.polyfills.umd.min.js"></script>

    <!-- You need Vue too -->
    <script src="https://cdn.jsdelivr.net/npm/vue@latest/dist/vue.min.js"></script>

    <!--
  Add Quasar's JS:
  Replace version below (0.17.8) with your desired version of Quasar.
  Replace ".mat" with ".ios" for the iOS theme.
-->
    <script src="https://cdn.jsdelivr.net/npm/quasar-framework@0.17.8/dist/umd/quasar.mat.umd.min.js"></script>

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
    <script src="https://unpkg.com/quasar-framework@0.17.20/dist/umd/quasar.mat.umd.min.js"></script>
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


    <script>
        new Vue({
            el: '#app',
            data: function () {
                return {
                    drawerState: false
                }
            },
            methods: {
                launch: function (url) {
                    Quasar.utils.openURL(url)
                }
            }
        })
    </script>
</body>

</html>
