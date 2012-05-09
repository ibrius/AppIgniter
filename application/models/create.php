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
class Create extends CI_Model 
{
 	function __construct()
   	{
        // Call the Model constructor
        parent::__construct();
        
        
   	}

	// Adds the user's data to the database after they have set up their app.
	function insert_user($data)
	{		
		$page_id = mysql_real_escape_string($data['page_id']);
	 
		$message = mysql_real_escape_string($data['message']);
		
		$query = "INSERT INTO users(page_id,message)
				VALUES ('$page_id','$message')";
						
		return $this->db->query($query);
	}
	
	// Adds the admin's user id and the page's id to the database when they first load the app
	function insert_admin($data)
	{
		$page_id = mysql_real_escape_string($data['page_id']);
		$fb_id = mysql_real_escape_string($data['fb_id']);
		$query = "INSERT INTO fbid(page_id,fb_id)
				VALUES ('$page_id','$fb_id')";
						
		return $this->db->query($query);
	
	}	
	
	// Retrieve the user's data from the database
	function get_tab_data($pid)
	{
		$query = $this->db->query("SELECT message FROM users WHERE page_id = '".$pid."'");
								
		return ($query->row_array());
	}
	
	// Update the message
	function updater($data,$where)
	{
	
		$text = mysql_real_escape_string($data['message']);	 
		 		
		$query = $this->db->query("UPDATE users SET message='$text' WHERE page_id='$where'");
	
		if($query)
		{return true;}
		else {return false;}
	}	
	
}	