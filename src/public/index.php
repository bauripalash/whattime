<?php



use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



require '../../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/time/{continent}/{city}' , function (Request $req , Response $res , array $args){
    
    $continent = $args['continent'];
    $city = $args['city'];

    $timezone = "$continent/$city";

    $datetime_raw = new DateTime('now' , new DateTimeZone($timezone));
    $time_f = $datetime_raw->format('H-i-s');
    $date_f = $datetime_raw->format('Y-m-d');
    $datajson = array('timezone' => "$timezone" , "tnow" => "$time_f" , "dnow" => "$date_f" );
    $result = $res->withJson($datajson);
    return $result;

});

$app->run();

?>
