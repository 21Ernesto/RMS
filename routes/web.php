<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ComplementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\PackageDeliveryController;
use App\Http\Controllers\PromoInnController;

use App\Http\Controllers\Public\CategoryController;
use App\Http\Controllers\Public\MenuController;
use App\Http\Controllers\Public\PaymentController;
use App\Http\Controllers\Public\PaymentPackageController;
use App\Http\Controllers\Public\PaymentPromoController;
use App\Http\Controllers\Public\TripController;

use App\Http\Controllers\SaleDeliveryController;
use App\Http\Controllers\SaleInnController;
use App\Http\Controllers\SalePromoController;

use App\Livewire\CarGallery;
use App\Livewire\Category;
use App\Livewire\FriendsCombo;
use App\Livewire\Mail;
use App\Livewire\MayanTrain;
use App\Livewire\MenuManager;
use App\Livewire\Package;
use App\Livewire\Promotion;
use App\Livewire\Season;
use App\Livewire\Team;
use App\Livewire\Tour;
use App\Livewire\TravelPackage;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/menus', MenuManager::class)->name('menus.index');
    Route::get('/categorias', Category::class)->name('categories.index');
    Route::get('/tours', Tour::class)->name('tours.index');
    Route::get('/packages', Package::class)->name('packages.index');
    Route::get('/promotions', Promotion::class)->name('promotions.index');
    Route::get('/paqueviajes', TravelPackage::class)->name('paqueviajes.index');
    Route::get('/comboamigos', FriendsCombo::class)->name('comboamigos.index');
    Route::get('/trenmaya', MayanTrain::class)->name('trenmaya.index');
    Route::get('/temporada', Season::class)->name('seaseons.index');
    Route::get('/users', User::class)->name('users.index');
    Route::get('/mails', Mail::class)->name('mails.index');
    Route::get('/cars-gallery', CarGallery::class)->name('cars.index');
    Route::get('/teams', Team::class)->name('teams.index');


    Route::get('sale-inn', [SaleInnController::class, 'index'])->name('sale-inn');
    Route::get('sale-promo', [SalePromoController::class, 'index'])->name('sale-promo');
    Route::get('sale-delivery', [SaleDeliveryController::class, 'index'])->name('sale-delivery');


    Route::get('promotions/{trip}/hotel', [PromoInnController::class, 'show'])->name('promotions.hotel');


    Route::get('packages/{trip}/hotel', [PackageDeliveryController::class, 'show'])->name('packages.hotel');
    Route::get('paque-viajes/{trip}/hotel', [PackageDeliveryController::class, 'show'])->name('paqueviajes.hotel');
    Route::get('tren-maya/{trip}/hotel', [PackageDeliveryController::class, 'show'])->name('trenmaya.hotel');



    Route::get('tour/{trip}/complement', [ComplementController::class, 'show'])->name('tours.complement');
    Route::get('paquete/{trip}/complement', [ComplementController::class, 'show'])->name('packages.complement');
    Route::get('promos/{trip}/complement', [ComplementController::class, 'show'])->name('promotions.complement');
    Route::get('paque-viajes/{trip}/complement', [ComplementController::class, 'show'])->name('paqueviajes.complement');
    Route::get('combo-amigo/{trip}/complement', [ComplementController::class, 'show'])->name('comboamigos.complement');
    Route::get('tren-maya/{trip}/complement', [ComplementController::class, 'show'])->name('trenmaya.complement');
});


Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/comprafinalizada', [InicioController::class, 'exits'])->name('comprafinalizada');
Route::get('/aviso_de_privacidad', [InicioController::class, 'privacy'])->name('privacidad');
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');

Route::get('/{slug}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/categoria/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/viaje/{slug}', [TripController::class, 'show'])->name('trip.show');

Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/enviar-formulario', [ContactController::class, 'enviarFormulario'])->name('formulario.enviar');

Route::post('{trip}/stripe', [PaymentController::class, 'stripe'])->name('payment');
Route::get('success/{trip}', [PaymentController::class, 'success'])->name('success');

Route::post('promo/{trip}/stripe', [PaymentPromoController::class, 'stripe'])->name('payment-promo');
Route::get('promo/success/{trip}', [PaymentPromoController::class, 'success'])->name('success-promo');

Route::post('package/{trip}/stripe', [PaymentPackageController::class, 'stripe'])->name('payment-package');
Route::get('package/success/{trip}', [PaymentPackageController::class, 'success'])->name('success-package');