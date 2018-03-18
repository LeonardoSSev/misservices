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

Route::get('/', 'Portal\SiteController@index')->name('index');
Route::get('/contact', 'Portal\SiteController@contact');
Route::get('/how', 'Portal\SiteController@howItWork');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Portal\SiteController@admin');

    Route::get('users/', 'Painel\UserController@index');
    Route::get('user/create/', 'Painel\UserController@createUser');
    Route::post('user/store/', 'Painel\UserController@storeUser');
    Route::get('user/roles/{id}', 'Painel\UserController@rolesUser');
    Route::get('user/edit/{id}', 'Painel\UserController@editUser');
    Route::get('user/update/{id}', 'Painel\UserController@updateUser');
    Route::get('user/delete/{id}', 'Painel\UserController@deleteUser');
    Route::get('user/view/{id}', 'Painel\UserController@viewUser');

    Route::get('services/', 'Painel\ServiceController@index');
    Route::get('service/create/', 'Painel\ServiceController@createService');
    Route::post('service/store/', 'Painel\ServiceController@storeService');
    Route::get('service/edit/{id}', 'Painel\ServiceController@editService');
    Route::get('service/update/{id}', 'Painel\ServiceController@updateService');
    Route::get('service/delete/{id}', 'Painel\ServiceController@deleteService');
    Route::get('service/view/{id}', 'Painel\ServiceController@viewService');

    Route::get('roles/', 'Painel\RoleController@index');
    Route::get('role/create/', 'Painel\RoleController@createRole');
    Route::post('role/store/', 'Painel\RoleController@storeRole');
    Route::get('role/users/{id}', 'Painel\RoleController@usersRole');
    Route::get('role/permissions/{id}', 'Painel\RoleController@permissionsRole');
    Route::get('role/edit/{id}', 'Painel\RoleController@editRole');
    Route::get('role/update/{id}', 'Painel\RoleController@updateRole');
    Route::get('role/delete/{id}', 'Painel\RoleController@deleteRole');
    Route::get('role/view/{id}', 'Painel\RoleController@viewRole');

    Route::get('permissions/', 'Painel\PermissionController@index');
    Route::get('permission/create/', 'Painel\PermissionController@createPermission');
    Route::post('permission/store/', 'Painel\PermissionController@storePermission');
    Route::get('permission/edit/{id}', 'Painel\PermissionController@editPermission');
    Route::get('permission/update/{id}', 'Painel\PermissionController@updatePermission');
    Route::get('permission/delete/{id}', 'Painel\PermissionController@deletePermission');
    Route::get('permission/view/{id}', 'Painel\PermissionController@viewPermission');

    Route::get('categories/', 'Painel\CategoryController@index');
    Route::get('category/create/', 'Painel\CategoryController@createCategory');
    Route::post('category/store/', 'Painel\CategoryController@storeCategory');
    Route::get('category/edit/{id}', 'Painel\CategoryController@editCategory');
    Route::get('category/update/{id}', 'Painel\CategoryController@updateCategory');
    Route::get('category/delete/{id}', 'Painel\CategoryController@deleteCategory');
    Route::get('category/view/{id}', 'Painel\CategoryController@viewCategory');

    Route::get('phone_types/', 'Painel\PhoneTypesController@index');
    Route::get('phone_type/create/', 'Painel\PhoneTypesController@createPhoneType');
    Route::post('phone_type/store/', 'Painel\PhoneTypesController@storePhoneType');
    Route::get('phone_type/edit/{id}', 'Painel\PhoneTypesController@editPhoneType');
    Route::get('phone_type/update/{id}', 'Painel\PhoneTypesController@updatePhoneType');
    Route::get('phone_type/delete/{id}', 'Painel\PhoneTypesController@deletePhoneType');
    Route::get('phone_type/view/{id}', 'Painel\PhoneTypesController@viewPhoneType');

    Route::get('phones/', 'Painel\PhoneController@index');
    Route::get('phone/create/', 'Painel\PhoneController@createPhone');
    Route::post('phone/store/', 'Painel\PhoneController@storePhone');
    Route::get('phone/edit/{id}', 'Painel\PhoneController@editPhone');
    Route::get('phone/update/{id}', 'Painel\PhoneController@updatePhone');
    Route::get('phone/delete/{id}', 'Painel\PhoneController@deletePhone');
    Route::get('phone/view/{id}', 'Painel\PhoneController@viewPhone');
});
