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

$this->load->view('tab/partial/header'); ?>

<?php if ($liked != 1){

	?><div id="like-gate">
	     <p>Like our page to view this content....</p> <img src="/wlcmdx/images/like-arrow.png" alt="arrow" title="Look up for the Like button!" style="position:absolute; top:35px; right:15px" />
	  </div>
	<?php } ?>

<div id="bg">
	
	<p><?php echo nl2br($message); ?></p>
	
</div>


<?php $this->load->view('tab/partial/footer');
