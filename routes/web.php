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



Auth::routes();

Route::get('/roles-permission', 'Portal\SiteController@rolesPermissions');

Route::get('/',         ['as' => 'index',   'uses' => 'Portal\SiteController@index']);
Route::get('/contact',  ['as' => 'contact', 'uses' => 'Portal\SiteController@contact']);
Route::get('/how',      ['as' => 'how',     'uses' => 'Portal\SiteController@howItWork']);

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Portal\SiteController@admin');

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
    Route::get('category/create/',       ['as' => 'admin.categorie.create',  'uses' => 'Painel\CategoryController@createCategory']);
    Route::post('category/store/',       ['as' => 'admin.categorie.store',   'uses' => 'Painel\CategoryController@storeCategory']);
    Route::get('category/edit/{id}',     ['as' => 'admin.categorie.edit',    'uses' => 'Painel\CategoryController@editCategory']);
    Route::get('category/update/{id}',   ['as' => 'admin.categorie.update',  'uses' => 'Painel\CategoryController@updateCategory']);
    Route::get('category/delete/{id}',   ['as' => 'admin.categorie.delete',  'uses' => 'Painel\CategoryController@deleteCategory']);
    Route::get('category/view/{id}',     ['as' => 'admin.categorie.view',    'uses' => 'Painel\CategoryController@viewCategory']);

    Route::get('phone_types/',           ['as' => 'admin.phone_types',       'uses' => 'Painel\PhoneTypesController@index']);
    Route::get('phone_type/create/',     ['as' => 'admin.phone_type.create', 'uses' => 'Painel\PhoneTypesController@createPhoneType']);
    Route::post('phone_type/store/',     ['as' => 'admin.phone_type.store',  'uses' => 'Painel\PhoneTypesController@storePhoneType']);
    Route::get('phone_type/edit/{id}',   ['as' => 'admin.phone_type.edit',   'uses' => 'Painel\PhoneTypesController@editPhoneType']);
    Route::get('phone_type/update/{id}', ['as' => 'admin.phone_type.update', 'uses' => 'Painel\PhoneTypesController@updatePhoneType']);
    Route::get('phone_type/delete/{id}', ['as' => 'admin.phone_type.delete', 'uses' => 'Painel\PhoneTypesController@deletePhoneType']);
    Route::get('phone_type/view/{id}',   ['as' => 'admin.phone_type.view',   'uses' => 'Painel\PhoneTypesController@viewPhoneType']);

    Route::get('phones/',                ['as' => 'admin.phones',            'uses' => 'Painel\PhoneController@index']);
    Route::get('phone/create/',          ['as' => 'admin.phone.create',      'uses' => 'Painel\PhoneController@createPhone']);
    Route::post('phone/store/',          ['as' => 'admin.phone.store',       'uses' => 'Painel\PhoneController@storePhone']);
    Route::get('phone/edit/{id}',        ['as' => 'admin.phone.edit',        'uses' => 'Painel\PhoneController@editPhone']);
    Route::get('phone/update/{id}',      ['as' => 'admin.phone.update',      'uses' => 'Painel\PhoneController@updatePhone']);
    Route::get('phone/delete/{id}',      ['as' => 'admin.phone.delete',      'uses' => 'Painel\PhoneController@deletePhone']);
    Route::get('phone/view/{id}',        ['as' => 'admin.phone.view',        'uses' => 'Painel\PhoneController@viewPhone']);
    Route::get('phone/users/{id}',       ['as' => 'admin.phone.users',       'uses' => 'Painel\PhoneController@usersPhone']);
});
