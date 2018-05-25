<?php

Auth::routes();

Route::get('/roles-permission',         ['as' => 'debug.roles-permission',   'uses' => 'Portal\SiteController@rolesPermissions', 'middleware' => 'restrictClient']);
Route::get('/',                         ['as' => 'index',                    'uses' => 'Portal\SiteController@index']);
Route::get('/contact',                  ['as' => 'contact',                  'uses' => 'Portal\SiteController@contact']);
Route::get('/contact/{message}',        ['as' => 'contact.message',          'uses' => 'Portal\SiteController@contact']);
Route::get('/how',                      ['as' => 'how',                      'uses' => 'Portal\SiteController@howItWork']);


Route::group(['prefix' => 'user'], function() {
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', ['as' => 'user.profile', 'uses' => 'Portal\User\UserController@userProfile']);
        Route::get('/edit', ['as' => 'user.edit.profile', 'uses' => 'Portal\User\UserController@editProfile']);
        Route::post('/update', ['as' => 'user.update.profile', 'uses' => 'Portal\User\UserController@updateProfile']);
        Route::post('/password/update', ['as' => 'user.update.password', 'uses' => 'Portal\User\UserController@updatePassword']);
        Route::post('/upload/picture', ['as' => 'user.profile.image', 'uses' => 'Portal\User\UserController@uploadProfilePicture']);
    });

    Route::group(['prefix' => 'search'], function() {
        Route::get('/categories', ['as' => 'user.search.categories', 'uses' => 'Portal\SiteController@showCategories']);
        Route::get('/categories/{id}/services', ['as' => 'user.search.services', 'uses' => 'Portal\SiteController@showServices']);
    });

    Route::group(['prefix' => 'request'], function() {
        Route::get('/accept/{providedServiceId}/', ['as' => 'user.request.accept', 'uses' => 'Portal\User\ProvidedServiceController@acceptServiceRequest']);
        Route::get('/refuse/{providedServiceId}/', ['as' => 'user.request.refuse', 'uses' => 'Portal\User\ProvidedServiceController@refuseServiceRequest']);
        Route::get('/cancel/{providedServideId}',  ['as' => 'user.cancel.request', 'uses' => 'Portal\User\ProvidedServiceController@cancelRequest']);
        Route::get('/finish/{providedServiceId}',  ['as' => 'user.finish.request', 'uses' => 'Portal\User\ProvidedServiceController@finishRequest']);
        Route::post('/rate/{providedServiceId}',   ['as' => 'user.rate.request', 'uses' => 'Portal\User\ProvidedServiceController@rateProvidedService']);
    });

    Route::group(['prefix' => 'requests'], function() {
        Route::get('/',         ['as' => 'user.requests', 'uses' => 'Portal\User\ProvidedServiceController@showServicesRequests']);
        Route::get('/currency', ['as' => 'user.current.services', 'uses' => 'Portal\User\ProvidedServiceController@showCurrencyRequests']);
        Route::get('/history',  ['as' => 'user.requested', 'uses' => 'Portal\User\ProvidedServiceController@showServicesHistory']);
    });

    Route::group(['prefix' => 'services'], function() {
        Route::get('/',       ['as' => 'user.services', 'uses' => 'Portal\User\UserController@showOwnServices']);
        Route::post('/store', ['as' => 'user.store.service', 'uses' => 'Portal\User\UserController@storeOwnServices']);
    });

    Route::group(['prefix' => 'abilities'], function() {
        Route::get('/', ['as' => 'user.abilities', 'uses' => 'Portal\User\AbilityController@showOwnUserAbilities']);
        Route::post('/store/', ['as' => 'user.add.abilities', 'uses' => 'Portal\User\AbilityController@storeUserAbilities']);
        Route::get('/delete/{id}', ['as' => 'user.remove.ability', 'uses' => 'Portal\User\AbilityController@deleteUserAbility']);
    });

    Route::get('/{userId}/service_detail/{serviceId}', ['as' => 'user.service.details', 'uses' => 'Portal\SiteController@showUserServiceDetails']);
    Route::post('/request_service/{serviceId}', ['as' => 'user.request.service', 'uses' => 'Portal\SiteController@requestProvidedService']);

});

Route::group(['prefix' => 'admin', 'middleware' => 'restrictClient'], function(){
    Route::get('/',                      ['as' => 'admin.index',             'uses' => 'Portal\SiteController@admin']);

    Route::get('users/',                 ['as' => 'admin.users',             'uses' =>  'Painel\UserController@index']);
    Route::group(['prefix' => 'user'], function() {
        Route::get('/create',            ['as' => 'admin.user.create',       'uses' =>  'Painel\UserController@createUser']);
        Route::post('/store',            ['as' => 'admin.user.store',        'uses' =>  'Painel\UserController@storeUser']);
        Route::get('/edit/{id}',         ['as' => 'admin.user.edit',         'uses' =>  'Painel\UserController@editUser']);
        Route::get('/update/{id}',       ['as' => 'admin.user.update',       'uses' =>  'Painel\UserController@updateUser']);
        Route::get('/delete/{id}',       ['as' => 'admin.user.delete',       'uses' =>  'Painel\UserController@deleteUser']);
        Route::get('/view/{id}',         ['as' => 'admin.user.view',         'uses' =>  'Painel\UserController@viewUser']);
        Route::get('/roles/{id}',        ['as' => 'admin.user.roles',        'uses' =>  'Painel\UserController@rolesUser']);
    });

    Route::get('services/',              ['as' => 'admin.services',          'uses' =>  'Painel\ServiceController@index']);
    Route::group(['prefix' => 'service'], function() {
        Route::get('/create',         ['as' => 'admin.service.create',    'uses' =>  'Painel\ServiceController@createService']);
        Route::post('/store',         ['as' => 'admin.service.store',     'uses' =>  'Painel\ServiceController@storeService']);
        Route::get('/edit/{id}',      ['as' => 'admin.service.edit',      'uses' =>  'Painel\ServiceController@editService']);
        Route::get('/update/{id}',    ['as' => 'admin.service.update',    'uses' =>  'Painel\ServiceController@updateService']);
        Route::get('/delete/{id}',    ['as' => 'admin.service.delete',    'uses' =>  'Painel\ServiceController@deleteService']);
        Route::get('/view/{id}',      ['as' => 'admin.service.view',      'uses' =>  'Painel\ServiceController@viewService']);
    });

    Route::get('roles/',                 ['as' => 'admin.roles',             'uses' => 'Painel\RoleController@index']);
    Route::group(['prefix' => 'role'], function() {
        Route::get('/create',            ['as' => 'admin.role.create',       'uses' => 'Painel\RoleController@createRole']);
        Route::post('/store',            ['as' => 'admin.role.store',        'uses' => 'Painel\RoleController@storeRole']);
        Route::get('/edit/{id}',         ['as' => 'admin.role.edit',         'uses' => 'Painel\RoleController@editRole']);
        Route::get('/update/{id}',       ['as' => 'admin.role.update',       'uses' => 'Painel\RoleController@updateRole']);
        Route::get('/delete/{id}',       ['as' => 'admin.role.delete',       'uses' => 'Painel\RoleController@deleteRole']);
        Route::get('/view/{id}',         ['as' => 'admin.role.view',         'uses' => 'Painel\RoleController@viewRole']);
        Route::get('/users/{id}',        ['as' => 'admin.role.users',        'uses' => 'Painel\RoleController@usersRole']);
        Route::get('/permissions/{id}',  ['as' => 'admin.role.permissions',  'uses' => 'Painel\RoleController@permissionsRole']);
    });

    Route::get('permissions/',           ['as' => 'admin.permissions',       'uses' => 'Painel\PermissionController@index']);
    Route::group(['prefix' => 'permission'], function() {
        Route::get('/create',      ['as' => 'admin.permission.create', 'uses' => 'Painel\PermissionController@createPermission']);
        Route::post('/store',      ['as' => 'admin.permission.store',  'uses' => 'Painel\PermissionController@storePermission']);
        Route::get('/edit/{id}',   ['as' => 'admin.permission.edit',   'uses' => 'Painel\PermissionController@editPermission']);
        Route::get('/update/{id}', ['as' => 'admin.permission.update', 'uses' => 'Painel\PermissionController@updatePermission']);
        Route::get('/delete/{id}', ['as' => 'admin.permission.delete', 'uses' => 'Painel\PermissionController@deletePermission']);
        Route::get('/view/{id}',   ['as' => 'admin.permission.view',   'uses' => 'Painel\PermissionController@viewPermission']);
    });

    Route::get('categories/',            ['as' => 'admin.categories',        'uses' => 'Painel\CategoryController@index']);
    Route::group(['prefix' => 'category'], function() {
        Route::get('/create',        ['as' => 'admin.category.create',  'uses' => 'Painel\CategoryController@createCategory']);
        Route::post('/store',        ['as' => 'admin.category.store',   'uses' => 'Painel\CategoryController@storeCategory']);
        Route::get('/edit/{id}',     ['as' => 'admin.category.edit',    'uses' => 'Painel\CategoryController@editCategory']);
        Route::get('/update/{id}',   ['as' => 'admin.category.update',  'uses' => 'Painel\CategoryController@updateCategory']);
        Route::get('/delete/{id}',   ['as' => 'admin.category.delete',  'uses' => 'Painel\CategoryController@deleteCategory']);
        Route::get('/view/{id}',     ['as' => 'admin.category.view',    'uses' => 'Painel\CategoryController@viewCategory']);
    });

    Route::get('phone_types/',           ['as' => 'admin.phone_types',       'uses' => 'Painel\PhoneTypesController@index']);
    Route::group(['prefix' => 'phone_type'], function() {
        Route::get('/create',      ['as' => 'admin.phone_type.create', 'uses' => 'Painel\PhoneTypesController@createPhoneType']);
        Route::post('/store',      ['as' => 'admin.phone_type.store',  'uses' => 'Painel\PhoneTypesController@storePhoneType']);
        Route::get('/edit/{id}',   ['as' => 'admin.phone_type.edit',   'uses' => 'Painel\PhoneTypesController@editPhoneType']);
        Route::get('/update/{id}', ['as' => 'admin.phone_type.update', 'uses' => 'Painel\PhoneTypesController@updatePhoneType']);
        Route::get('/delete/{id}', ['as' => 'admin.phone_type.delete', 'uses' => 'Painel\PhoneTypesController@deletePhoneType']);
        Route::get('/view/{id}',   ['as' => 'admin.phone_type.view',   'uses' => 'Painel\PhoneTypesController@viewPhoneType']);
        Route::get('/phones/{id}', ['as' => 'admin.phone_type.phones', 'uses' => 'Painel\PhoneTypesController@phonesPhoneType']);
    });

    Route::get('phones/',                ['as' => 'admin.phones',            'uses' => 'Painel\PhoneController@index']);
    Route::group(['prefix' => 'phones'], function() {
        Route::get('/create',           ['as' => 'admin.phone.create',      'uses' => 'Painel\PhoneController@createPhone']);
        Route::post('/store',           ['as' => 'admin.phone.store',       'uses' => 'Painel\PhoneController@storePhone']);
        Route::get('/edit/{id}',        ['as' => 'admin.phone.edit',        'uses' => 'Painel\PhoneController@editPhone']);
        Route::get('/update/{id}',      ['as' => 'admin.phone.update',      'uses' => 'Painel\PhoneController@updatePhone']);
        Route::get('/delete/{id}',      ['as' => 'admin.phone.delete',      'uses' => 'Painel\PhoneController@deletePhone']);
        Route::get('/view/{id}',        ['as' => 'admin.phone.view',        'uses' => 'Painel\PhoneController@viewPhone']);
        Route::get('/users/{id}',       ['as' => 'admin.phone.users',       'uses' => 'Painel\PhoneController@usersPhone']);
    });

});