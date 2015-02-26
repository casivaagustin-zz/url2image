<?php

add_route('get', '/', array(
    'controller' => new \Application\Frontend\Controller\Index(),
    'action' => 'index',
    'route_name' => 'home'
  )
);

add_route('get', '/capture', array(
    'controller' => new \Application\Frontend\Controller\Index(),
    'action' => 'capture',
    'route_name' => 'capture'
  ));