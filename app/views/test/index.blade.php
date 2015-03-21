@extends ('layout')

@section ('content')
  <form role="search" name="form" ng-controller="SearchController as search">
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
          <input
            type="text"
            class="form-control"
            name"input"
            ng-model="search.input"
            placeholder="Search for..."
            ng-keyup="search.searchWords(search.input)">
        </div>
      </div>
    </div>

    <br>

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <p ng-bind-html="search.results"></p>
          </div>
        </div>
      </div>
    </div>
  </form>
@stop
