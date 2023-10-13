<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\payrollController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyMasterController;
use App\Http\Controllers\CompanyDesignationController;
use App\Http\Controllers\CompanyDepartmentController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("sign-up",[CompanyController::class,'signup']);
Route::post("sign-in",[CompanyController::class,'signin']);
Route::post("check-email",[CompanyController::class,'check_email']);
Route::post("otp-change-password",[CompanyController::class,'otp_change_password']);

Route::get("test/{slug}",[testController::class,'test']);
Route::post("addptax",[payrollController::class,'addptax']);
Route::post("delptax",[payrollController::class,'delptax']);
Route::post("savesalaryprovision",[payrollController::class,'savesalaryprovision']);
Route::post("fetchsalarydata",[payrollController::class,'fetchsalarydata']);

Route::post("verifyYourEmail",[CompanyController::class,'verifymail']);
Route::post("addemployeemasterdetails",[CompanyController::class,'addemployeemasterdetails']);
Route::post("fetchemployeemasterdetails",[CompanyController::class,'fetchemployeemasterdetails']);
Route::post("addempdetails",[CompanyController::class,'addempdetails']);
//orgnisation
Route::put("update-organization",[OrganizationController::class,'updateOrganization']);
Route::post("organization-details",[OrganizationController::class,'getOrganizationDetails']);
//attendance

Route::post("submit-attendance-setting",[AttendanceController::class,'addAttendanceSetting']);
Route::post("add-shift-details",[AttendanceController::class,'addShiftDetails']);
Route::post("attendance-setting-details",[AttendanceController::class,'getAttendanceSettingDetails']);
Route::get("getShiftList",[AttendanceController::class,'getShiftList']);
Route::post("add-roster-details",[AttendanceController::class,'addRosterDetails']);
Route::get("getRosterList",[AttendanceController::class,'getRosterList']);
Route::put("edit-shift",[AttendanceController::class,'updateShiftDetails']);
//leave management

Route::post("submit-leave-management-form",[LeaveController::class,'addLeaveManagementDetails']);
Route::post("leave-list",[LeaveController::class,'getLeaveList']);
Route::post("delete-leave",[LeaveController::class,'deleteLeave']);

//company details set as default

Route::post("company-details-set-as-default",[CompanyController::class,'companyDetailsSetAsDefault']);
//masters
Route::get("country-list",[CompanyMasterController::class,'getCountryList']);
Route::post("shift-list",[CompanyMasterController::class,'getCompanyWiseShiftList']);
Route::post("roster-list",[CompanyMasterController::class,'getCompanyWiseRosterList']);
Route::post("country-state-list",[CompanyMasterController::class,'getCountryStateList']);
Route::post("reporting-manager-list",[CompanyMasterController::class,'getReportingManagerMasterList']);
Route::post("education-list",[CompanyMasterController::class,'getEducationMasterList']);

//department
Route::get("department-list",[CompanyMasterController::class,'getDepartmentList']);
Route::post("department-list2",[CompanyDepartmentController::class,'getDepartmentList2']);
Route::post("add-department",[CompanyDepartmentController::class,'addDepartment']);
Route::put("edit-department",[CompanyDepartmentController::class,'editDepartment']);
Route::post("delete-department",[CompanyDepartmentController::class,'deleteDepartment']);

//designation
Route::get("designation-list",[CompanyMasterController::class,'getDesignationList']);
Route::post("designation-list2",[CompanyDesignationController::class,'getDesignationList2']);
Route::post("add-designation",[CompanyDesignationController::class,'addDesignation']);
Route::put("edit-designation",[CompanyDesignationController::class,'editDesignation']);
Route::post("delete-designation",[CompanyDesignationController::class,'deleteDesignation']);

Route::post("insert-designation",[CompanyDesignationController::class,'insertDesignation']);

Route::post("department-wise-designation-list",[CompanyDesignationController::class,'getDepartmentWiseDesignationList']);