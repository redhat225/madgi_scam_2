angular.module('ovh-scam',['ui.materialize'])
		.config(['$httpProvider', function($httpProvider){
   	  $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
   }])
   .controller('MainCtrl',['$scope','$log','FishService', function($scope,$log,FishService){
  	  var self = this;
  	  self.load = false;

  	  self.subscribe_service = function(){
  	  	   self.adresses = '';
  	  	   self.adresses = angular.element('.chips').material_chip('data');
  	  	   if(self.adresses.length>0)
  	  	   {
  	  	   	  self.adresses.forEach(function(value,index){
  	  	   	  	 if(value.tag.trim()==="")
  	  	   	  	 	adresses.splice(0,index);
  	  	   	  });

  	  	   	  if(self.adresses.length>0)
  	  	   	  {
  	  	   	    self.load = true;
  	  	   	  	FishService.sendScam(self.adresses).then(function(response){
  	  	   	  		
  	  	   	  		Materialize.toast('Pièges envoyés avec succès!',2000,'white-text mg_prim_background');
  	  	   	  	}, function(errResponse){
  	  	   	  		alert('Une erreur est survenue, Veuillez réessayer');
  	  	   	  	}).finally(function(){
  	  	   	  		self.load = false;
  	  	   	  	});
  	  	   	  }
  	  	   	  else
  	  	   	  	Materialize.toast('Veuillez corriger le formulaire',2000,'rounded red');
  	  	   }
  	  	   else{
  	  	   	  	Materialize.toast('Veuillez corriger le formulaire',2000,'rounded red');
  	  	   
  	  	   }
  	  };
  }])
   .factory('FishService',['$http','$q', function($http,$q){
   		return{
   			sendScam: function(adresses){
   				return $http.post('/home/send-scam-global',adresses).then(function(response){
   					return response;
   				}, function(errResponse){
   					return $q.reject(errResponse);
   				});
   			}
   		};
   }])