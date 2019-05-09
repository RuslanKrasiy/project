<?php
return [
    //MainConroller
    ''=>[                           // ruta en la barra de navegacion
        'controller'=> 'main',      //nombre del controlador
        'action' => 'index',        //nombre del fichero
    ],
    //AccountCntroller
    'login'=>[                      // ruta en la barra de navegacion
        'controller'=> 'account',   //nombre del controlador
        'action' => 'login',        //nombre del fichero
    ],
    'register'=>[                   // ruta en la barra de navegacion
        'controller'=> 'account',   //nombre del controlador
        'action' => 'register',     //nombre del fichero
    ],

    'recovery'=>[                   // ruta en la barra de navegacion
        'controller'=>'account',    //nombre del controlador
        'action'=>'recovery',       //nombre del fichero
    ],
    //ProfileController

    'profile'=>[                    // ruta en la barra de navegacion
        'controller'=> 'profile',   //nombre del controlador
        'action' => 'profile',      //nombre del fichero
    ],
    'profile/edit'=>[               // ruta en la barra de navegacion
        'controller'=> 'profile',   //nombre del controlador
        'action' => 'edit',         //nombre del fichero
    ],
    'profile/announce'=>[           // ruta en la barra de navegacion
        'controller'=> 'profile',   //nombre del controlador
        'action' => 'announce',     //nombre del fichero
    ],

    //AnnounceController
    'announce'=>[                   // ruta en la barra de navegacion
        'controller'=> 'announce',  //nombre del controlador
        'action' => 'announce',     //nombre del fichero
    ],
    'announce/edit'=>[              // ruta en la barra de navegacion
        'controller'=> 'announce',  //nombre del controlador
        'action' => 'edit',         //nombre del fichero
    ],
    
];

?>