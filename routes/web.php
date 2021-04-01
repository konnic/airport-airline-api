<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
    // airports route
    $router->get('airports', 'AirportController@getAirports');
    $router->get('airports/{id}', 'AirportController@getAirportById');
    $router->post('airports', 'AirportController@createAirport');
    $router->put('airports/{id}', 'AirportController@updateAirport');
    $router->delete('airports/{id}', 'AirportController@deleteAirport');

    //airlines route
    $router->get('airlines', 'AirlineController@getAirlines');
    $router->get('airlines/{id}', 'AirlineController@getAirlineById');
    $router->post('airlines', 'AirlineController@createAirline');
    $router->put('airlines/{id}', 'AirlineController@updateAirline');
    $router->delete('airlines/{id}', 'AirlineController@deleteAirline');

    // associations route
    $router->get('associations', 'AssociationController@getAssociations');
    $router->post('associations', 'AssociationController@createAssociation');

    // countries route
    $router->get('countries', 'CountryController@getCountries');
    $router->get('countries/{id}', 'CountryController@getCountryById');
});