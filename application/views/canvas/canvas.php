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

echo $this->load->view('canvas/partial/header'); ?>


	<div id="bg">
		<h1><?php echo $this->lang->line('common_my_app'); ?></h1>
		<p><?php echo $this->lang->line('common_canvas_app_description'); ?></p>
		
		<script src='https://connect.facebook.net/en_US/all.js'></script>
	        <button onclick='postToFeed(); return false;'>Post to Feed</button>
		<p id='msg'></p>

		<script> 
		      <?php echo "FB.init({appId: \"".$app_id."\", status: true, cookie: true});"; ?>

		      function postToFeed() {

		        // calling the API ...
		        var obj = {
		          method: 'feed',
		          link: '<?php echo $app_url; ?>',
		          picture: 'https://fbrell.com/f8.jpg',
		          name: '<?php echo $this->lang->line('common_my_app'); ?>',
		          caption: '<?php echo $this->lang->line('common_dialog_caption'); ?>',
		          description: '<?php echo $this->lang->line('common_app_description'); ?>'
		        };

		        function callback(response) {
		          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
		        }

		        FB.ui(obj, callback);
		      }
    
		</script>
		
	</div>


<?php echo $this->load->view('canvas/partial/footer'); ?>