angular.module('ovh-app',['ovh.controllers','ovh.services','ui.materialize'])
		.config(['$httpProvider', function($httpProvider){
   	  $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
   }])