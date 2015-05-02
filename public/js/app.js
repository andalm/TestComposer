(function(){
  'use strict';

  var app = angular.module('testComposer', ['ngSanitize']);

  //Constants
  app.constant('SEARCH_URL', '/test/searchAjax');

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

  function SearchService($http, SEARCH_URL){

    function getResults(input){
      return $http.post(SEARCH_URL, {input: input});
    }

    return {
      getResults: getResults
    };
  }
})();
