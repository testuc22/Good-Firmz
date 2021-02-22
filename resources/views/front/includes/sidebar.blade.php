<div class="col-lg-4 col-md-6">
	<div class="nav-item">
		<ul>
			<li class="@if(Request::routeIs('user-business-details') OR Request::routeIs('edit-business')) active @endif">
				<a href="{{route('user-business-details')}}">Business</a>
			</li>
			<li  class="@if(Request::routeIs('business-reviews')) active @endif">
				<a href="{{route('business-reviews')}}">Reviews</a>
			</li>
			<li class="@if(Request::routeIs('my-account')) active @endif">
				<a href="{{route('my-account')}}">Profile</a>
			</li>
			<li>
				<a href="{{route('user-logout')}}">Logout</a>
			</li>
		</ul>
	</div>
</div>