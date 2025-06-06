<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\Backend\TeamController; 
use App\Http\Controllers\Backend\RoomTypeController; 
use App\Http\Controllers\Backend\RoomController; 
use App\Http\Controllers\Frontend\FrontendRoomController; 
use App\Http\Controllers\Frontend\BookingController; 
use App\Http\Controllers\Backend\RoomListController; 
use App\Http\Controllers\Backend\SettingController; 
use App\Http\Controllers\Backend\TestimonialController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); 
Route::get('/', [UserController::class, 'Index']); 

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile'); 
    Route::post('profile/store', [UserController::class, 'UserStore'])->name('profile.store'); 
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout'); 
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password'); 
    Route::post('/password/change/store', [UserController::class, 'ChangePasswordStore'])->name('password.change.store'); 
});

require __DIR__.'/auth.php'; 
// Admin Group Middleware 
Route::middleware(['auth', 'roles:admin'])->group(function() { 

    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); 
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout'); 
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile'); 
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store'); 
    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password'); 
    Route::post('admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update'); 

}); // End Admin Group Middleware 


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login'); 


// Admin Group Middleware 
Route::middleware(['auth', 'roles:admin'])->group(function() {
    // Team All Route 
    Route::controller(TeamController::class)->group(function() {
        Route::get('/all/team', 'AllTeam')->name('all.team'); 
        Route::get('/add/team', 'AddTeam')->name('add.team'); 
        Route::post('/team/store', 'StoreTeam')->name('team.store'); 
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team'); 
        Route::post('/team/update', 'UpdateTeam')->name('team.update'); 
        Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team'); 
        
    }); 

    //Book Area All Route 
    Route::controller(TeamController::class)->group(function() {

        Route::get('/book/area', 'BookArea')->name('book.area'); 
        Route::post('/book/area/update', 'BookAreaUpdate')->name('book.area.update'); 
    }); 

    // RoomType All Route 
    Route::controller(RoomTypeController::class)->group(function() {

        Route::get('/room/type/list', 'RoomTypeList')->name('room.type.list'); 
        Route::get('/add/room/type', 'AddRoomType')->name('add.room.type'); 
        Route::post('/room/type/store', 'RoomTypeStore')->name('room.type.store'); 
    }); 

    // Room All Route 
    Route::controller(RoomController::class)->group(function() {

        Route::get('/edit/room/{id}', 'EditRoom')->name('edit.room'); 
        Route::post('/update/room/{id}', 'UpdateRoom')->name('update.room'); 
        Route::get('/multi/image/delete/{id}', 'MultiImageDelete')->name('multi.image.delete'); 
        Route::post('/stote/room/no/{id}', 'StoreRoomNumber')->name('store.room.no'); 
        Route::get('/edit/roomno/{id}', 'EditRoomNumber')->name('edit.roomno'); 
        Route::post('/update/roomno/{id}', 'UpdateRoomNumber')->name('update.roomno'); 
        Route::get('/delete/roomno/{id}', 'DeleteRoomNumber')->name('delete.roomno'); 

        Route::get('/delete/room/{id}', 'DeleteRoom')->name('delete.room'); 
    }); 

    // Admin Booking All Route 
    Route::controller(BookingController::class)->group(function() {

        Route::get('/booking/list', 'BookingList')->name('booking.list'); 
        Route::get('/edit_booking/{id}', 'EditBooking')->name('edit_booking'); 
        Route::get('/download/invoice/{id}', 'DownloadInvoice')->name('download.invoice'); 
    }); 

    // Admin Room List All Route
    Route::controller(RoomListController::class)->group(function() {

        Route::get('/view/room/list', 'ViewRoomList')->name('view.room.list'); 
        Route::get('/add/room/list', 'AddRoomList')->name('add.room.list'); 
        Route::post('/store/roomlist', 'StoreRoomList')->name('store.roomlist'); 
    }); 

    // SMTP Setting 
    Route::controller(SettingController::class)->group(function() {

        Route::get('/smtp/setting', 'SmtpSetting')->name('smtp.setting'); 
        Route::post('/smtp/update', 'SmtpUpdate')->name('smtp.update'); 
    }); 

    // Testimonial All Route 
    Route::controller(TestimonialController::class)->group(function() {

        Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial'); 
        Route::get('/add/testimonail', 'AddTestimonial')->name('add.testimonial'); 
        Route::post('/store/testimonial', 'StoreTestimonial')->name('testimonial.store'); 
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial'); 
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('testimonial.update'); 
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial'); 
    }); 
}); // End Admin Group Middleware 

// Room All Route 
Route::controller(FrontendRoomController::class)->group(function() {

    Route::get('/rooms', 'AllFrontendRoomList')->name('froom.all'); 
    Route::get('/room/details/{id}', 'RoomDetailsPage'); 
    Route::get('/bookings', 'BookingSearch')->name('booking.search'); 
    Route::get('/search/room/details/{id}','SearchRoomDetails')->name('search_room_details'); 
    Route::get('/check_room_availability', 'CheckRoomAvailability')->name('check_room_availability'); 
}); 


// Auth Middleware User must have login for access this route 
Route::middleware(['auth'])->group(function() {

    // CHECKOUT All Route 
    Route::controller(BookingController::class)->group(function() {

        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::post('/booking/store', 'BookingStore')->name('user_booking_store'); 
        Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store'); 
        Route::match(['get', 'post'],'/stripe_pay', [BookingController::class, 'stripe_pay'])->name('stripe_pay'); 
        // booking update 
        Route::post('/update/booking/status/{id}', 'UpdateBookingStatus')->name('update.booking.status'); 
        Route::post('update/booking/{id}', 'UpdateBooking')->name('update.booking'); 

        // Assign Room Route 
        Route::get('/assign_room/{id}', 'AssignRoom')->name('assign_room'); 
        Route::get('/assign_room/store/{booking_id}/{room_number_id}', 'AssignRoomStore')->name('assign_room_store'); 
        Route::get('/assign_room_delete/{id}', 'AssignRoomDelete')->name('assign_room_delete'); 

        // User Booking Route 
        Route::get('/user/booking/', 'UserBooking')->name('user.booking'); 
        Route::get('/user/invoice/{id}', 'UserInvoice')->name('user.invoice'); 
    }); 
}); // End Group Auth Middleware 



