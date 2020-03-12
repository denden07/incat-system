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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('admin-dashboard','AdminHomeController',['names'=>[

    'index'=>'admin.dashboard.index',
    'create'=>'admin.dashboard.create',
    'store'=>'admin.dashboard.store',
    'edit'=>'admin.dashboard.edit'


]]);




Route::resource('public-pre-enlistment','EnlistmentController')->except('create');

Route::get('public/enlistment-form','EnlistmentController@create')->name('public.enlistment.create');


//Students
Route::get('admin/student/enlistment','AdminStudentController@enlistment')->name('admin.student.enlistment');
Route::get('admin/student/enrolled/list','AdminStudentController@studentList')->name('admin.student.list');
Route::get('admin/student/show-details/{student_id}','AdminStudentController@studentShow')->name('admin.student.show-details');

Route::get('admin/student/enrollment-form/{student_id}/docx','AdminStudentController@enrollmentFormDocs')->name('admin.student.form.docx');


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


//Section
Route::get('admin/section/create','AdminSectionController@createSection')->name('admin.section.add');
Route::post('admin/section/save','AdminSectionController@storeSection')->name('admin.section.save');
Route::get('admin/section/list','AdminSectionController@sectionList')->name('admin.section.list');
Route::get('admin/section/show/{section_id}/{grade_id}/{strand_id}','AdminSectionController@sectionShow')->name('admin.section.show');
Route::patch('admin/section/add-students/{section_id}','AdminSectionController@addStudentToSection')->name('admin.section.add-student');
Route::get('admin/section/print/{section_id}/{grade_id}/{strand_id}','AdminSectionController@sectionPrint')->name('admin.section.print');


//Subject
Route::get('admin/subject/create', 'AdminSubjectController@createSubject')->name('admin.subject.add');
Route::post('admin/subject/save', 'AdminSubjectController@storeSubject')->name('admin.subject.save');