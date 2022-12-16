<?php

use App\Http\Controllers\imagecrudController;
use Illuminate\Support\Facades\Route;

Route::resource('/addimage',imagecrudController::class);
