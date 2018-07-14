<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/angular.min.js')}}"></script>
        <script src="{{asset('js/myapp.js')}}"></script>
    </head>



    <body ng-app="app">
        <div ng-controller="maincontroller">
           <ul>
                <li style="color: #212121;" ng-repeat="x in f"><% f[0]['question']['en'] %></li>
           </ul>
        </div>
    </body>
</html>
