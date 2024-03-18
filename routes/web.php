<?php

use App\Http\Controllers\AddAssetController;
use App\Http\Controllers\AddAssistantManagersController;
use App\Http\Controllers\AddChasResourceController;
use App\Http\Controllers\AddChssResourceController;
use App\Http\Controllers\AddCiveResourceController;
use App\Http\Controllers\AddCnmsResourceController;
use App\Http\Controllers\AddCoBEResourceController;
use App\Http\Controllers\AddCoEDResourceController;
use App\Http\Controllers\AddCoESEResourcesController;
use App\Http\Controllers\AddCollegeManagerController;
use App\Http\Controllers\AddSupplierPhoneNumbersController;
use App\Http\Controllers\AddSuppliersController;
use App\Http\Controllers\AddSupplierServicesController;
use App\Http\Controllers\AssetStatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CnmsReportController;
use App\Http\Controllers\CollegeInventoryManagerReportController;
use App\Http\Controllers\CollegeResourceAllocationController;
use App\Http\Controllers\EditAssetController;
use App\Http\Controllers\EditCiveResourceStatusController;
use App\Http\Controllers\EditCollegeNameController;
use App\Http\Controllers\EditResourcesAllocationController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeDataController;
use App\Http\Controllers\QrCodeReaderController;
use App\Http\Controllers\ResourceAllocationController;
use App\Http\Controllers\UpdateAssetStatusController;
use App\Http\Controllers\UpdateResourceAllocationStatusController;
use App\Http\Controllers\ViewAllocatedResourcesController;
use App\Http\Controllers\ViewAssistantInventoryManagersController;
use App\Http\Controllers\ViewChssCreatedResourcesController;
use App\Http\Controllers\ViewCiveCreatedResourcesController;
use App\Http\Controllers\ViewCnmsCreatedResourcesController;
use App\Http\Controllers\ViewCnmsReportController;
use App\Http\Controllers\ViewCoBECreatedResourcesController;
use App\Http\Controllers\ViewCoEDCreatedResourcesController;
use App\Http\Controllers\ViewCoESECreatedResourcesController;
use App\Http\Controllers\ViewCollegeAllocationsController;
use App\Http\Controllers\ViewCollegeInventoryManagerController;
use App\Http\Controllers\ViewItemPDFController;
use App\Http\Controllers\ViewPhoneNumbersController;
use App\Http\Controllers\ViewSuppliersController;
use App\Models\Asset;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ------------------------------------------------------------------------------------------------------

// Home page
Route::get('/', function () {
    return view('welcome');
});

// End of home page routes

// -----------------------------------------------------------------------------------------------------

// Dashboard routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// End of Dashboard routes

// ---------------------------------------------------------------------------------------------------

Route::middleware('auth')->group(function () {

    // ---------------------------------------------------------------------------------------

    // profile routes

    Route::get('/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // End of profile routes

    // --------------------------------------------------------------------------------------

    // Category routes

    Route::get('UIMS/add-category', [CategoryController::class, 'index']);

    // End of category routes

    // -------------------------------------------------------------------------------------


    // Asset routes

    Route::get('UIMS/add-assets', [Asset::class, 'index']);
    Route::get('UIMS/edit-assets/{id}', [EditAssetController::class, 'index']);
    Route::get('UIMS/add-asset-status', [AssetStatusController::class, 'index']);
    Route::get('UIMS/update-asset-status/{id}', [UpdateAssetStatusController::class, 'index']);

    // End of Assets routes

    // ------------------------------------------------------------------------------------

    // Phone number routes

    Route::get('UIMS/add-phone-number', [PhoneNumberController::class, 'index']);
    Route::get('UIMS/view-phone-numbers', [ViewPhoneNumbersController::class, 'index']);


    // End of phone number routes

    // -----------------------------------------------------------------------------------------

    // Asset

    Route::get('UIMS/add-asset', [AddAssetController::class, 'index']);
    Route::get('UIMS/view-asset-pdf', [ViewItemPDFController::class, 'index']);

    // End of Asset routes

    // -----------------------------------------------------------------------------------------------

    // Resource Allocations routes

    Route::get('UIMS/resource-allocation', [ResourceAllocationController::class, 'index']);
    Route::get('UIMS/view-resource-allocation', [ViewAllocatedResourcesController::class, 'index']);
    Route::get('UIMS/update-resource-allocation/{id}', [UpdateResourceAllocationStatusController::class, 'index']);
    Route::get('UIMS/college-resource-allocation', [CollegeResourceAllocationController::class, 'index']);
    Route::get('UIMS/view-college-resource-allocation', [ViewCollegeAllocationsController::class, 'index']);


    // End of Resource Allocations routes

    // -------------------------------------------------------------------------------------------------

    // Assistant routes

    Route::get('UIMS/register-assistant', [AddAssistantManagersController::class, 'index']);
    Route::get('UIMS/view-assistants', [ViewAssistantInventoryManagersController::class, 'index']);

    // End of Assistant routes

    // --------------------------------------------------------------------------------------------

    // College Manager routes

    Route::get('UIMS/add-college-managers', [AddCollegeManagerController::class, 'index']);
    Route::get('UIMS/view-college-managers', [ViewCollegeInventoryManagerController::class, 'index']);
    Route::get('UIMS/edit-college-name/{id}', [EditCollegeNameController::class, 'index']);
    Route::get('UIMS/report', [CollegeInventoryManagerReportController::class, 'index']);

    // End of College Manager routes

    // -----------------------------------------------------------------------------------------------------

    // College of Health and Allied Science ( CHAS ) Routes

    Route::get('UIMS/add-chas-resources', [AddChasResourceController::class, 'index']);

    // End of College of Health and Allied Science ( CHAS ) Routes

    //---------------------------------------------------------------------------------------------------

        // College of Humanities and Social Science ( CHSS ) Routes

        Route::get('UIMS/add-chss-resources', [AddChssResourceController::class, 'index']);
        Route::get('UIMS/view-chss-created-resources', [ViewChssCreatedResourcesController::class, 'index']);

        // End of College of Humanities and Social Science ( CHSS ) Routes

        //---------------------------------------------------------------------------------------------------

        // College of Informatics and Virtual Education ( CIVE )

        Route::get('UIMS/add-cive-resources', [AddCiveResourceController::class, 'index']);
        Route::post('UIMS/add-cive-resources', [AddCiveResourceController::class, 'index']);
        Route::get('UIMS/view-cive-created-resources', [ViewCiveCreatedResourcesController::class, 'index']);
        Route::get('UIMS/view-cive-resource-status/{id}', [EditCiveResourceStatusController::class, 'index']);

        // End of College of Informatics and Virtual Education ( CIVE )

        // -------------------------------------------------------------------------------------------------------------------------

        // College of Natural and Mathematical Science ( CNMS ) Routes

        Route::get('UIMS/add-cnms-resources', [AddCnmsResourceController::class, 'index']);
        Route::get('UIMS/view-cnms-created-resources', [ViewCnmsCreatedResourcesController::class, 'index']);

        // ----------------------------------- CNMS Reports Routes -------------------------------
        Route::get('UIMS/cnms-report', [CnmsReportController::class, 'index']);
        Route::get('UIMS/view-cnms-report', [ViewCnmsReportController::class, 'index']);

        // End of College of Natural and Mathematical Science ( CNMS ) Routes

        // -------------------------------------------------------------------------------------------

        // College of Business and Economics ( CoBE ) Routes

        Route::get('UIMS/add-cobe-resources', [AddCoBEResourceController::class, 'index']);
        Route::get('UIMS/view-cobe-created-resources', [ViewCoBECreatedResourcesController::class, 'index']);

        // End of College of Business and Economics Routes

        // ------------------------------------------------------------------------------------------

        // College of Earth Science and Engineering ( CoESE ) Routes

        Route::get('UIMS/add-coese-resources', [AddCoESEResourcesController::class, 'index']);
        Route::get('UIMS/view-coese-created-resources', [ViewCoESECreatedResourcesController::class, 'index']);

        // End of Earth Science and Engineering ( CoESE ) Routes

        // -----------------------------------------------------------------------------------------------

        // College of Education ( CoED ) Routes

        Route::get('UIMS/add-coed-resources', [AddCoEDResourceController::class, 'index']);
        Route::get('UIMS/view-coed-created-resources', [ViewCoEDCreatedResourcesController::class, 'index']);

        // End of College of Education ( CoED ) Routes

        // --------------------------------------------------------------------------------------------------

        // Suppliers routes

        Route::get('UIMS/register-suppliers', [AddSuppliersController::class, 'index']);
        Route::get('UIMS/register-supplier-phone-numbers', [AddSupplierPhoneNumbersController::class, 'index']);
        Route::get('UIMS/register-supplier-services', [AddSupplierServicesController::class, 'index']);
        Route::get('UIMS/view-suppliers', [ViewSuppliersController::class, 'index']);

        // End of Suppliers routes

        // --------------------------------------------------------------------------------------------------------------------------

        // Qr code reader routes

        Route::get('UIMS/qr-code-reader', [QrCodeReaderController::class, 'index']);
        Route::get('UIMS/qr-code-asset-update/{id}', [QrCodeDataController::class, 'index'])->name('qr-code-resource-update');
        Route::patch('/resource-update-status/{id}', [QrCodeDataController::class, 'update'])->name('resource-update');
});

require __DIR__.'/auth.php';
