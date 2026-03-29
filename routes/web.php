<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerPartController;
use App\Models\ComputerPart;

Route::get('/', function () {
    $totalParts = ComputerPart::count();
    $totalQuantity = ComputerPart::sum('quantity');
    $totalValue = ComputerPart::sum(\DB::raw('price * quantity'));
    
    return view('home', compact('totalParts', 'totalQuantity', 'totalValue'));
})->name('home');

Route::resource('computer-parts', ComputerPartController::class);
