<?php
/**
Copyright 2012 Marina Ibrishimova and Byron Matus | Contact: admin@ibrius.net

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

class Canvas extends CI_controller
{
	function __construct()
	{
		parent::__construct('canvas');
		$this->load->model('Facebook_model');
		  
	}
	function index()
	{
		// This line is needed to stop IE from blocking our cookie as 3rd party.  
		// It is a compact privacy policy. See: http://www.p3pwriter.com/LRN_111.asp
		header('p3p: CP="NOI ADM DEV PSAi COM NAV OUR OTR STP IND DEM"');
		
		$fb_data = $this->db_session->userdata('fb_data'); //Get the user's data from our session
		$id = $fb_data['uid'];			
				
		if($id) // We have a user logged into Facebook	
		{				
			$data['login_url'] = $fb_data['loginUrl'];
			$data['app_id'] = $fb_data['app_id'];
			$data['app_url'] = $fb_data['url'];

			$this->load->view('canvas/canvas', $data);
		}	
		else //Tell them to log in
		{	
			$data['login_url'] = $fb_data['loginUrl']; //You could use this in the view to provide a login link
			$data['error'] = $this->lang->line('common_not_logged_in');
			
			$this->load->view('canvas/canvas_error', $data);
		}	
		
	}
	
					
	
}
		