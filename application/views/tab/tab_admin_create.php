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

$this->load->view("tab/partial/header");?>

<div id="val_errors"><?php echo validation_errors();?></div>

<div id="bg">

	<?php echo form_open('tab/create');?>
		
		<?php echo form_textarea(array(
		'name'=>'message', 
		'id'=>'message',
		'value'=>''
		 )); ?>
	  
		<?php echo form_submit(array(
		'value' => $this->lang->line('common_create_tab'),
		'name' =>'save',
		'id' =>'save')); ?>
		
     <?php echo form_close(); ?>
     
</div>
 
<?php $this->load->view('tab/partial/footer');