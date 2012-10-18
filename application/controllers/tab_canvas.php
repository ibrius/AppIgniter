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
		  
	}
	function index()
	{
		// This line is needed to stop IE from blocking our cookie as 3rd party.  
		// It is a compact privacy policy. See: http://www.p3pwriter.com/LRN_111.asp
		header('p3p: CP="NOI ADM DEV PSAi COM NAV OUR OTR STP IND DEM"');
		
		$fb_data = $this->session->userdata('fb_data'); //Get the user's data from our session 				
		if($fb_data['user_id']) // We have a user logged into Facebook
		{	

			$this->load->view('tab/canvas_tab', $fb_data);
		}	
		else //Tell them to log in
		{	
			$fb_data['error'] = $this->lang->line('common_authenticate');
			
			$this->load->view('canvas/canvas_error', $fb_data);
		}	
		
	}
	
					
	
}
		