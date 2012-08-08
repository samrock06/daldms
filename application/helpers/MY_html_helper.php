<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * DalDMS
 *
 * An open source course dependency management system
 *
 * @package   DalDMS
 * @author    Samuel Haruna
 * @copyright Copyright (c) 2012 - 2022, DalDMS
 * @license   
 * @link      http://ca.linkedin.com/pub/samuel-haruna/24/90/182      
 * @since     Version 1.0
 * @filesource BASEPATH/application/models/user_model.php
 */

// ------------------------------------------------------------------------

/**
 * Extension of the HMTL helper.
 *
 * I really do not like passing every Tom, Dick and Harry through the
 * generic $this->data["human"] methodology which CodeIgniter uses as its
 * default. There are some redundant information that could be abstracted
 * to a configuration, or some other dynamic information that have a common
 * base which can be abstracted to a configuration.
 */
function title($value='')
{
  if ($value == null || $value == '' || !is_string($value))
  {
    return "DalDMS";
  }
  else
  {
    return "DalDMS - " . $value;
  }
}