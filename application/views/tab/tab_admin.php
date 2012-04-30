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

$this->load->view('tab/partial/header');?>

<div id="bg">
	<div id="val_errors"><?php echo validation_errors(); ?></div>
 
	<div id="form">

    	   <?php echo form_open('tab/edit_tab');?>	 
		<?php echo "<textarea name=\"message\">".$tab_data['message']."</textarea>";?>
		<br>
		<?php echo form_submit(array(
		'value'=> $this->lang->line('common_update_tab'),
		'name'=>'save',
		'id' =>'save')); ?>

	   <?php echo form_close(); ?>
	</div>

</div>
<?php $this->load->view('tab/partial/footer');