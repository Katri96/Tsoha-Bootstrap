<?php

  $routes->get('/', function() {
    etusivucontroller::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  $routes->get('/reseptilista', function() {
      reseptilistacontroller::reseptilista();
  });
  $routes->get('/login', function() {
  logincontroller::login();
  });
  $routes->get('/resepti', function() {
      resepticontroller::resepti();
  });
  $routes->get('/reseptinmuokkaus', function() {
      reseptinmuokkauscontroller::reseptinmuokkaus();
  });
