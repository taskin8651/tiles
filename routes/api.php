<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // User Alerts
    Route::apiResource('user-alerts', 'UserAlertsApiController');

    // Product Category
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Products Tag
    Route::apiResource('products-tags', 'ProductsTagApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Service
    Route::post('services/media', 'ServiceApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServiceApiController');

    // Blog
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Logo
    Route::post('logos/media', 'LogoApiController@storeMedia')->name('logos.storeMedia');
    Route::apiResource('logos', 'LogoApiController');

    // Brand
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Team
    Route::post('teams/media', 'TeamApiController@storeMedia')->name('teams.storeMedia');
    Route::apiResource('teams', 'TeamApiController');

    // Testimoni
    Route::apiResource('testimonis', 'TestimoniApiController');

    // Enquiry
    Route::apiResource('enquiries', 'EnquiryApiController');

    // Contact Detail
    Route::apiResource('contact-details', 'ContactDetailApiController');

    // Add Gallery
    Route::post('add-galleries/media', 'AddGalleryApiController@storeMedia')->name('add-galleries.storeMedia');
    Route::apiResource('add-galleries', 'AddGalleryApiController');

    // Gallery Category
    Route::apiResource('gallery-categories', 'GalleryCategoryApiController');
});
