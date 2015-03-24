<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2013, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Account types and settings
 */
$config['api_status_codes'] = array(
		
		/* API Checking */
		101 => 'Invalid Api Details',
		102 => 'Invalid Api',
		103 => 'API User missing',
		104 => 'Invalid API User',
		105 => 'Authentication: You do not have the ability to access this organization.',
		106 => 'Your account is not yet active.',
		107 => 'Unfortunately your account has been deleted.',
		108 => 'Authentication: Password missing.',
		109 => 'Authentication: Login failed.',
		110 => 'Request data missing.',
);
