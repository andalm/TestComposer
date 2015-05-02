<!DOCTYPE html>
<html lang="en" ng-app="testComposer">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
    .sidebar-nav {
      padding: 9px 0;
    }
    @media (max-width: 980px) {
      .navbar-text.pull-right {
        float: none;
        padding-left: 5px;
        padding-right: 5px;
      }
    }
  </style>
  {{ $headObject->getAllCssLink() }}
  {{ $headObject->getAllScript() }}
  <title>Test Composer</title>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
  <body>
    @include('nav')

    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          @yield('content')
        </div>

        @include('sidebar')
      </div>

      <hr>

      @include('footer')
    </div>
  </body>
</html>
