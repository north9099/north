<?php

use think\facade\Route;

Route::get('/test/miningOrder', 'app/api/v2/app/index/api/Record/setMemberInfo'); //
$NameSpace = 'app/api/v1/app/';
Route::group('v1/', function () use ($NameSpace) {

    Route::post('/app/version', 'app/api/v1/app/versions/api/Version/app'); //版本号


})->allowCrossDomain();
