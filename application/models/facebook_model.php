<?php
/**
Copyright 2012 Marina Ibrishimova and Byron Matus

This file is part of FB Frapp.

    FB Frapp is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    FB Frapp is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with FB Frapp.  If not, see <http://www.gnu.org/licenses/>.
**/
class Facebook_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		//Your app information to pass to the Facebook sdk
		$config = array(
						'appId'  => 'YOUR_APP_ID',
						'secret' => 'YOUR_APP_SECRET',
						'url' => 'https://apps.facebook.com/YOUR_APP_NAMESPACE/', //With trailing slash / . Only needed for tab apps
						'fileUpload' => false, // Indicates if the CURL based @ syntax for file uploads is enabled.
						);
		
		$this->load->library('Facebook', $config); //Initiate the Facebook PHP SDK
		
		//Gets the current user's id
		$user = $this->facebook->getUser();

		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user has logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		$profile = null;
		if($user)
		{
			try {
			    // Proceed knowing you have a user who has logged in
				$profile = $this->facebook->api('/me?fields=id,name,link,email');
			} catch (FacebookApiException $e) {
				error_log($e);
			    $user = null;
			}		
		}
		
	     // Gather all the data that we need from Facebook into an array
		$fb_data = array(
						'me' => $profile,
						'loginUrl' => $this->facebook->getLoginUrl(),
						'uid' => $this->facebook->getUser(),
						'logoutUrl' => $this->facebook->getLogoutUrl(),
						'signedRequest' => $this->facebook->getSignedRequest(),
						'accessToken' => $this->facebook->getAccessToken(),
						'app_id' => $config['appId'],
						'url' => $config['url']
					);
		
	     // Store all of the Facebook data in our session, which is stored in the database
		$this->db_session->set_userdata('fb_data', $fb_data);
	}
	
		
	
}
