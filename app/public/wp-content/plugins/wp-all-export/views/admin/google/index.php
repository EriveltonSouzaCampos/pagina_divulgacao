<?php
if(!defined('ABSPATH')) {
    die();
}

wp_enqueue_script('pmxe-angular-app', PMXE_ROOT_URL . '/frontend/dist/app.js', array('jquery'), PMXE_VERSION.PMXE_ASSETS_VERSION);
wp_enqueue_style('pmxe-angular-scss', PMXE_ROOT_URL . '/frontend/dist/styles.css', array(), PMXE_VERSION.PMXE_ASSETS_VERSION);

?>
<div ng-app="GoogleMerchants" ng-controller="mainController" ng-init="init()">

</div>
