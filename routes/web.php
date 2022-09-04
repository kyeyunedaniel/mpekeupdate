	<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\PaytmController;
	use  App\Http\Controllers\SuperUserController;

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	admin.Buyer.edit
	|
	*/
	Route::get('/test', function () {
    phpinfo();
});
Route::get('warehouse/{id}',[App\Http\Controllers\WelcomeController::class,'Warehouse'])->name('warehouse-list');
Route::get('processor/{id}',[App\Http\Controllers\WelcomeController::class,'processor'])->name('processor');
Route::get('transporter/{id}',[App\Http\Controllers\WelcomeController::class,'transporter'])->name('transporter');
	

	Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');

    dd("cache clear All");
});
	Route::get('full-text-search', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('search', [App\Http\Controllers\WelcomeController::class, 'indexSearch'])->name('search');
	// Route::get('/search/', [App\Http\Controllers\CartController::class,'search'])->name('search');

	// Route::get('/', function () {
	//     return Order::search($request->search)->get();
	// });
	Route::get('/findPrice',[App\Http\Controllers\WelcomeController::class,'findPrice']);
	Route::get('/',[App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
	Route::get('redirect/google', [App\Http\Controllers\Auth\SocialAuthController::class, 'redirectToProvider']);
    Route::get('callback/{service}', [App\Http\Controllers\Auth\SocialAuthController::class, 'handleProviderCallback']);
	
		Route::get('/findProductName',[SuperUserController::class,'findProductName']);
		Route::get('/findPrice',[SuperUserController::class,'findPrice']);

	Auth::routes();
	//,'middleware'=>'auth','middleware'=>'user_type'

	Route::group(['middleware'=>['auth']], function(){
		Route::get('prod',[SuperUserController::class, 'created']);

	Route::get('admin/advert-list',[App\Http\Controllers\Admin\CartController::class,'advert_list'])->name('advert-list');
    Route::post('admin/edit-advert',[App\Http\Controllers\Admin\CartController::class,'advert_edit'])->name('edit-advert');
    Route::post('admin/store-advert',[App\Http\Controllers\Admin\CartController::class,'store_advert'])->name('store-advert');
     Route::get('/delete-advert',[App\Http\Controllers\Admin\CartController::class,'delete_advert'])->name('admin.advert.delete');


	Route::get('admin/profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');
	Route::post('admin/profile/post',[App\Http\Controllers\Admin\DashboardController::class, 'updateuser'])->name('change.profile');

	Route::get('admin/change_password', [App\Http\Controllers\Admin\DashboardController::class, 'profile_pass'])->name('change_password');
	Route::post('admin/change_password/post',[App\Http\Controllers\Admin\DashboardController::class, 'change_user'])->name('change.password');

	//forecast
	Route::get('admin/forecast', [App\Http\Controllers\Admin\DashboardController::class, 'forecast'])->name('admin_forecast');
	Route::get('buyer/forecast', [App\Http\Controllers\Buyer\DashboardController::class, 'forecast'])->name('buyer_forecast');
	Route::get('farmer/forecast', [App\Http\Controllers\Farmer\DashboardController::class, 'forecast'])->name('farmer_forecast');
	Route::get('warehouse/forecast', [App\Http\Controllers\Ware_house\DashboardController::class, 'forecast'])->name('warehouse_forecast');

	Route::get('processor/forecast', [App\Http\Controllers\Processor\DashboardController::class, 'forecast'])->name('processor_forecast');

	//prediction
	Route::get('admin/predict_prices', [App\Http\Controllers\Admin\DashboardController::class, 'predict'])->name('admin_predict');
	Route::get('buyer/predict_prices', [App\Http\Controllers\Buyer\DashboardController::class, 'predict'])->name('buyer_predict');
	Route::get('farmer/predict_prices', [App\Http\Controllers\Farmer\DashboardController::class, 'predict'])->name('farmer_predict');
	Route::get('warehouse/predict_prices', [App\Http\Controllers\Ware_house\DashboardController::class, 'predict'])->name('warehouse_predict');

	//shopping carts
	Route::get('/admin/cart', [App\Http\Controllers\Admin\CartController::class, 'cart'])->name('index.index');
	Route::get('/admin/checkout', [App\Http\Controllers\Admin\CheckoutController::class, 'getCheckout'])->name('checkout.index');
	Route::post('/admin/order', [App\Http\Controllers\Admin\CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
	Route::get('admin/account/orders',[App\Http\Controllers\Admin\DashboardController::class, 'getOrders'])->name('admin.orders');

	//payment
	Route::get('/admin/rave/callback', [App\Http\Controllers\Admin\FlutterwaveController::class, 'callback'])->name('callback.index');
	Route::get('/admin/payment', [App\Http\Controllers\Admin\FlutterwaveController::class, 'payments'])->name('admin.pays');
	Route::post('admin/springpesa', [App\Http\Controllers\Admin\FlutterwaveController::class, 'springpesa'])->name('admin.Springpesa');
	//groupped
	Route::post('/admin/make-payment', [App\Http\Controllers\Admin\FlutterwaveController::class, 'initialize_payment'])->name('admin.make');
	Route::get('/admin/rave/callback', [App\Http\Controllers\Admin\FlutterwaveController::class, 'callback'])->name('callback');


	Route::group(['prefix'  =>   'admin'], function() {
		Route::post('mobilemoney_pin', [App\Http\Controllers\Admin\FlutterwaveController::class, 'Springpesa'])->name('stkSimulation');

	    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');
	    Route::get('/shopping', [App\Http\Controllers\Admin\CartController::class, 'shop'])->name('admin.cart');
	    Route::get('/Pin_alert', [App\Http\Controllers\Admin\FlutterwaveController::class, 'pin'])->name('admin.success');
	    	Route::get('/cart', [App\Http\Controllers\Admin\CartController::class, 'cart'])->name('index.index');
		Route::post('/add', [App\Http\Controllers\Admin\CartController::class, 'add'])->name('admin.cart.store');
		Route::post('/update', [App\Http\Controllers\Admin\CartController::class, 'update'])->name('admin.cart.update');
		Route::post('/remove', [App\Http\Controllers\Admin\CartController::class, 'remove'])->name('admin.cart.remove');
		Route::post('/clear', [App\Http\Controllers\Admin\CartController::class, 'clear'])->name('admin.cart.clear');
		Route::get('/cart', [App\Http\Controllers\Admin\CartController::class, 'cart'])->name('index.index');
		Route::get('/transaction',[App\Http\Controllers\Admin\FlutterwaveController::class, 'SpringpesaCallBack']);

	    Route::POST('/add-to-cart', [App\Http\Controllers\Admin\DashboardController::class, 'addToCart'])->name('admin.cart.cart');
	    Route::get('ajaxdata/removedata', [App\Http\Controllers\Admin\DashboardController::class, 'removedata'])->name('ajaxdata.removedatac');


	    Route::get('/remove-item/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'Remove_cart()'])->name('admin.remove');



	    Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'admin'])->name('admin.admin.index');
	    Route::get('/create', [App\Http\Controllers\Admin\DashboardController::class, 'create'])->name('admin.create');
	    Route::post('/store', [App\Http\Controllers\Admin\DashboardController::class,'store'])->name('admin.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\DashboardController::class,'edit'])->name('admin.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\DashboardController::class,'update'])->name('admin.update');
	    Route::get('/{id}/remove-item', [App\Http\Controllers\Admin\DashboardController::class, 'Remove_cart()'])->name('admin.delete');

	});


	Route::group(['prefix'  =>   'admin/User'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');
	    Route::get('/create', [App\Http\Controllers\Admin\DashboardController::class, 'create'])->name('admin.User.create');
	    Route::post('/store', [App\Http\Controllers\Admin\DashboardController::class,'store'])->name('admin.User.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\DashboardController::class,'edit'])->name('admin.User.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\DashboardController::class,'update'])->name('admin.User.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\DashboardController::class, 'delete()'])->name('admin.User.delete');

	});
	

		Route::group(['prefix'  =>   'admin/partner'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'partner_list'])->name('partner-list');
	    Route::get('/create', [App\Http\Controllers\Admin\DashboardController::class, 'create'])->name('admin.partner');
	    Route::post('/store', [App\Http\Controllers\Admin\DashboardController::class,'store_partner'])->name('store-partner');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\DashboardController::class,'edit'])->name('admin.User.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\DashboardController::class,'partner_edit'])->name('edit-partner');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\DashboardController::class, 'delete()'])->name('admin.User.delete');

	});
		Route::group(['prefix'  =>   'admin/inventory'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\MIController::class, 'index'])->name('admin.MI.index');
	    Route::get('/create', [App\Http\Controllers\Admin\MIController::class, 'create'])->name('admin.MI.create');
	    Route::post('/store', [App\Http\Controllers\Admin\MIController::class,'store'])->name('admin.MI.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\MIController::class,'edit'])->name('admin.MI.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\MIController::class,'update'])->name('admin.MI.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\MIController::class, 'delete()'])->name('admin.MI.delete');

	});

		Route::group(['prefix'  =>   'admin/trasporter'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\TransporterController::class, 'index'])->name('admin.Trasporter.index');
	    Route::get('/create', [App\Http\Controllers\Admin\TransporterController::class, 'create'])->name('admin.Trasporter.create');
	    Route::post('/store', [App\Http\Controllers\Admin\TransporterController::class,'store'])->name('admin.Trasporter.store');
	    Route::get('/edit', [App\Http\Controllers\Admin\TransporterController::class,'edit'])->name('admin.Trasporter.edit');
	    Route::get('/delete', [App\Http\Controllers\Admin\TransporterController::class, 'destroy'])->name('admin.Trasporter.delete');

	});
		Route::group(['prefix'  =>   'Trasporter'], function() {

	    Route::get('/', [App\Http\Controllers\TransporterController::class, 'index'])->name('transportor.index');
	    Route::get('/create', [App\Http\Controllers\TransporterController::class, 'create'])->name('Trasporter.create');
	    Route::post('/store', [App\Http\Controllers\TransporterController::class,'store'])->name('Trasporter.store');
	    Route::get('/edit', [App\Http\Controllers\TransporterController::class,'edit'])->name('Trasporter.edit');
	    Route::get('/delete', [App\Http\Controllers\TransporterController::class, 'delete()'])->name('Trasporter.delete');

	});
		Route::get('Trasporter/forecast', [App\Http\Controllers\TransporterController::class, 'forecast'])->name('Trasporter_forecast');

		Route::get('Trasporter/profile', [App\Http\Controllers\TransporterController::class, 'profile'])->name('profile_Trasporter');
	Route::post('Trasporter/profile/post',[App\Http\Controllers\TransporterController::class, 'updateuser'])->name('Trasporter.profile');

	Route::get('Trasporter/change_password', [App\Http\Controllers\TransporterController::class, 'profile_pass'])->name('Trasporter_password');
	Route::post('Trasporter/change_password/post',[App\Http\Controllers\TransporterController::class, 'change_user'])->name('Trasporter.password');


		Route::group(['prefix'  =>   'admin/processor'], function() {
	    Route::get('/', [App\Http\Controllers\Admin\Processor::class, 'index'])->name('admin.processor.index');
	    Route::get('/create', [App\Http\Controllers\Admin\Processor::class, 'create'])->name('admin.processor.create');
	    Route::post('/store', [App\Http\Controllers\Admin\Processor::class,'store'])->name('admin.processor.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\Processor::class,'edit'])->name('admin.processor.edit');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\Processor::class, 'delete()'])->name('admin.processor.delete');

	});
		Route::group(['prefix'  =>'processor'], function() {
	    Route::get('/', [App\Http\Controllers\ProcessorController::class, 'index'])->name('processor.index');
	    Route::get('/create', [App\Http\Controllers\ProcessorController::class, 'create'])->name('processor.create');
	    Route::post('/store', [App\Http\Controllers\ProcessorController::class,'store'])->name('processor.store');
	    Route::get('edit/{id}', [App\Http\Controllers\ProcessorController::class,'edit'])->name('processor.edit');
	    Route::get('/delete', [App\Http\Controllers\ProcessorController::class, 'delete()'])->name('processor.delete');

	});
		Route::get('processor/profile', [App\Http\Controllers\ProcessorController::class, 'profile'])->name('profile_processor');
	Route::post('processor/profile/post',[App\Http\Controllers\ProcessorController::class, 'updateuser'])->name('processor.profile');

	Route::get('processor/change_password', [App\Http\Controllers\ProcessorController::class, 'profile_pass'])->name('processor_password');
	Route::post('processor/change_password/post',[App\Http\Controllers\ProcessorController::class, 'change_user'])->name('processor.password');


			Route::group(['prefix'  =>   'admin/reason'], function() {
	    Route::get('/', [App\Http\Controllers\Admin\ReasonController::class, 'index'])->name('admin.reason.index');
	    Route::get('/create', [App\Http\Controllers\Admin\ReasonController::class, 'create'])->name('admin.reason.create');
	    Route::post('/store', [App\Http\Controllers\Admin\ReasonController::class,'store'])->name('admin.reason.store');
	    Route::post('/edit', [App\Http\Controllers\Admin\ReasonController::class,'edit'])->name('admin.reason.edit');
	    Route::get('/delete', [App\Http\Controllers\Admin\ReasonController::class, 'destroy'])->name('admin.reason.delete');

	});

					Route::group(['prefix'  =>   'admin/partner-lis'], function() {
	    Route::get('/', [App\Http\Controllers\Admin\PartnerController::class, 'index'])->name('admin.partner.index');
	    Route::get('/create', [App\Http\Controllers\Admin\PartnerController::class, 'create'])->name('admin.partner.create');
	    Route::post('/store', [App\Http\Controllers\Admin\PartnerController::class,'store'])->name('admin.partner.store');
	    Route::post('/edit', [App\Http\Controllers\Admin\PartnerController::class,'edit'])->name('admin.partner.edit');
	    Route::get('/delete', [App\Http\Controllers\Admin\PartnerController::class, 'destroy'])->name('admin.partner.delete');

	});


	Route::group(['prefix'  =>   'admin/Warehous'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\HouseController::class, 'index'])->name('admin.ware_house.house.index');
	    Route::get('/create', [App\Http\Controllers\Admin\HouseController::class, 'create'])->name('admin.ware_house.house.create');
	    Route::post('/store', [App\Http\Controllers\Admin\HouseController::class,'store'])->name('admin.ware_house.house.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\HouseController::class,'edit'])->name('admin.ware_house.house.edit');
	    Route::get('/{id}/warehouse_rejected', [App\Http\Controllers\Admin\HouseController::class,'warehouse_rejected'])->name('admin.ware_house.house.edit_rej');
	     Route::get('/{id}/reject', [App\Http\Controllers\Admin\HouseController::class,'rejected'])->name('admin.ware_house.house.rejected');
	    Route::post('/update', [App\Http\Controllers\Admin\HouseController::class,'update'])->name('admin.ware_house.house.update');
	    Route::post('/rejected', [App\Http\Controllers\Admin\HouseController::class,'reject'])->name('admin.ware_house.house.reject');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\HouseController::class, 'delete()'])->name('admin.Ware_house.house.delete');

	});

	Route::group(['prefix'  =>   'admin/Warehouse'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\Warehouse::class, 'index'])->name('admin.ware_house.index');
	    Route::get('/create', [App\Http\Controllers\Admin\Warehouse::class, 'create'])->name('admin.ware_house.create');
	    Route::post('/store', [App\Http\Controllers\Admin\Warehouse::class,'store'])->name('admin.ware_house.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\Warehouse::class,'edit'])->name('admin.ware_house.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\Warehouse::class,'update'])->name('admin.ware_house.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\Warehouse::class, 'delete()'])->name('admin.Ware_house.delete');

	});

	Route::get('admin/farmer/{id}/edit', [App\Http\Controllers\Admin\Buyer::class,'edit'])->name('armer.edit');

		Route::group(['prefix'  =>   'admin/farmer'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\Farmer::class, 'index'])->name('admin.farmer.index');
	    Route::get('/create', [App\Http\Controllers\Admin\Farmer::class, 'create'])->name('admin.farmer.create');
	    Route::post('/store', [App\Http\Controllers\Admin\Farmer::class,'store'])->name('admin.farmer.store');
	    // Route::get('/edit/{id}', [App\Http\Controllers\Admin\Farmer::class,'edit'])->name('admin.farmer.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\Farmer::class,'update'])->name('admin.farmer.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\Farmer::class, 'delete()'])->name('admin.farmer.delete');

	});

		Route::group(['prefix'  =>   'admin/buyer'], function() {

	    Route::get('/', [App\Http\Controllers\Admin\Buyer::class, 'index'])->name('admin.buyer.index');
	    Route::get('/create', [App\Http\Controllers\Admin\Buyer::class, 'create'])->name('admin.buyer.create');
	    Route::post('/store', [App\Http\Controllers\Admin\Buyer::class,'store'])->name('admin.buyer.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Admin\Buyer::class,'edit'])->name('admin.buyer.edit');
	    Route::post('/update', [App\Http\Controllers\Admin\Buyer::class,'update'])->name('admin.buyer.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Admin\Buyer::class, 'delete()'])->name('admin.buyer.delete');

	});
		// Route::get('/stk/push/simulation', [MpesaController::class, 'stkSimulation'])->name('paymen');
	// 'middleware'=>'auth','middleware'=>'user_type'
	Route::group(['prefix'  =>   'buyer'], function() {

		// Route::get('/stk/push/simulation', [App\Http\Controllers\MpesaController::class, 'stkSimulation'])->name('buyer.payment');

		Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index_buyer'])->name('buyer.index');
		Route::get('/shopping', [App\Http\Controllers\CartController::class, 'shop'])->name('buyer.shop');
		Route::post('/shopping', [App\Http\Controllers\Buyer\DashboardController::class, 'addToCartd'])->name('buyer.shop');
		Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.index');
		Route::post('/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.store');
		Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
		Route::post('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
		Route::post('/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
		Route::delete('/carts/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'Remove_cart'])->name('buyer.remove-from-cart');
		Route::POST('/add-to-cart/', [App\Http\Controllers\Admin\DashboardController::class, 'addToCartd'])->name('buyer.cart_shop');

		Route::patch('/update-cart', [App\Http\Controllers\Buyer\DashboardController::class, 'update_cart']);
		Route::delete('/remove-from-cart/{id}', [App\Http\Controllers\Buyer\DashboardController::class, 'Remove_cart'])->name('buyer.remove-from-cart');

	    Route::get('/create', [App\Http\Controllers\Buyer\DashboardController::class, 'create'])->name('buyer.create');
	    Route::post('/store', [App\Http\Controllers\Buyer\DashboardController::class, 'store'])->name('buyer.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Buyer\DashboardController::class, 'edit'])->name('buyer.edit');
	    Route::post('/update', [App\Http\Controllers\Buyer\DashboardController::class, 'update'])->name('buyer.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Buyer\DashboardController::class, 'delete()'])->name('farmer.delete');
	    Route::get('/warehouse', [App\Http\Controllers\DashboardController::class, 'warehouse'])->name('buyer.house');

	});
	//'middleware'=>'auth','middleware'=>'user_type'
	Route::group(['prefix'  =>   'farmer'], function() {
		Route::get('/signature-pad', function () {
    return view('farmer.contracts.sign');
})->name('signature-pad');

		Route::get('/', [App\Http\Controllers\Farmer\DashboardController::class, 'index'])->name('farmer.index');
		Route::get('/inventory', [App\Http\Controllers\Farmer\DashboardController::class, 'inventory'])->name('farmer.inventory');
		Route::get('/warehouse', [App\Http\Controllers\Farmer\DashboardController::class, 'warehouse'])->name('farmer.house');
	    Route::get('/create', [App\Http\Controllers\Farmer\DashboardController::class, 'create'])->name('farmer.create');
	    Route::post('/store', [App\Http\Controllers\Farmer\DashboardController::class, 'store'])->name('farmer.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Farmer\DashboardController::class, 'edit'])->name('farmer.edit');
	    Route::post('/update', [App\Http\Controllers\Farmer\DashboardController::class, 'update'])->name('farmer.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Farmer\DashboardController::class, 'delete()'])->name('farmer.delete');

	});
	Route::get('farmer/profile', [App\Http\Controllers\Farmer\DashboardController::class, 'profile'])->name('profile_Farmer');
	Route::post('farmer/profile/post',[App\Http\Controllers\Farmer\DashboardController::class, 'updateuser'])->name('farmer.profile');

	Route::get('farmer/change_password', [App\Http\Controllers\Farmer\DashboardController::class, 'profile_pass'])->name('farmer_password');
	Route::post('farmer/change_password/post',[App\Http\Controllers\Farmer\DashboardController::class, 'change_user'])->name('farmer.password');
	//'middleware'=>'auth','middleware'=>'user_type'
	Route::group(['prefix'  =>   'ware_house'], function() {

	    Route::get('/', [App\Http\Controllers\Ware_house\DashboardController::class, 'index'])->name('ware_house.index');
	    Route::get('/create', [App\Http\Controllers\Ware_house\DashboardController::class, 'create'])->name('ware_house.create');
	    Route::post('/store', [App\Http\Controllers\Ware_house\DashboardController::class, 'store'])->name('ware_house.store');
	    Route::get('/{id}/edit', [App\Http\Controllers\Ware_house\DashboardController::class, 'edit'])->name('ware_house.edit');
	    Route::get('/{id}/rejected', [App\Http\Controllers\Ware_house\DashboardController::class, 'warehouse_rejected'])->name('ware_house.warehouse_rejected');
	    Route::post('/update', [App\Http\Controllers\Ware_house\DashboardController::class, 'update'])->name('ware_house.update');
	    Route::get('/{id}/delete', [App\Http\Controllers\Ware_house\DashboardController::class, 'delete()'])->name('ware_house.delete');

	    Route::get('/warehouse', [App\Http\Controllers\Ware_house\DashboardController::class, 'Ware_house'])->name('ware_house.ware_house.house.index');


	});

	Route::get('warehouse/profile', [App\Http\Controllers\Ware_house\DashboardController::class, 'profile'])->name('profile_Ware_house');
	Route::post('warehouse/profile/post',[App\Http\Controllers\Ware_house\DashboardController::class, 'updateuser'])->name('warehouse.profile');

	Route::get('warehouse/change_password', [App\Http\Controllers\Ware_house\DashboardController::class, 'profile_pass'])->name('warehouse_password');
	Route::post('warehouse/change_password/post',[App\Http\Controllers\Ware_house\DashboardController::class, 'change_user'])->name('warehouse.password');

	Route::get('/sample', [App\Http\Controllers\Comment::class, 'index'])->name('sample');
	Route::post('create', [App\Http\Controllers\Comment::class, 'create'])->name('sample');



	Route::get('/postCreate', [App\Http\Controllers\PostController::class, 'postCreate']);
	Route::post('postData', [App\Http\Controllers\PostController::class, 'postData'])->name('postData');


	Route::get('/frameworks', [App\Http\Controllers\FrameworkController::class, 'index']);
	Route::post('frameworks_post', [App\Http\Controllers\FrameworkController::class, 'store'])->name('frameworks.store');
	Route::get('markAsRead', function(){

	auth()->user()->unreadNotifications->markAsRead();

	return redirect()->back();

})->name('markRead');

	Route::get('buyer/profile', [App\Http\Controllers\Buyer\DashboardController::class, 'profile'])->name('profile_buyer');
	Route::post('buyer/profile/post',[App\Http\Controllers\Buyer\DashboardController::class, 'updateuser'])->name('buyer.profile');

	Route::get('buyer/change_password', [App\Http\Controllers\Buyer\DashboardController::class, 'profile_pass'])->name('buyer_password');
	Route::post('buyer_password/post',[App\Http\Controllers\Buyer\DashboardController::class, 'change_user'])->name('buyer.password');


	//shopping carts

	Route::get('/buyer/checkout', [App\Http\Controllers\Buyer\CheckoutController::class, 'getCheckout'])->name('buyer.checkout.index');
	Route::post('/buyer/order', [App\Http\Controllers\Buyer\CheckoutController::class, 'placeOrder'])->name('buyer.checkout.place.order');

	//payment
	Route::get('/buyer/rave/callback', [App\Http\Controllers\Buyer\FlutterwaveController::class, 'callback'])->name('callback.index');
	Route::get('/buyer/payment', [App\Http\Controllers\Buyer\FlutterwaveController::class, 'paymentb'])->name('buyer.pays');
	Route::post('/buyer/pay', [App\Http\Controllers\Buyer\FlutterwaveController::class, 'payment'])->name('buyer.pay');
	Route::get('buyer/account/orders',[App\Http\Controllers\Buyer\DashboardController::class, 'getOrders'])->name('buyer.orders');
	Route::get('admin/transaction', [App\Http\Controllers\Admin\FlutterwaveController::class, 'SpringpesaCallBack'])->name('admin.transaction');

	//Paytm Payment
Route::post('paytm-payment',[App\Http\Controllers\PaytmController::class, 'paytmPayment'])->name('paytm.payment');
Route::post('paytm-callback',[App\Http\Controllers\PaytmController::class, 'paytmCallback'])->name('paytm.callback');
Route::get('paytm-purchase',[App\Http\Controllers\PaytmController::class, 'paytmPurchase'])->name('paytm.purchase');

// Route::get('/golive', [App\Http\Controllers\LiveController::class, 'index']);

Route::any('admin/data',[App\Http\Controllers\DataController::class,'index'])->name('data.index');
Route::get('admin/data/create',[App\Http\Controllers\DataController::class,'create'])->name('data.create');
Route::post('admin/data',[App\Http\Controllers\DataController::class,'store'])->name('data.store');
Route::post('admin/result',[App\Http\Controllers\ForecastingController::class, 'result'])->name('result');
Route::get('admin/forecasting',[App\Http\Controllers\Admin\DashboardController::class, 'predict'])->name('forecast');

//warehouse
Route::get('warehouse/data/create',[App\Http\Controllers\Ware_house\DataController::class,'create'])->name('data.creates');
Route::post('warehouse/data',[App\Http\Controllers\Ware_house\DataController::class,'store'])->name('data.stores');
Route::post('warehouse/future_price',[App\Http\Controllers\Ware_house\ForecastingController::class, 'result'])->name('results');


Route::get('warehouse/forecasting',[App\Http\Controllers\Ware_house\ForecastingController::class, 'index'])->name('forecasts');

Route::get('/farmer/contracts', [App\Http\Controllers\Farmer\ContractController::class,'index'])->name('contracts.contracts.index');
Route::get('/farmer/contract-approval', [App\Http\Controllers\Farmer\ContractController::class,'approval_contra'])->name('approval_contra');

Route::get('/farmer/received-contracts-requests', [App\Http\Controllers\Farmer\ContractController::class,'show'])->name('received_contracts_requests');

Route::get('/farmer/Rejected-request', [App\Http\Controllers\Farmer\ContractController::class,'Rejected_request'])->name('Rejected_request');
Route::get('/farmer/Rejected-contracts', [App\Http\Controllers\Farmer\ContractController::class,'Rejected_contracts'])->name('contracts.contracts.Rejected-contracts');
Route::get('/farmer/contracts/create', [App\Http\Controllers\Farmer\ContractController::class,'create'])->name('contracts.contracts.create');
Route::post('/farmer/contracts/store', [App\Http\Controllers\Farmer\ContractController::class,'store'])->name('contracts.contracts.store');
Route::get('/farmer/contracts/edit/{id}', [App\Http\Controllers\Farmer\ContractController::class,'edit'])->name('contracts.contracts.edit');
Route::post('price/price',[App\Http\Controllers\Farmer\ContractController::class, 'price'])->name('price');
Route::get('/farmer/contracts/Approve_buyer_request/{id}', [App\Http\Controllers\Farmer\ContractController::class,'Approve_buyer_request'])->name('Approve_buyer_request');
Route::post('/farmer/contracts/update', [App\Http\Controllers\Farmer\ContractController::class,'update'])->name('contracts.contracts.update');
Route::get('/farmer/contracts/{id}/reject', [App\Http\Controllers\Farmer\ContractController::class,'reject'])->name('contracts.contracts.reject');
Route::get('/admin/contracts/edit/{id}', [App\Http\Controllers\Admin\ContractController::class,'edit'])->name('admin.contracts.edit');
Route::post('/admin/contracts/approve', [App\Http\Controllers\Admin\ContractController::class,'Approve_farmer_request'])->name('Approve_farmer_request');
Route::get('/admin/contracts', [App\Http\Controllers\Admin\ContractController::class,'index_admin'])->name('contracts.admin.index');
Route::get('/admin/contracts/create', [App\Http\Controllers\Admin\ContractController::class,'create'])->name('admin.contracts.create');
Route::post('/admin/contracts/store', [App\Http\Controllers\Admin\ContractController::class,'store'])->name('admin.contracts.store');
Route::post('/admin/contracts/reject', [App\Http\Controllers\Admin\ContractController::class,'reject'])->name('admi.contracts.reject')
;

Route::get('/admin/contracts-reason-reject', [App\Http\Controllers\Admin\ContractController::class,'index_admin_reason'])->name('contracts.reason.index');
Route::get('/admin/contracts/create-reason', [App\Http\Controllers\Admin\ContractController::class,'create_reason'])->name('admin.contracts.create.reason');
Route::post('/admin/contracts/store-reason', [App\Http\Controllers\Admin\ContractController::class,'store'])->name('admin.contracts.store.reason');
Route::post('/admin/contracts/reject-reason', [App\Http\Controllers\Admin\ContractController::class,'reject'])->name('admi.contracts.reject.reason')
;
Route::post('/admin/reason/update', [App\Http\Controllers\Farmer\ContractController::class,'update_reason'])->name('contracts.reason.update');


Route::get('/admin/Aproved-contract-review', [App\Http\Controllers\Admin\ContractController::class,'Aproved_review'])->name('Aproved_review');
Route::get('/admin/Reject', [App\Http\Controllers\Admin\ContractController::class,'rejectstore_review'])->name('rejectstore_review');
Route::post('/admin/reject/store', [App\Http\Controllers\Admin\ContractController::class,'rejectstore'])->name('admin.reject.store');

Route::get('/buyer/contracts', [App\Http\Controllers\Buyer\ContractController::class,'index'])->name('contracts.contracts.Buy');
Route::get('/buyer/contracts/create', [App\Http\Controllers\Buyer\ContractController::class,'create'])->name('contracts.contracts.Buyer');
Route::post('/buyer/contracts/store', [App\Http\Controllers\Buyer\ContractController::class,'store'])->name('contracts.contracts.Buyer_store');
Route::get('/buyer/contracts/edit/{id}', [App\Http\Controllers\Buyer\ContractController::class,'edit'])->name('contracts.contracts_edit.Buyer');
Route::post('/buyer/contracts/update', [App\Http\Controllers\Buyer\ContractController::class,'update'])->name('contracts.contracts.Buyer');
Route::get('/buyer/contracts/contract-requests', [App\Http\Controllers\Buyer\ContractController::class,'show'])->name('contracts.contracts.Buyer');
Route::get('buyer/contracts/contract-doc/{id}', [App\Http\Controllers\Buyer\ContractController::class,'downloadFile'])->name('downloadpdf');


Route::post('/ware_house/contracts/reject', [App\Http\Controllers\Ware_house\ContractController::class,'rejectstore'])->name('ware_house_rejected_contract.store')
;
Route::get('/ware_house/Accepted-requests', [App\Http\Controllers\Ware_house\ContractController::class,'Accepted_controcts'])->name('Accepted_controcts');
Route::get('/ware_house/Rejected-requests', [App\Http\Controllers\Ware_house\ContractController::class,'Rejected_contracts'])->name('Rejected_contracts');
Route::get('/ware_house/contracts/{id}/reject', [App\Http\Controllers\Ware_house\ContractController::class,'ware_house_rejected_contract'])->name('ware_house_rejected_contract');
Route::get('/ware_house/contracts/{id}/rejected', [App\Http\Controllers\Ware_house\ContractController::class,'ware_house_rejected_contracted'])->name('ware_house_rejected_contracted');

Route::post('/ware_house/contracts/update', [App\Http\Controllers\Ware_house\ContractController::class,'approve'])->name('contracts.contracts.updates');

Route::get('/ware_house/contracts', [App\Http\Controllers\Ware_house\ContractController::class,'index'])->name('contracts.contracts.ware_house');
Route::get('/ware_house/contracts/edit/{id}', [App\Http\Controllers\Ware_house\ContractController::class,'edit'])->name('ware_house.contracts.edit');
Route::get('/ware_house/contracts/accepted/{id}', [App\Http\Controllers\Ware_house\ContractController::class,'edit_accepted'])->name('edit-accepted');
Route::post('/ware_house/contracts-status', [App\Http\Controllers\Ware_house\ContractController::class,'status'])->name('contracts.contracts.ware_house-status');
	
});