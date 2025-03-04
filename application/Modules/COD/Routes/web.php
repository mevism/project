<?php

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

use App\Http\Middleware\COD\COD;
use Modules\COD\Http\Controllers\CODController;

Route::prefix('department')->middleware(['web', 'auth:user', 'is_cod'])->group( function() {
        Route::get('/cod', [CODController::class, 'index'])->name('cod.dashboard');
        Route::get('/applications', [CODController::class, 'applications'])->name('cod.applications');
        Route::get('/view-application/{id}', [CODController::class, 'viewApplication'])->name('cod.viewApplication');
        Route::get('/preview-application/{id}', [CODController::class, 'previewApplication'])->name('cod.previewApplication');
        Route::get('/batch', [CODController::class, 'batch'])->name('cod.batch');
        Route::post('/batch-submit', [CODController::class, 'batchSubmit'])->name('cod.batchSubmit');
        Route::get('/accept-application/{id}', [CODController::class, 'acceptApplication'])->name('cod.acceptApplication');
        Route::post('/reject-application/{id}', [CODController::class, 'rejectApplication'])->name('cod.rejectApplication');
        Route::post('/reverse-application/{id}', [CODController::class, 'reverseApplication'])->name('cod.reverseApplication');

        Route::get('/admissions', [CODController::class, 'admissions'])->name('cod.Admissions');
        Route::get('/review/{id}', [CODController::class, 'reviewAdmission'])->name('cod.reviewAdmission');
        Route::get('/accept/{id}', [CODController::class, 'acceptAdmission'])->name('cod.acceptAdmission');
        Route::post('/reject/{id}', [CODController::class, 'rejectAdmission'])->name('cod.rejectAdmission');
        Route::post('/withhold/{id}', [CODController::class, 'withholdAdmission'])->name('cod.withholdAdmission');
        Route::get('/submit/{id}', [CODController::class, 'submitAdmission'])->name('cod.submitAdmission');

        Route::get('/create-class-pattern/{id}', [CODController::class, 'classPattern'])->name('cod.classPattern');
        Route::post('/submit-class-pattern', [CODController::class, 'storeClassPattern'])->name('cod.storeClassPattern');
        Route::post('/update-class-pattern/{id}', [CODController::class, 'updateClassPattern'])->name('cod.updateClassPattern');
        Route::get('/delete-class-pattern/{id}', [CODController::class, 'deleteClassPattern'])->name('cod.deleteClassPattern');
        Route::get('/view-classes-per-intake/{intake}', [CODController::class, 'viewIntakeClasses'])->name('department.viewIntakeClasses');
        Route::get('/view-semester-units-per-class/{id}', [CODController::class, 'viewSemesterUnits'])->name('department.viewSemesterUnits');
        Route::get('/add-semester-unit-per-class/{id}/{unit}', [CODController::class, 'addSemesterUnit'])->name('department.addSemesterUnit');
        Route::get('/drop-semester-unit-per-class/{id}', [CODController::class, 'dropSemesterUnit'])->name('department.dropSemesterUnit');

        Route::get('/courses', [CODController::class, 'courses'])->name('department.courses');
        Route::get('/intakes', [CODController::class, 'intakes'])->name('department.intakes');
        Route::get('/add-course/{id}', [CODController::class, 'intakeCourses'])->name('department.intakeCourses');
        Route::post('/add-available-courses', [CODController::class, 'addAvailableCourses'])->name('department.addAvailableCourses');
        Route::get('/courses-available-per-intake/{intake}', [CODController::class, 'viewDeptIntakeCourses'])->name('department.availableCourses');

        Route::get('/get-Classes', [CODController::class, 'deptClasses'])->name('department.classes');
        Route::get('/class-List/{id}', [CODController::class, 'classList'])->name('department.classList');


        Route::get('/admitStudent/{id}', [CODController::class, 'admitStudent'])->name('department.admitStudent');

        Route::get('/exam-results', [CODController::class, 'examResults'])->name('department.examResults');
        Route::get('/add-exam-results', [CODController::class, 'addResults'])->name('department.addResults');
        Route::post('/submit-exam-results', [CODController::class, 'submitResults'])->name('department.submitResults');
        Route::get('/edit-exam-results/{id}', [CODController::class, 'editResults'])->name('department.editResults');
        Route::post('/update-exam-results/{id}', [CODController::class, 'updateResults'])->name('department.updateResults');

        Route::get('/course-transfers-set-up', [CODController::class, 'setupTransfers'])->name('department.courseTransferSetup');
        Route::get('/add-course-transfers-set-up', [CODController::class, 'addCourseTransfer'])->name('department.addCourseTransfer');
        Route::get('/all-course-transfer-requests', [CODController::class, 'transferRequests'])->name('department.courseTransfers');
        Route::get('/view-student-transfer-request/{id}', [CODController::class, 'viewTransferRequest'])->name('department.viewTransferRequest');
        Route::get('/view-student-uploaded-document/{id}', [CODController::class, 'viewUploadedDocument'])->name('department.viewUploadedDocument');
        Route::get('/accept-student-transfer-request/{id}', [CODController::class, 'acceptTransferRequest'])->name('department.acceptTransferRequest');
        Route::post('/decline-student-transfer-request/{id}', [CODController::class, 'declineTransferRequest'])->name('department.declineTransferRequest');
        Route::get('/generate-list-of-all-transfer-requests/{year}', [CODController::class, 'requestedTransfers'])->name('department.requestedTransfers');
        Route::get('/view-yearly-course-transfer-requests/{id}', [CODController::class, 'viewYearRequests'])->name('department.viewYearRequests');
        Route::post('/save-course-transfer-setup', [CODController::class, 'storeCourseTransferSetup'])->name('department.storeCourseTransferSetup');

        Route::get('/view-list-of-departmental-academic-leave-transfers/{id}', [CODController::class, 'yearlyAcademicLeave'])->name('department.yearlyLeaves');
        Route::get('/view-yearly-departmental-academic-leave-transfers', [CODController::class, 'academicLeave'])->name('department.academicLeave');
        Route::get('/view-academic-leave-request/{id}', [CODController::class, 'viewLeaveRequest'])->name('department.viewLeaveRequest');
        Route::get('/accept-academic-leave/deferment-request/{id}', [CODController::class, 'acceptLeaveRequest'])->name('department.acceptLeaveRequest');
        Route::post('/decline-academic-leave/deferment-request/{id}', [CODController::class, 'declineLeaveRequest'])->name('department.declineLeaveRequest');

        Route::get('/get-readmission-requests-per-academic-year', [CODController::class, 'readmissions'])->name('department.readmissions');
        Route::get('/get-annual-readmission-requests-per-department/{id}', [CODController::class, 'yearlyReadmissions'])->name('department.yearlyReadmissions');
        Route::get('/get-intake-readmission-requests-per-department/{id}', [CODController::class, 'intakeReadmissions'])->name('department.intakeReadmissions');
        Route::get('/view-selected-readmission-request/{id}', [CODController::class, 'selectedReadmission'])->name('department.selectedReadmission');
        Route::post('/accept-selected-readmission-request/{id}', [CODController::class, 'acceptReadmission'])->name('department.acceptReadmission');
        Route::post('/decline-selected-readmission-request/{id}', [CODController::class, 'declineReadmission'])->name('department.declineReadmission');

//        Route::get('/getAcademicFile/{id}', 'CODController@viewAcademicFile');

    /*Lecturer routes */
    Route::get('/department-lecturers', [CODController::class, 'departmentLectures'])->name('department.lecturers');
    Route::get('/department-lecturers-qualifications', [CODController::class, 'lecturesQualification'])->name('department.lecturesQualification');
    Route::get('/department-view-selected-lecturer-qualification/{id}', [CODController::class, 'viewLecturerQualification'])->name('department.viewQualification');
    Route::get('/department-view-selected-lecturer-teaching-areas/{id}', [CODController::class, 'viewLecturerTeachingArea'])->name('department.viewTeachingArea');
    Route::get('/department-approve-lecturer-qualification/{id}', [CODController::class, 'approveQualification'])->name('department.approveQualification');
    Route::post('/reject-lecturer-qualification-request/{id}', [CODController::class, 'rejectQualification'])->name('department.rejectQualification');
    Route::get('/department-approve-lecturer-teaching-area/{id}', [CODController::class, 'approveTeachingArea'])->name('department.approveTeachingArea');
    Route::post('/department-decline-lecturer-qualification/{id}', [CODController::class, 'declineTeachingArea'])->name('department.declineTeachingArea');

    Route::get('/yearly-results', [CODController::class, 'yearlyResults'])->name('department.yearlyResults');
    Route::get('/semester-results/{id}', [CODController::class, 'semesterResults'])->name('department.semesterResults');
    Route::get('/download-results/{sem}/{year}', [CODController::class, 'downloadResults'])->name('department.downloadResults');
    Route::get('/view-exam-results/{id}', [CODController::class, 'viewStudentResults'])->name('department.viewStudentResults');
    Route::post('/decline-exam-results/{id}', [CODController::class, 'declineResults'])->name('department.declineResults');
    Route::get('/approve-exam-results/{id}', [CODController::class, 'approveExamResults'])->name('department.approveExamResults');
    Route::get('/revert-exam-results/{id}', [CODController::class, 'revertExamResults'])->name('department.revertExamResults');
    Route::get('/submit-exam-results/{id}', [CODController::class, 'submitExamResults'])->name('department.submitExamResults');

    Route::get('/course-options/{id}', [CODController::class, 'courseOptions'])->name('department.courseOptions');
    Route::get('/add-course-options/{id}', [CODController::class, 'addCourseOption'])->name('department.addCourseOption');
    Route::get('/edit-course-options/{id}', [CODController::class, 'editCourseOption'])->name('department.editCourseOption');
    Route::post('/store-course-options', [CODController::class, 'storeCourseOption'])->name('department.storeCourseOption');
    Route::post('/update-course-options/{id}', [CODController::class, 'updateCourseOption'])->name('department.updateCourseOption');

    Route::get('/units', [CODController::class, 'allUnits'])->name('department.allUnits');
    Route::get('/add-units', [CODController::class, 'addUnit'])->name('department.addUnit');
    Route::post('/store-units', [CODController::class, 'storeUnit'])->name('department.storeUnit');
    Route::get('/edit-units/{id}', [CODController::class, 'editUnit'])->name('department.editUnit');
    Route::post('/update-units/{id}', [CODController::class, 'updateUnit'])->name('department.updateUnit');
    Route::get('/get-units-in-json', [CODController::class, 'JsonUnits'])->name('department.jsonUnits');

    Route::get('/department-syllabi', [CODController::class, 'syllabi'])->name('department.syllabi');
    Route::get('/course-syllabus/{id}', [CODController::class, 'courseSyllabus'])->name('department.courseSyllabus');
    Route::get('/add-course-syllabus-version/{id}', [CODController::class, 'addCourseSyllabusVersion'])->name('department.addSyllabusVersion');
    Route::get('/syllabus-version-units/{id}', [CODController::class, 'viewSyllabusUnits'])->name('department.viewSyllabusUnits');
    Route::get('/fetch-syllabus-unit', [CODController::class, 'searchUnit'])->name('department.searchUnit');
    Route::any('/submit-syllabus-units', [CODController::class, 'submitSyllabusUnits'])->name('department.submitSyllabusUnits');
    Route::get('/complete-course-syllabus/{course}/{version}', [CODController::class, 'completeSyllabus'])->name('department.completeCourseSyllabus');
    Route::get('/supplementary-specials', [CODController::class, 'supSpecials'])->name('department.supSpecials');
    Route::get('/add-supplementary-specials', [CODController::class, 'addSupSpecials'])->name('department.addSupSpecials');
    Route::get('/view-supplementary-specials/{id}', [CODController::class, 'viewSupSpecial'])->name('department.viewSupSpecial');
    Route::get('/delete-supplementary-specials/{id}', [CODController::class, 'deleteSupSpecialUnit'])->name('department.deleteSupSpecialUnit');
    Route::post('/store-supplementary-specials', [CODController::class, 'storeSupSpecials'])->name('department.storeSupSpecial');
});
