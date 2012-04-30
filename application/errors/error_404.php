<!DOCTYPE html> 
<head> 
  <title>Ibrius Web Solutions</title> 
  <meta charset="utf-8"> 
  <link rel="stylesheet" href="https://ibrius.net/css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://ibrius.net/css/jquery-ui-1.8.10.custom.css">
  <link rel="stylesheet" href="https://ibrius.net/css/prettyPhoto.css" type="text/css" media="screen" >  
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script type="text/javascript" src="https://ibrius.net/js/jquery-ui-1.8.10.custom.min.js"></script>
  <script src="https://ibrius.net/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  
</head>

<body>

<header>
  <div id="header">
    <div id="logo">      
      <a href="#security-info" data-gal="prettyPhoto" class="security-logo"><img src="https://ibrius.net/2011/images/spacer.png" title="secure" alt="Website Secure" /></a><br />	
      <div class="clear"></div>
      <h4>- inspired web solutions -</h4>
      <div class="clear"></div>
      <h3>integrity - quality - security</h3>
    </div>
  </div>
</header>

<div id="content-bg">
  <nav>
  <div id="nav">
        <a href="https://ibrius.net">About</a>
        <a href="https://ibrius.net/projects.php">Projects</a>
        <a href="https://ibrius.net/services.php">Services</a>
        <a href="https://ibrius.net/contact.php">Contact</a>
        
    <!--<form id="search">
      <input 
      id="search-input" type="text" name="search" accesskey="s" value="Search..." 
      onclick = "if (this.value == 'Search...') {this.value = '';this.style.color='#000000'}"
      onblur = "if (this.value == '') {this.value = 'Search...';this.style.color='#bdc1c2'}" />
    </form>-->
    <div id="nav-marker"></div>
    <div class="clear"></div>
  
  </div>  
  </nav>
  <div class="wrapper">
    <section class="content">
    <div class="right-content" >
      <h4>Integrity</h4>
      <p>
       <img src ="https://ibrius.net/images/integrity.png" alt="integrity" class="fleft"> In an era of spam, scams, and "buy now" marketing, Ibrius is bringing some integrity back to the web.        
      </p>
      <h4>Quality</h4>
      <p>
       <img src ="https://ibrius.net/images/quality.png" alt="quality" class="fleft"> Never settle for "good enough".  If we wouldn't put it under our name, then we won't put it under yours.
      </p>
      <h4>Security</h4>
      <p>
      <img src ="https://ibrius.net/images/security.png" alt="security" class="fleft">
        Overlooking security on the web can have dire consequences, which is why we make it our top priority for all projects.
      </p>
      
      <hr>
      
      </div>
    <div id="left-content">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
		
		 </div>     
     </section>  
      
  </div>
</div>

<div class="clear"></div>
<div id="footer-bg">
<footer>
  <div id="footer">
    <h4 class="footer-left">Web Development Services</h4>
    <div class="footer-content">
      <div class="footer-column">
        <a href="web-applications.php">Web Applications</a><br>
        <a href="mobile-web-development.php">Mobile Development</a><br>
      </div>
      <div class="footer-column">
        <a href="e-commerce-solutions.php">SaaS Point of Sale Software</a><br>
        <a href="internet-security.php">Security Consulting</a><br>
      </div>
      <div class="footer-column">
        <a href="online-marketing.php">Internet Marketing</a><br>
        <a href="seo.php">Search Engine Optimization</a><br>
      </div>
      <div class="footer-column, no-border">
        <a href="copywriting.php">Content Creation Solutions</a><br>
        <a href="web-design.php">Graphic Design</a><br>
      </div>
    </div>
    <div class="clear"></div>
    
    <div id="fb"><a href="https://www.facebook.com/pages/Ibrius-Web-Solutions/172730082780136"><img src="https://ibrius.net/images/facebook-button.png" alt="Facebook" title="Follow us on Facebook" /></a></div>
          
    <p id="copyright">
      Copyright &copy; Ibrius 2011<br />
      <a href="https://ibrius.net">About</a> | <a href="https://ibrius.net/projects.php">Projects</a> | <a href="https://ibrius.net/services.php">Services</a> | <a href="https://ibrius.net/contact.php">Contact</a>
    </p>
  </div>
</footer>
</div>
<script type="text/javascript">
		$(document).ready(function(){
			$("a[data-gal^='prettyPhoto']").prettyPhoto();
		});
	</script>
<div id="security-info" class="prettyPhotoInline">
		<a href="https://www.rapidssl.com" style="width:90px; margin:0 auto 0 auto;"><img src="https://ibrius.net/images/rapidssl.png" alt="Rapid SSL"/></a>
		<p>
		The identity of this website is verified with an SSL certificate and all data sent through this website is 
		encrypted using minimum 128 bit encryption.
		</p>
		<p>
		Also, the server where this website resides has been secured against potential hacker threats and is monitored and
		scanned on a daily basis to ensure that it contains no malicious code or software.
		</p>
	</div>
	
</body>
</html>