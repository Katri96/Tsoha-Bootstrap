<?php

  $routes->get('/', function() {
    etusivucontroller::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  $routes->get('/reseptilista', function() {
      resepticontroller::reseptilista();
  });
  $routes->get('/login', function() {
  logincontroller::login();
  });
  $routes->get('/login/1', function() {
  logincontroller::loginjuttui();
  });

  $routes->get('/resepti', function() {
      resepticontroller::resepti();
  });
 
  $routes->get('/reseptinmuokkaus', function() {
      resepticontroller::reseptinmuokkaus();
  });
 $routes->get('/reseptinlisays', function() {
     resepticontroller::reseptinlisays();
  });
$routes->post('/reseptinlisays/store', function(){
  resepticontroller::store();
});

$routes->get('/reseptinlisays/new', function(){
  resepticontroller::save();
});
  $routes->get('/resepti/::id', function() {
      resepticontroller::show($id);
  });