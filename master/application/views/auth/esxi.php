<!DOCTYPE html>
<!-- saved from url=(0031)https://192.168.2.99/ui/#/login -->
<html class="no-js vui-layout-html k-webkit k-webkit83" ng-app="esxUiApp" style="min-width: 768px;"><head class=""><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css" class="">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}</style>
    <title ng-bind="$root.title" class="">Log in - VMware ESXi</title>

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" class="">
    <meta http-equiv="cache-control" content="max-age=0" class="">
    <meta http-equiv="cache-control" content="no-cache" class="">
    <meta http-equiv="expires" content="0" class="">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" class="">
    <meta http-equiv="pragma" content="no-cache" class="">
    <meta name="description" content="" class="">

    <!-- The initial, max and min scale settings -->
    <meta name="viewport" content="
       width=device-width,
       initial-scale=0.5001,
       minimum-scale=1.0001,
       maximum-scale=5.0001,
       user-scalable=yes" class="">

    <!-- The following will hide the chrome on mobile Safari and Chrome on Android
         if the user has added a shortcut to their home screen. -->
    <meta name="mobile-web-app-capable" content="yes" class="">
    <meta name="apple-mobile-web-app-capable" content="yes" class="">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" class="">

    <link rel="stylesheet" href="https://192.168.2.99/ui/bower_components/vui-bootstrap/css/vui-bootstrap.min.css" class="">
    <link rel="stylesheet" href="https://192.168.2.99/ui/bower_components/jquery-ui/themes/base/jquery-ui.min.css" class="">
    <link rel="stylesheet" href="https://192.168.2.99/ui/bower_components/codemirror/lib/codemirror.css" class="">
    <link rel="stylesheet" href="https://192.168.2.99/ui/bower_components/codemirror/theme/mdn-like.css" class="">
    <link rel="stylesheet" href="https://192.168.2.99/ui/bower_components/nvd3/build/nv.d3.min.css" class="">
    <link rel="stylesheet" href="https://192.168.2.99/ui/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" class="">
    <link rel="icon" type="image/x-icon" href="https://192.168.2.99/ui/favicon.ico" class="">
    <link rel="apple-touch-icon" href="https://192.168.2.99/ui/apple-touch-icon.png" class="">

    <link rel="stylesheet" href="https://192.168.2.99/ui/node_modules/vfeed/vfeed.css" class="">

    <!-- build:css(.tmp) styles/main.css -->
    <link rel="stylesheet" href="https://192.168.2.99/ui/styles/main.css" class="">
    <!-- endbuild -->

    <!-- we use vendor.css to allow partner customizations, normally it is empty -->
    <link rel="stylesheet" href="https://192.168.2.99/ui/styles/vendor.css" class="">
<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="main" src="https://192.168.2.99/ui/scripts/main.js" class=""></script></head>

<body ng-app="esxUiApp" class="base-app-style" style="overflow: hidden;">
    <!--[if lt IE 7]>
    <p class="browsehappy">
       You are using an <strong>outdated</strong> browser.
       Please <a href="http://browsehappy.com/">upgrade your browser</a> to
       improve your experience.
    </p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <div class="">
      <!-- uiView:  --><div ui-view="" class=""><div class="loginContainer">
   <img id="topSplash" src="https://192.168.2.99/ui/images/AppBgPattern.png" alt="Background image">

   <div style="position: absolute; top: 65px; left: 65px;">
      <img src="https://192.168.2.99/ui/images/vmware_logo_white_transparent.png" style="width: 60%;">
   </div>

   <form name="loginForm" ng-submit="login(credentials)" novalidate="" class="ng-valid ng-dirty ng-valid-parse">

      <div id="loginForm">

         <p class="loginRow ng-hide" ng-show="devmode || electron">
            <label id="host-label" class="loginLabel">Hostname
               <input id="hostname" autocomplete="off" aria-labelledby="host-label" tabindex="1" ng-disabled="loggingIn" ng-class="{loginFailed: loginFailed}" class="margeTextInput ng-pristine ng-untouched ng-valid" type="text" ng-model="credentials.hostname" ng-model-options="{
                     updateOn: &#39;blur&#39;
                  }">
            </label>
         </p>

         <p class="loginRow">
            <label id="username-label" class="loginLabel">User name
               <input id="username" aria-labelledby="username-label" tabindex="2" focus-me="true" ng-disabled="loggingIn" ng-class="{loginFailed: loginFailed}" class="margeTextInput ng-valid ng-touched ng-dirty ng-valid-parse" type="text" ng-model="credentials.username">
            </label>
         </p>

         <p class="loginRow">
            <label id="password-label" class="loginLabel">Password
               <input id="password" autocomplete="off" aria-labelledby="password-label" tabindex="4" ng-disabled="loggingIn" ng-class="{loginFailed: loginFailed}" class="margeTextInput ng-pristine ng-untouched ng-valid" type="password" ng-model="credentials.password">
            </label>
         </p>

         <p>&nbsp;</p>

         <p id="loginButtonRow">
            <input id="submit" class="button blue" type="submit" value="Log in" ng-disabled="credentials.username === &#39;&#39; ||
                  loggingIn">
         </p>
      </div>

      <div id="productName">
         <img src="https://192.168.2.99/ui/images/vmware_logo_white_transparent.png" style="width: 120px; margin-right: 10px;">
            <img src="https://192.168.2.99/ui/images/esxi.png" style="margin-bottom: 2px; width: 60px;">

         <!-- ngIf: loggingIn -->

         <!-- ngIf: status !== null -->

         <div ng-show="welcome !== null &amp;&amp; !loggingIn &amp;&amp; !initializing" ng-style="{&#39;margin-top&#39;: status === null ? &#39;29px&#39; : &#39;10px&#39;}" class="loginWelcome ng-hide" style="margin-top: 29px;">
            <div ng-bind-html="welcome | escapeHtml | linebreak"></div>
            <div ng-show="accept !== null" style="margin: 10px; text-align: right;" class="ng-hide">
               <label>
                  <input type="checkbox" tabindex="3" ng-model="accepted" style="margin: 0 5px 0 0;" class="ng-pristine ng-untouched ng-valid">
               </label>
            </div>
         </div>
      </div>

   </form>

   <div id="footer" class="footer">
      <a href="https://www.vmware.com//support/pubs/" target="_blank">
         <i class="esx-icon-help-new-window" style="margin-top: -3px; margin-right: 6px;"></i>Open the VMware Host Client documentation</a>
      <div style="float: right;"></div>
   </div>

</div>
</div>
    </div>

    <!-- Fixes required for electron -->
    <script class="">
        var _loc = String(window.location);
        if (_loc && _loc.indexOf('file:///') >= 0) {
            // requireJS has a bit of a crippled exporting mechanism for node, so we need to pull
            // these objects up into global scope.
            require('./bower_components/es6-promise/es6-promise.min.js');
            window.$ = window.jQuery = require('./bower_components/jquery/dist/jquery.min');
            require('./bower_components/jquery-ui/jquery-ui.min');
            window.I18n = require('./bower_components/i18n-js/app/assets/javascripts/i18n.js')
            window.vsphere = require('./thirdparty/vspherejs/index.js')
            window.ipaddr = require('./bower_components/ipaddr/ipaddr.min.js');
        }
    </script>
    <!-- end electron -->

    <!-- build:js(.) scripts/oldieshim.js -->
    <!--[if lt IE 9]>
    <script src="bower_components/es5-shim/es5-shim.js"></script>
    <script src="bower_components/json3/lib/json3.js"></script>
    <![endif]-->
    <!-- endbuild -->

    <script src="https://192.168.2.99/ui/bower_components/jxon/index.js" class=""></script>
    <script src="https://192.168.2.99/ui/bower_components/i18n-js/app/assets/javascripts/i18n.js" class=""></script>
    <script src="https://192.168.2.99/ui/bower_components/es6-shim/es6-shim.min.js" class=""></script>

    <!-- The main entry point for Angular -->
    <script src="https://192.168.2.99/ui/bower_components/requirejs/require.js" data-main="scripts/main" class=""></script>



</body></html>