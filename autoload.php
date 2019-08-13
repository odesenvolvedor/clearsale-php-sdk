<?php

spl_autoload_register(

   function( $classname ) {
        $classname = str_replace('ClearSale\\', 'src\\', $classname);
       require_once str_replace( '\\', DIRECTORY_SEPARATOR, $classname ) . '.php';
   }

);
