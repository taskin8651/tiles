<?php
use App\Http\Controllers\Custom\ProductController;
use App\Http\Controllers\Custom\ContactController;
use App\Http\Controllers\Custom\BlogController;
use App\Http\Controllers\Custom\ServiceController;
use App\Http\Controllers\Custom\GalleryController;
use App\Http\Controllers\Custom\AboutController;
use App\Http\Controllers\Custom\IndexController;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::post('user-alerts/parse-csv-import', 'UserAlertsController@parseCsvImport')->name('user-alerts.parseCsvImport');
    Route::post('user-alerts/process-csv-import', 'UserAlertsController@processCsvImport')->name('user-alerts.processCsvImport');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController');

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::post('product-categories/parse-csv-import', 'ProductCategoryController@parseCsvImport')->name('product-categories.parseCsvImport');
    Route::post('product-categories/process-csv-import', 'ProductCategoryController@processCsvImport')->name('product-categories.processCsvImport');
    Route::resource('product-categories', 'ProductCategoryController');

    // Products Tag
    Route::delete('products-tags/destroy', 'ProductsTagController@massDestroy')->name('products-tags.massDestroy');
    Route::post('products-tags/parse-csv-import', 'ProductsTagController@parseCsvImport')->name('products-tags.parseCsvImport');
    Route::post('products-tags/process-csv-import', 'ProductsTagController@processCsvImport')->name('products-tags.processCsvImport');
    Route::resource('products-tags', 'ProductsTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Service
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServiceController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServiceController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::post('services/parse-csv-import', 'ServiceController@parseCsvImport')->name('services.parseCsvImport');
    Route::post('services/process-csv-import', 'ServiceController@processCsvImport')->name('services.processCsvImport');
    Route::resource('services', 'ServiceController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::post('blogs/parse-csv-import', 'BlogController@parseCsvImport')->name('blogs.parseCsvImport');
    Route::post('blogs/process-csv-import', 'BlogController@processCsvImport')->name('blogs.processCsvImport');
    Route::resource('blogs', 'BlogController');

    // Logo
    Route::delete('logos/destroy', 'LogoController@massDestroy')->name('logos.massDestroy');
    Route::post('logos/media', 'LogoController@storeMedia')->name('logos.storeMedia');
    Route::post('logos/ckmedia', 'LogoController@storeCKEditorImages')->name('logos.storeCKEditorImages');
    Route::post('logos/parse-csv-import', 'LogoController@parseCsvImport')->name('logos.parseCsvImport');
    Route::post('logos/process-csv-import', 'LogoController@processCsvImport')->name('logos.processCsvImport');
    Route::resource('logos', 'LogoController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::post('brands/parse-csv-import', 'BrandController@parseCsvImport')->name('brands.parseCsvImport');
    Route::post('brands/process-csv-import', 'BrandController@processCsvImport')->name('brands.processCsvImport');
    Route::resource('brands', 'BrandController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::post('teams/parse-csv-import', 'TeamController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamController');

    // Testimoni
    Route::delete('testimonis/destroy', 'TestimoniController@massDestroy')->name('testimonis.massDestroy');
    Route::post('testimonis/parse-csv-import', 'TestimoniController@parseCsvImport')->name('testimonis.parseCsvImport');
    Route::post('testimonis/process-csv-import', 'TestimoniController@processCsvImport')->name('testimonis.processCsvImport');
    Route::resource('testimonis', 'TestimoniController');
    // Admin routes ke andar
Route::post('testimonis/media', [App\Http\Controllers\Admin\TestimoniController::class, 'storeMedia'])
    ->name('testimonis.storeMedia');


    // Enquiry
    Route::delete('enquiries/destroy', 'EnquiryController@massDestroy')->name('enquiries.massDestroy');
    Route::post('enquiries/parse-csv-import', 'EnquiryController@parseCsvImport')->name('enquiries.parseCsvImport');
    Route::post('enquiries/process-csv-import', 'EnquiryController@processCsvImport')->name('enquiries.processCsvImport');
    Route::resource('enquiries', 'EnquiryController');

    // Contact Detail
    Route::delete('contact-details/destroy', 'ContactDetailController@massDestroy')->name('contact-details.massDestroy');
    Route::post('contact-details/parse-csv-import', 'ContactDetailController@parseCsvImport')->name('contact-details.parseCsvImport');
    Route::post('contact-details/process-csv-import', 'ContactDetailController@processCsvImport')->name('contact-details.processCsvImport');
    Route::resource('contact-details', 'ContactDetailController');

    // Add Gallery
    Route::delete('add-galleries/destroy', 'AddGalleryController@massDestroy')->name('add-galleries.massDestroy');
    Route::post('add-galleries/media', 'AddGalleryController@storeMedia')->name('add-galleries.storeMedia');
    Route::post('add-galleries/ckmedia', 'AddGalleryController@storeCKEditorImages')->name('add-galleries.storeCKEditorImages');
    Route::post('add-galleries/parse-csv-import', 'AddGalleryController@parseCsvImport')->name('add-galleries.parseCsvImport');
    Route::post('add-galleries/process-csv-import', 'AddGalleryController@processCsvImport')->name('add-galleries.processCsvImport');
    Route::resource('add-galleries', 'AddGalleryController');

    // Gallery Category
    Route::delete('gallery-categories/destroy', 'GalleryCategoryController@massDestroy')->name('gallery-categories.massDestroy');
    Route::post('gallery-categories/parse-csv-import', 'GalleryCategoryController@parseCsvImport')->name('gallery-categories.parseCsvImport');
    Route::post('gallery-categories/process-csv-import', 'GalleryCategoryController@processCsvImport')->name('gallery-categories.processCsvImport');
    Route::resource('gallery-categories', 'GalleryCategoryController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/', [IndexController::class, 'index'])->name('home');   

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{category}', [IndexController::class, 'show'])
    ->name('category.show');

    // web.php
Route::get('/pdf/{id}', function($id){
    $product = \App\Models\Product::findOrFail($id);
    return response()->file($product->document->getPath());
});



Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
