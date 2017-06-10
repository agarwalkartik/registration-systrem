<?php namespace App\Http\Controllers;

use App\Repositories\AuditRepository as Audit;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Redirect;
use Setting;
use Validator;
use App\Models\Student;


class RegistrarController extends Controller
{
    /**
     * @param Application $app
     * @param Audit $audit
     */
    public function __construct(Application $app, Audit $audit)
    {
        parent::__construct($app, $audit);
        // Set default crumbtrail for controller.
        session(['crumbtrail.leaf' => 'home']);
    }


    /**
     * @return \Illuminate\View\View
     */
     
     public function verifyStudents()
     {

        $filter = \DataFilter::source(Student::where(Student::REGISTRATION_STATUS,Student::REGISTRATION_STATUS_PENDING));
        $filter->add(Student::UNIVERSITY_ROLL_NUMBER,'University Roll Number', 'text');
        $filter->add(Student::AADHAAR_CARD_NUMBER,'Aadhaar Card Number','text');
        $filter->add(Student::STUDENT_NAME,'Student Name','text');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();
 
        $grid = \DataGrid::source($filter);  //same source types of DataSet
   
        $grid->add(Student::AADHAAR_CARD_NUMBER,'Aadhaar Card Number', true); //field name, label, sortable
        $grid->add(Student::UNIVERSITY_ROLL_NUMBER,'University Roll Number', true); //field name, label, sortable
        $grid->add(Student::STUDENT_NAME,'Student Name', true); //field name, label, sortable
        $grid->add(Student::FATHER_NAME,'Father Name', true);//field name, label, sortable
        $grid->add(Student::REGISTRATION_STATUS,'Registration Status', true); //field name, label, sortable
// //    $grid->add('body','Body')->filter('strip_tags|substr[0,20]'); //another way to filter
//    $grid->edit('/articles/edit', 'Edit','modify|delete'); //shortcut to link DataEdit actions
//    $grid->add('author.fullname','author'); //relation.fieldname 
//    $grid->add('{{ substr($body,0,20) }}...','Body'); //blade syntax with main field
//    $grid->add('{{ $author->firstname }}','Author'); //blade syntax with related field
//    $grid->add('body|strip_tags|substr[0,20]','Body'); //filter (similar to twig syntax)
//    $grid->add('body','Body')->filter('strip_tags|substr[0,20]'); //another way to filter
   $grid->edit('/registrar/students/edit', 'Edit','modify'); //shortcut to link DataEdit actions
   
//    //cell closure
//    $grid->add('revision','Revision')->cell( function( $value, $row) {
//         return ($value != '') ? "rev.{$value}" : "no revisions for art. {$row->id}";
//    });
   
   //row closure
   $grid->row(function ($row) {
    //    if ($row->cell('public')->value < 1) {
        //    $row->cell('title')->style("color:Gray");
           $row->style("background-color:#ffffff");
    //    }  
   });
    $grid->attributes(array("class"=>"table table-striped table-bordered"));
//    $grid->link('/articles/edit',"Add New", "TR");  //add button
//    $grid->orderBy('id','desc'); //default orderby
   $grid->paginate(10); //pagination
   return view('registrar.verify-students', compact('filter','grid'));
        // return view('registrar.verify-students', compact('students'));
     }
}