<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2013, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

class Api_v1 extends Api_Controller
{

	//--------------------------------------------------------------------

	/**
	 * Sets up the require permissions and loads required classes
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

	}//end __construct()
	
	//--------------------------------------------------------------------
	
	/**
	 * Get All users
	 */
	public function get(){
		
		if ( !$this->_check_api( TRUE ) )
			return TRUE;
		$blogs = array();
		$this->_api_message(3009, array('blogs' => $blogs));
		return TRUE;
		
	}//end get()
	
	//--------------------------------------------------------------------
	
	}
