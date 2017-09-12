<?php

require_once 'src/None.php';
require_once 'src/Some.php';
require_once 'src/Option.php';

require_once 'src/State.php';
require_once 'src/MatchResponse.php';


$response = Option::from(new State(State::DUPLICATE_TYPE))->map(function (State $state) {

    return $state->isDuplicate() ? 409 : 201;

})->getOrElse(200);


var_dump($response);

$response = Option::from([State::LEAD_TYPE, '34324324324324'])->map(function ($tuple) {
    list($type, $id) = $tuple;
    return $type === State::DUPLICATE_TYPE ? 409 : 201;

})->getOrElse(200);


var_dump($response);


$response = Option::from(null)->map(function ($tuple) {
    list($type, $id) = $tuple;
    return $type === State::DUPLICATE_TYPE ? 409 : 201;

})->getOrElse(200);


var_dump($response);


$response = MatchResponse::match(Option::from(new State(State::DUPLICATE_TYPE)));

var_dump($response);


Option::from(2);