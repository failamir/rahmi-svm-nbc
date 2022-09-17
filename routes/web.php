<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Dataset
    Route::delete('datasets/destroy', 'DatasetController@massDestroy')->name('datasets.massDestroy');
    Route::post('datasets/parse-csv-import', 'DatasetController@parseCsvImport')->name('datasets.parseCsvImport');
    Route::post('datasets/process-csv-import', 'DatasetController@processCsvImport')->name('datasets.processCsvImport');
    Route::resource('datasets', 'DatasetController');

    // Text Preprocessing
    Route::delete('text-preprocessings/destroy', 'TextPreprocessingController@massDestroy')->name('text-preprocessings.massDestroy');
    Route::post('text-preprocessings/parse-csv-import', 'TextPreprocessingController@parseCsvImport')->name('text-preprocessings.parseCsvImport');
    Route::post('text-preprocessings/process-csv-import', 'TextPreprocessingController@processCsvImport')->name('text-preprocessings.processCsvImport');
    Route::post('text-preprocessings/process', 'TextPreprocessingController@process')->name('text-preprocessings.process');
    Route::resource('text-preprocessings', 'TextPreprocessingController');

    // Nbc
    Route::delete('nbcs/destroy', 'NbcController@massDestroy')->name('nbcs.massDestroy');
    Route::post('nbcs/parse-csv-import', 'NbcController@parseCsvImport')->name('nbcs.parseCsvImport');
    Route::post('nbcs/process-csv-import', 'NbcController@processCsvImport')->name('nbcs.processCsvImport');
    Route::resource('nbcs', 'NbcController');

    // Svm
    Route::delete('svms/destroy', 'SvmController@massDestroy')->name('svms.massDestroy');
    Route::post('svms/parse-csv-import', 'SvmController@parseCsvImport')->name('svms.parseCsvImport');
    Route::post('svms/process-csv-import', 'SvmController@processCsvImport')->name('svms.processCsvImport');
    Route::resource('svms', 'SvmController');
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
