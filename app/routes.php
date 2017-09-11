<?php

//API: get a list of 10 random cakes
$app->get('/api/cakes', "StepStone\OnlineBakery\Service::getCakesAction")
->bind('api_cakes');


