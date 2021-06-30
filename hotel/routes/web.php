<?php
 use App\Http\Controllers\homeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
    Route::get('/merchantList', 'AdminAuth\HomeController@getAllMerchant');
    Route::get('/supplierList', 'AdminAuth\HomeController@getAllSupplier');
    //Route::get('/home', 'AdminAuth\HomeController@adminDashboard');
    Route::get('/dashboard', 'AdminAuth\HomeController@adminDashboard');

    Route::get('/supplierView/{id}', 'AdminAuth\HomeController@SupplierSingleView');
    Route::get('/merchantView/{id}', 'AdminAuth\HomeController@MerchantSingleView');
    Route::post('/merchantDelete', 'AdminAuth\HomeController@statusChange');
    Route::post('/supplierDelete', 'AdminAuth\HomeController@statusChangeSupplier');

    //Hotels
    Route::group(['prefix' => 'hotel'], function () {
        Route::get('/hotelList', 'AdminAuth\HotelController@getHotelView');
        Route::get('/hotelView/{id}', 'AdminAuth\HotelController@getHotelSingleView');
        Route::get('/add_hotels_includes/{id}', 'AdminAuth\HotelController@AddHotelsIncludes');
        Route::get('/get_single_hotels_includes/{id}', 'AdminAuth\HotelController@getHotelSingleViewPage');
        Route::post('/submitHotelsIncludeCapacity', 'AdminAuth\HotelController@submitHotelsIncludeCapacity');
        Route::post('get_single_hotels_includes/include_hotel_edit_capacity', 'AdminAuth\HotelController@editFormHotelsIncludeCapacity');
        Route::post('get_single_hotels_includes/submit_include_hotel_edit_capacity', 'AdminAuth\HotelController@submitEditFormHotelsIncludeCapacity');
        Route::post('get_single_hotels_includes/admin_include_hotel_delete_capacity', 'AdminAuth\HotelController@deleteAdminHotelsIncludeCapacity');
        Route::get('/hotelEnquiryForm', 'AdminAuth\HotelController@AddHotelsEnquiry');
        /**/
        Route::get('/menu/{id}', 'AdminAuth\HotelController@getHotelSingleViewMenu');
        Route::post('submitIncludeMenu', 'AdminAuth\HotelController@submitIncludeMenu');
        Route::post('menu/editFormHotelsIncludeMenu', 'AdminAuth\HotelController@editFormHotelsIncludeMenu');
        Route::post('menu/submitFormHotelsIncludeMenu', 'AdminAuth\HotelController@submitFormHotelsIncludeMenu');
        Route::post('menu/deleteAdminHotelsIncludeMemu', 'AdminAuth\HotelController@deleteAdminHotelsIncludeMemu');
        /**/
        Route::post('/submit_hotels_include', 'AdminAuth\HotelController@submitHotelsInclude');
        Route::get('/getHotelSingleView', 'AdminAuth\HotelController@AddHotelsIncludes');
        Route::get('/add_hotels', 'AdminAuth\HotelController@addHotels');
        Route::post('/addHotelsData', 'AdminAuth\HotelController@addHotelsData');
        Route::get('/edit_hotel/{id}', 'AdminAuth\HotelController@getHotelEditForm');
        Route::post('/updateAddForm', 'AdminAuth\HotelController@updateAddForm');
        Route::get('/edit_hotel_include/{id}', 'AdminAuth\HotelController@getHotelEditFormInclude');
        Route::post('/updateHotelsInclude', 'AdminAuth\HotelController@updateHotelsInclude');
        //hotel Tab
        Route::get('/keyFact/{id}', 'AdminAuth\HotelController@getHotelSingleViewKey');
        Route::post('/submitKeyFact', 'AdminAuth\HotelController@addHotelKeyFactForm');
        Route::post('keyFact/edit_kf', 'AdminAuth\HotelController@kfEdit');
        Route::post('keyFact/save_edit_kf_modal', 'AdminAuth\HotelController@saveKfEdit');
        Route::get('/capacity/{id}', 'AdminAuth\HotelController@getHotelSingleViewCapacity');
        Route::post('/submitCapacity', 'AdminAuth\HotelController@addSubmitCapacity');
        Route::post('capacity/edit_capacity', 'AdminAuth\HotelController@capacityEdit');
        Route::post('capacity/save_edit_capacity', 'AdminAuth\HotelController@saveCapacityEdit');
        Route::get('/featured/{id}', 'AdminAuth\HotelController@getHotelSingleViewFeatured');
        Route::post('/submitFeatureForm', 'AdminAuth\HotelController@submitFeatureForm');
        Route::post('/editHotelsGalleryData', 'AdminAuth\HotelController@editHotelsGalleryData');
        Route::get('hotelView/delete/{id}', 'AdminAuth\HotelController@deleteHotelsGallery');
        Route::get('keyFact/delete/{id}', 'AdminAuth\HotelController@deleteHotelsGallery');
        Route::get('capacity/delete/{id}', 'AdminAuth\HotelController@deleteHotelsGallery');
        Route::get('featured/delete/{id}', 'AdminAuth\HotelController@deleteHotelsGallery');
    });

    //types attributes
    Route::group(['prefix' => 'type_attributes'], function () {
        Route::post('/add', 'AdminAuth\TypeAttributeController@addTypeAttribute');
        Route::get('/', 'AdminAuth\TypeAttributeController@viewAllTypeAttribute');
        Route::get('/edit/{id}', 'AdminAuth\TypeAttributeController@editTypeAttribute');
        Route::post('/update', 'AdminAuth\TypeAttributeController@updateTypeAttribute');
    });

    //capacity attributes
    Route::group(['prefix' => 'capacity_attributes'], function () {
        Route::post('/add', 'AdminAuth\CapacityAttributeController@addCapacityAttribute');
        Route::get('/', 'AdminAuth\CapacityAttributeController@viewAllCapacityAttribute');
        Route::get('/edit/{id}', 'AdminAuth\CapacityAttributeController@editCapacityAttribute');
        Route::post('/update', 'AdminAuth\CapacityAttributeController@updateCapacityAttribute');
    });

    //feature attributes
    Route::group(['prefix' => 'feature_attributes'], function () {
        Route::post('/add', 'AdminAuth\FeatureAttributeController@addFeatureAttribute');
        Route::get('/', 'AdminAuth\FeatureAttributeController@viewAllFeatureAttribute');
        Route::get('/edit/{id}', 'AdminAuth\FeatureAttributeController@editFeatureAttribute');
        Route::post('/update', 'AdminAuth\FeatureAttributeController@updateFeatureAttribute');
    });

    //key attributes
    Route::group(['prefix' => 'key_attributes'], function () {
        Route::post('/add', 'AdminAuth\KeyAttributeController@addKeyAttribute');
        Route::get('/', 'AdminAuth\KeyAttributeController@viewAllKeyAttribute');
        Route::get('/edit/{id}', 'AdminAuth\KeyAttributeController@editKeyAttribute');
        Route::post('/update', 'AdminAuth\KeyAttributeController@updateKeyAttribute');
    });

    //countries
    Route::group(['prefix' => 'countries'], function () {
        Route::post('/add', 'AdminAuth\CountryController@addCountry');
        Route::get('/', 'AdminAuth\CountryController@viewAllCountry');
        Route::get('/edit/{id}', 'AdminAuth\CountryController@editCountry');
        Route::post('/update', 'AdminAuth\CountryController@updateCountry');
    });

    //states
    Route::group(['prefix' => 'states'], function () {
        Route::post('/add', 'AdminAuth\StateController@addState');
        Route::get('/', 'AdminAuth\StateController@viewAllState');
        Route::get('/edit/{id}', 'AdminAuth\StateController@editState');
        Route::post('/update', 'AdminAuth\StateController@updateState');
    });

    //cities
    Route::group(['prefix' => 'cities'], function () {
        Route::post('/add', 'AdminAuth\CityController@addCity');
        Route::get('/', 'AdminAuth\CityController@viewAllCity');
        Route::get('/edit/{id}', 'AdminAuth\CityController@editCity');
        Route::post('/update', 'AdminAuth\CityController@updateCity');
    });

    //Event Type
    Route::group(['prefix' => 'event_type'], function () {
        Route::post('/add', 'AdminAuth\EventTypeController@addEventType');
        Route::get('/', 'AdminAuth\EventTypeController@viewAllEventType');
        Route::get('/edit/{id}', 'AdminAuth\EventTypeController@editEventType');
        Route::post('/update', 'AdminAuth\EventTypeController@updateEventType');

    });


    Route::group(['prefix' => 'facilities'], function () {
        Route::post('/add', 'AdminAuth\FacilityController@addFacilities');
        Route::get('/', 'AdminAuth\FacilityController@viewAllFacilities');
        Route::get('/edit/{id}', 'AdminAuth\FacilityController@editFacilities');
        Route::post('/update', 'AdminAuth\FacilityController@updateFacilities');

    });

    Route::group(['prefix' => 'supplier_type'], function () {
        Route::post('/add', 'AdminAuth\SupplierTypeController@addSupplierType');
        Route::get('/', 'AdminAuth\SupplierTypeController@viewAllSupplierType');
        Route::get('/edit/{id}', 'AdminAuth\SupplierTypeController@editSupplierType');
        Route::post('/update', 'AdminAuth\SupplierTypeController@updateSupplierType');

    });

});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/login', 'SupplierAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'SupplierAuth\LoginController@login');
    Route::post('/logout', 'SupplierAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'SupplierAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'SupplierAuth\RegisterController@register');

    Route::post('/password/email', 'SupplierAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'SupplierAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'SupplierAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'SupplierAuth\ResetPasswordController@showResetForm');
    Route::get('/supplierList', 'SupplierAuth\supplierListController@getAllSupplier');
    Route::get('/home', 'SupplierAuth\HomeController@supplierDashboard');
    Route::get('/hotelSupplierList', 'SupplierAuth\supplierListController@getSupplierList');
    Route::post('/addSuppliersData', 'SupplierAuth\supplierListController@addSupplierData');
    Route::get('/add_supplier', 'SupplierAuth\supplierListController@getSupplierAddForm');
    Route::get('/hotelSupplierView/{id}', 'SupplierAuth\supplierListController@getHotelSupplierView');
    Route::post('/featuredImageUpload', 'SupplierAuth\supplierListController@uploadFeaturedImage');
    Route::post('/bannerImageUpload', 'SupplierAuth\supplierListController@uploadBannerImage');
    Route::post('/galleryImageUpload', 'SupplierAuth\supplierListController@uploadGalleryImage');
    Route::get('/addSupplierProduct', 'SupplierAuth\supplierListController@getSupplierProduct');
    Route::get('/addnewSupplierProducts', 'SupplierAuth\supplierListController@addNewSupplierProducts');
    Route::get('/supplierProductView/{id}', 'SupplierAuth\supplierListController@getSupplierProductView');
    Route::get('/add_products', 'SupplierAuth\supplierListController@getProductsAddForm');
    Route::post('/addProductsData', 'SupplierAuth\supplierListController@addSupplierProductsData');
    Route::get('/supplierProductList', 'SupplierAuth\supplierListController@getSupplierProductList');
    Route::get('/edit_supplier_products/{id}', 'SupplierAuth\supplierListController@editSupplierProducts');
    Route::get('/delete_supplier_products/{id}', 'SupplierAuth\supplierListController@deleteSupplierProducts');
    Route::post('/addNewProducts', 'SupplierAuth\supplierListController@addNewSupplierProducts');
    Route::post('/addnewProductsData', 'SupplierAuth\supplierListController@addNewSupplierProductsData');
    Route::post('/productView', 'SupplierAuth\supplierListController@statusChange');
    Route::get('/image-gallery/{id}/{supplier_id}', 'SupplierAuth\supplierListController@imageDestroy');


});

Route::group(['prefix' => 'merchant'], function () {
    Route::get('/login', 'MerchantAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'MerchantAuth\LoginController@login');
    Route::post('/logout', 'MerchantAuth\LoginController@logout')->name('logout');

//    Route::get('/register', 'MerchantAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'MerchantAuth\RegisterController@register');

    Route::post('/password/email', 'MerchantAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'MerchantAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'MerchantAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'MerchantAuth\ResetPasswordController@showResetForm');
    Route::get('/merchantList', 'MerchantAuth\MerchantListController@getAllMerchant');
    Route::get('/hotelMerchantList', 'MerchantAuth\HotelController@getHotelList');
    Route::get('/hotelMerchantSingleView', 'MerchantAuth\HomeController@getHotelMerchantSingleView');
    Route::get('/dashboard', 'MerchantAuth\HomeController@merchantDashboard');

    Route::group(['prefix' => 'hotel'], function () {

        Route::get('/keyFactMerchant/{id}', 'MerchantAuth\HotelController@getHotelKeyMerchant');
        Route::post('/submitkeyFactMerchant', 'MerchantAuth\HotelController@submitHotelKeyMerchant');
        Route::post('hotelMerchantView/edit_kf_merchant', 'MerchantAuth\HotelController@kfEditMerchant');
        Route::post('hotelMerchantView/save_edit_kf_modal_merchant', 'MerchantAuth\HotelController@saveKfEditMerchant');
        /*menu merchant*/

        Route::get('/menuMerchant/{id}', 'MerchantAuth\HotelController@getHotelSingleViewMenu');
        Route::post('submitIncludeMenuMerchant', 'MerchantAuth\HotelController@submitIncludeMenuMerchant');
        Route::post('menuMerchant/editFormHotelsIncludeMenuMerchant', 'MerchantAuth\HotelController@editFormHotelsIncludeMenu');
        Route::post('menuMerchant/submitFormHotelsIncludeMenuMerchant', 'MerchantAuth\HotelController@submitFormHotelsIncludeMenu');
        Route::post('menuMerchant/deleteAdminHotelsIncludeMemuMerchant', 'MerchantAuth\HotelController@deleteAdminHotelsIncludeMemu');
        /*menu merchant*/
        Route::get('/capacityMerchant/{id}', 'MerchantAuth\HotelController@getHotelCapacityMerchant');
        Route::post('/submitcapacityMerchant', 'MerchantAuth\HotelController@submitHotelCapacityMerchant');
        Route::post('capacityMerchant/edit_capacity_merchant', 'MerchantAuth\HotelController@capacityEditMerchant');
        Route::post('capacityMerchant/save_edit_capacity_merchant', 'MerchantAuth\HotelController@saveCapacityEditMerchant');

        Route::get('/featuredMerchant/{id}', 'MerchantAuth\HotelController@getHotelfeaturedMerchant');
        Route::post('/submitfeaturedMerchant', 'MerchantAuth\HotelController@submitHotelfeaturedMerchant');

        Route::get('/add_hotel', 'MerchantAuth\HotelController@getHotelAddForm');
        Route::get('/edit_hotel_merchant', 'MerchantAuth\HotelController@getHotelMerchantAddForm');
        Route::get('/edit_hotel_include_merchant/{id}', 'MerchantAuth\HotelController@getHotelMerchantEditInclude');
        Route::post('/hotelView', 'MerchantAuth\HotelController@statusChange');
        Route::post('/updateHotelsIncludeMerchant', 'MerchantAuth\HotelController@updateHotelsIncludeMerchant');

        Route::post('/addHotelsMerchantData', 'MerchantAuth\HotelController@addHotelData');
		
	//	Route::get('/addHotelsMerchantData', 'MerchantAuth\HotelController@addHotelData');
		 
		 
        Route::post('/featuredImageUpload', 'MerchantAuth\HotelController@uploadFeaturedImage');
        Route::post('/bannerImageUpload', 'MerchantAuth\HotelController@uploadBannerImage');
        Route::post('/galleryImageUpload', 'MerchantAuth\HotelController@uploadGalleryImage');

        Route::post('/add_hotel_merchant', 'MerchantAuth\HotelController@addMerchantIncludeHotel');
        Route::post('/submitMerchantIncludeHotel', 'MerchantAuth\HotelController@submitMerchantIncludeHotel');

        Route::get('/hotelMerchantView/{id}', 'MerchantAuth\HotelController@getHotelMerchantView');
        Route::get('/hotelMerchantVenue', 'MerchantAuth\HotelController@getHotelMerchantVenue');

        Route::get('/edit_hotel_merchant/{id}', 'MerchantAuth\HotelController@getMerchantHotelEditForm');
        Route::post('/merchantUpdateAddForm', 'MerchantAuth\HotelController@merchantUpdateAddForm');

        Route::post('/editHotelsGalleryDataMerchant', 'MerchantAuth\HotelController@editHotelsGalleryDataMerchant');
        Route::get('hotelMerchantView/delete/{id}', 'MerchantAuth\HotelController@deleteHotelsGalleryMerchant');
        Route::get('keyFactMerchant/delete/{id}', 'MerchantAuth\HotelController@deleteHotelsGalleryMerchant');
        Route::get('capacityMerchant/delete/{id}', 'MerchantAuth\HotelController@deleteHotelsGalleryMerchant');
        Route::get('featuredMerchant/delete/{id}', 'MerchantAuth\HotelController@deleteHotelsGalleryMerchant');

        Route::get('/hotelMerchantIncludeView/{id}', 'MerchantAuth\HotelController@hotelMerchantIncludeView')->name('merchant/hotel/hotelMerchantIncludeView');
        Route::get('/hotelMerchantIncludeList/{id}', 'MerchantAuth\HotelController@hotelMerchantIncludeList')->name('merchant/hotel/hotelMerchantIncludeList');
        Route::get('/bookingCalendar/', 'MerchantAuth\HotelController@bookingCalendar')->name('merchant/hotel/bookingCalendar');
		
		
		 Route::get('/getbookingCalendar/', 'MerchantAuth\HotelController@getbookingCalendar')->name('merchant/hotel/getbookingCalendar');
		 
		 

        Route::get('/deleteVenue/{id}', 'MerchantAuth\HotelController@deleteVenue')->name('merchant/hotel/deleteVenue');
        Route::get('/deleteMenu/{id}/{venueId}', 'MerchantAuth\HotelController@deleteMenu')->name('merchant/hotel/deleteMenu');
        Route::get('/editMenu/{id}/{venueId}', 'MerchantAuth\HotelController@editMenu')->name('merchant/hotel/editMenu');

        Route::post('/submitHotelsIncludeCapacity', 'MerchantAuth\HotelController@submitMerchantHotelsIncludeCapacity');
        Route::post('hotelMerchantIncludeView/include_hotel_edit_capacity', 'MerchantAuth\HotelController@editMerchantFormHotelsIncludeCapacity');
        Route::post('hotelMerchantIncludeView/submit_include_hotel_edit_capacity', 'MerchantAuth\HotelController@submitMerchantEditFormHotelsIncludeCapacity');
        Route::post('hotelMerchantIncludeView/include_hotel_delete_capacity', 'MerchantAuth\HotelController@deleteMerchantHotelsIncludeCapacity');
        Route::post('appointments_ajax_update', 'MerchantAuth\HotelController@ajaxUpdate')->name('merchant/hotel/appointments_ajax_update');
		
		
		Route::post('booking_ajax_update', 'MerchantAuth\HotelController@booking_ajax_update')->name('merchant/hotel/booking_ajax_update');
		
		Route::post('booking_ajax_delete', 'MerchantAuth\HotelController@booking_ajax_delete')->name('merchant/hotel/booking_ajax_delete');
		
		

    });
});

Route::get('/', 'front\homeController@getHotelsHome');
Route::get('/venue/{id}', 'front\homeController@getHotelsVenue');
Route::get('/book_venue/{hid}/{id}', 'front\homeController@getHotelsVenueBook');
Route::get('/hotelList', 'front\homeController@getAllHotelsList');


Route::post('/hotelLists', 'front\homeController@getAllHotelsLists');



Route::get('/hoteldetails/{id}', 'front\homeController@getHotelDetails');


Route::get('/venuedetails/{id}', 'front\homeController@getVenueDetails');



Route::get('/venueListDetails/{id}', 'front\homeController@getHotelVenuesDetails');
Route::get('/hotelVenues/{id}', 'front\homeController@getHotelVenuesList');
Route::get('/supplierList', 'front\homeController@getHotelsSupplierList');
Route::get('/productList/{id}', 'front\homeController@getSupplierProductList');
Route::get('/image-gallery/{id}', 'front\homeController@imageDestroy');
Route::get('/searchBarHotel', 'front\homeController@getSearchHotelList');
Route::post('/venueList/venue_enquiry_submit', 'front\homeController@venueEnquirySubmit');
Route::get('/searchByEvent/{id}', 'front\homeController@getHotelsByEvent');
Route::get('/favorite/{id}', 'front\homeController@addVenueFavorite');
Route::get('/favoriteRemove/{id}', 'front\homeController@removeVenueFavorite');
Route::post('/searchVenueList', 'front\homeController@getSearchVenuesList');


Route::get('customer/register', 'User\RegisterController@customerregister')->name('customer/register');


Route::get('hotel/register', 'User\RegisterController@hotelregister')->name('hotel/register');

Route::post('insert-hotel', 'User\RegisterController@insertHotel')->name('insert-hotel');


Route::get('supplier/register', 'User\RegisterController@supplierregister')->name('supplier/register');

Route::post('insert-supplier', 'User\RegisterController@insertSupplier')->name('insert-supplier');

Route::get('user/login', 'User\LoginController@index')->name('user/login');
Route::post('user/logout', 'User\LoginController@logout')->name('logout');
Route::post('user/login-user', 'User\LoginController@login')->name('login-user');
Route::get('user/register', 'User\RegisterController@register');
Route::post('insert-user', 'User\RegisterController@insertUser')->name('insert-user');
Route::get('user/profile', 'User\ProfileController@profile');
Route::post('user/update-profile', 'User\ProfileController@updateProfile')->name('update-profile');
Route::post('user/change-password', 'User\ProfileController@changePassword')->name('change-password');

Route::post('/addVerificationOtp', 'User\RegisterController@addVerificationOtp');
Route::post('/verifyOtp', 'User\RegisterController@verifyOtp');

Route::post('/resetPassword', 'User\RegisterController@resetPassword');

Route::get('/merchant-verify/{mail}/{token}', 'MerchantAuth\HotelController@verify');


// Route::get('supplierlist',function(){
//     return view('supplierList');
// });

// Route::get('supplierdetails',function(){
//     return view('supplierDetails');
// });

Route::get('getsupplierlist/{services}','homeController@index');
Route::get('getSupplierProducts/{id}', 'homeController@getSupplierProducts');

Route::get('new', function(){
    return view("new");
});