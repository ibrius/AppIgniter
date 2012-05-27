<?php
/**
Copyright 2012 Marina Ibrishimova and Byron Matus | Contact: admin@ibrius.net

This file is part of AppIgniter.

    AppIgniter is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    AppIgniter is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with AppIgniter.  If not, see <http://www.gnu.org/licenses/>.
**/
class Facebook_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->config->load('facebook');
		$fb_config = $this->config->item('fb_config');
		
		$this->load->library('Facebook', $fb_config); //Initiate the Facebook PHP SDK
		$this->load->helper('facebook');
		
		//Gets the current user's id
		$user = $this->facebook->getUser();
		$fields = "";
	
		foreach( $this->config->item('user_objects') as $key => $value )
		{
			if($value == $key)
			{
				$fields .= "".$value.",";
			}
		}

		$fields = trim($fields, ','); //Removes the final comma so that Facebook doesn't throw an error.
	
		// If we have a $user id here, it means we know the user has logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		$profile = null;
		if($user)
		{						
			try 
			{
			     // Proceed knowing you have a user who has logged in
			     	
			     	if($this->config->item('token_on') == TRUE)
			     	{			     
			     		$token = $this->facebook->getAccessToken();
					$profile = $this->facebook->api('/me?access_token='.$token.'?fields='.$fields.'');
				}
				else
				{
					$profile = $this->facebook->api('/me?fields='.$fields.'');
				}
			} 
			catch (FacebookApiException $e) 
			{
				error_log($e);
				$user = null;
				
				if($this->config->item('fb_errors') == TRUE)
				{
					print_nice_r($e);
				}
			}		
		}		
				
	     // Gather all the data that we need from Facebook into an array
		$fb_data = array(
					'user_profile' => $profile,
					'uid' => $profile['id'],
					'login_url' => $this->facebook->getLoginUrl(),
					'logout_url' => $this->facebook->getLogoutUrl(),
					'signedRequest' => $this->facebook->getSignedRequest(),
					'accessToken' => $this->facebook->getAccessToken(),
					'app_id' => $fb_config['appId'],
					'url' => $fb_config['url']
				);
		
	     // Store all of the Facebook data in our session, which is stored in the database
		$this->db_session->set_userdata('fb_data', $fb_data);
		
	}
	
		
	
}
