<?php namespace App\Http\Controllers;

use App\Repositories\AuditRepository as Audit;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Redirect;
use Setting;
use Validator;
use App\Models\Student;


class StudentController extends Controller
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

     protected function aadhaarCardValidator(array $data)
    {
        return Validator::make($data, [
            'aadhaar_card_number' => 'exists:students',
        ]);
    }

     protected function otherDetailsValidator(array $data)
    {
        return Validator::make($data, [
            Student::FEE_RECEIPT_NUMBER => 'required|numeric',
            Student::FEE_RECEIPT_DATE => 'required|date',
            Student::AMOUNT_DEPOSITED => 'required|numeric'
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function registration()
    {
        $page_title = trans('Student Registartion');
        $page_description = "Welcome to student registration page";
        return view('student.register', compact('page_title', 'page_description'));
    }
    public function registrationAadhaarCard()
    {
        $page_title = trans('Student Registartion');
        $page_description = "Welcome to student registration page";
        return view('student.registration.aadhaar-card', compact('page_title', 'page_description'));
    }

    public function aadhaarCardPost(Request $request)
    {

        $page_title = trans('Student Registartion');
        $page_description = "Welcome to student registration page";
        $aadhaarCardNumber = null;
        if ($request->has('aadhaar_card_number')) {
            $aadhaarCardNumber = $request['aadhaar_card_number'];
        }
        $validator = $this->aadhaarCardValidator($request->all());
         if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $validator->after(function ($validator) use ($aadhaarCardNumber) {
        
        $studentDetails = Student::where(Student::AADHAAR_CARD_NUMBER,$aadhaarCardNumber)->get()->first();

            if ($studentDetails->registration_status !== Student::REGISTRATION_STATUS_NOT_SUBMITTED) {
                $validator->errors()->add('Aadhaar Card Number', 'This Aadhaar Card Number is already registered');
            }
        });
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $studentDetails = Student::where(Student::AADHAAR_CARD_NUMBER,$aadhaarCardNumber)->get()->first();
        return view('student.registration.other-details', compact('studentDetails','page_title', 'page_description'));

    }

    public function otherDetailsPost(Request $request)
    {
              $page_title = trans('Student Registartion');
        $page_description = "Welcome to student registration page";
          $validator = $this->otherDetailsValidator($request->all());
         if ($validator->fails()) {
             echo("Validation faild");
                  return redirect('student/registration/aadhaar-card')
                        ->withErrors($validator)
                        ->withInput();
        }
        $student = Student::where(Student::AADHAAR_CARD_NUMBER,$request[Student::AADHAAR_CARD_NUMBER])
        ->update(
            [
                Student::STUDENT_MOBILE_NUMBER=>$request[Student::STUDENT_MOBILE_NUMBER],
             
                Student::STUDENT_LOCAL_ADDRESS=>$request[Student::STUDENT_LOCAL_ADDRESS],
                Student::STUDENT_LOCAL_ADDRESS_DISTRICT=>$request[Student::STUDENT_LOCAL_ADDRESS_DISTRICT],
                Student::STUDENT_LOCAL_ADDRESS_STATE=>$request[Student::STUDENT_LOCAL_ADDRESS_STATE],
                Student::STUDENT_LOCAL_ADDRESS_PIN_CODE=>$request[Student::STUDENT_LOCAL_ADDRESS_PIN_CODE],
                Student::STUDENT_LOCAL_ADDRESS_PHONE_NUMBER=>$request[Student::STUDENT_LOCAL_ADDRESS_PHONE_NUMBER],

                Student::FEE_RECEIPT_NUMBER=>$request[Student::FEE_RECEIPT_NUMBER],
                Student::FEE_RECEIPT_DATE=>$request[Student::FEE_RECEIPT_DATE],
                Student::AMOUNT_DEPOSITED=>$request[Student::AMOUNT_DEPOSITED],

                Student::REGISTRATION_STATUS=>Student::REGISTRATION_STATUS_PENDING
            ]
            
            );
        return view('student.registration.completed',compact('page_title', 'page_description'));
            
    }
}