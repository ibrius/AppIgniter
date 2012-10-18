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
class Appi extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->config->load('facebook');
		$fb_config = $this->config->item('fb_config');
		
		$this->load->library('Facebook', $fb_config); //Initiate the Facebook PHP SDK
		
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
	
		$profile = null;
		if($user)
		{						
			try 
			{
			        //Get the user's information using an access token	
			     	if($this->config->item('token_on') == TRUE)
			     	{			     
			     		$token = $this->facebook->getAccessToken();
					$profile = $this->facebook->api('/me?access_token='.$token.'?fields='.$fields.'');
				}
				//Get the user's information without an access token
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
					$result = $e->getResult();
					print_nice_r($result);
				}
			}		
		}		
				
	     // Gather all the data that we need from Facebook into an array
		$fb_data = array(
					'user_profile' => $profile,
					'user_id' => $profile['id'],
					'login_url' => $this->facebook->getLoginUrl(),
					'logout_url' => $this->facebook->getLogoutUrl(),
					'signed_request' => $this->facebook->getSignedRequest(),
					'access_token' => $this->facebook->getAccessToken(),
					'app_id' => $fb_config['appId'],
					'app_url' => $fb_config['url']
				);
		
	     // Store all of the Facebook data in our session, which is stored in the database
		$this->session->set_userdata('fb_data', $fb_data);
		
	}
	
	/**
	| 
	| post_action() makes the user perform the specified action on the specified object
	| Read the Facebook Open Graph documentation to learn how to set up your objects on Facebook.
	|
	**/
	function post_action($action, $object_type, $object_url )
	{ 	
			
		try
		{
			$fb_data = $this->session->userdata('fb_data');
			$app_namespace = $fb_data['app_url'];
			$app_namespace = str_replace('https://apps.facebook.com/', '', $app_namespace);
			$app_namespace = str_replace('/', '', $app_namespace);
			
			
			$token = $this->facebook->getAccessToken();
			
			$query_string = '/me/'.$app_namespace.':'.$action.'?'.$object_type.'='.$object_url.'&access_token='.$token.'';
//			echo $query_string;
			
			$result = $this->facebook->api($query_string, 'POST');
			return $result;
//			print_nice_r($result);
	        }
	        catch (FacebookApiException $e) 
		{
			error_log($e);
			$user = null;
				
			if($this->config->item('fb_errors') == TRUE)
			{
				$result = $e->getResult();
				print_nice_r($result);
			}
		}
         			
	         	 
	}
	
	/**
	|
	| get_friends returns all of the users friends in an array like so:
	|  
	| [0] => Array
	|        (
	|            [name] => Adam Appelby
	|            [id] => 999000111555
	|        )
	|
	| You can optionally pass 'name' or 'id' to return either an
	| array containing only the names or only the ids.
	|
	|********IMPORTANT*********
	| This function is currently only returning the first page of friends because Facebook changed how they
	| do paging and we have not gotten around to changing this one yet.  sorry
	|
	**/
	function get_friends($all = null)
	{
  	  try
  	  {
	  	  $token = $this->facebook->getAccessToken();	  
		  $friends = $this->facebook->api('/me/friends?access_token='.$token.'');
	  
		  $paging = $friends['paging'];
		  $friends = $friends['data'];
		  $next = $paging['next'];
		  $next = str_replace('https://graph.facebook.com', '', $next);
	  }
	  catch (FacebookApiException $e) 
	  {
		error_log($e);
				
		if($this->config->item('fb_errors') == TRUE)
		{
			$result = $e->getResult();
			print_nice_r($result);
		}
	  }
	  
	  $finished = false;
	  while (! $finished)
	  { 
	    try{ $next_page = $this->facebook->api($next); }
	    catch (FacebookApiException $e) 
	    {
		error_log($e);
				
		if($this->config->item('fb_errors') == TRUE)
		{
			$result = $e->getResult();
			print_nice_r($result);
		}
	    }
	        
	    $paging = $next_page['paging'];
	    $next_page = $next_page['data'];
	    $friends = array_merge($friends, $next_page);
	    
	    if(array_key_exists('next', $paging))
	    {
	      $next = $paging['next'];
	      $next = str_replace('https://graph.facebook.com', '', $next);	      	      
	    }
	    else
	    {
	      $finished = true;
	    }	    
	  }
	  
	  if ($all == 'name')
	  {
	    $names = array();
	    foreach($friends as $key)
	    {
	      $name = $key['name'];
	      $names[] = $name;
	    }
	    return $names;
	  }
	  
	  else if ($all == 'id')
	  {
	    $ids = array();
	    foreach($friends as $key)
	    {
	      $id = $key['id'];
	      $ids[] = $id;
	    }
	    return $ids;
	  }
	  else
	  {
	    return $friends;
	  }
	}

		
	
}
