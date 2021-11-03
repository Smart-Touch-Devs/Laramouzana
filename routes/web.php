<?php

use App\Http\Controllers\AccountantController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Add_categoriesController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\DelivererController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PercentageController;
use App\Http\Controllers\FrontPictureController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;


//Client

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('single_product/{id}', 'Single_productController@index')->name('single_product');
Route::get('cat1_product/{id}', 'Single_productController@cat1_product')->name('cat1_product');
Route::get('cat2_product/{id}', 'Single_productController@cat2_product')->name('cat2_product');
Route::get('shop_product/{id}', 'Single_productController@shop_product')->name('shop_product');

//user account
Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'returnAccount'])->name('account.index');
    Route::get('/account/update', [AccountController::class, 'updateIndex'])->name('account.updateIndex');
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::get('/account/deposit', [AccountController::class, 'depositIndex'])->name('account.depositIndex');
    Route::post('/account/deposit', [AccountController::class, 'deposit'])->name('account.deposit');
    Route::get('/account/send', [AccountController::class, 'sendMoneyIndex'])->name('account.sendMoneyIndex');
    Route::post('/account/send', [AccountController::class, 'sendMoney'])->name('account.sendMoney');
    Route::get('/account/withdraw', [AccountController::class, 'withdrawIndex'])->name('account.withdrawIndex');
    Route::post('/account/requestWithdrawal', [AccountController::class, 'requestWithdrawal'])->name('account.requestWithdrawal');
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/transactions', [AccountController::class, 'transactions'])->name('account.transactions');
    Route::get('/account/changePassword', [AccountController::class, 'changePw'])->name('account.changePw');
    Route::post('/account/changePassword', [AccountController::class, 'updatePw'])->name('account.updatePw');
});
Route::get('/cart', [AccountController::class, 'returnCart'])->name('client.cart');

//Admin

Route::prefix('staff')->middleware('loggedin')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::prefix('staff')->group(function () {
    Route::get('/chart_line_data', [AdminController::class, 'lineChartData']);
});

Route::prefix('staff')->middleware('admin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('admin.profile');
    Route::get('/change_pw', [AdminController::class, 'adminChangePwIndex'])->name('admin.changePwIndex');
    Route::post('/changePw', [AdminController::class, 'changePw'])->name('admin.changePw');
    //Admin part
    Route::middleware('admin.isadmin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        // Route::resource('all_products', 'All_productsController');
        // Route::resource('add_products', 'Add_productsController');
        // Route::resource('add_categories', 'Add_categoriesController');
        Route::get('/withdraw_requests', [AdminController::class, 'withdrawRequests'])->name('admin.withdrawRequest');
        Route::post('/validate_witdrawal', [AdminController::class, 'validateWithdraw'])->name('admin.validateWithdrawal');
        Route::get('/reject_withdrawal/{id}', [AdminController::class, 'rejectWithdraw'])->name('admin.rejectWithdrawal');

        //Users management

        Route::get('/users/{users?}', [UsersController::class, 'index']);
        Route::post('/add_client', [UsersController::class, 'addClient'])->name('users.addClient');
        Route::post('/add_staffmember', [UsersController::class, 'addStaff'])->name('users.addStaffMember');
        Route::get('/showShopManager/{shopManagerId}', [UsersController::class, 'showShopManager'])->name('users.showShopManager');
        Route::get('/deleteShopManager/{shopManagerId}', [UsersController::class, 'deleteShopManager'])->name('users.deleteShopManager');
        Route::post('/addShopManager', [UsersController::class, 'addShopManager'])->name('users.addShopManager');
        Route::get('/delete_client/{clientId}', [UsersController::class, 'deleteClient'])->name('users.delete_client');
        Route::get('/delete_staff/{staffId}', [UsersController::class, 'deleteStaff'])->name('users.delete_staff');
        Route::get('/showClient/{clientId}', [UsersController::class, 'showClient'])->name('user.showClient');
        Route::get('/showStaff/{staffId}', [UsersController::class, 'showStaff'])->name('user.showStaff');
    });
    //Deliverer part
    Route::prefix('deliverer')->middleware('admin.isdeliverer')->group(function () {
        Route::get('/dashboard', [DelivererController::class, 'index'])->name('deliverer.index');
        Route::get('/update/{command_id}', [DelivererController::class, 'update'])->name('deliverer.update');
        Route::get('/history', [DelivererController::class, 'history'])->name('deliverer.history');
    });


    //Acountant part
    Route::prefix('accountant')->middleware('admin.isaccountant')->group(function () {
        Route::get('/dashboard', [AccountantController::class, 'index'])->name('accountant.index');
        Route::get('/deposit', [AccountantController::class, 'deposit'])->name('accountant.deposit');
        Route::get('/withdraw', [AccountantController::class, 'withdraw'])->name('accountant.withdraw');
        Route::get('/remittance', [AccountantController::class, 'remittance'])->name('accountant.remittance');
    });

    Route::get('/users/{users?}', [UsersController::class, 'index']);
    Route::post('/add_client', [UsersController::class, 'addClient'])->name('users.addClient');
    Route::post('/add_staffmember', [UsersController::class, 'addStaff'])->name('users.addStaffMember');
    Route::get('/delete_client/{clientId}', [UsersController::class, 'deleteClient'])->name('users.delete_client');
    Route::get('/delete_staff/{staffId}', [UsersController::class, 'deleteStaff'])->name('users.delete_staff');
    Route::get('/showClient/{clientId}', [UsersController::class, 'showClient'])->name('user.showClient');
    Route::get('/showStaff/{staffId}', [UsersController::class, 'showStaff'])->name('user.showStaff');
    //products and categories
    Route::resource('all_products', 'All_productsController')->except(['create']);;
    // Route::resource('add_products', 'Add_productsController');
    Route::resource('add_categories', 'Add_categoriesController')->except(['create', 'show']);
    Route::resource('commands', 'CommandsController')->only(['index', 'edit', 'update']);
    Route::get('/delivered_product', [DelivererController::class, 'history']);
    Route::get('/setting_percentage', [PercentageController::class, 'index'])->name('setting_percentage');
    Route::get('/depot_percentage/{id}', [PercentageController::class, 'depot'])->name('depot_percentage');
    Route::post('/updateDepot_percentage/{id}', [PercentageController::class, 'updateDepot'])->name('updateDepot_percentage');
    Route::get('/retraitpercentage/{id}', [PercentageController::class, 'retrait'])->name('retrait_percentage');
    Route::post('/updateRetrait_percentage/{id}', [PercentageController::class, 'updateRetrait'])->name('updateRetrait_percentage');
    Route::get('/transfere_percentage/{id}', [PercentageController::class, 'transfere'])->name('transfere_percentage');
    Route::post('/updateTransfere_percentage/{id}', [PercentageController::class, 'updateTransfere'])->name('updateTransfere_percentage');
    Route::resource('front_picture1', 'FrontPicture1Controller');
    Route::resource('front_picture2', 'FrontPicture2Controller');


    //front image
    Route::get('front_picture', [FrontPictureController::class, 'index'])->name('front_picture');
    // Route::post('/front_picture1', [FrontPictureController::class, 'storePicture1']);
    // Route::get('/picture1/{id}', [FrontPictureController::class, 'editPicture1'])->name('front_picture1');

});

Route::middleware('clientisloggedin')->group(function () {
    Route::get('/login', [ClientAuthController::class, 'loginView'])->name('client.loginView');
    Route::post('/login', [ClientAuthController::class, 'login'])->name('client.login');
    Route::get('/register', [ClientAuthController::class, 'registerView'])->name('client.registerView');
    Route::post('/register', [ClientAuthController::class, 'register'])->name('client.register');
    Route::get('/verify/{hashedMail}', [ClientAuthController::class, 'confirmMail'])->name('client.confirmMail');
    Route::get('/reset', [ClientAuthController::class, 'forgotten_pw'])->name('client.forgotPassword');
    Route::post('/reset', [ClientAuthController::class, 'send_reset_email'])->name('client.sendResetMail');
    Route::get('new_password/{token?}', [ClientAuthController::class, 'resetRedirect'])->name('client.resetRedirect');
    Route::post('/reset_password', [ClientAuthController::class, 'resetPassword'])->name('client.resetPassword');
});

Route::get('/logout', [ClientAuthController::class, 'logout'])->name('client.logout');

//Accordion
Route::resource('faqs', 'AccordionController');
Route::resource('Faqs', 'FaqsController');

//Front uniquement
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/contacts', 'ContactController@contact')->name('contact');
Route::get('deleteContact/{id}','ContactController@destroy')->name('deleteContact');
// Route::post('/storeContacts', [ContactController::class,'store'])->name('storeContact');
Route::get('/confirm', 'FrontController@confirm')->name('confirm');
Route::get('/shop', 'FrontController@shop')->name('shop');
Route::post('/validation', 'ContactController@store')->name('validation');
Route::post('/devis', 'ContactController@devis_store')->name('devis_store');
Route::post('/intervention', 'ContactController@intervention_store')->name('intervention_store');
Route::post('/validation', 'FrontController@store')->name('validation');
Route::get('/getCategory/{id}', [Add_categoriesController::class, 'getCategory'])->name('getCategory');
Route::post('/command', [FrontController::class, 'commandOne'])->name('client.commandOne');
