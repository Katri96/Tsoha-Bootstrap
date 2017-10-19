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
  
   
  $routes->post('/login', function() {
      logincontroller::handle_login();
  });
  
  $routes->get('/login', function() {
    logincontroller::login();
  });
  
  $routes->post('/logout', function() {
    logincontroller::logout();
  });
  
  $routes->post('/register', function() {
    logincontroller::handle_register();
  });
  
  $routes->get('/register', function() {
    logincontroller::register();
  });
 
  $routes->get('/resepti/:id', function($id) {
      resepticontroller::resepti($id);
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


$routes->post('/resepti/:id/destroy', function($id){
  // Pelin poisto
  resepticontroller::destroy($id);
});
    $routes->post('/resepti/:id/edit', function($id){
  // Reseptin muokkauksen esittäminen
  resepticontroller::update($id);
});
  $routes->get('/resepti/:id/edit', function($id){
  // Reseptin muokkauksen esittäminen
  resepticontroller::edit($id);
});
  $routes->post('/resepti/:id', function($id){
      arviointicontroller::store($id);
  });


