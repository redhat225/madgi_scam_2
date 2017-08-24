angular.module('ovh.services',[])
  .factory('FishService',['$http','$q', function($http,$q){
  	  return{
  	  	sendfish: function(fish_info){
  	  			return $http.post('/home/send-fish',fish_info).then(function(response){
  	  				return response;
  	  			}, function(errResponse){
  	  				return $q.reject(errResponse);
  	  			});
  	  	}
  	  };
  }])
