<?php namespace App\Http\Controllers;

use App\Repositories\AuditRepository as Audit;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Redirect;
use Setting;
use Validator;


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

     protected function aadhaarCardvalidator(array $data)
    {
        return Validator::make($data, [
            'aadhaar_card_number' => 'required',
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

        $aadharCardNumber = '';
        if ($request->has('aadhar-card-number')) {
            $aadharCardNumber = $request['aadhar-card-number'];
        }
        echo($aadharCardNumber);
        $validator = $this->aadhaarCardValidator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        return "<h1></h1>";

    }
}