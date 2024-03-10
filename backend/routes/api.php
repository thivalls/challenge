<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChargeController;

Route::apiResource('charges', ChargeController::class)->except('view', 'create');

// Não usaria estas rotas em produção, coloquei apenas para fins de take home test.
// Fiz teste utilizando um processo manual e outro utilizando uma lib
// Adicionei um middleware para não precisar aumentar a configuração de timeout no php.ini, mas depois vi que não havia necessidade
Route::post('billings/upload/lib', [ChargeController::class, 'upload_lib'])->name('billings.upload.lib')->middleware('increaseExecutionTime');
Route::post('billings/upload/native', [ChargeController::class, 'upload_native'])->name('billings.upload.native')->middleware('increaseExecutionTime');
