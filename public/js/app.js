(function(){
  'use strict';

  var app = angular.module('TestComposer', ['ngSanitize']);

  //Controllers
  app.controller('SearchController', SearchController);

  SearchController.$inject = ['SearchService'];

  function SearchController (SearchService) {
    var sc = this;
    sc.input = '';
    sc.results = '';

    sc.getResults = function(input){
      SearchService
      .getResults(input)
      .then(function(results){
        sc.results = results.data;
      })
      .catch(function(error){
        console.error(error);
      });
    };
  }

  //Services
  app.factory('SearchService', SearchService);

  function SearchService($http){

    function getResults(input){
      return $http.post('/test/searchAjax', {input: input});
    }

    return {
      getResults: getResults
    };
  }
})();
