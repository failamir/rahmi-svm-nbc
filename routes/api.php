<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Dataset
    Route::apiResource('datasets', 'DatasetApiController');

    // Text Preprocessing
    Route::apiResource('text-preprocessings', 'TextPreprocessingApiController');

    // Nbc
    Route::apiResource('nbcs', 'NbcApiController');

    // Svm
    Route::apiResource('svms', 'SvmApiController');
});
