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
class Tab_canvas extends CI_controller
{
	function __construct()
	{
		parent::__construct('tab_canvas');
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
			// Add the data we want to pass to the view into an array
			$data['login_url'] = $fb_data['login_url'];
			$data['app_id'] = $fb_data['app_id'];
			$data['app_url'] = $fb_data['url'];

			$this->load->view('tab/canvas_tab', $data);
		}	
		else //Tell them to log in
		{	
			$data['login_url'] = $fb_data['login_url']; //You could use this in the view to provide a login link
			$data['error'] = $this->lang->line('common_not_logged_in');
			
			$this->load->view('tab/tab_error', $data);
		}	
		
	}
	
					
	
}
		