AppIgniter Copyright 2012 Marina Ibrishimova and Byron Matus
 
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

AppIgniter is a framework for Facebook apps that is built with CodeIgniter. It is designed to make it easy to quickly set up and build a Facebook app.  It features pre-integration with the Facebook php-sdk, built-in user authentication, pre-integration with htmlPurifier, quick and easy setup.

If you are not familiar with Codeigniter, you might want to check out the basics first before working with AppIgniter:
* [CodeIgniter User Guide](http://codeigniter.com/user_guide/)

Check out our [Project Page](https://ibrius.github.com/AppIgniter)

There are two types of Facebook apps that you can build with AppIgniter: *Tab Apps for Facebook Pages* and *Apps on Facebook*, often called *Canvas Apps*.
   
The *Page Tab App* is actually two apps in one and has different user cases. It is both a *canvas* app and a *page tab* app.  The canvas app resides at apps.facebook.com/App-Namespace and is basically an installer for the page tab app.  With AppIgniter, a user visits the canvas app and is prompted to accept the permissions and then add the app to one or more of their pages.  After adding the app, they are redirected to the app on the last page they added it to. If this sounds confusing, it will make sense the first time you go through the steps.

Once the tab app is installed on a page, it can be viewed there by logged in Facebook users. Here, there are two different kinds of logged in users that AppIgniter checks for.  One is the public user.  The other is the page admin user. Page admins are displayed a *backend* or *admin* view where they can update the content or change the options of their app.  Public users are displayed the *frontend* or *public* view that displays the information added by the admin user without the ability to edit or change it.

### Installing
First, you will have to create an app on Facebook. 

There is a great tutorial here: 
https://developers.facebook.com/docs/appsonfacebook/tutorial/


#### Facebook Setup
**App on Facebook**:  
Your settings under this section should look like this:
- **Canvas URL:** ```http:YourDomain.com/AppIgniter/public/```    
- **Secure Canvas URL:** ```https:YourDomain.com/AppIgniter/public/```

**Page Tab**:  
Your settings under this section should look like this:
- **Page Tab Name:** ```Your App Name```
- **Page Tab URL:** ```http:YourDomain.com/AppIgniter/public/index.php/tab```   
- **Secure Page Tab URL:** ```https:YourDomain.com/AppIgniter/public/index.php/tab```   
- **Page Tab Edit URL:** ```https:YourDomain.com/AppIgniter/public/index.php/tab```

**Make sure that you setup permissions for your Facebook app under Auth Dialog settings or it will not work!**


#### Server Setup
**Step 1**   
Make sure that your server has the version of PHP required by CodeIgniter: 
[Check Required Version Here](http://codeigniter.com/user_guide/general/requirements.html)

If you want to create a Page Tab, skip to step 2. 

If you want to create a general App on Facebook, open *applications/config/routes.php* and change the default controller on line 42 from "tab_canvas" to "canvas" so that it looks like this:
```php
41 //Set the default to "canvas" if you will not use your app as a tab for Facebook pages but just an app on Facebook
42 $route['default_controller'] = "canvas"; 
43 $route['404_override'] = '';
```

**Step 2**   
Unarchive the zip file in your public html folder.

**Step 3**   
Add your Facebook app information to the facebook config file at *application/config/facebook.php*
```php
$config = array(
	'appId'  => 'YOUR_APP_ID',
	'secret' => 'YOUR_APP_SECRET',
	'url' => 'https://apps.facebook.com/YOUR_APP_NAMESPACE/', //With trailing slash / . Only needed for tab apps
	'fileUpload' => false, // Indicates if the CURL based @ syntax for file uploads is enabled.
	);
```
You can also setup what user data you want to request from Facebook when someone uses the app:
```php
$config['user_objects'] = array(
				'id'  => 'id',
				'name' => 'name',
				'link' => '',
				'first_name' => '',
				'middle_name' => '',
				'last_name' => '',
				'gender' => '',
				'locale' => '',
				'timezone' => '',
				'username' => '',
				'cover' => '',
				'picture' => '',
				etc.....
```

**Step 4**   
Add your database settings near the bottom of the file in application/config/database.php
```php
$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'your_db_username';
$db['default']['password'] = 'your_db_password';
$db['default']['database'] = 'your_db_name';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
```

**Step 5**   
Import the database_example.sql file using phpMyAdmin or create a database with the same structure using your favorite method.

**Step 6**   
Go to apps.facebook.com/YOUR-APP-NAMESPACE, test it out, celebrate, and then start customizing.

Some examples of apps built using AppIgniter can be found at [Ibrius](https://ibrius.net)

Any feedback, questions, or contributions are welcome.

We can be reached at admin@ibrius.net