<?php

use Illuminate\Support\Facades\Route;

//aaa
use App\Http\Controllers\CookieAuthenticationController;
use App\Http\Controllers\DreamController;
use App\Http\Controllers\CruiseController;

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

Route::get('/cruisetest', [CruiseController::class, 'test']);


Route::get('/api/init', [CookieAuthenticationController::class, 'initAction']);


Route::get('/api/hash', [CookieAuthenticationController::class, 'getHash']);

Route::post('/api/m_login', [CookieAuthenticationController::class, 'loginMail']);
Route::post('/api/t_login', [CookieAuthenticationController::class, 'loginTwitter']);

Route::post('/api/registerTwitter', [CookieAuthenticationController::class, 'registerTwitter']);
Route::post('/api/requestRegister', [CookieAuthenticationController::class, 'requestRegister']);
Route::post('/api/register', [CookieAuthenticationController::class, 'register']);

Route::post('/api/requestReset', [CookieAuthenticationController::class, 'requestReset']);
Route::post('/api/resetPassword', [CookieAuthenticationController::class, 'resetPassword']);
Route::post('/api/resetPasswordInit', [CookieAuthenticationController::class, 'resetPasswordInit']);

Route::get('/api/isAuth', [CookieAuthenticationController::class, 'isAuth']);

Route::get('/api/logout', [CookieAuthenticationController::class, 'logout']);

Route::post('/api/getMySeriesList', [DreamController::class, 'getMySeriesList']);

Route::post('/api/contact', [DreamController::class, 'contact']);

Route::get('/api/tete', [CookieAuthenticationController::class, 'tete']);

Route::post('/api/test', [DreamController::class, 'test']);

//twitterカード用
Route::get('/reading/{id}', [DreamController::class, 'snsAction']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/api/getBaseInfo', [DreamController::class, 'getBaseInfo']);

    Route::post('/api/getAuthorInfo', [DreamController::class, 'getAuthorInfo']);
    // Route::post('/api/getMySeriesList', [DreamController::class, 'getMySeriesList']);

    Route::post('/api/getPostList', [DreamController::class, 'getPostList']);

    Route::post('/api/getLatestPostList', [DreamController::class, 'getLatestPostList']);

    Route::post('/api/getMyPostList', [DreamController::class, 'getMyPostList']);

    Route::post('/api/getBookmarkList', [DreamController::class, 'getBookmarkList']);

    Route::post('/api/getFollowList', [DreamController::class, 'getFollowList']);

    Route::post('/api/insertPost', [DreamController::class, 'insertPost']);
    Route::post('/api/updatePost', [DreamController::class, 'updatePost']);
    Route::post('/api/updateFollow', [DreamController::class, 'updateFollow']);
    Route::post('/api/updateMute', [DreamController::class, 'updateMute']);
    Route::post('/api/deletePost', [DreamController::class, 'deletePost']);

    Route::post('/api/getSettingInfo', [DreamController::class, 'getSettingInfo']);
    Route::post('/api/updateSettingBase', [DreamController::class, 'updateSettingBase']);
    Route::post('/api/updateSettingFavorite', [DreamController::class, 'updateSettingFavorite']);
    Route::post('/api/updateSettingMute', [DreamController::class, 'updateSettingMute']);
    Route::post('/api/updateSettingShowTwitter', [DreamController::class, 'updateSettingShowTwitter']);
    Route::post('/api/updateSettingRestrictions', [DreamController::class, 'updateSettingRestrictions']);
    Route::post('/api/deleteUser', [DreamController::class, 'deleteUser']);

    Route::post('/api/reqAuthMail', [CookieAuthenticationController::class, 'requestRegister']);
    Route::post('/api/addAuthMail', [CookieAuthenticationController::class, 'register']);
    Route::post('/api/delAuthMail', [CookieAuthenticationController::class, 'deleteAuthMail']);
    Route::post('/api/updateAuthPassword', [CookieAuthenticationController::class, 'updateAuthPassword']);
    
    Route::post('/api/addAuthTwitter', [CookieAuthenticationController::class, 'addAuthTwitter']);
    Route::post('/api/delAuthTwitter', [CookieAuthenticationController::class, 'deleteAuthTwitter']);


    Route::post('/api/getReadingData', [DreamController::class, 'getReadingData']);
    Route::post('/api/updateBookmark', [DreamController::class, 'updateBookmark']);
    Route::post('/api/getMyPostData', [DreamController::class, 'getMyPostData']);
    Route::post('/api/addStamp', [DreamController::class, 'addStamp']);

    Route::post('/api/getTwitterInfo', [DreamController::class, 'getTwitterInfo']);
    Route::post('/api/checkPublishing', [DreamController::class, 'checkPublishing']);
});

Route::get('/{any}', function () {
    $title = "yumedrop";
    $cardName = "card_base.jpg";
    $description = "ユメドロップの説明です";

    return view('spa.app')->with(['card' => $cardName, 'title' => $title, 'description' => $description]);
})->where('any', '.*');
// Route::get('/{any}', function () {
//     return view('spa.app');
// })->where('any', '.*');