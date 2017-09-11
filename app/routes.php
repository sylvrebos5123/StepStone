<?php

//API: get a list of 10 random cakes
$app->get('/api/cakes', "StepStone\OnlineBakery\Service::getCakesAction")
->bind('api_cakes');

// API : get a list of 10 random cakes with the same cake ID
$app->get('/api/cake/{id}', "StepStone\OnlineBakery\Service::getCakeAction")
->bind('api_cake');

// API : create an order
$app->post('/api/cake', "StepStone\OnlineBakery\Service::addCakeAction")
->bind('api_cake_add');

// API : get an order
$app->get('/api/order/{id}', "StepStone\OnlineBakery\Service::getOrderAction")
->bind('api_order');

// API : update an order
$app->put('/api/order/{id}', "StepStone\OnlineBakery\Service::updateCakeAction")
->bind('api_cake_update');



