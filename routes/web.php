<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController;
use Illuminate\Support\Facades\Route;

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






// Auth::routes();
Route::group(['middleware' => ['web']] , function () {
    Route::get('/', [LoginController::class, 'showloginform'])->name('show.login');
    Route::post('admin-login', [LoginController::class, 'login'])->name('admin-login');
});

Route::group(['middleware' => ['auth',  'admin-lang' , 'web' , 'check-role'] , 'namespace' => 'Dashboard'], function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('edit-profile', [AdminController::class, 'editProfile'])->name('edit-profile');
    Route::put('update-profile', [AdminController::class, 'updateProfile'])->name('update-profile');
    Route::get('home', [
        'uses'      => 'HomeController@index',
        'as'        => 'home',
        'title'     => 'dashboard.home',
        'type'      => 'parent'
    ]);
/*------------ start Of roles ----------*/
    Route::get('roles', [
        'uses'      => 'RoleController@index',
        'as'        => 'roles.index',
        'title'     => 'dashboard.roles',
        'type'      => 'parent',
        'child'     => [ 'roles.create','roles.edit',  'roles.destroy'  ,'roles.deleteAll']
    ]);

    # roles store
    Route::get('roles/create', [
        'uses'  => 'RoleController@create',
        'as'    => 'roles.create',
        'type'      => 'child',
        'title' => ['actions.add', 'dashboard.role']
    ]);

    # roles store
    Route::post('roles/store', [
        'uses'  => 'RoleController@store',
        'as'    => 'roles.store',
        'type'      => 'child',
        'title' => ['actions.add', 'dashboard.role']
    ]);

    # roles update
    Route::get('roles/{id}/edit', [
        'uses'  => 'RoleController@edit',
        'as'    => 'roles.edit',
        'type'      => 'child',
        'title' => ['actions.edit', 'dashboard.role']
    ]);

    # roles update
    Route::put('roles/{id}', [
        'uses'  => 'RoleController@update',
        'as'    => 'roles.update',
        'type'      => 'child',
        'title' => ['actions.edit', 'dashboard.role']
    ]);

    # roles delete
    Route::delete('roles/{id}', [
        'uses'  => 'RoleController@destroy',
        'as'    => 'roles.destroy',
        'type'      => 'child',
        'title' => ['actions.delete', 'dashboard.role']
    ]);
    #delete all roles
    Route::post('delete-all-roles', [
        'uses'  => 'RoleController@deleteAll',
        'as'    => 'roles.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.roles']
    ]);
/*------------ end Of roles ----------*/

/*------------ start Of users ----------*/
    Route::get('users', [
        'uses'      => 'UserController@index',
        'as'        => 'users.index',
        'title'     => 'dashboard.users',
        'type'      => 'parent',
        'child'     => [ 'users.store','users.edit', 'users.update', 'users.destroy'  ,'users.deleteAll' , 'user-attachemts']
    ]);

    # users store
    Route::get('users/create', [
        'uses'  => 'UserController@create',
        'as'    => 'users.create',
        'title' => ['actions.add', 'dashboard.user']
    ]);

    # users store
    Route::post('users/store', [
        'uses'  => 'UserController@store',
        'as'    => 'users.store',
        'title' => ['actions.add', 'dashboard.user']
    ]);

    # users update
    Route::get('users/{id}/edit', [
        'uses'  => 'UserController@edit',
        'as'    => 'users.edit',
        'title' => ['actions.edit', 'dashboard.user']
    ]);

    # users update
    Route::put('users/{id}', [
        'uses'  => 'UserController@update',
        'as'    => 'users.update',
        'title' => ['actions.edit', 'dashboard.user']
    ]);

    # users delete
    Route::delete('users/{id}', [
        'uses'  => 'UserController@destroy',
        'as'    => 'users.destroy',
        'title' => ['actions.delete', 'dashboard.user']
    ]);
    #delete all users
    Route::post('delete-all-users', [
        'uses'  => 'UserController@deleteAll',
        'as'    => 'users.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.users']
    ]);
    Route::get('user-attachemts/{userId}', 
    [
        'uses'  => 'UserController@userAttachemts',
        'as'    => 'user-attachemts',
        'title' => ['actions.show', 'dashboard.user_attachments']
    ]);
/*------------ end Of users ----------*/





/*------------ start Of admins ----------*/
    Route::get('admins', [
        'uses'      => 'AdminController@index',
        'as'        => 'admins.index',
        'title'     => 'dashboard.admins',
        'type'      => 'parent',
        'child'     => [ 'admins.store','admins.edit', 'admins.update', 'admins.destroy'  ,'admins.deleteAll' , 'activations-status' ,'admin-permission']
    ]);

    # admins store
    Route::get('admins/create', [
        'uses'  => 'AdminController@create',
        'as'    => 'admins.create',
        'title' => ['actions.add', 'dashboard.admin']
    ]);

    # admins store
    Route::post('admins/store', [
        'uses'  => 'AdminController@store',
        'as'    => 'admins.store',
        'title' => ['actions.add', 'dashboard.admin']
    ]);

    # admins update
    Route::get('admins/{id}/edit', [
        'uses'  => 'AdminController@edit',
        'as'    => 'admins.edit',
        'title' => ['actions.edit', 'dashboard.admin']
    ]);

    # admins update
    Route::put('admins/{id}', [
        'uses'  => 'AdminController@update',
        'as'    => 'admins.update',
        'title' => ['actions.edit','dashboard.admin']
    ]);

    # admins delete
    Route::delete('admins/{id}', [
        'uses'  => 'AdminController@destroy',
        'as'    => 'admins.destroy',
        'title' => ['actions.delete', 'dashboard.admin']
    ]);
    #delete all admins
    Route::post('delete-all-admins', [
        'uses'  => 'AdminController@deleteAll',
        'as'    => 'admins.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.admins']
    ]);

    Route::get('admin-permissions/{admin_id}', [
        'uses'  => 'AdminController@adminPermissions',
        'as'    => 'admin-permission',
        'title' => ['actions.show', 'dashboard.permissions']
    ]);
    Route::post('activations-status/{admin_id}', [
        'uses'  => 'AdminController@activationStatus',
        'as'    => 'activations-status',
        'title' => ['actions.change', 'dashboard.account_status']
    ]);

/*------------ end Of admins ----------*/

/*------------ start Of notes ----------*/


Route::get('notes', [
    'uses'      => 'NoteController@index',
    'as'        => 'notes.index',
    'title'     => 'dashboard.notes',
    'type'      => 'parent',
    'child'     => [ 'notes.store','notes.edit', 'notes.update', 'notes.destroy'  ,'notes.deleteAll']
]);

# notes store
Route::get('notes/create', [
    'uses'  => 'NoteController@create',
    'as'    => 'notes.create',
    'title' => ['actions.add', 'dashboard.note']
]);

# notes store
Route::post('notes/store', [
    'uses'  => 'NoteController@store',
    'as'    => 'notes.store',
    'title' => ['actions.add', 'dashboard.note']
]);

# notes update
Route::get('notes/{id}/edit', [
    'uses'  => 'NoteController@edit',
    'as'    => 'notes.edit',
    'title' => ['actions.edit', 'dashboard.note']
]);

# notes update
Route::put('notes/{id}', [
    'uses'  => 'NoteController@update',
    'as'    => 'notes.update',
    'title' => ['actions.edit', 'dashboard.note']
]);

# notes delete
Route::delete('notes/{id}', [
    'uses'  => 'NoteController@destroy',
    'as'    => 'notes.destroy',
    'title' => ['actions.delete', 'dashboard.note']
]);
#delete all notes
Route::post('delete-all-notes', [
    'uses'  => 'NoteController@deleteAll',
    'as'    => 'notes.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.notes']
]);


/*------------ end Of notes ----------*/


/*------------ start Of categories ----------*/
    Route::get('categories', [
        'uses'      => 'CategoryController@index',
        'as'        => 'categories.index',
        'title'     => 'dashboard.categories',
        'type'      => 'parent',
        'child'     => [ 'categories.store','categories.edit', 'categories.update', 'categories.destroy'  ,'categories.deleteAll']
    ]);

    # categories store
    Route::get('categories/create', [
        'uses'  => 'CategoryController@create',
        'as'    => 'categories.create',
        'title' => ['actions.add', 'dashboard.category']
    ]);

    # categories store
    Route::post('categories/store', [
        'uses'  => 'CategoryController@store',
        'as'    => 'categories.store',
        'title' => ['actions.add', 'dashboard.category']
    ]);

    # categories update
    Route::get('categories/{id}/edit', [
        'uses'  => 'CategoryController@edit',
        'as'    => 'categories.edit',
        'title' => ['actions.edit', 'dashboard.category']
    ]);

    # categories update
    Route::put('categories/{id}', [
        'uses'  => 'CategoryController@update',
        'as'    => 'categories.update',
        'title' => ['actions.edit', 'dashboard.category']
    ]);

    # categories delete
    Route::delete('categories/{id}', [
        'uses'  => 'CategoryController@destroy',
        'as'    => 'categories.destroy',
        'title' => ['actions.delete', 'dashboard.category']
    ]);
    #delete all categories
    Route::post('delete-all-categories', [
        'uses'  => 'CategoryController@deleteAll',
        'as'    => 'categories.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.categories']
    ]);
/*------------ end Of categories ----------*/




/*------------ start Of banners ----------*/
    Route::get('banners', [
        'uses'      => 'BannerController@index',
        'as'        => 'banners.index',
        'title'     => 'dashboard.banners',
        'type'      => 'parent',
        'child'     => [ 'banners.store','banners.edit', 'banners.update', 'banners.destroy'  ,'banners.deleteAll']
    ]);

    # banners store
    Route::get('banners/create', [
        'uses'  => 'BannerController@create',
        'as'    => 'banners.create',
        'title' => ['actions.add', 'dashboard.banner']
    ]);

    # banners store
    Route::post('banners/store', [
        'uses'  => 'BannerController@store',
        'as'    => 'banners.store',
        'title' => ['actions.add', 'dashboard.banner']
    ]);

    # banners update
    Route::get('banners/{id}/edit', [
        'uses'  => 'BannerController@edit',
        'as'    => 'banners.edit',
        'title' => ['actions.edit', 'dashboard.banner']
    ]);

    # banners update
    Route::put('banners/{id}', [
        'uses'  => 'BannerController@update',
        'as'    => 'banners.update',
        'title' => ['actions.edit', 'dashboard.banner']
    ]);

    # banners delete
    Route::delete('banners/{id}', [
        'uses'  => 'BannerController@destroy',
        'as'    => 'banners.destroy',
        'title' => ['actions.delete', 'dashboard.banner']
    ]);
    #delete all banners
    Route::post('delete-all-banners', [
        'uses'  => 'BannerController@deleteAll',
        'as'    => 'banners.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.banners']
    ]);
/*------------ end Of banners ----------*/


/*------------ start Of initial-pages ----------*/
    Route::get('initial-pages', [
        'uses'      => 'InitialPageController@index',
        'as'        => 'initial-pages.index',
        'title'     => 'dashboard.initial_pages',
        'type'      => 'parent',
        'child'     => [ 'initial-pages.store','initial-pages.edit', 'initial-pages.update', 'initial-pages.destroy'  ,'initial-pages.deleteAll']
    ]);

    # initial-pages store
    Route::get('initial-pages/create', [
        'uses'  => 'InitialPageController@create',
        'as'    => 'initial-pages.create',
        'title' => ['actions.add', 'dashboard.initial_page']
    ]);

    # initial-pages store
    Route::post('initial-pages/store', [
        'uses'  => 'InitialPageController@store',
        'as'    => 'initial-pages.store',
        'title' => ['actions.add', 'dashboard.initial_page']
    ]);

    # initial-pages update
    Route::get('initial-pages/{id}/edit', [
        'uses'  => 'InitialPageController@edit',
        'as'    => 'initial-pages.edit',
        'title' => ['actions.edit', 'dashboard.initial_page']
    ]);

    # initial-pages update
    Route::put('initial-pages/{id}', [
        'uses'  => 'InitialPageController@update',
        'as'    => 'initial-pages.update',
        'title' => ['actions.edit', 'dashboard.initial_page']
    ]);

    # initial-pages delete
    Route::delete('initial-pages/{id}', [
        'uses'  => 'InitialPageController@destroy',
        'as'    => 'initial-pages.destroy',
        'title' => ['actions.delete', 'dashboard.initial_page']
    ]);
    #delete all initial-pages
    Route::post('delete-all-initial-pages', [
        'uses'  => 'InitialPageController@deleteAll',
        'as'    => 'initial-pages.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.initial_pages']
    ]);
/*------------ end Of initial-pages ----------*/

/*------------ start Of products ----------*/
Route::get('products', [
    'uses'      => 'InitialPageController@index',
    'as'        => 'products.index',
    'title'     => 'dashboard.initial_pages',
    'type'      => 'parent',
    'child'     => [ 'products.store','products.edit', 'products.update', 'products.destroy'  ,'products.deleteAll']
]);

# products store
Route::get('products/create', [
    'uses'  => 'InitialPageController@create',
    'as'    => 'products.create',
    'title' => ['actions.add', 'dashboard.initial_page']
]);

# products store
Route::post('products/store', [
    'uses'  => 'InitialPageController@store',
    'as'    => 'products.store',
    'title' => ['actions.add', 'dashboard.initial_page']
]);

# products update
Route::get('products/{id}/edit', [
    'uses'  => 'InitialPageController@edit',
    'as'    => 'products.edit',
    'title' => ['actions.edit', 'dashboard.initial_page']
]);

# products update
Route::put('products/{id}', [
    'uses'  => 'InitialPageController@update',
    'as'    => 'products.update',
    'title' => ['actions.edit', 'dashboard.initial_page']
]);

# products delete
Route::delete('products/{id}', [
    'uses'  => 'InitialPageController@destroy',
    'as'    => 'products.destroy',
    'title' => ['actions.delete', 'dashboard.initial_page']
]);
#delete all products
Route::post('delete-all-products', [
    'uses'  => 'InitialPageController@deleteAll',
    'as'    => 'products.deleteAll',
    'title' => ['actions.delete_all', 'dashboard.initial_pages']
]);
/*------------ end Of products ----------*/


/*------------ start Of Settings----------*/
    Route::get('settings', [
        'uses'      => 'SettingController@index',
        'as'        => 'settings',
        'title'     => 'dashboard.settings',
        'type'      => 'parent',
        'child'     => [
            'update-settings','sms-update' ,
        ]
    ]);

    #update
    Route::put('settings', [
        'uses' => 'SettingController@update',
        'as' => 'update-settings', 
        'title' =>  ['actions.edit', 'dashboard.settings']
    ]);

    #message all
    Route::post('settings/{type}/message-all', [
        'uses'  => 'SettingController@messageAll',
        'as'    => 'settings.message.all',
        'title' => ['actions.send', 'dashboard.all_users']
    ])->where('type','email|sms|notification');

    #message one
    Route::post('settings/{type}/message-one', [
        'uses'  => 'SettingController@messageOne',
        'as'    => 'settings.message.one',
        'title' => ['actions.send', 'dashboard.user']
    ])->where('type','email|sms|notification');

    #send email
    Route::post('settings/send-email', [
        'uses'  => 'SettingController@sendEmail',
        'as'    => 'settings.send_email',
        'title' =>  ['actions.send_email', 'dashboard.user']
    
    ]);

    Route::post('sms-update',[
        'uses'  => 'SettingController@updateSms',
        'as'    => 'sms-update',
        'title' => ['actions.edit', 'dashboard.sms_providers']
    ]);
    
    Route::get('set-lang/{lang}', [
        'uses'  => 'SettingController@SetLanguage',
        'as'    => 'set-lang',
        'title' => 'dashboard.set_lang'
    ]);

/*------------ end Of Settings ----------*/




/*------------ start Of notifications ----------*/
    Route::get('notifications', [
        'uses'      => 'NotificationController@index',
        'as'        => 'notifications.index',
        'title'     => 'dashboard.notifications',
        'type'      => 'parent',
        'child'     => ['notifications.store', 'notifications.destroy'  ,'notifications.deleteAll']
    ]);

    # notifications store
    Route::get('notifications/create', [
        'uses'  => 'NotificationController@create',
        'as'    => 'notifications.create',
        'title' => ['actions.add', 'dashboard.notification']
    ]);

    # notifications store
    Route::post('notifications/store', [
        'uses'  => 'NotificationController@store',
        'as'    => 'notifications.store',
        'title' => ['actions.add', 'dashboard.notification']
    ]);


    # notifications delete
    Route::delete('notifications/{id}', [
        'uses'  => 'NotificationController@destroy',
        'as'    => 'notifications.destroy',
        'title' => ['actions.delete', 'dashboard.notification']
    ]);
    #delete all notifications
    Route::post('delete-all-notifications', [
        'uses'  => 'NotificationController@deleteAll',
        'as'    => 'notifications.deleteAll',
        'title' => ['actions.delete_all', 'dashboard.notifications']
    ]);

    Route::post('send-notification', [

        'uses'  => 'NotificationController@sendNotification',
        'as'    => 'send-notification',
        'title' => 'dashboard.send_notification'
    ]);

    Route::post('storeToken', [
        'uses'  => 'NotificationController@storeToken',
        'as'    => 'notifications.storeToken',
        'title' => 'dashboard.store_token'
    ]);
    Route::post('notify', [
        'uses'  => 'NotificationController@notify',
        'as'    => 'notify',
        'title' => 'dashboard.send_one_notification'
    ]);
    
/*------------ end Of notifications ----------*/


  

/*------------ Never remove this line ----------*/
    

    #new_routes_here
                     
         

});




/*** update route if i added new routes  */
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('update-routes', function (){
    $routes_data    = [];

    foreach (Route::getRoutes() as $route) {
        if ($route->getName()){
            
            $check_permission = Permission::where('name',$route->getName())->count();

            if(!$check_permission)
            {
                $routes_data []   = [ 'name' => $route->getName() , 
                    'nickname_en' =>  $route->getName() ,
                    'nickname_ar' =>  $route->getName() ,
                    'guard_name' => 'web'
                ];
            }
            
        }
    }
    Permission::insert( $routes_data );

    $admin = App\Models\User::find(1);
    $role = Role::find(1);

    $role->givePermissionTo(Permission::all());
    $admin->assignRole('super-admin');

});


Route::get('files/storage/{filePath}', [AdminController::class,'fileStorageServe'])->where(['filePath' => '.*'])->name('serve.file');




 /*** USE AUTH AREA  */
 Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('login', [LoginController::class, 'login']);
 // REHIESTER
 Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
 Route::post('register', [RegisterController::class, 'register']);
 // routes/web.php
 Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
 Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
 Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
 Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
/*** USE AUTH AREA  */