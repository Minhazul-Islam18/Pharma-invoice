<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\File;
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

Route::group(['middleware' => 'auth'], function () {

    //POS
    Route::get('/app/pos', 'PosController@index')->name('app.pos.index');
    Route::post('/app/pos', 'PosController@store')->name('app.pos.store');

    //Generate PDF
    Route::get('/sales/pdf/{id}', function ($id) {
        $sale = \Modules\Sale\Entities\Sale::with('customer')->find($id);
        $superAdmin = User::whereHas('roles', function ($query) {
            $query->where('name', Role::SUPERADMIN)
                ->orWhere('name', Role::ADMIN);
        })->first();
        // Render the view to HTML
        $html = view('sale::print', [
            'sale' => $sale,
            'customer' => $sale->customer,
            'superAdmin' => $superAdmin,
        ])->render();

        // Initialize dompdf
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);  // Enable PHP within HTML if necessary
        $dompdf->setOptions($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('legal', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Stream the file (download in the browser)
        return $dompdf->stream('example.pdf', ['Attachment' => 0]);  // Use 'Attachment' => 1 to force download
    })->name('sales.pdf');

    Route::get('/sales/pos/pdf/{id}', function ($id) {
        $sale = \Modules\Sale\Entities\Sale::findOrFail($id);

        $pdf = \PDF::loadView('sale::print-pos', [
            'sale' => $sale,
        ])->setPaper('a7')
            ->setOption('margin-top', 8)
            ->setOption('margin-bottom', 8)
            ->setOption('margin-left', 5)
            ->setOption('margin-right', 5);

        return $pdf->stream('sale-' . $sale->reference . '.pdf');
    })->name('sales.pos.pdf');

    //Sales
    Route::resource('sales', 'SaleController');

    //Payments
    Route::get('/sale-payments/{sale_id}', 'SalePaymentsController@index')->name('sale-payments.index');
    Route::get('/sale-payments/{sale_id}/create', 'SalePaymentsController@create')->name('sale-payments.create');
    Route::post('/sale-payments/store', 'SalePaymentsController@store')->name('sale-payments.store');
    Route::get('/sale-payments/{sale_id}/edit/{salePayment}', 'SalePaymentsController@edit')->name('sale-payments.edit');
    Route::patch('/sale-payments/update/{salePayment}', 'SalePaymentsController@update')->name('sale-payments.update');
    Route::delete('/sale-payments/destroy/{salePayment}', 'SalePaymentsController@destroy')->name('sale-payments.destroy');
});
