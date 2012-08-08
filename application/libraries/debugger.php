<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Debugger {

  public function __construct()
  {
    $this->ci = &get_instance();
  }
  
  public function debug($obj = '', $severity = 'info')
  {
    if ($obj == null || $obj == '')
    {
      return;
    }
    else
    {
      if (is_string($obj))
      {
        log_message($severity, $obj);
        return;
      }
      if (is_array($obj))
      {
        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($obj));
        foreach ($iterator as $key => $value) {
          log_message($severity, $key . ' is ' . $value);
        }
        return;
      }
      else
      {
        log_message($severity, $obj);
        return;
      }
    }
  }
}

/* End of file Debugger.php */