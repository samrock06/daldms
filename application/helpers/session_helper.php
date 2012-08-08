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
 * @filesource BASEPATH/application/helpers/session_helper.php
 */

// ------------------------------------------------------------------------

/**
* Sessions helper.
*
* This is needed in creating user sessions for 
* authorizations and authentications. These chunks are abstracted into a 
* helper to make code cleaner and more modularized.
*/

// ------------------------------------------------------------------------

$current_user;

if ( ! function_exists('sign_in'))
{
  function sign_in($user)
  {
    $CI = &get_instance();
    $CI->load->library('encrypt', 'session');
    $encoded_id = $CI->encrypt->encode($user["username"]);
    $encoded_salt = $CI->encrypt->encode($user["password"]);

    $session_data = array(
      'user_id'     => $user['user_id'],
      'user_name'   => $user['username'],
      'title'     => $user['title'],
      'first_name'     => $user['firstname'],
      'last_name'     => $user['lastname'],
      'user_email'    => $user['email'],
      'university'  => '',
      'address'   => '',
      'status'    => $user['status'],
      'search'    => array(),
      'logged_in'     => TRUE,
    );
    $CI->session->set_userdata($session_data);
    return;
  }
}

if ( ! function_exists('sign_out')) {
  function sign_out()
  {
    $CI = &get_instance();
    $CI->load->library('encrypt', 'session');
    $session_data = array(
      'user_id'     => '',
      'user_name'   =>'',
      'title'     =>'',
      'first_name'     => '',
      'last_name'     => '',
      'user_email'    => '',
      'university'  => '',
      'address'   => '',
      'status'    => '',
      'search'    => array(),
      'logged_in'     => FALSE,
    );
    $CI->session->unset_userdata($session_data);
    $CI->session->sess_destroy();
  }
}

if ( ! function_exists('is_signed_in')) {
  function is_signed_in()
  {
    if(current_user() !== null && $CI->session->userdata('logged_in')){
      return true;
    }
    else
      return false;
  }
}

if ( ! function_exists('current_user')) {
  function current_user()
  {
    $CI = &get_instance();
    $CI->load->library('encrypt', 'debugger');
    $credentials = array();
    $encoded_id = $CI->session->userdata('user_name');
    $encoded_salt = $CI->session->userdata('password');
    if (!empty($encoded_id) && !empty($encoded_salt))
    {
      $credentials = array (
          'username' => $CI->session->userdata('user_name'),
          'password' => $CI->session->userdata('password')
        );
      $query = $CI->db->get_where('users', $credentials);
      $current_user = $query->result();
      return $current_user;
    }
    else
    {
      return null;
    }
  }
}