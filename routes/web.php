<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\OrderComponent;
use App\Http\Livewire\TermsAndConditionsComponent;
use App\Http\Livewire\QuestionsComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSlideComponent;
use App\Http\Livewire\Admin\AdminEditHomeSlideComponent;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminAddBrandComponent;
use App\Http\Livewire\Admin\AdminEditBrandComponent;
use App\Http\Livewire\Admin\AdminMessagesComponent;
use App\Http\Livewire\Admin\AdminDepartmentComponent;
use App\Http\Livewire\Admin\AdminProvinceComponent;
use App\Http\Livewire\Admin\AdminCityComponent;
use App\Http\Livewire\Admin\AdminCityShippingTypeComponent;
use App\Http\Livewire\Admin\AdminShippingTypeComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminTagComponent;
use App\Http\Livewire\Admin\AdminCompanyInfoComponent;
use App\Http\Livewire\Admin\AdminQuestionsComponent;
use App\Http\Livewire\Admin\AdminTermsAndConditionsComponent;

use App\Http\Livewire\User\UserDashboardComponent;

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

Route::get('/', HomeComponent::class)->name('home');

Route::get('/tienda', ShopComponent::class)->name('shop');

Route::get('/producto/{id}/{slug}', DetailsComponent::class)->name('product.details'); 

Route::get('/carrito', CartComponent::class)->name('shop.cart');

Route::get('/wishlist', WishlistComponent::class)->name('shop.wishlist');

Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');

Route::get('/product-category/{category_slug}/{scategory_slug?}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/contact', ContactComponent::class)->name('contact');

Route::get('/about', AboutComponent::class)->name('about');

Route::get('/terminos-y-condiciones', TermsAndConditionsComponent::class)->name('terms-and-conditions');

Route::get('/preguntas-frecuentes', QuestionsComponent::class)->name('questions');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', UserDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}/{scategory_id?}', AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/product/edit/{product_id}', AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('/admin/slider/add', AdminAddHomeSlideComponent::class)->name('admin.home.slide.add');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSlideComponent::class)->name('admin.home.slide.edit');
    Route::get('/admin/brands', AdminBrandComponent::class)->name('admin.brands');
    Route::get('/admin/brand/add', AdminAddBrandComponent::class)->name('admin.brand.add');
    Route::get('/admin/brand/edit/{brand_id}', AdminEditBrandComponent::class)->name('admin.brand.edit');
    Route::get('/admin/messages', AdminMessagesComponent::class)->name('admin.messages');
    Route::get('/admin/locations', AdminDepartmentComponent::class)->name('admin.locations');
    Route::get('/admin/location/{department}', AdminProvinceComponent::class)->name('admin.provinces');
    Route::get('/admin/location/{department}/{province}', AdminCityComponent::class)->name('admin.cities');
    Route::get('/admin/location/{department}/{province}/{city}/metodos-de-envio', AdminCityShippingTypeComponent::class)->name('admin.cities.deliveries');
    Route::get('/admin/tipos-de-envio', AdminShippingTypeComponent::class)->name('admin.shipping.types');
    Route::get('/admin/cupones', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/etiquetas', AdminTagComponent::class)->name('admin.tags');

    Route::get('/order/{order_id}/checkout', CheckoutComponent::class)->name('checkout');

    Route::get('/admin/company-info', AdminCompanyInfoComponent::class)->name('company.info');
    Route::get('/admin/terms-and-conditions', AdminTermsAndConditionsComponent::class)->name('admin.terms-and-conditions');
    Route::get('/admin/preguntas-frecuentes', AdminQuestionsComponent::class)->name('admin.questions');

    Route::post('/admin/products/{product_id}/files', [ProductController::class, 'files'])->name('admin.products.files');
});

require __DIR__.'/auth.php';
