<?php

use App\Http\Controllers\AddAccountantController;
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
use App\Http\Controllers\AssetMovementController;
use App\Http\Controllers\AssetStatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChasDetailsReportController;
use App\Http\Controllers\ChasReportController;
use App\Http\Controllers\ChasVerificationAndApprovalController;
use App\Http\Controllers\ChssDetailsReportController;
use App\Http\Controllers\ChssReportController;
use App\Http\Controllers\CiveDetailsReportController;
use App\Http\Controllers\CiveReportController;
use App\Http\Controllers\CnmsDetailsReportController;
use App\Http\Controllers\CnmsReportController;
use App\Http\Controllers\CobeDetailsReportController;
use App\Http\Controllers\CobeReportController;
use App\Http\Controllers\CoedDetailsReportController;
use App\Http\Controllers\CoedReportController;
use App\Http\Controllers\CoeseDetailsReportController;
use App\Http\Controllers\CoeseReportController;
use App\Http\Controllers\CollegeInventoryManagerReportController;
use App\Http\Controllers\CollegeResourceAllocationController;
use App\Http\Controllers\ConsumableItemsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailReportPageLinksController;
use App\Http\Controllers\EditAssetController;
use App\Http\Controllers\EditChasAreaOfAllocationController;
use App\Http\Controllers\EditChasResourceStatusController;
use App\Http\Controllers\EditCiveResourceStatusController;
use App\Http\Controllers\EditCollegeNameController;
use App\Http\Controllers\EditConsumableItemsController;
use App\Http\Controllers\EditDetailsReportController;
use App\Http\Controllers\EditResourcesAllocationController;
use App\Http\Controllers\EditStaffsController;
use App\Http\Controllers\InventorySheetController;
use App\Http\Controllers\MaintanancePageLinksController;
use App\Http\Controllers\MaintananceStatusChssController;
use App\Http\Controllers\MaintananceStatusCiveController;
use App\Http\Controllers\MaintananceStatusCnmsController;
use App\Http\Controllers\MaintananceStatusCobeController;
use App\Http\Controllers\MaintananceStatusCoedController;
use App\Http\Controllers\MaintananceStatusCoeseController;
use App\Http\Controllers\MaintananceStatusController;
use App\Http\Controllers\MakeReportRequestsController;
use App\Http\Controllers\MessagingReportController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeDataController;
use App\Http\Controllers\QrCodeReaderController;
use App\Http\Controllers\ResourceAllocationController;
use App\Http\Controllers\ResourceAllocationToAreasController;
use App\Http\Controllers\SendingReportsController;
use App\Http\Controllers\SendingRequestsController;
use App\Http\Controllers\StaffManagementController;
use App\Http\Controllers\SummaryReportController;
use App\Http\Controllers\UpdateAreaOfAllocationController;
use App\Http\Controllers\UpdateAssetStatusController;
use App\Http\Controllers\UpdateResourceAllocationStatusController;
use App\Http\Controllers\UpdateSuppliersController;
use App\Http\Controllers\ViewAccountantController;
use App\Http\Controllers\ViewAllChasAssetsController;
use App\Http\Controllers\ViewAllCiveAssetsController;
use App\Http\Controllers\ViewAllCnmsAssetsController;
use App\Http\Controllers\ViewAllCobeAssetsController;
use App\Http\Controllers\ViewAllCoedAssetsController;
use App\Http\Controllers\ViewAllocatedResourcesController;
use App\Http\Controllers\ViewAssistantInventoryManagersController;
use App\Http\Controllers\ViewCategoriesController;
use App\Http\Controllers\ViewChasCreatedResourcesController;
use App\Http\Controllers\ViewChasReportController;
use App\Http\Controllers\ViewChssCreatedResourcesController;
use App\Http\Controllers\ViewChssReportController;
use App\Http\Controllers\ViewCiveCreatedResourcesController;
use App\Http\Controllers\ViewCiveReportController;
use App\Http\Controllers\ViewCnmsCreatedResourcesController;
use App\Http\Controllers\ViewCnmsReportController;
use App\Http\Controllers\ViewCoBECreatedResourcesController;
use App\Http\Controllers\ViewCobeReportController;
use App\Http\Controllers\ViewCoEDCreatedResourcesController;
use App\Http\Controllers\ViewCoedReportController;
use App\Http\Controllers\ViewCoESECreatedResourcesController;
use App\Http\Controllers\ViewCoeseReportController;
use App\Http\Controllers\ViewCollegeAllocationsController;
use App\Http\Controllers\ViewCollegeInventoryManagerController;
use App\Http\Controllers\ViewItemPDFController;
use App\Http\Controllers\ViewPhoneNumbersController;
use App\Http\Controllers\ViewReportsSentController;
use App\Http\Controllers\ViewRequestsController;
use App\Http\Controllers\ViewResourceAllocationToAreasController;
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
Route::get('/UIMS', function () {
    return view('welcome');
});

// End of home page routes

// -----------------------------------------------------------------------------------------------------

// Dashboard routes

Route::get('/UIMS/dashboard', function () {
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
    Route::get('UIMS/view-category', [ViewCategoriesController::class, 'index']);

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
    Route::get('UIMS/resource-allocation-to-areas', [ResourceAllocationToAreasController::class, 'index']);
    Route::get('UIMS/view-resource-allocation-to-areas', [ViewResourceAllocationToAreasController::class, 'index']);
    Route::get('UIMS/update-areas/{id}', [UpdateAreaOfAllocationController::class, 'index']);
    Route::get('UIMS/edit-chas-area-of-allocation/{id}', [EditChasAreaOfAllocationController::class, 'index']);


    // End of Resource Allocations routes

    // -------------------------------------------------------------------------------------------------

    // Assistant routes

    Route::get('UIMS/register-assistant', [AddAssistantManagersController::class, 'index']);
    Route::get('UIMS/view-assistants', [ViewAssistantInventoryManagersController::class, 'index']);

    // End of Assistant routes

    // --------------------------------------------------------------------------------------------

        // Assistant routes

        Route::get('UIMS/add-accountant', [AddAccountantController::class, 'index']);


        // End of Assistant routes

        //
        // --------------------------------------------------------------------------------------------
    // College Manager routes

    Route::get('UIMS/add-college-managers', [AddCollegeManagerController::class, 'index']);
    Route::get('UIMS/view-college-managers', [ViewCollegeInventoryManagerController::class, 'index']);
    Route::get('UIMS/edit-college-name/{id}', [EditCollegeNameController::class, 'index']);
    Route::get('UIMS/report', [CollegeInventoryManagerReportController::class, 'index']);
    Route::get('UIMS/make-report-request', [MakeReportRequestsController::class, 'index']);

    // End of College Manager routes

    // -----------------------------------------------------------------------------------------------------


    // College of Health and Allied Science ( CHAS ) Routes

    Route::get('UIMS/add-chas-resources', [AddChasResourceController::class, 'index']);
    Route::get('UIMS/view-chas-created-resources', [ViewChasCreatedResourcesController::class, 'index']);

    // ------------------------------------------CHAS Report Routes -------------------------------------------

    Route::get('UIMS/chas-report', [ChasReportController::class, 'index']);
    Route::get('UIMS/view-chas-report', [ViewChasReportController::class, 'index']);

    // End of College of Health and Allied Science ( CHAS ) Routes

    //---------------------------------------------------------------------------------------------------

    // College of Humanities and Social Science ( CHSS ) Routes

    Route::get('UIMS/add-chss-resources', [AddChssResourceController::class, 'index']);
    Route::get('UIMS/view-chss-created-resources', [ViewChssCreatedResourcesController::class, 'index']);

    // ------------------------------------ CHSS Reports Routes -------------------------------

    Route::get('UIMS/chss-report', [ChssReportController::class, 'index']);
    Route::get('UIMS/view-chss-report', [ViewChssReportController::class, 'index']);

    // End of College of Humanities and Social Science ( CHSS ) Routes

    //---------------------------------------------------------------------------------------------------

    // College of Informatics and Virtual Education ( CIVE )

    Route::get('UIMS/add-cive-resources', [AddCiveResourceController::class, 'index']);
    Route::post('UIMS/add-cive-resources', [AddCiveResourceController::class, 'index']);
    Route::get('UIMS/view-cive-created-resources', [ViewCiveCreatedResourcesController::class, 'index']);
    Route::get('UIMS/view-cive-resource-status/{id}', [EditCiveResourceStatusController::class, 'index']);


    // ---------------------------------------- CIVE Report Routes ----------------------------------------------

    Route::get('UIMS/cive-report', [CiveReportController::class, 'index']);
    Route::get('UIMS/view-cive-report', [ViewCiveReportController::class, 'index']);

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

    // College of Business and Economics ( CoBE ) Routes -----------------------------------------------

    Route::get('UIMS/add-cobe-resources', [AddCoBEResourceController::class, 'index']);
    Route::get('UIMS/view-cobe-created-resources', [ViewCoBECreatedResourcesController::class, 'index']);

    // ------------------------------------ CoBE Report Routes ------------------------------------

    Route::get('UIMS/cobe-report', [CobeReportController::class, 'index']);
    Route::get('UIMS/view-cobe-report', [ViewCobeReportController::class, 'index']);

    // End of College of Business and Economics Routes

    // ------------------------------------------------------------------------------------------

    // College of Earth Science and Engineering ( CoESE ) Routes

    Route::get('UIMS/add-coese-resources', [AddCoESEResourcesController::class, 'index']);
    Route::get('UIMS/view-coese-created-resources', [ViewCoESECreatedResourcesController::class, 'index']);

    // ------------------------------------------ CoESE Report Routes ---------------------------------------------------

    Route::get('UIMS/coese-report', [CoeseReportController::class, 'index']);
    Route::get('UIMS/view-coese-report', [ViewCoeseReportController::class, 'index']);

    // End of Earth Science and Engineering ( CoESE ) Routes

    // -----------------------------------------------------------------------------------------------

    // College of Education ( CoED ) Routes

    Route::get('UIMS/add-coed-resources', [AddCoEDResourceController::class, 'index']);
    Route::get('UIMS/view-coed-created-resources', [ViewCoEDCreatedResourcesController::class, 'index']);

    // ---------------------------------------- CoED Report Routes -----------------------------------------------------

    Route::get('UIMS/coed-report', [CoedReportController::class, 'index']);
    Route::get('UIMS/view-coed-report', [ViewCoedReportController::class, 'index']);

    // End of College of Education ( CoED ) Routes

    // --------------------------------------------------------------------------------------------------

    // Suppliers routes

    Route::get('UIMS/register-suppliers', [AddSuppliersController::class, 'index']);
    Route::get('UIMS/register-supplier-phone-numbers', [AddSupplierPhoneNumbersController::class, 'index']);
    Route::get('UIMS/register-supplier-services', [AddSupplierServicesController::class, 'index']);
    Route::get('UIMS/view-suppliers', [ViewSuppliersController::class, 'index']);
    Route::get('UIMS/update-supplier/{id}', [UpdateSuppliersController::class, 'index']);

    // End of Suppliers routes

    // --------------------------------------------------------------------------------------------------------------------------

    // Qr code reader routes

    Route::get('UIMS/qr-code-reader', [QrCodeReaderController::class, 'index']);
    Route::get('UIMS/qr-code-asset-update/{id}', [QrCodeDataController::class, 'index'])->name('qr-code-resource-update');
    Route::patch('/resource-update-status/{id}', [QrCodeDataController::class, 'update'])->name('resource-update');

    // Sending Reports Routes -----------------------------------------------------------------------------

    Route::get('UIMS/inbox-reports', [SendingReportsController::class, 'index']);
    Route::get('UIMS/reply-reports', [ViewReportsSentController::class, 'index']);

    // End of Sending Reports Routes -----------------------------------------------------------------------------

    //------------------------------------------- Sending Requests Routes ------------------------------------------------------------------

    Route::get('UIMS/inbox-requests', [SendingRequestsController::class, 'index']);
    Route::get('UIMS/reply-requests', [ViewRequestsController::class, 'index']);

    // ------------------------------------------ End of Sending Requests Routes ---------------------------------------


    //------------------------------------------- Messaging Reports Routes -------------------------------------------------

    Route::get('UIMS/messages', [MessagingReportController::class, 'index']);

    // --------------------------------- Jobs Routes -------------------------------------------------------------------------

    Route::get('assistants', [Controller::class, 'export']);

    //----------------------------------- Edit college resource routes ---------------------------------------------------------------

    Route::get('UIMS/edit-chas-resource/{id}', [EditChasResourceStatusController::class, 'index']);

    // -------------------------------------------- End of edit resource routes ------------------------------------------------------------

    // ---------------------------------------------------------- Staff management routes ------------------------------------------------------

    Route::get('UIMS/staff-management', [StaffManagementController::class, 'index']);
    Route::get('UIMS/edit-staff/{id}', [EditStaffsController::class, 'index']);

    // ----------------------------------------------------------- End of staff management routes -------------------------------------------------

    //----------------------------------------------- Asset movement routes ----------------------------------------------------
    Route::get('UIMS/asset-transfer', [AssetMovementController::class, 'index']);

    // --------------------------------- Routes for viewing all assets ---------------------------------------

    Route::get('UIMS/view-all-chas-resources', [ViewAllChasAssetsController::class, 'index']);
    Route::get('UIMS/view-all-cive-resources', [ViewAllCiveAssetsController::class, 'index']);
    Route::get('UIMS/view-all-cnms-resources', [ViewAllCnmsAssetsController::class, 'index']);
    Route::get('UIMS/view-all-coed-resources', [ViewAllCoedAssetsController::class, 'index']);
    Route::get('UIMS/view-all-cobe-resources', [ViewAllCobeAssetsController::class, 'index']);

    // ------------------------------------------------ End of viewing all routes --------------------------------------------------------------

    // ------------------------------------------------- Details report routes ----------------------------------------------------------

    Route::get('UIMS/detail-reports/chas', [ChasDetailsReportController::class, 'index']);
    Route::get('UIMS/edit-chas-details-report/{id}', [EditDetailsReportController::class, 'index']);
    Route::get('UIMS/chas-summary-report', [SummaryReportController::class, 'index']);
    Route::get('UIMS/chas-inventory-sheet', [InventorySheetController::class, 'index']);

    // ****************************** details report for CNMS routes *************************************************

    Route::get('UIMS/detail-reports/cnms', [CnmsDetailsReportController::class, 'index']);

    // ***************************** details report for CIVE routes **********************************
    Route::get('UIMS/detail-reports/cive', [CiveDetailsReportController::class, 'index']);
    Route::get('UIMS/edit-cive-details-report/{id}', [EditDetailsReportController::class, 'index']);

    // ****************************** End of report for CIVE routes *********************************

    // ****************************** details report for CHSS routes *************************************************
    Route::get('UIMS/detail-reports/chss', [ChssDetailsReportController::class, 'index']);
    // ******************************** End of CHSS details report routes *************************************

    // ******************************* details report for CoED routes *****************************************
    Route::get('UIMS/detail-reports/coed', [CoedDetailsReportController::class, 'index']);
    // ******************************** End of CoED details report routes *************************************

        // ******************************* details report for CoBE routes *****************************************
        Route::get('UIMS/detail-reports/cobe', [CobeDetailsReportController::class, 'index']);
            // ******************************** End of CoBE details report routes *************************************

                // ********************************  CoESE details report routes ********************************************
                Route::get('UIMS/detail-reports/coese', [CoeseDetailsReportController::class, 'index']);
                // ******************************** End of CoESE details report routes *************************************
    //------------------------------------------------------------ End of details report routes ----------------------------------------------------

    // -------------------------------------------------- Consumable items routes ----------------------------------------------------------------
    Route::get('UIMS/edit-chas-consumable-items/{id}', [EditConsumableItemsController::class, 'index']);

    Route::get('UIMS/consumable-items', [ConsumableItemsController::class, 'index']);

    // ------------------------------------------------ End of Consumable items routes ----------------------------------------------------------------

    // -------------------------------------------------- Maintainance routes ----------------------------------------------------------------

    Route::get('UIMS/maintainance/chas',[MaintananceStatusController::class, 'index']);
    Route::get('UIMS/maintainance/', [MaintanancePageLinksController::class, 'index']);
    Route::get('UIMS/maintainance/cnms', [MaintananceStatusCnmsController::class, 'index']);
    Route::get('UIMS/maintainance/cive', [MaintananceStatusCiveController::class, 'index']);
    Route::get('UIMS/maintainance/chss', [MaintananceStatusChssController::class, 'index']);
    Route::get('UIMS/maintainance/coed', [MaintananceStatusCoedController::class, 'index']);
    Route::get('UIMS/maintainance/cobe', [MaintananceStatusCobeController::class, 'index']);
    Route::get('UIMS/maintainance/coese', [MaintananceStatusCoeseController::class, 'index']);

    // ------------------------------------------------ End of Maintanance routes ----------------------------------------------------------------------

    // ----------------------------------------------------------- Details report routes ----------------------------------------------------------------------------

    Route::get('UIMS/detail-reports/', [DetailReportPageLinksController::class, 'index']);

        // ----------------------------------------------------------- End Details report routes ----------------------------------------------------------------------------

        // -------------------------------------------------- Verification and Approval routes ----------------------------------------------------------

        Route::get('UIMS/CHAS/verification-and-approval', [ChasVerificationAndApprovalController::class, 'index']);
        
                // -------------------------------------------------- End Verification and Approval routes ----------------------------------------------------------
});


require __DIR__ . '/auth.php';
