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

echo $this->load->view('tab/partial/headercanvas');

$string = $login_url;
$findme='tabs_added';
$found = strpos($string, $findme);

if($found !== false) // If the user just added the app to a page, get the page id and name and redirect to the app on their page
{
	//get the page id from the loginUrl
	$start = '5B';
	$first = strstr($string, $start);
	$second = strstr($first, '%');
	$findmeag='%';
	//we now need first occurance of %
	$pos = strpos($first, $findmeag);
	$repl =  substr_replace($first,'',$pos);
	$final = substr_replace($repl,'',0, 2);			


	// Run fql query to get the page name if it exists
	$fql_query_url = "https://graph.facebook.com/method/fql?q=SELECT+name+FROM+page+WHERE+page_id=".$final."";
	$fql_query_result = file_get_contents($fql_query_url);
	$fql_query_obj = json_decode($fql_query_result, true);
	  
	$page_data = $fql_query_obj['data'];
	
	if ($page_data) //The page has a name so redirect using it
	{
		$page_data_index = $page_data['0'];	  
	  	$page_name = $page_data_index['name'];	  
		
		$redirect_url = "https://facebook.com/pages/".$page_name."/".$final."?sk=app_".$app_id."";
		echo "<script>top.location.href=\"".$redirect_url."\"</script>";	
	}
	else //The page has no name or the page is unpublished and the name is unavailable so use the Facebook "page_name" universal instead
	{
		$redirect_url = "https://facebook.com/pages/page_name/".$final."?sk=app_".$app_id."";
		echo "<script>top.location.href=\"".$redirect_url."\"</script>";
	}
	  	    
}
else //Prompt the user to add the app to their page
{
      ?>
      <section id="bg">
        <h1><?php echo $this->lang->line('common_my_app'); ?></h1>
	<p><?php echo $this->lang->line('common_app_description'); ?></p>	
	<form name="add" method="post" action="<?php echo "https://www.facebook.com/dialog/pagetab?app_id=".$app_id."&display=page&redirect_uri=".$app_url."";?>" target="_top">	   
	   <input type="submit" id="welcome" name="submit" value="<?php echo $this->lang->line('common_add_app_to_page');?>">
	</form>
      </section>
      <?php		   	 
}

echo $this->load->view('tab/partial/footercanvas');