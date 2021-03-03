<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="#" class="brand-link">
			<span class="brand-text font-weight-light">Admin Dashboard</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="info">
					<a href="{{route('/')}}" class="d-block" target="_blank">Visit Site</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">	
					<li class="nav-item">
						<a href="{{route('admin-dashboard')}}" class="nav-link @if(Request::routeIs('admin-dashboard')) active @endif">
							<i class="fa fa-home nav-icon"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('list-categories')}}" class="nav-link @if(Request::is('*category*') OR Request::is('*categories*')) active @endif">
							<i class="far fa-circle nav-icon"></i>
							<p>Categories</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('list-users')}}" class="nav-link  @if(Request::is('*user*')) active @endif">
							<i class="fa fa-users nav-icon"></i>
							<p>Users</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('list-sellers')}}" class="nav-link  @if(Request::is('*seller*')) active @endif">
							<i class="fa fa-users nav-icon"></i>
							<p>Sellers</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('list-products')}}" class="nav-link  @if(Request::is('*product*')) active @endif">
							<i class="fa fa-list nav-icon"></i>
							<p>Products</p>
						</a>
					</li>
					{{--<li class="nav-item">
						<a href="{{route('list-reviews')}}" class="nav-link  @if(Request::is('*review*')) active @endif">
							<i class="fa fa-list nav-icon"></i>
							<p>Reviews</p>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="{{route('list-pages')}}" class="nav-link  @if(Request::is('*page*')) active @endif">
							<i class="fa fa-list nav-icon"></i>
							<p>Pages</p>
						</a>
					</li>--}}
					<li class="nav-item">
						<a href="{{route('list-states')}}" class="nav-link  @if(Request::is('*state*')) active @endif">
							<i class="fa fa-globe nav-icon" aria-hidden="true"></i>
							<p>States</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('list-cities')}}" class="nav-link  @if(Request::is('*city*') OR Request::is('*cities*')) active @endif">
							<i class="fa fa-globe nav-icon" aria-hidden="true"></i>
							<p>Cities</p>
						</a>
					</li>
					{{--<li class="nav-item">
						<a href="{{route('list-leads')}}" class="nav-link  @if(Request::is('*lead*') ) active @endif">
							<i class="fa fa-paper-plane nav-icon" aria-hidden="true"></i>
							<p>Leads</p>
						</a>
					</li>--}}
					{{--<li class="nav-item">
						<a href="{{route('list-contactus')}}" class="nav-link  @if(Request::is('*contact*') ) active @endif">
							<i class="fa fa-envelope nav-icon" aria-hidden="true"></i>
							<p>Contact Us</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('settings')}}" class="nav-link  @if(Request::is('*setting*')) active @endif">
							<i class="fa fa-cog nav-icon" aria-hidden="true"></i>
							<p>Settings</p>
						</a>
					</li>
					 <li class="nav-item has-treeview">
			            <a href="#" class="nav-link">
			              	<i class="nav-icon fas fa-copy"></i>
			             	 <p>
				                Layout Options
				                <i class="fas fa-angle-left right"></i>
			              	</p>
			            </a>
			            <ul class="nav nav-treeview">
			              	<li class="nav-item">
				                <a href="#" class="nav-link">
				                  	<i class="far fa-circle nav-icon"></i>
				                  	<p>Top Navigation</p>
				                </a>
		             	 	</li>
			            </ul>
          			</li> --}}
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>