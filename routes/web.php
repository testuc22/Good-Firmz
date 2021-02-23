<?php


use Illuminate\Support\Facades\Route;

/*************Admin routes starts here *************/

Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::name('admin-login')->get('admin-login',[App\Http\Controllers\Admin\AdminController::class,'getAdminLoginPage']);
	Route::name('do-admin-login')->post('do-admin-login',[App\Http\Controllers\Admin\AdminController::class,'doAdminLogin']);
	Route::name('admin-dashboard')->get('admin-dashboard',[App\Http\Controllers\Admin\AdminController::class,'getAdminDashboard']);
	Route::name('admin-logout')->get('admin-logout',[App\Http\Controllers\Admin\AdminController::class,'doAdminLogout']);

	/*-------------------Category Controllers starts ------------------*/

	Route::name('add-category')->get('add-category',[App\Http\Controllers\Admin\CategoryController::class,'getAddCategoryPage']);
	Route::name('create-category')->post('create-category',[App\Http\Controllers\Admin\CategoryController::class,'addCategory']);
	Route::name('list-categories')->get('list-categories',[App\Http\Controllers\Admin\CategoryController::class,'listCategories']);
	Route::name('edit-category')->get('edit-category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'getEditCategoryPage']);
	Route::name('update-status')->put('update-status',[App\Http\Controllers\Admin\CategoryController::class,'UpdateCategoryStatus']);
	Route::name('update-category')->put('update-category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'updateCategory']);
	Route::name('delete-category')->get('delete-category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'deleteCategory']);
	Route::name('import-categories')->post('import-categories',[App\Http\Controllers\Admin\ImportExportController::class,'importCategories']);
	Route::name('export-categories')->get('export-categories',[App\Http\Controllers\Admin\ImportExportController::class,'exportCategories']);

	Route::name('list-child-categories')->get('list-child-categories/{id}',[App\Http\Controllers\Admin\CategoryController::class,'listChildCategories']);
	

	/*-------------------Category Controllers ends ------------------*/

	/*-------------------Sellers Controllers starts ------------------*/
	Route::name('list-sellers')->get('list-sellers',[App\Http\Controllers\Admin\AdminSellersController::class,'index']);
	Route::name('update-seller-status')->put('update-seller-status',[App\Http\Controllers\Admin\AdminSellersController::class,'updateStatus']);
	Route::name('add-seller')->get('add-seller',[App\Http\Controllers\Admin\AdminSellersController::class,'add_seller']);
	Route::name('save-seller')->post('save-seller',[App\Http\Controllers\Admin\AdminSellersController::class,'save_seller']);
	Route::name('edit-seller')->get('edit-seller/{id}',[App\Http\Controllers\Admin\AdminSellersController::class,'edit_seller']);
	Route::name('update-seller')->put('update-seller/{id}',[App\Http\Controllers\Admin\AdminSellersController::class,'update_seller']);
	
	Route::name('delete-seller')->get('delete-seller/{id}',[App\Http\Controllers\Admin\AdminSellersController::class,'delete_seller']);
	Route::name('add-user-business')->get('add-user-business/{userid}',[App\Http\Controllers\Admin\AdminSellersController::class,'add_seller']);
	/*-------------------Sellers Controllers ends ------------------*/


	/*-------------------Products Controllers starts ------------------*/
	Route::name('list-products')->get('list-products',[App\Http\Controllers\Admin\ProductController::class,'index']);
	Route::name('update-product-status')->put('update-product-status',[App\Http\Controllers\Admin\ProductController::class,'updateStatus']);
	Route::name('add-product')->get('add-product',[App\Http\Controllers\Admin\ProductController::class,'add_product']);
	/*-------------------Products Controllers ends ------------------*/



	/*-------------------Users Controllers starts ------------------*/
	Route::name('list-users')->get('list-users',[App\Http\Controllers\Admin\UsersController::class,'index']);
	Route::name('update-user-status')->put('update-user-status',[App\Http\Controllers\Admin\UsersController::class,'updateStatus']);
	Route::name('delete-user')->get('delete-user/{id}',[App\Http\Controllers\Admin\UsersController::class,'delete_user']);
	Route::name('add-user')->get('add-user',[App\Http\Controllers\Admin\UsersController::class,'add_user']);

	Route::name('save-user')->post('save-user',[App\Http\Controllers\Admin\UsersController::class,'save_user']);
	Route::name('view-user-business')->get('view-user-business/{id}',[App\Http\Controllers\Admin\UsersController::class,'view_business']);

	Route::name('edit-user')->get('edit-user/{id}',[App\Http\Controllers\Admin\UsersController::class,'edit_user']);
	Route::name('admin-update-user')->post('admin-update-user/{id}',[App\Http\Controllers\Admin\UsersController::class,'update_user']);
	Route::name('verify')->get('/verify/{token}', [App\Http\Controllers\Admin\UsersController::class,'verifyEmail']);

	/*-------------------Users Controllers ends ------------------*/

	/*-------------------Settings Controllers starts ------------------*/
	Route::name('settings')->get('settings',[App\Http\Controllers\Admin\SettingsController::class,'index']);
	Route::name('save-home-settings')->post('save-home-settings',[App\Http\Controllers\Admin\SettingsController::class,'save_home_page_settings']);
	Route::name('settings-home-banner')->get('settings-home-banner',[App\Http\Controllers\Admin\SettingsController::class,'home_page_banner']);
	Route::name('add-banner')->get('add-banner',[App\Http\Controllers\Admin\SettingsController::class,'add_banner']);
	Route::name('save-banner')->post('save-banner',[App\Http\Controllers\Admin\SettingsController::class,'save_banner']);

	Route::name('update-banner-status')->put('update-banner-status',[App\Http\Controllers\Admin\SettingsController::class,'update_banner_status']);

	Route::name('delete-banner')->get('delete-banner/{id}',[App\Http\Controllers\Admin\SettingsController::class,'delete_banner']);



	/*-------------------Settings Controllers ends ------------------*/

	/*-------------------Reviews Controllers starts ------------------*/
	
	Route::name('list-reviews')->get('list-reviews',[App\Http\Controllers\Admin\ReviewsController::class,'list_reviews']);
	Route::name('update-review-status')->put('update-review-status',[App\Http\Controllers\Admin\ReviewsController::class,'updateStatus']);
	Route::name('delete-review')->get('delete-review/{id}',[App\Http\Controllers\Admin\ReviewsController::class,'delete_review']);
	/*-------------------Reviews Controllers ends ------------------*/
	/*-------------------Pages Controllers starts ------------------*/
	Route::name('list-pages')->get('list-pages',[App\Http\Controllers\PagesController::class,'list_pages']);
	Route::name('add-page')->get('add-page',[App\Http\Controllers\PagesController::class,'add_page']);

	Route::name('save-page')->post('save-page',[App\Http\Controllers\PagesController::class,'save_page']);
	Route::name('edit-page')->get('edit-page/{id}',[App\Http\Controllers\PagesController::class,'edit_page']);
	Route::name('update-page')->post('update-page/{id}',[App\Http\Controllers\PagesController::class,'update_page']);
	Route::name('delete-page')->get('delete-page/{id}',[App\Http\Controllers\PagesController::class,'delete_page']);
	Route::name('update-page-status')->put('update-page-status',[App\Http\Controllers\PagesController::class,'change_page_status']);

	Route::name('list-contactus')->get('list-contactus',[App\Http\Controllers\Admin\ContactUsController::class,'list_contactus']);
	/*-------------------Pages Controllers ends ------------------*/

	/*-------------------States Controllers starts ------------------*/
	Route::name('list-states')->get('list-states',[App\Http\Controllers\StatesController::class,'list_states']);
	Route::name('add-state')->get('add-state',[App\Http\Controllers\StatesController::class,'add_state']);

	Route::name('save-state')->post('save-state',[App\Http\Controllers\StatesController::class,'save_state']);
	Route::name('edit-state')->get('edit-state/{id}',[App\Http\Controllers\StatesController::class,'edit_state']);
	Route::name('update-state')->put('update-state/{id}',[App\Http\Controllers\StatesController::class,'update_state']);
	Route::name('delete-state')->get('delete-state/{id}',[App\Http\Controllers\StatesController::class,'delete_state']);
	Route::name('update-state-status')->put('update-state-status',[App\Http\Controllers\StatesController::class,'change_state_status']);
	/*-------------------States Controllers ends ------------------*/

	/*-------------------Cities Controllers starts ------------------*/
	Route::name('list-cities')->get('list-cities',[App\Http\Controllers\CitiesController::class,'list_cities']);
	Route::name('add-city')->get('add-city',[App\Http\Controllers\CitiesController::class,'add_city']);

	Route::name('save-city')->post('save-city',[App\Http\Controllers\CitiesController::class,'save_city']);
	Route::name('edit-city')->get('edit-city/{id}',[App\Http\Controllers\CitiesController::class,'edit_city']);
	Route::name('update-city')->put('update-city/{id}',[App\Http\Controllers\CitiesController::class,'update_city']);
	Route::name('delete-city')->get('delete-city/{id}',[App\Http\Controllers\CitiesController::class,'delete_city']);
	Route::name('update-city-status')->put('update-city-status',[App\Http\Controllers\CitiesController::class,'change_city_status']);

	Route::name('get-cities-by-state')->put('get-cities-by-state',[App\Http\Controllers\CitiesController::class,'get_cities_by_state']);
	/*-------------------Cities Controllers ends ------------------*/

	/*-------------------Leads Controllers starts ------------------*/
	Route::name('list-leads')->get('list-leads',[App\Http\Controllers\Admin\LeadsController::class,'list_leads']);
	/*-------------------Leads Controllers ends ------------------*/





});

/*************Admin routes ends here *************/

/*************front routes starts here *************/

Route::namespace('Front')->group(function(){

	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
	Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
	Route::get('/single-product', [App\Http\Controllers\HomeController::class, 'singleProduct'])->name('single-product');
	Route::get('/sign-up', [App\Http\Controllers\HomeController::class, 'signUp'])->name('sign-up');


	/*-------------------Login and register ------------------*/
	Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
	Route::post('check-login', [App\Http\Controllers\LoginController::class, 'check_login'])->name('check-login');

	Route::get('forget-password', [App\Http\Controllers\LoginController::class, 'forgetPassword'])->name('forget-password');
	Route::post('send-reset-password-link', [App\Http\Controllers\LoginController::class, 'send_reset_password_link'])->name('send-reset-password-link');

	Route::get('/reset-password/{token}', [App\Http\Controllers\LoginController::class, 'reset_password_form'])->name('password.reset');


	Route::get('register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
	Route::post('register-user', [App\Http\Controllers\LoginController::class, 'register_user'])->name('register-user');
	Route::get('verify-otp', [App\Http\Controllers\LoginController::class, 'verify_otp'])->name('verify-otp');
	Route::post('check-user-otp', [App\Http\Controllers\LoginController::class, 'check_user_otp'])->name('check-user-otp');
	Route::get('my-account', [App\Http\Controllers\MyAccountController::class, 'index'])->name('my-account');

	Route::get('user-logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('user-logout');
	
	Route::post('update-user', [App\Http\Controllers\MyAccountController::class, 'update_user'])->name('update-user');

	Route::post('update-password', [App\Http\Controllers\MyAccountController::class, 'update_password'])->name('update-password');
	/*-------------------Login and register ------------------*/

	/*-------------------List Business ------------------*/
	Route::get('list-your-business', [App\Http\Controllers\SellersController::class, 'list_your_business'])->name('list-your-business');

	Route::post('create-business', [App\Http\Controllers\SellersController::class, 'create_business'])->name('create-business');

	Route::get('user-business-details', [App\Http\Controllers\SellersController::class, 'user_business_details'])->name('user-business-details');

	Route::get('edit-business/{slug}', [App\Http\Controllers\SellersController::class, 'edit_business'])->name('edit-business');

	Route::name('update-business')->put('update-business/{id}',[App\Http\Controllers\SellersController::class,'update_business']);

	Route::get('remove-business/{slug}', [App\Http\Controllers\SellersController::class, 'remove_business'])->name('remove-business');
	
	
	
	/*-------------------List Business ------------------*/


	/*-------------------Search ------------------*/
	Route::get('search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

	
	/*-------------------Search ------------------*/

	/*-------------------Reviews  ------------------*/

	Route::post('submit-review', [App\Http\Controllers\ReviewsController::class, 'submit_review'])->name('submit-review');

	Route::get('all-reviews/{slug}', [App\Http\Controllers\ReviewsController::class, 'seller_reviews'])->name('all-reviews');

	Route::get('business-reviews', [App\Http\Controllers\ReviewsController::class, 'user_business_reviews'])->name('business-reviews');

	Route::name('delete-business-review')->get('delete-business-review/{id}',[App\Http\Controllers\ReviewsController::class,'delete_business_review']);

	
	
	/*-------------------Reviews ------------------*/


	/*-------------------Static Pages  ------------------*/

	Route::get('page/{page}', [App\Http\Controllers\PagesController::class, 'get_page_content'])->name('page');

	Route::post('send-contactus-enquiry', [App\Http\Controllers\PagesController::class, 'submit_contactus'])->name('send-contactus-enquiry');
	
	
	/*-------------------Static Pages ------------------*/

	Route::get('all-categories', [App\Http\Controllers\CategoryController::class, 'all_categories'])->name('all-categories');

	Route::get('all-listings/{category?}', [App\Http\Controllers\SellersController::class, 'all_listings'])->name('all-listings');

	Route::get('listing-details/{slug}', [App\Http\Controllers\SellersController::class, 'listing_details'])->name('listing-details');


	Route::post('all-locations-for-search', [App\Http\Controllers\StatesController::class, 'all_locations_for_search'])->name('all-locations-for-search');

	Route::name('submit-enquiry')->put('submit-enquiry',[App\Http\Controllers\LeadsController::class,'submit_enquiry']);
});




/*************front routes ends here *************/


Route::get('/mailable', function () {
    return new App\Mail\SendOtp("123123");
});