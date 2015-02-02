@extends ('layout')

@section ('content')
  <p>Please, enter the text</p>
  <form role="search">
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
          <input type="text" class="form-control" placeholder="Search for...">
        </div>
      </div>
    </div>
  </form>
  
  <br>
  
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <p>Results</p>
        </div>
      </div>
    </div>
  </div>
@stop