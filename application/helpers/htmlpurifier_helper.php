<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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

function html_purify($dirty_html)
{

     if (is_array($dirty_html))
    {
        foreach ($dirty_html as $key => $val)
        {
            $dirty_html[$key] = purify($val);
        }

        return $dirty_html;
    }

    if (trim($dirty_html) === '')
    {
        return $dirty_html;
    }

    require_once(APPPATH."helpers/htmlpurifier-4.4.0/library/HTMLPurifier.auto.php"); 
    require_once(APPPATH."helpers/htmlpurifier-4.4.0/library/HTMLPurifier.func.php");

    $config = HTMLPurifier_Config::createDefault();    
    
    return HTMLPurifier($dirty_html, $config);

}
?> 