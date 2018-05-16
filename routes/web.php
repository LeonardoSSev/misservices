<?php

Auth::routes();

Route::get('/roles-permission',         ['as' => 'debug.roles-permission',   'uses' => 'Portal\SiteController@rolesPermissions', 'middleware' => 'restrictClient']);
Route::get('/',                         ['as' => 'index',                    'uses' => 'Portal\SiteController@index']);
Route::get('/contact',                  ['as' => 'contact',                  'uses' => 'Portal\SiteController@contact']);
Route::get('/how',                      ['as' => 'how',                      'uses' => 'Portal\SiteController@howItWork']);


Route::group(['prefix' => 'user'], function() {
    Route::get('/profile', ['as' => 'user.profile', 'uses' => 'Portal\User\UserController@userProfile']);
    Route::get('/profile/edit', ['as' => 'user.edit.profile', 'uses' => 'Portal\User\UserController@editProfile']);
    Route::get('/services', ['as' => 'user.services', 'uses' => 'Portal\User\UserController@showOwnServices']);
    Route::post('/services/store', ['as' => 'user.store.service', 'uses' => 'Portal\User\UserController@storeOwnServices']);
    Route::post('/profile/update', ['as' => 'user.update.profile', 'uses' => 'Portal\User\UserController@updateProfile']);
    Route::post('/profile/password/update', ['as' => 'user.update.password', 'uses' => 'Portal\User\UserController@updatePassword']);
    Route::post('/profile/upload/picture', ['as' => 'user.profile.image', 'uses' => 'Portal\User\UserController@uploadProfilePicture']);
    Route::get('/search/categories', ['as' => 'user.search.categories', 'uses' => 'Portal\SiteController@showCategories']);
    Route::get('/search/categories/{id}/services', ['as' => 'user.search.services', 'uses' => 'Portal\SiteController@showServices']);
    Route::get('/{userId}/service_detail/{serviceId}', ['as' => 'user.service.details', 'uses' => 'Portal\SiteController@showUserServiceDetails']);

    Route::get('/requests', ['as' => 'user.requests', 'uses' => 'Portal\User\UserController@showServicesRequests']);
    Route::get('/requests/currency', ['as' => 'user.current.services', 'uses' => 'Portal\User\UserController@showCurrencyRequests']);
    Route::get('/request/cancel/{id}', ['as' => 'user.cancel.request', 'uses' => 'Portal\User\UserController@cancelRequest']);
    Route::get('/abilities', ['as' => 'user.abilities', 'uses' => 'Portal\User\UserController@showOwnUserAbilities']);
    Route::post('/abilities/store/', ['as' => 'user.add.abilities', 'uses' => 'Portal\User\UserController@storeUserAbilities']);
    Route::get('/abilities/delete/{id}', ['as' => 'user.remove.ability', 'uses' => 'Portal\User\UserController@deleteUserAbility']);
    Route::get('/requests/history', ['as' => 'user.requested', 'uses' => 'Portal\User\UserController@showServicesHistory']);
    Route::post('/request_service/{serviceId}', ['as' => 'user.request.service', 'uses' => 'Portal\SiteController@requestProvidedService']);
    Route::get('/request/accept/{providedServiceId}/', ['as' => 'user.request.accept', 'uses' => 'Portal\User\UserController@acceptServiceRequest']);
    Route::get('/request/refuse/{providedServiceId}/', ['as' => 'user.request.refuse', 'uses' => 'Portal\User\UserController@refuseServiceRequest']);

});

Route::group(['prefix' => 'admin', 'middleware' => 'restrictClient'], function(){
    Route::get('/',                      ['as' => 'admin.index',             'uses' => 'Portal\SiteController@admin']);

    Route::get('users/',                 ['as' => 'admin.users',             'uses' =>  'Painel\UserController@index']);
    Route::get('user/create/',           ['as' => 'admin.user.create',       'uses' =>  'Painel\UserController@createUser']);
    Route::post('user/store/',           ['as' => 'admin.user.store',        'uses' =>  'Painel\UserController@storeUser']);
    Route::get('user/edit/{id}',         ['as' => 'admin.user.edit',         'uses' =>  'Painel\UserController@editUser']);
    Route::get('user/update/{id}',       ['as' => 'admin.user.update',       'uses' =>  'Painel\UserController@updateUser']);
    Route::get('user/delete/{id}',       ['as' => 'admin.user.delete',       'uses' =>  'Painel\UserController@deleteUser']);
    Route::get('user/view/{id}',         ['as' => 'admin.user.view',         'uses' =>  'Painel\UserController@viewUser']);
    Route::get('user/roles/{id}',        ['as' => 'admin.user.roles',        'uses' =>  'Painel\UserController@rolesUser']);

    Route::get('services/',              ['as' => 'admin.services',          'uses' =>  'Painel\ServiceController@index']);
    Route::get('service/create/',        ['as' => 'admin.service.create',    'uses' =>  'Painel\ServiceController@createService']);
    Route::post('service/store/',        ['as' => 'admin.service.store',     'uses' =>  'Painel\ServiceController@storeService']);
    Route::get('service/edit/{id}',      ['as' => 'admin.service.edit',      'uses' =>  'Painel\ServiceController@editService']);
    Route::get('service/update/{id}',    ['as' => 'admin.service.update',    'uses' =>  'Painel\ServiceController@updateService']);
    Route::get('service/delete/{id}',    ['as' => 'admin.service.delete',    'uses' =>  'Painel\ServiceController@deleteService']);
    Route::get('service/view/{id}',      ['as' => 'admin.service.view',      'uses' =>  'Painel\ServiceController@viewService']);

    Route::get('roles/',                 ['as' => 'admin.roles',             'uses' => 'Painel\RoleController@index']);
    Route::get('role/create/',           ['as' => 'admin.role.create',       'uses' => 'Painel\RoleController@createRole']);
    Route::post('role/store/',           ['as' => 'admin.role.store',        'uses' => 'Painel\RoleController@storeRole']);
    Route::get('role/edit/{id}',         ['as' => 'admin.role.edit',         'uses' => 'Painel\RoleController@editRole']);
    Route::get('role/update/{id}',       ['as' => 'admin.role.update',       'uses' => 'Painel\RoleController@updateRole']);
    Route::get('role/delete/{id}',       ['as' => 'admin.role.delete',       'uses' => 'Painel\RoleController@deleteRole']);
    Route::get('role/view/{id}',         ['as' => 'admin.role.view',         'uses' => 'Painel\RoleController@viewRole']);
    Route::get('role/users/{id}',        ['as' => 'admin.role.users',        'uses' => 'Painel\RoleController@usersRole']);
    Route::get('role/permissions/{id}',  ['as' => 'admin.role.permissions',  'uses' => 'Painel\RoleController@permissionsRole']);

    Route::get('permissions/',           ['as' => 'admin.permissions',       'uses' => 'Painel\PermissionController@index']);
    Route::get('permission/create/',     ['as' => 'admin.permission.create', 'uses' => 'Painel\PermissionController@createPermission']);
    Route::post('permission/store/',     ['as' => 'admin.permission.store',  'uses' => 'Painel\PermissionController@storePermission']);
    Route::get('permission/edit/{id}',   ['as' => 'admin.permission.edit',   'uses' => 'Painel\PermissionController@editPermission']);
    Route::get('permission/update/{id}', ['as' => 'admin.permission.update', 'uses' => 'Painel\PermissionController@updatePermission']);
    Route::get('permission/delete/{id}', ['as' => 'admin.permission.delete', 'uses' => 'Painel\PermissionController@deletePermission']);
    Route::get('permission/view/{id}',   ['as' => 'admin.permission.view',   'uses' => 'Painel\PermissionController@viewPermission']);

    Route::get('categories/',            ['as' => 'admin.categories',        'uses' => 'Painel\CategoryController@index']);
    Route::get('category/create/',       ['as' => 'admin.category.create',  'uses' => 'Painel\CategoryController@createCategory']);
    Route::post('category/store/',       ['as' => 'admin.category.store',   'uses' => 'Painel\CategoryController@storeCategory']);
    Route::get('category/edit/{id}',     ['as' => 'admin.category.edit',    'uses' => 'Painel\CategoryController@editCategory']);
    Route::get('category/update/{id}',   ['as' => 'admin.category.update',  'uses' => 'Painel\CategoryController@updateCategory']);
    Route::get('category/delete/{id}',   ['as' => 'admin.category.delete',  'uses' => 'Painel\CategoryController@deleteCategory']);
    Route::get('category/view/{id}',     ['as' => 'admin.category.view',    'uses' => 'Painel\CategoryController@viewCategory']);

    Route::get('phone_types/',           ['as' => 'admin.phone_types',       'uses' => 'Painel\PhoneTypesController@index']);
    Route::get('phone_type/create/',     ['as' => 'admin.phone_type.create', 'uses' => 'Painel\PhoneTypesController@createPhoneType']);
    Route::post('phone_type/store/',     ['as' => 'admin.phone_type.store',  'uses' => 'Painel\PhoneTypesController@storePhoneType']);
    Route::get('phone_type/edit/{id}',   ['as' => 'admin.phone_type.edit',   'uses' => 'Painel\PhoneTypesController@editPhoneType']);
    Route::get('phone_type/update/{id}', ['as' => 'admin.phone_type.update', 'uses' => 'Painel\PhoneTypesController@updatePhoneType']);
    Route::get('phone_type/delete/{id}', ['as' => 'admin.phone_type.delete', 'uses' => 'Painel\PhoneTypesController@deletePhoneType']);
    Route::get('phone_type/view/{id}',   ['as' => 'admin.phone_type.view',   'uses' => 'Painel\PhoneTypesController@viewPhoneType']);
    Route::get('phone_type/phones/{id}', ['as' => 'admin.phone_type.phones', 'uses' => 'Painel\PhoneTypesController@phonesPhoneType']);

    Route::get('phones/',                ['as' => 'admin.phones',            'uses' => 'Painel\PhoneController@index']);
    Route::get('phone/create/',          ['as' => 'admin.phone.create',      'uses' => 'Painel\PhoneController@createPhone']);
    Route::post('phone/store/',          ['as' => 'admin.phone.store',       'uses' => 'Painel\PhoneController@storePhone']);
    Route::get('phone/edit/{id}',        ['as' => 'admin.phone.edit',        'uses' => 'Painel\PhoneController@editPhone']);
    Route::get('phone/update/{id}',      ['as' => 'admin.phone.update',      'uses' => 'Painel\PhoneController@updatePhone']);
    Route::get('phone/delete/{id}',      ['as' => 'admin.phone.delete',      'uses' => 'Painel\PhoneController@deletePhone']);
    Route::get('phone/view/{id}',        ['as' => 'admin.phone.view',        'uses' => 'Painel\PhoneController@viewPhone']);
    Route::get('phone/users/{id}',       ['as' => 'admin.phone.users',       'uses' => 'Painel\PhoneController@usersPhone']);
});