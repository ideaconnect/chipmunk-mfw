<?php
namespace IDCT\Framework\Chipmunk;

//creating new service container
$services = new Definitions\Types\ServicesContainer();

//loading config
$config = (new ConfigReader())->loadConfig("sample_config.php");
$services->registerService('config',$config);

//creater router
$router = new Router();
$services->registerService('router',$config);

//Actions parser


//Frontend
$frontend = new Frontend();
$services->registerService('frontend',$frontend);

//passing services container to all objects
Definitions\Types\Object::setServices($services);

$chipmunk = new \IDCT\Framework\Chipmunk();
$chipmunk->setRouter($router)
         ->setFrontend($frontend)
         ->run();



