<?php


use App\Models\User;
use App\Livewire\Menuadmin;
use Illuminate\Http\Request;
use App\Http\Middleware\LoginUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\DeleteMenuController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PostingKomenController;


Route::GET('/dashboard',function(){
    return view('index',[
        "title" => "Dashboard",
    ]);
})->middleware(LoginUser::class);

Route::get('/registrasi',function(){
    return view('form.sign-up');
});
Route::POST('/registrasi',[RegistrasiController::class,'registrasi']);
Route::get('/login',function(){
    return view('form.sign-in');
});
Route::POST('/login',[LoginController::class,'login']);

Route::GET('/logout',function(Request $request){
    $find = User::find(Auth()->user()->id);
    $find->STATUS_USER = "offline";
    $find->save();
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();   
    return redirect(to: '/login');
});

Route::POST('/tambahuser', [Menuadmin::class, 'tambahuser']);
Route::POST('/Deleteuser',[DeleteUserController::class, 'deleteuser']);
Route::POST('/Deletemenu',[DeleteMenuController::class, 'deletemenu']);

Route::POST('/Tambahlike',[PostingController::class, 'tambahlike']);
Route::POST('/Kuranglike',[PostingController::class, 'kuranglike']);

Route::POST('/Tambahdislike',[PostingController::class, 'tambahdislike']);
Route::POST('/Kurangdislike',[PostingController::class, 'kurangdislike']);

Route::POST('/Tambahlikekomen',[PostingKomenController::class, 'tambahlikekomen']);
Route::POST('/Kuranglikekomen',[PostingKomenController::class, 'kuranglikekomen']);

Route::POST('/Tambahdislikekomen',[PostingKomenController::class, 'tambahdislikekomen']);
Route::POST('/Kurangdislikekomen',[PostingKomenController::class, 'kurangdislikekomen']);

Route::get('/test',function(){
    return view('dashboard');
});

Route::get('/map',function(){
    return view('map');
});

Route::get('/weather', function (Request $request) {
    $lat = $request->query('lat');
    $lon = $request->query('lon');
    $apiKey = config('services.openweather.key'); // Pastikan API key ada di file config/services.php

    $response = Http::get("http://api.openweathermap.org/data/2.5/weather", [
        'lat' => $lat,
        'lon' => $lon,
        'appid' => $apiKey,
        'units' => 'metric',
    ]);
    return $response->json();
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/api', [UserController::class, 'getUsers'])->name('users.getUsers');
































Route::get('/make',function(){
    $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
    $componentName = 'NamaComponent'; 
    $output = shell_exec("php {$projectPath}/artisan livewire:make {$componentName}");
    echo $output;
    $componentPath = "{$projectPath}/resources/views/livewire/{$componentName}.blade.php";
    $htmlContent = <<<HTML
    <div>
        <h1>Ini adalah Komponen Livewire: {$componentName}</h1>
        <p>Selamat datang di komponen ini!</p>
    </div>
    HTML;
    file_put_contents($componentPath, $htmlContent);
    echo "Tag HTML telah ditambahkan ke dalam {$componentName}.blade.php";
});



















// Route::get('data',[UserController::class,'getData']);