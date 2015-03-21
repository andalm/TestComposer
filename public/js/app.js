(function(){
  'use strict';

  var app = angular.module('TestComposer', ['ngSanitize']);

  app.controller('SearchController', SearchController);

  SearchController.$inject = ['$http'];

  function SearchController ($http) {
    var vm = this;
    vm.input = '';
    vm.results = '';
    //This code should be in a service, but for now I leave it here
    vm.searchWords = function(input){
      $http
      .post('/test/searchAjax', {input:input})
      .success(function(data, status, headers, config) {
        vm.results = data;
      })
      .error(function(data, status, headers, config) {
        alert('WTF! something wrong: '+ status +' :(');
      });
    };
  }
})();
