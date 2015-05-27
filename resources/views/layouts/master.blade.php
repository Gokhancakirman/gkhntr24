<!DOCTYPE html>
<html lang="en">
@yield('css')
<body>
@include('layouts/include/header')
	@yield('slider')
	@yield('content')
	<footer style="background-color:#EDB70B;margin:0;">
		<div class="container">
            <div class="row" style="border-bottom:1px solid #4D1B6F;">
                <div class="col-footer col-md-4 col-xs-6">
		    			<h3>Contact Us</h3>
		    			<p class="contact-us-details">
	        				<b>Address:</b> 123 Downtown Avenue, Manhattan, New York, United States of America<br>
	        				<b>Phone:</b> +1 123 45678910<br>
	        				<b>Fax:</b> +1 123 45678910<br>
	        				<b>Email:</b> <a href="mailto:info@yourcompanydomain.com">info@yourcompanydomain.com</a>
	        			</p>
		    		</div>
					<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Our Social Networks</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam.</p>
		    			<div>
		    				<img src="./icons/facebook.png" width="32" alt="Facebook">
		    				<img src="./icons/twitter.png" width="32" alt="Twitter">
		    				<img src="./icons/linkedin.png" width="32" alt="LinkedIn">
							<img src="./icons/rss.png" width="32" alt="RSS Feed">
						</div>
		    		</div>
					<div class="col-footer col-md-4 col-xs-6">
		    			<h3>About Our Company</h3>
		    				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
		    		</div>
					
            </div>
			<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">© 2015 Gökhan Çakırman tarafından yapılmıştır.</div>
		    		</div>
		    	</div>
		</div>	
        </footer>
		@yield('javascript')
		
		</body>
		</html>
