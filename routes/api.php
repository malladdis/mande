<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    //program category
    $api->get('program-category',"App\\Api\\V1\\Controllers\\ProgramCategoryController@index");
    $api->get('program-category/{id}',"App\\Api\\V1\\Controllers\\ProgramCategoryController@show");
    $api->post('program-category',"App\\Api\\V1\\Controllers\\ProgramCategoryController@create");
    $api->put('program-category/{id}',"App\\Api\\V1\\Controllers\\ProgramCategoryController@update");
    $api->delete('program-category/{id}',"App\\Api\\V1\\Controllers\\ProgramCategoryController@destroy");

    //programs
    $api->get('program','App\\Api\\V1\\Controllers\\ProgramController@index');
    $api->post('program','App\\Api\\V1\\Controllers\\ProgramController@create');
    $api->get('program/{id}','App\\Api\\V1\\Controllers\\ProgramController@show');
    $api->put('program/{id}','App\\Api\\V1\\Controllers\\ProgramController@update');
    $api->delete('program/{id}','App\\Api\\V1\\Controllers\\ProgramController@destroy');

    //project
    $api->get('project','App\\Api\\V1\\Controllers\\ProjectController@index');
    $api->post('project','App\\Api\\V1\\Controllers\\ProjectController@create');
    $api->get('project/{id}','App\\Api\\V1\\Controllers\\ProjectController@show');

    //project categories
    $api->get('project-category','App\\Api\\V1\\Controllers\\ProjectCategoryController@index');
    $api->post('project-category','App\\Api\\V1\\Controllers\\ProjectCategoryController@create');
    $api->get('project-category/{id}','App\\Api\\V1\\Controllers\\ProjectCategoryController@show');
    $api->put('project-category/{id}','App\\Api\\V1\\Controllers\\ProjectCategoryController@update');
    $api->delete('project-category/{id}','App\\Api\\V1\\Controllers\\ProjectCategoryController@destroy');

    //outcome category
    $api->get('outcome-category','App\\Api\\V1\\Controllers\\OutcomeCategoryController@index');
    $api->post('outcome-category','App\\Api\\V1\\Controllers\\OutcomeCategoryController@create');

    //outcomes
    $api->get('outcome','App\\Api\\V1\\Controllers\\OutcomeController@index');
    $api->post('outcome','App\\Api\\V1\\Controllers\\OutcomeController@create');


    //output category
    $api->get('output-category','App\\Api\\V1\\Controllers\\OutputCategoryController@index');
    $api->post('output-category','App\\Api\\V1\\Controllers\\OutputCategoryController@create');



    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });
});

