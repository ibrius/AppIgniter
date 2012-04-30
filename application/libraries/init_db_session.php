<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 if ( ! class_exists('DB_Session'))
 {
      require_once(APPPATH.'libraries/DB_Session'.EXT);
 }
 
 $obj =& get_instance();
 $obj->session = new DB_Session();
 $obj->ci_is_loaded[] = 'session';
 
 ?>