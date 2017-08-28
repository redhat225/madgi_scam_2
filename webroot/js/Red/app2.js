angular.module('ovh-app',['ovh.controllers_2','ovh.services','ui.materialize'])
		.config(['$httpProvider', function($httpProvider){
   	  $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
   }])