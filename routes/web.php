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

//Route::get('/', function () {
//    return view('welcome');
//});
//

//
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::resource('public-pre-enlistment','EnlistmentController')->except('create');

Route::get('public/enlistment-form','EnlistmentController@create')->name('public.enlistment.create');


Route::get('/login-system','LoginHome@loginHome')->name('login.home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');



Route::group(['middleware'=>'admin'],function ()
{
//For Admin
//    Route::resource('admin-dashboard','AdminHomeController',['names'=>[
//
//        'index'=>'admin.dashboard.index',
//        'create'=>'admin.dashboard.create',
//        'store'=>'admin.dashboard.store',
//        'edit'=>'admin.dashboard.edit'
//
//
//    ]]);

    Route::get('admin-dashboard','AdminHomeController@index')->name('admin.dashboard.index');
    Route::get('landing-admin-page','AdminHomeController@landing')->name('admin.landing');

//Students
    Route::get('admin/student/enlistment','AdminStudentController@enlistment')->name('admin.student.enlistment');
    Route::get('admin/student/enrolled/list','AdminStudentController@studentList')->name('admin.student.list');
    Route::get('admin/student/show-details/{student_id}','AdminStudentController@studentShow')->name('admin.student.show-details');

    Route::get('admin/student/enrollment-form/{student_id}/docx','AdminStudentController@enrollmentFormDocs')->name('admin.student.form.docx');

    Route::get('admin/student/show-grade/{student_id}','AdminStudentController@studentShowGrade')->name('admin.student.show.grade');
    Route::get('admin/student/print-grade/{student_id}/{sem}/{sy}','AdminStudentController@studentPrintGrade')->name('admin.student.print.grade');
    Route::get('admin/student/credit-grade/{student_id}','AdminStudentController@creditGrade')->name('admin.student.credit.grade');
    Route::post('admin/student/credit-grade/{student_id}/save','AdminStudentController@creditGradeSave')->name('admin.student.credit.grade.save');




//route for single delete
    Route::get('admin/students/delete/{student_id}','AdminStudentController@delete')->name('admin.student.enlistment.delete');
//route for bulk delete
    Route::post('admin/students/bulk-delete','AdminStudentController@bulkDelete')->name('admin.student.enlistment.bulkdelete');
//route for bulk update in enlistment
    Route::post('admin/students/bulk-update-enlist','AdminStudentController@updateStautsEnlistment')->name('admin.student.enlistment.bulk-update-enlist');



//Teachers
    Route::get('admin/teacher/add','AdminTeacherController@addTeacher')->name('admin.teacher.add');
    Route::post('admin/teacher/store','AdminTeacherController@storeTeacher')->name('admin.teacher.store');
    Route::get('admin/teacher/teacher-list','AdminTeacherController@teacherList')->name('admin.teacher.list');
    Route::post('admin/teacher/action','AdminTeacherController@teacherAction')->name('admin.teacher.action');



//Section
    Route::get('admin/section/create','AdminSectionController@createSection')->name('admin.section.add');
    Route::post('admin/section/save','AdminSectionController@storeSection')->name('admin.section.save');
    Route::get('admin/section/list','AdminSectionController@sectionList')->name('admin.section.list');
    Route::get('admin/section/show/{section_id}/{grade_id}/{strand_id}','AdminSectionController@sectionShow')->name('admin.section.show');
    Route::patch('admin/section/add-students/{section_id}','AdminSectionController@addStudentToSection')->name('admin.section.add-student');
    Route::get('admin/section/print/{section_id}/{grade_id}/{strand_id}','AdminSectionController@sectionPrint')->name('admin.section.print');


//Subject
    Route::get('admin/subject/create', 'AdminSubjectController@createSubject')->name('admin.subject.add');
    Route::get('admin/subject/list', 'AdminSubjectController@subjectList')->name('admin.subject.list');
    Route::post('admin/subject/save', 'AdminSubjectController@storeSubject')->name('admin.subject.save');
    Route::get('admin/subject/create/schedule', 'AdminSubjectController@subjectSchedule')->name('admin.subject.schedule.create');

    Route::post('admin/subject/save/schedule', 'AdminSubjectController@saveSubjectSchedule')->name('admin.subject.schedule.save');
    Route::get('admin/subject/create/schedule/list', 'AdminSubjectController@subjectScheduleList')->name('admin.subject.schedule.list');
//Route::get('admin/subject/fetch/create/schedule', 'AdminSubjectController@fetch')->name('admin.subject.fetch');
    Route::post('admin/subject/schedule/action','AdminSubjectController@subjectUpdate')->name('admin.subject.schedule.action');


});


















Route::group(['middleware'=>'teacher'],function ()
{
//For teacher System



    Route::get('teacher-dashboard','TeacherHomeController@index')->name('teacher.dashboard');

//Subjects
    Route::get('teacher/my-subjects/all','TeacherSubjectController@mySubjectList')->name('teacher.mysubject.all');
    Route::post('teacher/my-subjects/all/action','TeacherSubjectController@mySubjectListAction')->name('teacher.mysubject.all.action');
    Route::get('teacher/my-subjects/show-students/{schedule_id}','TeacherSubjectController@subjectStudentShow')->name('teacher.mysubject.student.show');
    Route::post('teacher/grade-student/save/{schedule_id}','TeacherSubjectController@gradeStudent')->name('teacher.student.grade.save');
    Route::get('teacher/my-subjects/show-students/{schedule_id}/edit','TeacherSubjectController@editGradeStudent')->name('teacher.mysubject.student.show.edit');
    Route::post('teacher/my-subjects/show-students/update/{schedule_id}','TeacherSubjectController@updateGradeStudent')->name('teacher.mysubject.student.show.update');
    Route::post('teacher/my-subjects/show-students/update/{schedule_id}/show','TeacherSubjectController@updateGradeStudentShow')->name('teacher.mysubject.student.show.update.show');

    Route::get('teacher/my-subjects/active','TeacherSubjectController@mySubjectListActive')->name('teacher.mysubject.active.all');

//Section

    Route::get('teacher/my-section/all','TeacherSectionController@mySectionList')->name('teacher.mysection.all');
    Route::get('teacher/my-section/active','TeacherSectionController@mySectionListActive')->name('teacher.mysection.active');
    Route::post('teacher/my-section/action','TeacherSectionController@mySectionListAction')->name('teacher.mysection.action');
    Route::post('teacher/my-section/active/action','TeacherSectionController@mySectionListActiveAction')->name('teacher.mysection.active.action');
    Route::get('teacher/my-section/all/students/{year}/{sectionName}','TeacherSectionController@mySectionStudentList')->name('teacher.mysection.all.students');
    Route::get('teacher/my-section/show-student/{year}/{studentLrn}','TeacherSectionController@mySectionShowStudent')->name('teacher.mysection.show.students');
    Route::get('teacher/my-section/show-student/{year}/{sem}/{studentLrn}','TeacherSectionController@mySectionShowStudentFilter')->name('teacher.mysection.show.students.filter');

});



