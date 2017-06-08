<?php namespace App\Models;

use App\Traits\BaseModelTrait;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use BaseModelTrait;

const AADHAAR_CARD_NUMBER = 'aadhaar_card_number';
const UNIVERSITY_ROLL_NUMBER = 'university_roll_number';
const COURSE_BRANCH = 'course_branch';
const SESSION = 'session';
const STATUS = 'status';
const YEAR = 'year';
const SEX = 'sex';
const CASTE = 'caste';
const DOB = 'dob';
const BLOOD_GROUP = 'blood_group';
const EMAIL = 'email';
const STUDENT_NAME = 'student_name';
const STUDENT_MOBILE_NUMBER = 'student_mobile_number';
const FATHER_NAME = 'father_name';
const FATHER_MOBILE_NUMBER = 'father_mobile_number';
const MOTHER_NAME = 'mother_name';
const MOTHER_MOBILE_NUMBER = 'mother_mobile_number';
const PERMANENT_ADDRESS = 'permanent_address';
const PERMANENT_ADDRESS_DISTRICT = 'permanent_address_district';
const PERMANENT_ADDRESS_STATE = 'permanent_address_state';
const PERMANENT_ADDRESS_PIN_CODE = 'permanent_address_pin_code';
const PERMANENT_ADDRESS_PHONE_NUMBER = 'permanent_address_phone_number';
const LOCAL_GAURDIAN_NAME = 'local_gaurdian_name';
const LOCAL_GAURDIAN_MOBILE_NUMBER = 'local_gaurdian_mobile_number';
const STUDENT_LOCAL_ADDRESS = 'student_local_address';
const STUDENT_LOCAL_ADDRESS_DISTRICT = 'student_local_address_district';
const STUDENT_LOCAL_ADDRESS_STATE = 'student_local_address_state';
const STUDENT_LOCAL_ADDRESS_PIN_CODE = 'student_local_address_pin_code';
const STUDENT_LOCAL_ADDRESS_PHONE_NUMBER = 'student_local_address_phone_number';
const PREVIOUS_RESULT_STATUS = 'previous_result_status';
const FEE_RECEIPT_NUMBER = 'fee_receipt_number';
const FEE_RECEIPT_DATE = 'fee_receipt_date';
const AMOUNT_DEPOSITED = 'amount_deposited';
const REGISTRATION_STATUS = 'registration_status';

const REGISTRATION_STATUS_PENDING = 'pending';
const REGISTRATION_STATUS_APPROVED = 'approved';
    /**
     * @var array
     */
    protected $fillable = [
        self::AADHAAR_CARD_NUMBER,
        self::UNIVERSITY_ROLL_NUMBER,
        self::COURSE_BRANCH,
        self::SESSION,
        self::STATUS,
        self::YEAR,
        self::SEX,
        self::CASTE,
        self::DOB,
        self::BLOOD_GROUP,
        self::EMAIL,
        self::STUDENT_NAME,
        self::STUDENT_MOBILE_NUMBER,
        self::FATHER_NAME,
        self::FATHER_MOBILE_NUMBER,
        self::MOTHER_NAME,
        self::MOTHER_MOBILE_NUMBER,
        self::PERMANENT_ADDRESS,
        self::PERMANENT_ADDRESS_DISTRICT,
        self::PERMANENT_ADDRESS_STATE,
        self::PERMANENT_ADDRESS_PIN_CODE,
        self::PERMANENT_ADDRESS_PHONE_NUMBER,
        self::LOCAL_GAURDIAN_NAME,
        self::LOCAL_GAURDIAN_MOBILE_NUMBER,
        self::STUDENT_LOCAL_ADDRESS,
        self::STUDENT_LOCAL_ADDRESS_DISTRICT,
        self::STUDENT_LOCAL_ADDRESS_STATE,
        self::STUDENT_LOCAL_ADDRESS_PIN_CODE,
        self::STUDENT_LOCAL_ADDRESS_PHONE_NUMBER,
        self::PREVIOUS_RESULT_STATUS,
        self::FEE_RECEIPT_NUMBER,
        self::FEE_RECEIPT_DATE,
        self::AMOUNT_DEPOSITED,
        self::REGISTRATION_STATUS
    ];

    public $incrementing = false;

    protected $primary_key = self::AADHAAR_CARD_NUMBER;
}
