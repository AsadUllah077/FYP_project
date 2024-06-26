<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;

use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\tostController;
use App\Http\Controllers\TripTypeController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TripFeatureController;


Route::get('/',[FrontendController::class,'index']);
Route::get('/contact',[FrontendController::class,'contact']);
// Route::get('/menuhome',[FrontendController::class, 'menu_home'])->name('frontend.menuhome');
Route::get('/aboutus',[FrontendController::class, 'about_us'])->name('frontend.aboutus');
Route::get('/contactus',[FrontendController::class, 'contact_us'])->name('contact.us');
Route::get('frontend/destination',[FrontendController::class, 'destination'])->name('frontend.destination');
Route::get('cities/trips/{city_id}',[FrontendController::class, 'city_trips'])->name('city.trips');
Route::get('trip/detail/{trip_id}',[FrontendController::class, 'trip_detail'])->name('trip.detail');
Route::get('hotel/detail/{hotel_id}',[FrontendController::class, 'hotel_detail'])->name('hotel.detail');
Route::get('all/hotels/',[FrontendController::class, 'all_hotel'])->name('all.hotel');
Route::get('all/cities/',[FrontendController::class, 'all_city'])->name('all.cities');
Route::get('city/detail/{city_id}',[FrontendController::class, 'city_detail'])->name('city.detail');
Route::get('all/trips/',[FrontendController::class, 'all_trip'])->name('all.trip');

Route::middleware(['auth'])->group(function () {
    Route::post('booking/book', [FrontendController::class, 'save_booking'])->name('booking.book');
    Route::get('user/profile', [FrontendController::class, 'profile'])->name('user.profile');
    Route::get('booking/history', [FrontendController::class, 'booking_history'])->name('booking.history');
    Route::get('user/review', [FrontendController::class, 'user_review'])->name('user.review');
    Route::post('user/review/add', [FrontendController::class, 'add_review'])->name('feeback.store');
    Route::get('user/update/profile/{id}', [FrontendController::class, 'update_profile'])->name('update.profile');
    Route::post('change/profile', [FrontendController::class, 'change_profile'])->name('change.profile');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';






Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::get('user',[UserController::class,'User' ])->name('users.index');
    Route::get('user/delete/{id}',[UserController::class,'delete' ])->name('user.delete');
    Route::get('user/create',[UserController::class,'create' ])->name('user.create');
    Route::post('user/add',[UserController::class,'store' ])->name('user.add');
    Route::get('user/edit/{id}',[UserController::class,'edit' ])->name('user.edit');
    Route::post('user/update',[UserController::class,'update' ])->name('user.update');
    Route::get('admin',[UserController::class, 'admin'])->name('user.admin');
    Route::get('profile',[UserController::class, 'my_profile'])->name('User.Profile');
    Route::post('profile/edit',[UserController::class, 'edit_profile'])->name('profile.edit');
    Route::post('password/edit',[UserController::class, 'edit_password'])->name('edit.password');




    Route::get('province',[ProvinceController::class,'Province' ])->name('provinces.index');
    Route::get('province/delete/{id}',[ProvinceController::class,'delete' ])->name('province.delete');
    Route::get('province/create',[ProvinceController::class,'create' ])->name('province.create');
    Route::post('province/add',[ProvinceController::class,'store' ])->name('province.add');
    Route::get('province/edit/{id}',[ProvinceController::class,'edit' ])->name('province.edit');
    Route::post('province/update',[ProvinceController::class,'update' ])->name('province.update');

    Route::get('city',[CityController::class,'City' ])->name('cities.index');
    Route::get('city/delete/{id}',[CityController::class,'delete' ])->name('city.delete');
    Route::get('city/create',[CityController::class,'create' ])->name('city.create');
    Route::post('city/add',[CityController::class,'store' ])->name('city.add');
    Route::get('city/edit/{id}',[CityController::class,'edit' ])->name('city.edit');
    Route::post('city/update',[CityController::class,'update' ])->name('city.update');



    Route::get('location',[LocationController::class,'Location' ])->name('locations.index');
    Route::get('location/delete/{id}',[LocationController::class,'delete' ])->name('location.delete');
    Route::get('location/create',[LocationController::class,'create' ])->name('location.create');
    Route::post('location/add',[LocationController::class,'store' ])->name('location.add');
    Route::get('location/edit/{id}',[LocationController::class,'edit' ])->name('location.edit');
    Route::post('location/update',[LocationController::class,'update' ])->name('location.update');


    Route::get('hotel',[HotelController::class,'Hotel' ])->name('hotels.index');
    Route::get('hotel/delete/{id}',[HotelController::class,'delete' ])->name('hotel.delete');
    Route::get('hotel/create',[HotelController::class,'create' ])->name('hotel.create');
    Route::post('hotel/add',[HotelController::class,'store' ])->name('hotel.add');
    Route::get('hotel/edit/{id}',[HotelController::class,'edit' ])->name('hotel.edit');
    Route::post('hotel/update',[HotelController::class,'update' ])->name('hotel.update');


    Route::get('trip',[TripController::class,'Trip' ])->name('trips.index');
    Route::get('trip/delete/{id}',[TripController::class,'delete' ])->name('trip.delete');
    Route::get('trip/create',[TripController::class,'create' ])->name('trip.create');
    Route::post('trip/add',[TripController::class,'store' ])->name('trip.add');
    Route::get('trip/edit/{id}',[TripController::class,'edit' ])->name('trip.edit');
    Route::post('trip/update',[TripController::class,'update' ])->name('trip.update');


    Route::get('triptype',[TripTypeController::class,'TripType' ])->name('triptypes.index');
    Route::get('triptype/delete/{id}',[TripTypeController::class,'delete' ])->name('triptype.delete');
    Route::get('triptype/create',[TripTypeController::class,'create' ])->name('triptype.create');
    Route::post('triptype/add',[TripTypeController::class,'store' ])->name('triptype.add');
    Route::get('triptype/edit/{id}',[TripTypeController::class,'edit' ])->name('triptype.edit');
    Route::post('triptype/update',[TripTypeController::class,'update' ])->name('triptype.update');



    Route::get('tripfeature',[TripFeatureController::class,'TripFeature' ])->name('tripfeatures.index');
    Route::get('tripfeature/delete/{id}',[TripFeatureController::class,'delete' ])->name('tripfeature.delete');
    Route::get('tripfeature/create',[TripFeatureController::class,'create' ])->name('tripfeature.create');
    Route::post('tripfeature/add',[TripFeatureController::class,'store' ])->name('tripfeature.add');
    Route::get('tripfeature/edit/{id}',[TripFeatureController::class,'edit' ])->name('tripfeature.edit');
    Route::post('tripfeature/update',[TripFeatureController::class,'update' ])->name('tripfeature.update');


    Route::get('transport',[TransportController::class,'Transport' ])->name('transports.index');
    Route::get('transport/delete/{id}',[TransportController::class,'delete' ])->name('transport.delete');
    Route::get('transport/create',[TransportController::class,'create' ])->name('transport.create');
    Route::post('transport/add',[TransportController::class,'store' ])->name('transport.add');
    Route::get('transport/edit/{id}',[TransportController::class,'edit' ])->name('transport.edit');
    Route::post('transport/update',[TransportController::class,'update' ])->name('transport.update');

    Route::get('room',[RoomController::class,'Room' ])->name('rooms.index');
    Route::get('room/delete/{id}',[RoomController::class,'delete' ])->name('room.delete');
    Route::get('room/create',[RoomController::class,'create' ])->name('room.create');
    Route::post('room/add',[RoomController::class,'store' ])->name('room.add');
    Route::get('room/edit/{id}',[RoomController::class,'edit' ])->name('room.edit');
    Route::post('room/update',[RoomController::class,'update' ])->name('room.update');


    Route::get('roomtype',[RoomTypeController::class,'RoomType' ])->name('roomtypes.index');
    Route::get('roomtype/delete/{id}',[RoomTypeController::class,'delete' ])->name('roomtype.delete');
    Route::get('roomtype/create',[RoomTypeController::class,'create' ])->name('roomtype.create');
    Route::post('roomtype/add',[RoomTypeController::class,'store' ])->name('roomtype.add');
    Route::get('roomtype/edit/{id}',[RoomTypeController::class,'edit' ])->name('roomtype.edit');
    Route::post('roomtype/update',[RoomTypeController::class,'update' ])->name('roomtype.update');


    Route::get('booking',[BookingController::class,'Booking' ])->name('bookings.index');
    Route::get('booking/delete/{id}',[BookingController::class,'delete' ])->name('booking.delete');
    Route::get('booking/create',[BookingController::class,'create' ])->name('booking.create');
    Route::post('booking/add',[BookingController::class,'store' ])->name('booking.add');
    Route::get('booking/edit/{id}',[BookingController::class,'edit' ])->name('booking.edit');
    Route::post('booking/update',[BookingController::class,'update' ])->name('booking.update');
    Route::get('booking/statuc/{id}/{status}',[BookingController::class,'change_status' ])->name('booking.status');


    Route::get('review',[ReviewController::class,'Review' ])->name('reviews.index');
    Route::get('review/delete/{id}',[ReviewController::class,'delete' ])->name('review.delete');
    Route::get('review/create',[ReviewController::class,'create' ])->name('review.create');
    Route::post('review/add',[ReviewController::class,'store' ])->name('review.add');
    Route::get('review/edit/{id}',[ReviewController::class,'edit' ])->name('review.edit');
    Route::post('review/update',[ReviewController::class,'update' ])->name('review.update');
});




