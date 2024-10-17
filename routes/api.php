<?php

use App\Http\Controllers\AboutMeInformationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\MyProjectController;
use App\Http\Controllers\VisitorMessageController;
use App\Http\Controllers\WorkSkillController;
use App\Models\AboutMeInformation;
use App\Models\EducationLevel;
use App\Models\VisitorMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login' , [AuthController::class , 'login']);

Route::post('/message/store' , [VisitorMessageController::class , 'store']);


Route::middleware(['auth:sanctum'])->group(function() {
    
    /* *************education_levels table ************** */
    Route::get('/educationlevel/index' , [EducationLevelController::class , 'index']);
    Route::post('/educationlevel/store' , [EducationLevelController::class , 'store']);
    Route::put('/educationlevel/update/{educationLevel}' , [EducationLevelController::class , 'update']);
    Route::delete('/educationlevel/destroy/{educationLevel}' , [EducationLevelController::class , 'destroy']);

    /* *************About Me table ************ */
    Route::get('/aboutme/index' , [AboutMeInformationController::class , 'index']);
    Route::post('/aboutme/store' , [AboutMeInformationController::class , 'store']);
    Route::put('/aboutme/update/{aboutMeInformation}' , [AboutMeInformationController::class , 'update']);
    Route::delete('/aboutme/destroy/{aboutMeInformation}' , [AboutMeInformationController::class , 'destroy']);

    /* ********* experiences table *********** */
    Route::get('/experience/index' , [ExperienceController::class , 'index']);
    Route::post('/experience/store' , [ExperienceController::class , 'store']);
    Route::put('/experience/update/{experience}' , [ExperienceController::class , 'update']);
    Route::delete('/experience/destroy/{experience}' , [ExperienceController::class , 'destroy']);

    /* ********* certificate table *********** */
    Route::get('/certificate/index' , [CertificateController::class , 'index']);
    Route::post('/certificate/store' , [CertificateController::class , 'store']);
    Route::put('/certificate/update/{certificate}' , [CertificateController::class , 'update']);
    Route::delete('/certificate/destroy/{certificate}' , [CertificateController::class , 'destroy']);


    /* ********* my project table *********** */
    Route::get('/my_project/index' , [MyProjectController::class , 'index']);
    Route::post('/my_project/store' , [MyProjectController::class , 'store']);
    Route::put('/my_project/update/{myProject}' , [MyProjectController::class , 'update']);
    Route::delete('/my_project/destroy/{myProject}' , [MyProjectController::class , 'destroy']);

    /* ********* work skill table *********** */
    Route::get('/work_skill/index' , [WorkSkillController::class , 'index']);
    Route::post('/work_skill/store' , [WorkSkillController::class , 'store']);
    Route::put('/work_skill/update/{workSkill}' , [WorkSkillController::class , 'update']);
    Route::delete('/work_skill/destroy/{workSkill}' , [WorkSkillController::class , 'destroy']);

    /* ********* visitor message table *********** */
    Route::get('/message/index' , [VisitorMessageController::class , 'index']);
    Route::put('/message/update/{message}' , [VisitorMessageController::class , 'update']);
    Route::delete('/message/destroy/{message}' , [VisitorMessageController::class , 'destroy']);

    Route::post('/logout' , [AuthController::class , 'logout']);
});
