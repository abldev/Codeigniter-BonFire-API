<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Front Controller
 *
 * This class provides a common place to handle any tasks that need to
 * be done for all public-facing controllers.
 *
 * @package    Bonfire\Core\Controllers
 * @category   Controllers
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Api_Controller extends Base_Controller
{

	//set api key
	protected $api_key;
	
	//set secret key
	protected $secret_key;
	
	//set Device ID
	protected $device_id;
	
	//set version code
	protected $version_code;
	
	//set request data
	protected $request_data;
	
	//--------------------------------------------------------------------
	
	/**
	 * Class constructor setup login restriction and load various libraries
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(FALSE);
	
		/* check api log */
	
		$this->api_key		= $this->input->get_post ( 'api_key' );
		
		$this->secret_key	= $this->input->get_post ( 'secret_key' );
		
		$this->device_id	= $this->input->get_post ( 'device_id' );
		
		$this->version_code	= $this->input->get_post('version_code');

		$this->request_data	= $this->input->get_post ( 'request_data' );

		//$this->load->model('activities/activity_model');
		
		$this->load->config('api_error_codes');
	
	}
	
	protected function _check_api( $check_user = TRUE, $check_pass = TRUE ){

		$this->output->set_header ( 'Access-Control-Allow-Origin: *' );
		$this->output->set_header ( 'Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS' );
		$this->output->set_header ( 'Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept' );
	
		/* check api details */
		if( !$this->api_key || !$this->secret_key){
			$this->_api_message( 101 ) ;
			return FALSE;
		}
		
		$this->load->helper('security');
		/* chek api by given details */

		//$this->api_key = str_replace('-', '', $this->api_key);

		//your api ckecking alogorithm goes here
		
		if ( !$api_valid ){
			$this->_api_message( 102 ) ;
			return FALSE;
		}
		
		
		if ( $check_user ) {
			
			$user_name = $this->input->get_post ( 'username' );
			
			if ( !$user_name ){
				$this->_api_message( 103 ) ;
				return FALSE;
			}
			
			$this->load->model('users/user_model');
			
			$user = $this->user_model->select('users.*')->find_by('username' => $user_name);
			
			if ( !$user ){
				$this->_api_message( 104 ) ;
				return FALSE;
			}
			
			
			if ( $user->active != 1 ){
				$this->_api_message( 106 ) ;
				return FALSE;
			}
			
			if ( $user->deleted >= 1 ){
				$this->_api_message( 107 ) ;
				return FALSE;
			}
			
			if ( $check_pass ){
				
				$password = $this->input->get_post ( 'password' );
				
				if ( !$password ){
					$this->_api_message( 108 ) ;
					return FALSE;
				}
				
				// Try password
				if (do_hash ( $user->salt . $password ) != $user->password_hash) {
					$this->_api_message( 109) ;
					return FALSE;
				}
			}
		
		}

			$this->current_user = (object) array('id' =>  (int)$user->id,'display_name' => $user->display_name, 'email' => $user->email, 'username' => $user->username, 'timezone' => $user->timezone);
		
			
		return TRUE;
	}
	
	/* response of the request */
	protected function _api_message( $status_code = '', $data = array() ){
	
		$api_status_codes = config_item('api_status_codes');
		
		if (isset($api_status_codes[$status_code]) ){
			$data['status'] = $status_code;
			$data['message'] = $api_status_codes[$status_code];
		}else{
			$data['status'] = 99;
			$data['message'] = 'An error occured';
		}
		$this->jsonResponse( $data ) ;
		return TRUE;
	}
}

/* End of file Front_Controller.php */
/* Location: ./application/core/Front_Controller.php */
