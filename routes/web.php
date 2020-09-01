<?php

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
    Route::get('/email', function (){
        return view('Admin.Emails.reminder_email');
    });

    Route::get('/', [
    'as' => 'Admin.login',
    'uses' => 'Admin\AuthController@Login',
    ]);

    Route::post('/', [
    'as' => 'admin.user.login',
    'uses' => 'Admin\AuthController@userLogin',
    ]);

    Route::get('admin/dashboard', [
    'as' => 'admin.dashboard',
    'uses' => 'Admin\AdminController@Dashboard',
    ]);

    Route::get('admin/logout', [
    'as' => 'admin.logout',
    'uses' => 'Admin\AdminController@Logout',
    ]);

    Route::get('admin/approve-user/{id}', [
    'as' => 'admin.approve-user',
    'uses' => 'Admin\AdminController@approveUser',
    ]);
    Route::get('admin/reject-user/{id}', [
    'as' => 'admin.reject-user',
    'uses' => 'Admin\AdminController@rejectUser',
    ]);
    Route::get('admin/suspend-user/{id}', [
    'as' => 'admin.suspend-user',
    'uses' => 'Admin\AdminController@suspendUser',
    ]);
    Route::get('admin/make-admin/{id}', [
    'as' => 'admin.make-admin',
    'uses' => 'Admin\AdminController@makeAdmin',
    ]);
    Route::get('admin/remove-admin/{id}', [
    'as' => 'admin.remove-admin',
    'uses' => 'Admin\AdminController@removeAdmin',
    ]);
    Route::get('admin/users-management', [
    'as' => 'admin.user-management',
    'uses' => 'Admin\AdminController@userManagement',
    ]);
    Route::get('admin/view-user-details/{id}', [
    'as' => 'admin.view-user-details',
    'uses' => 'Admin\AdminController@viewUserDetails',
    ]);
    Route::get('admin/Loan-system-settings', [
    'as' => 'admin.loan-system-settings',
    'uses' => 'Admin\AdminController@systemSettings',
    ]);
    Route::get('admin/lgs-state-system-settings', [
    'as' => 'admin.lg-state-system-settings',
    'uses' => 'Admin\AdminController@lgStateSettings',
    ]);
    Route::get('admin/other-system-settings', [
    'as' => 'admin.others-system-settings',
    'uses' => 'Admin\AdminController@otherSettings',
    ]);

    //system settings start here

    Route::post('admin/add-relationship', [
        'as' => 'admin.add-relationship',
        'uses' => 'Admin\SettingsController@addRelationship',
    ]);
    Route::post('admin/update-relationship/{id}', [
        'as' => 'admin.update-relationship',
        'uses' => 'Admin\SettingsController@updateRelationship',
    ]);
    Route::get('admin/delete-relationship/{id}', [
        'as' => 'admin.delete-relationship',
        'uses' => 'Admin\SettingsController@deleteRelationship',
    ]);
    Route::post('admin/add-lgs', [
        'as' => 'admin.add-lgs',
        'uses' => 'Admin\SettingsController@addLgs',
    ]);
    Route::post('admin/lgs/{id}', [
        'as' => 'admin.update-lgs',
        'uses' => 'Admin\SettingsController@updateLgs',
    ]);
    Route::get('admin/delete-lgs/{id}', [
        'as' => 'admin.delete-lgs',
        'uses' => 'Admin\SettingsController@deleteLgs',
    ]);
    Route::post('admin/add-bank', [
        'as' => 'admin.add-bank',
        'uses' => 'Admin\SettingsController@addBank',
    ]);
    Route::post('admin/bank/{id}', [
        'as' => 'admin.update-bank',
        'uses' => 'Admin\SettingsController@updateBank',
    ]);
    Route::get('admin/delete-bank/{id}', [
        'as' => 'admin.delete-bank',
        'uses' => 'Admin\SettingsController@deleteBank',
    ]);
    Route::post('admin/add-state', [
        'as' => 'admin.add-state',
        'uses' => 'Admin\SettingsController@addState',
    ]);
    Route::post('admin/state/{id}', [
        'as' => 'admin.update-state',
        'uses' => 'Admin\SettingsController@updateState',
    ]);
    Route::get('admin/delete-state/{id}', [
        'as' => 'admin.delete-state',
        'uses' => 'Admin\SettingsController@deleteState',
    ]);
    Route::post('admin/add-range', [
        'as' => 'admin.add-range',
        'uses' => 'Admin\SettingsController@addRange',
    ]);
    Route::post('admin/range/{id}', [
        'as' => 'admin.update-range',
        'uses' => 'Admin\SettingsController@updateRange',
    ]);
    Route::get('admin/delete-range/{id}', [
        'as' => 'admin.delete-range',
        'uses' => 'Admin\SettingsController@deleteRange',
    ]);
    Route::post('admin/add-salary', [
        'as' => 'admin.add-salary',
        'uses' => 'Admin\SettingsController@addSalary',
    ]);
    Route::post('admin/salary/{id}', [
        'as' => 'admin.update-salary',
        'uses' => 'Admin\SettingsController@updateSalary',
    ]);
    Route::get('admin/delete-salary/{id}', [
        'as' => 'admin.delete-salary',
        'uses' => 'Admin\SettingsController@deleteSalary',
    ]);
    Route::post('admin/add-duration', [
        'as' => 'admin.add-duration',
        'uses' => 'Admin\SettingsController@addDuration',
    ]);
    Route::post('admin/duration/{id}', [
        'as' => 'admin.update-duration',
        'uses' => 'Admin\SettingsController@updateDuration',
    ]);
    Route::get('admin/delete-duration/{id}', [
        'as' => 'admin.delete-duration',
        'uses' => 'Admin\SettingsController@deleteDuration',
    ]);
    Route::post('admin/add-rate', [
        'as' => 'admin.add-rate',
        'uses' => 'Admin\SettingsController@addRate',
    ]);
    Route::post('admin/rate/{id}', [
        'as' => 'admin.update-rate',
        'uses' => 'Admin\SettingsController@updateRate',
    ]);
    Route::get('admin/delete-rate/{id}', [
        'as' => 'admin.delete-rate',
        'uses' => 'Admin\SettingsController@deleteRate',
    ]);
    Route::post('admin/add-passcode', [
        'as' => 'admin.add-passcode',
        'uses' => 'Admin\SettingsController@updatePasscode',
    ]);

    // Loan Management
    Route::get('admin/check-loan-amount', [
        'as' => 'admin.check-loan-amount',
        'uses' => 'Admin\LoanController@loanAmount',
    ]);
    Route::get('admin/check-pending-loans', [
        'as' => 'admin.check-pending-loans',
        'uses' => 'Admin\LoanController@pendingLoans',
    ]);

    Route::get('admin/check-active-loans', [
        'as' => 'admin.check-active-loans',
        'uses' => 'Admin\LoanController@activeLoans',
    ]);

    Route::get('admin/check-overdue-loans', [
        'as' => 'admin.check-overdue-loans',
        'uses' => 'Admin\LoanController@overdueLoans',
    ]);

    Route::get('admin/check-mature-loans', [
        'as' => 'admin.check-mature-loans',
        'uses' => 'Admin\LoanController@matureLoans',
    ]);

    Route::post('admin/reject-loans/{id}', [
        'as' => 'admin.reject-loan',
        'uses' => 'Admin\LoanController@rejectLoan',
    ]);

    Route::post('admin/approve-loans/{id}', [
        'as' => 'admin.approve-loan',
        'uses' => 'Admin\LoanController@approveLoan',
    ]);

    Route::post('admin/approve-pending-loans/{id}', [
        'as' => 'admin.approve-pending-loan',
        'uses' => 'Admin\LoanController@approvePendingLoan',
    ]);

    Route::post('admin/send-loan-reminder/{id}', [
        'as' => 'admin.send-loan-reminder',
        'uses' => 'Admin\LoanController@loanReminder',
    ]);

    // contact us

    Route::get('admin/view-contact-message', [
        'as' => 'admin.view-contact-message',
        'uses' => 'Admin\ContactController@contactUs',
    ]);
    Route::post('admin/reply-mail/{id}', [
        'as' => 'admin.reply-mail',
        'uses' => 'Admin\ContactController@replyMail',
    ]);


