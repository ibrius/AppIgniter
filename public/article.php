<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"
      xmlns:fb="https://www.facebook.com/2008/fbml"> 
<head prefix="og: http://ogp.me/ns# fx-photo-editor: 
                  http://ogp.me/ns/apps/fx-photo-editor#">
  <title>OG Tutorial App</title>
  <meta property="fb:app_id" content="197340750399355" /> 
  <meta property="og:type" content="appigniter:app" /> 
  <meta property="og:title" content="OG Test" /> 
  <meta property="og:image" content="https://ibrius.net/0FX-Edit/public/mrn196749.jpg" /> 
  <meta property="og:description" content="Testy testy test." /> 
  <meta property="og:url" content="https://ibrius.net/AppIgniter/public/article.php">
</head>
<body>
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '197340750399355', // App ID
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });
    };

    // Load the SDK Asynchronously
    (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
  </script>

  <h3>Stuffed Cookies</h3>
  <p>
    <img title="Woohoo" 
         src="https://ibrius.net/0FX-Edit/public/mrn196749.jpg" 
         width="550"/>
  </p>
</body>
</html>