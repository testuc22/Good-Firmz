<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-item">
					<h4>Links</h4>
					<ul>
						<li><a href="{{route('/')}}">Home </a></li>						
						<li><a href="{{route('page','advertise-with-us')}}">Advertise With Us</a></li>
						<li><a href="{{route('all-categories')}}">Categories </a></li>
						<li><a href="{{route('page','about-us')}}">About us </a></li>
						<li><a href="{{route('all-listings')}}">Listing</a></li>
						<li><a href="{{route('page','privacy-policy')}}">Privacy Policy</a></li>
						<li><a href="{{route('page','contact-us')}}">Contact </a></li>
						<li><a href="{{route('page','disclaimer')}}">Disclaimer </a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-item">
					<h4>categories</h4>
					<ul>
						<li><a href="#">Restaurants </a></li>
						<li><a href="#">Doctors </a></li>
						<li><a href="#">Dentist </a></li>
						<li><a href="#">Mechanics </a></li>
						<li><a href="#">Education </a></li>
						<li><a href="#">Health </a></li>
						<li><a href="#">Plumber </a></li>
						<li><a href="#">Beauty Saloon </a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-item">
					<h4>contact Info</h4>
					<p>PHONE: <a href="tel:+91-12345-67890">+91-12345-67890</a></p>
					<p class="email-address">EMAIL: <a href="mailto:"> contact@b2bseeker.com</a></p>
					<p>ADDRESS: Ludhiana, Punjab</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-item social-media">
					<h4>Follow us on</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
						<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>
						<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="copyright">
	<div class="container">
		<p>&copy; {{ now()->year }} Good Firmz - All Rights Reserved. </p>
	</div>
</div>
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">
	var get_all_locations_for_search = '{{route('all-locations-for-search')}}';
	var submit_enquiry_route = '{{route('submit-enquiry')}}';
	var cities_by_seller = '{{route('get-cities-by-state')}}';
</script>