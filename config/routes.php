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
  $routes->post('/login', function(){
  // Kirjautumisen käsittely
  logincontroller::handle_login();
});
  $routes->get('/register', function() {
      logincontroller::register();
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
  $routes->get('/resepti/:id/edit', function($id){
  // Reseptin muokkauksen esittäminen
  reseptiController::edit($id);
});
$routes->post('/resepti/:id/edit', function($id){
  // Pelin muokkaaminen
  reseptiController::update($id);
});

$routes->post('/resepti/:id/destroy', function($id){
  // Pelin poisto
  reseptiController::destroy($id);
});