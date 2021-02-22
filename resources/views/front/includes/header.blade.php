<div class="mobile-menu-icon mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
@if(Request::is('/'))
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<div class="logo">
					<a href="{{route('/')}}"><span style="display: inline-block;color: #ec1827;font-weight: bold;font-size: 24px;">Good Firmz</span></a>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
				<div class="navigation">
					<ul>
						@if(Auth::guard('web')->check())
							<li>
								<a href="{{route('my-account')}}">My Account</a>
							</li>
						@else
							<li>
								<a href="{{route('login')}}">Login</a>	
								<span>|</span> 
								<a href="{{route('register')}}">Register</a>
							</li>
						@endif
						<li class="list-business"><a class="btn-business" href="{{route('list-your-business')}}">List your Business</a></li>
					</ul>					
				</div>				
			</div>
		</div>
	</div>
</header>
@else
<header class="header layout-2-header">
	<div class="container">
		<div class="mobile-search-icon"><i class="fa fa-search" aria-hidden="true"></i> </div>
		<div class="mobile-menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></div>
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
					<a href="{{route('/')}}"><img src="{{asset('front/images/logo.png')}}"></a>
				</div>
			</div>
			<div class="col-md-5">
				<form class="header-form"  method="GET" action="{{route('search')}}">
					{{@csrf_field()}}

					<div class="header_form_group">	
						<input class="search-keyword"  autocomplete="off"  type="text" placeholder="Search by business or keyword"  name="keyword" value="{{ app('request')->input('keyword') }}">					
						<span class="input-section">
							<input type="Location" placeholder="Location" id="locationInput" autocomplete="off" name="location" value="{{ app('request')->input('location') }}">
						</span>	
					</div>
					 <input class="btn-search" type="submit" value="Search">
				</form>
			</div>
			<div class="col-md-4">
				<div class="navigation nav-bar">
					<ul>
						@if(Auth::guard('web')->check())
							<li>
								<a href="{{route('my-account')}}">My Account</a>
							</li>
						@else
						<li>
							<a href="{{route('login')}}">Login</a>
							<span>|</span>
							<a href="{{route('register')}}">Register</a>
						</li>
						@endif
						<li class="list-business"><a class="btn-business" href="{{route('list-your-business')}}">List your Business</a></li>
					</ul>
				</div>	
			</div>			
		</div>	
	</div>
</header>
@endif
<div class="b2bseeker-modal b2b_modal_wrapper">
	<div class="send-enquiry">
		<div class="b2b_modal_content">
			<form class="send-enquiry-form" method="PUT" action="javascript:;">
				<a class="close-icon" href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>
				<h4>Send enquiry to</h4>
				<h3 id="modal-company-name"></h3>
				<div class="row">
					<div class="col-md-12">
						<div id="enquiry-errors"><p>The name field is required.</p><p>The email field is required.</p><p>The phone number field is required.</p><p>The company name field is required.</p><p>The pincode field is required.</p><p>The content field is required.</p></div>
						<input type="text" class="required" placeholder="Name*" autocomplete="off" name="name">
					</div>
					<div class="col-md-12">
						<input type="Email"  class="required" placeholder="Email*" autocomplete="off" name="email">
					</div>
					<div class="col-md-12">
						<input type="tel-no"  class="required" placeholder="Phone*" autocomplete="off" name="phone_number">
					</div>
					<div class="col-md-12">
						<input type="text"  class="required" placeholder="Company Name*" autocomplete="off" name="company_name">
					</div>
					<div class="col-md-12">
						<input type="text"  class="required" placeholder="Zipcode*" autocomplete="off" name="pincode">
					</div>
					<div class="col-md-12">
						<textarea placeholder="Requirement Details* "  class="required" name="content"></textarea>
					</div>
					<div class="col-md-12">
						  <input class="submit-enquiry modal-submit-enquiry-btn" type="submit" value="Submit enquiry">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="b2bseeker-login-modal b2b_modal_wrapper">
	<div class="send-enquiry">
		<div class="b2b_modal_content">
			<form class="send-enquiry-form">
				<a class="close-icon" href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>
				<h3 id="modal-company-name"></h3>
				<h4>Please Login</h4>
			</form>
		</div>
	</div>
</div>