FB Frapp Copyright 2012 Marina Ibrishimova and Byron Matus
 
 This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
-----------------------------------------------------------------------------------------------------------------------

If you are not familiar with Codeigniter, you might want to check out the basics first before working with FB Frapp:
http://codeigniter.com/user_guide/

This is basically an app skeleton that can be used as a Facebook "tab" for pages/timelines or as just "an app on Facebook".  

To switch from one or the other, just change your default controller in application/config/routes.php to either tab_canvas or just canvas.

The "tab" version, checks for a logged-in Facebook user, asks them to add the app to their page, and then redirects them to the app on their page.  After it has been installed on a page, there are two main cases: admin user and non-admin user.  Admin users see a "backend" view where they can edit/update their app and non-admin users will just see the public view without the ability to edit or change anything (of course you could easily allow them to if you like).

To install this on your server as it is, you just need to put the files in your web root and change your Facebook app settings to point the canvas to yourdomain.com/public and the tab to yourdomain.com/public/index.php/tab, and then add your app information to the config array at the top of application/models/facebook_model.php.  For security reasons, it is recommended that you put the Codeigniter application and system folders below the webroot and edit their location in public/index.php.

Also, you will need to set-up your database with the same tables as in database_example.sql and add your database username, password, etc. to application/config/database.php.

We will add more detailed instructions and information to the wiki on GitHub and eventually we will get around to making a project site for it.

Some examples of apps built using this can be found here: htps://ibrius.net

Any feedback or contributions are welcome.

We can be reached at 