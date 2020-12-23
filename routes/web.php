<?php

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

Route::get('lang/{locale}', 'LocalizationController@index');
Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
Route::get('/coinpayment/ipn', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinpayment');
Route::get('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::get('/ipncoinpayeth', 'PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::get('/ipnblockbtc', 'PaymentController@blockIpnBtc')->name('ipn.block.btc');
Route::get('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::get('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::get('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::get('/ipnflutter', 'PaymentController@flutterIPN')->name('ipn.flutter');
Route::get('/ipnvogue', 'PaymentController@vogueIPN')->name('ipn.vogue');
Route::get('/ipnpaystack', 'PaymentController@paystackIPN')->name('ipn.paystack');
Route::get('/ipnboompay', 'PaymentController@boompayIPN')->name('ipn.boompay');

// Front end routes
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/plans', 'FrontendController@plans')->name('plans');
Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/terms', 'FrontendController@terms')->name('terms');
Route::get('/privacy', 'FrontendController@privacy')->name('privacy');
Route::get('/page/{id}', 'FrontendController@page');
Route::get('/single/{id}/{slug}', 'FrontendController@article');
Route::get('/cat/{id}/{slug}', 'FrontendController@category');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', ['uses' => 'FrontendController@contactSubmit', 'as' => 'contact-submit']);

// User routes
Auth::routes();
Route::post('login', 'Auth\LoginController@submitlogin')->name('submitlogin');
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('2fa', 'Auth\faController@submitfa')->name('submitfa');
Route::get('2fa', 'Auth\faController@faverify')->name('2fa');
Route::post('register', 'Auth\RegisterController@submitregister')->name('submitregister');
Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('referral', 'Auth\RegisterController@submitreferral')->name('submitreferral');
Route::get('referral/{id}', 'Auth\RegisterController@referral')->name('referral');
Route::get('forget', 'UserController@forget')->name('forget');
Route::get('r_pass', 'UserController@r_pass')->name('r_pass');
Route::group(['prefix' => 'user', ], function () {
    Route::get('authorization', 'UserController@authCheck')->name('user.authorization');   
    Route::post('verification', 'UserController@sendVcode')->name('user.send-vcode');
    Route::post('smsVerify', 'UserController@smsVerify')->name('user.sms-verify');
    Route::get('verify-email', 'UserController@sendEmailVcode')->name('user.send-emailVcode');
    Route::post('postEmailVerify', 'UserController@postEmailVerify')->name('user.email-verify'); 
        Route::group(['middleware'=>'auth:user'], function() {
            Route::middleware(['CheckStatus', 'Tfa'])->group(function () {
                Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');
                Route::get('plans', 'UserController@plans')->name('user.plans');
                Route::get('trades', 'UserController@trades')->name('user.trades');
                Route::post('preview-buy', 'UserController@check_plan')->name('user.check_plan');
                Route::post('calculate', 'UserController@calculate');
                Route::post('buy', 'UserController@buy');
                Route::get('profile', 'UserController@profile')->name('user.profile');
                Route::post('kyc', 'UserController@kyc');
                Route::post('account', 'UserController@account');
                Route::post('avatar', 'UserController@avatar');
                Route::post('withdraw-update', 'UserController@withdrawupdate');
                Route::get('ticket', 'UserController@ticket')->name('user.ticket');
                Route::post('submit-ticket', 'UserController@submitticket')->name('submit-ticket');
                Route::get('ticket/delete/{id}', 'UserController@Destroyticket')->name('ticket.delete');
                Route::get('reply-ticket/{id}', 'UserController@Replyticket')->name('ticket.reply');
                Route::post('reply-ticket', 'UserController@submitreply');
                Route::get('fund', 'UserController@fund')->name('user.fund');
                Route::get('audit', 'UserController@audit')->name('user.audit');
                Route::get('referral', 'UserController@referral')->name('user.referral');
                Route::get('preview', 'UserController@depositpreview')->name('user.preview');
                Route::post('fund', 'UserController@fundsubmit')->name('fund.submit');
                Route::get('withdraw', 'UserController@withdraw')->name('user.withdraw');
                Route::post('withdraw', 'UserController@withdrawsubmit')->name('withdraw.submit');                
                Route::post('password', 'UserController@submitPassword')->name('change.password');
                Route::post('delaccount', 'UserController@delaccount')->name('delaccount');
                Route::post('pin', 'UserController@submitPin')->name('change.pin');
                Route::get('deposit-confirm', 'PaymentController@depositConfirm')->name('osit.confirm');
                Route::get('deposit-verify/{id}', 'UserController@userDataUpdate')->name('deposit.verify');
                Route::post('2fa', 'UserController@submit2fa')->name('change.2fa');
                Route::get('delete-account/{id}', 'UserController@Destroyuser')->name('delete.account');
                Route::get('bank_transfer', 'UserController@bank_transfer')->name('user.bank_transfer');
                Route::post('bank_transfer', 'UserController@bank_transfersubmit')->name('bank_transfersubmit');
                Route::get('cancel-recurring/{id}', 'UserController@cancel_recurring');
                Route::get('start-recurring/{id}', 'UserController@start_recurring');
                Route::get('upgrade', 'UserController@upgrade')->name('user.upgrade');

                //Send money
                    Route::get('transfer', 'UserController@ownbank')->name('user.ownbank');
                    Route::post('transfer', 'UserController@submitownbank')->name('submit.ownbank');
                    Route::post('local_preview', 'UserController@submitlocalpreview')->name('submit.localpreview');
                    Route::get('local_preview', 'UserController@localpreview')->name('user.localpreview');
                    Route::get('received/{id}', 'UserController@Receivedpay')->name('received.pay');
                //End
            });
        });
    Route::get('logout', 'UserController@logout')->name('user.logout');
});

Route::get('user-password/reset', 'User\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('user-password/email', 'User\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('user-password/reset/{token}', 'User\ResetPasswordController@showResetForm')->name('user.password.reset');
Route::post('user-password/reset', 'User\ResetPasswordController@reset');
Route::get('admin', 'Auth\AdminController@adminlogin')->name('admin.loginForm');
Route::post('admin', 'Auth\AdminController@submitadminlogin')->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    //Blog controller
    Route::post('/createcategory', 'PostController@CreateCategory');
    Route::post('/updatecategory', 'PostController@UpdateCategory');
    Route::get('/post-category', 'PostController@category')->name('admin.cat');
    Route::get('/unblog/{id}', 'PostController@unblog')->name('blog.unpublish');
    Route::get('/pblog/{id}', 'PostController@pblog')->name('blog.publish');
    Route::get('blog', 'PostController@index')->name('admin.blog');
    Route::get('blog/create', 'PostController@create')->name('blog.create');
    Route::post('blog/create', 'PostController@store')->name('blog.store');
    Route::get('blog/delete/{id}', 'PostController@destroy')->name('blog.delete');
    Route::get('category/delete/{id}', 'PostController@delcategory')->name('blog.delcategory');
    Route::get('blog/edit/{id}', 'PostController@edit')->name('blog.edit');
    Route::post('blog-update', 'PostController@updatePost')->name('blog.update');

    //Web controller
    Route::post('social-links/update', 'WebController@UpdateSocial')->name('social-links.update');
    Route::get('social-links', 'WebController@sociallinks')->name('social-links'); 

    Route::post('about-us/update', 'WebController@UpdateAbout')->name('about-us.update');
    Route::get('about-us', 'WebController@aboutus')->name('about-us'); 

    Route::post('privacy-policy/update', 'WebController@UpdatePrivacy')->name('privacy-policy.update');
    Route::get('privacy-policy', 'WebController@privacypolicy')->name('privacy-policy');

    Route::post('terms/update', 'WebController@UpdateTerms')->name('terms.update');
    Route::get('terms', 'WebController@terms')->name('admin.terms'); 

    Route::post('/createfaq', 'WebController@CreateFaq');   
    Route::post('faq/update', 'WebController@UpdateFaq')->name('faq.update');
    Route::get('faq/delete/{id}', 'WebController@DestroyFaq')->name('faq.delete');
    Route::get('faq', 'WebController@faq')->name('admin.faq');   
    
    Route::post('/createservice', 'WebController@CreateService');   
    Route::post('service/update', 'WebController@UpdateService')->name('service.update');
    Route::get('service/delete/{id}', 'WebController@DestroyService')->name('service.delete');
    Route::get('service', 'WebController@services')->name('admin.service'); 
    
    Route::post('/createpage', 'WebController@CreatePage');   
    Route::post('page/update', 'WebController@UpdatePage')->name('page.update');
    Route::get('page/delete/{id}', 'WebController@DestroyPage')->name('page.delete');
    Route::get('page', 'WebController@page')->name('admin.page'); 
    Route::get('/unpage/{id}', 'WebController@unpage')->name('page.unpublish');
    Route::get('/ppage/{id}', 'WebController@ppage')->name('page.publish');    
    
    Route::post('/createreview', 'WebController@CreateReview');   
    Route::post('review/update', 'WebController@UpdateReview')->name('review.update');
    Route::get('review/edit/{id}', 'WebController@EditReview')->name('review.edit');
    Route::get('review/delete/{id}', 'WebController@DestroyReview')->name('review.delete');
    Route::get('review', 'WebController@review')->name('admin.review'); 
    Route::get('/unreview/{id}', 'WebController@unreview')->name('review.unpublish');
    Route::get('/preview/{id}', 'WebController@preview')->name('review.publish');      
    
    Route::post('/createteam', 'WebController@CreateTeam');   
    Route::post('team/update', 'WebController@UpdateTeam')->name('team.update');
    Route::get('team/edit/{id}', 'WebController@EditTeam')->name('team.edit');
    Route::get('team/delete/{id}', 'WebController@DestroyTeam')->name('team.delete');
    Route::get('team', 'WebController@team')->name('admin.team'); 
    Route::get('/unteam/{id}', 'WebController@unteam')->name('team.unpublish');
    Route::get('/pteam/{id}', 'WebController@pteam')->name('team.publish');    

    Route::get('currency', 'WebController@currency')->name('admin.currency');
    Route::get('pcurrency/{id}', 'WebController@pcurrency')->name('change.currency'); 
    
    Route::get('logo', 'WebController@logo')->name('admin.logo');
    Route::post('updatelogo', 'WebController@UpdateLogo');
    Route::post('updatefavicon', 'WebController@UpdateFavicon');

    Route::get('home-page', 'WebController@homepage')->name('homepage');   
    Route::post('home-page/update', 'WebController@Updatehomepage')->name('homepage.update');
    Route::post('section1/update', 'WebController@section1')->name('section1');   
    Route::post('section2/update', 'WebController@section2')->name('section2');
    Route::post('section3/update', 'WebController@section3')->name('section3');
    Route::post('section4/update', 'WebController@section4')->name('section4');
    Route::post('section6/update', 'WebController@section6')->name('section6');

    //Withdrawal controller
    Route::get('withdraw-log', 'WithdrawController@withdrawlog')->name('admin.withdraw.log');
    Route::get('withdraw/delete/{id}', 'WithdrawController@DestroyWithdrawal')->name('withdraw.delete');
    Route::get('approvewithdraw/{id}', 'WithdrawController@approve')->name('withdraw.approve');
    Route::get('declinewithdraw/{id}', 'WithdrawController@decline')->name('withdraw.decline');   
    Route::get('withdraw-method', 'WithdrawController@withdrawmethod')->name('admin.withdraw.method');
    Route::post('withdraw-method', 'WithdrawController@store')->name('admin.withdraw.store');
    Route::get('withdraw-method/delete/{id}', 'WithdrawController@DestroyMethod')->name('withdrawmethod.delete');
    Route::get('approvewithdrawm/{id}', 'WithdrawController@approvem')->name('withdraw.approvem');
    Route::get('/declinewithdrawm/{id}', 'WithdrawController@declinem')->name('withdraw.declinedm');  
    
    //Deposit controller
    Route::get('bank-transfer', 'DepositController@banktransfer')->name('admin.banktransfer');
    Route::get('bank_transfer/delete/{id}', 'DepositController@DestroyTransfer')->name('banktransfer.delete');
    Route::post('bankdetails', 'DepositController@bankdetails');
    Route::get('deposit-log', 'DepositController@depositlog')->name('admin.deposit.log');
    Route::get('deposit-method', 'DepositController@depositmethod')->name('admin.deposit.method');
    Route::post('storegateway', 'DepositController@store');
    Route::get('approvebk/{id}', 'DepositController@approvebk')->name('deposit.approvebk');
    Route::get('declinebk/{id}', 'DepositController@declinebk')->name('deposit.declinebk');
    Route::get('deposit/delete/{id}', 'DepositController@DestroyDeposit')->name('deposit.delete');
    Route::get('approvedeposit/{id}', 'DepositController@approve')->name('deposit.approve');
    Route::get('declinedeposit/{id}', 'DepositController@decline')->name('deposit.decline');
    
    //Investment controller
    Route::get('py-completed', 'PyschemeController@Completed')->name('admin.py.completed');
    Route::get('py-coupon', 'PyschemeController@Coupon')->name('admin.py.coupon');
    Route::get('py-pending', 'PyschemeController@Pending')->name('admin.py.pending');
    Route::get('py-plans', 'PyschemeController@Plans')->name('admin.py.plans');
    Route::get('py/delete/{id}', 'PyschemeController@Destroy')->name('py.delete');
    Route::get('py-plan/delete/{id}', 'PyschemeController@PlanDestroy')->name('py.plan.delete');
    Route::get('py-plan-create', 'PyschemeController@Create')->name('admin.plan.create');
    Route::post('py-plan-create', 'PyschemeController@Store')->name('admin.plan.store');
    Route::post('py-plan-edit', 'PyschemeController@Update')->name('admin.plan.update');
    Route::get('py-plan/{id}', 'PyschemeController@Edit')->name('admin.plan.edit');
    Route::post('py-coupon-create', 'PyschemeController@Couponstore');
    Route::post('py-coupon-edit', 'PyschemeController@Couponupdate');
    Route::get('/uncoupon/{id}', 'PyschemeController@uncoupon')->name('coupon.unpublish');
    Route::get('/pcoupon/{id}', 'PyschemeController@pcoupon')->name('coupon.publish');
    Route::get('py-coupon/delete/{id}', 'PyschemeController@CouponDestroy')->name('py.coupon.delete');

    //Setting controller
    Route::get('settings', 'SettingController@Settings')->name('admin.setting');
    Route::post('settings', 'SettingController@SettingsUpdate')->name('admin.settings.update');      
    Route::get('sms', 'SettingController@Sms')->name('admin.sms');
    Route::post('sms', 'SettingController@SmsUpdate')->name('admin.sms.update');    
    Route::get('account', 'SettingController@Account')->name('admin.account');
    Route::post('account', 'SettingController@AccountUpdate')->name('admin.account.update');

    //Transfer controller
    Route::get('transfers', 'AdminController@Transfers')->name('admin.transfers');  
    Route::get('referrals', 'AdminController@Referrals')->name('admin.referrals');    
    
    //User controller
    Route::get('users', 'AdminController@Users')->name('admin.users');  
    Route::get('messages', 'AdminController@Messages')->name('admin.message');  
    Route::get('unblock-user/{id}', 'AdminController@Unblockuser')->name('user.unblock');
    Route::get('block-user/{id}', 'AdminController@Blockuser')->name('user.block');
    Route::get('manage-user/{id}', 'AdminController@Manageuser')->name('user.manage');
    Route::get('user/delete/{id}', 'AdminController@Destroyuser')->name('user.delete');
    Route::get('email/{id}/{name}', 'AdminController@Email')->name('admin.email');
    Route::post('email_send', 'AdminController@Sendemail')->name('user.email.send');    
    Route::get('promo', 'AdminController@Promo')->name('admin.promo');
    Route::post('promo', 'AdminController@Sendpromo')->name('user.promo.send');
    Route::get('message/delete/{id}', 'AdminController@Destroymessage')->name('message.delete');
    Route::get('ticket', 'AdminController@Ticket')->name('admin.ticket');
    Route::get('ticket/delete/{id}', 'AdminController@Destroyticket')->name('ticket.delete');
    Route::get('close-ticket/{id}', 'AdminController@Closeticket')->name('ticket.close');
    Route::get('manage-ticket/{id}', 'AdminController@Manageticket')->name('ticket.manage');
    Route::post('reply-ticket', 'AdminController@Replyticket')->name('ticket.reply');
    Route::post('profile-update', 'AdminController@Profileupdate');
    Route::get('approve-kyc/{id}', 'AdminController@Approvekyc')->name('admin.approve.kyc');
    Route::get('reject-kyc/{id}', 'AdminController@Rejectkyc')->name('admin.reject.kyc');

});