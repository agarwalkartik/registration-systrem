<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Student;
class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string(Student::AADHAAR_CARD_NUMBER)->primary();
            $table->string(Student::UNIVERSITY_ROLL_NUMBER)->unique();;
            $table->string(Student::COURSE_BRANCH)->nullable();
            $table->string(Student::SESSION)->nullable();
            $table->string(Student::STATUS)->nullable();
            $table->string(Student::YEAR)->nullable();
            $table->string(Student::SEX)->nullable();
            $table->string(Student::CASTE)->nullable();
            $table->date(Student::DOB)->nullable();
            $table->string(Student::BLOOD_GROUP)->nullable();
            $table->string(Student::EMAIL)->nullable();
            $table->string(Student::STUDENT_NAME)->nullable();
            $table->string(Student::STUDENT_MOBILE_NUMBER)->nullable();
            $table->string(Student::FATHER_NAME)->nullable();
            $table->string(Student::FATHER_MOBILE_NUMBER)->nullable();
            $table->string(Student::MOTHER_NAME)->nullable();
            $table->string(Student::MOTHER_MOBILE_NUMBER)->nullable();
            $table->text(Student::PERMANENT_ADDRESS)->nullable();
            $table->string(Student::PERMANENT_ADDRESS_DISTRICT)->nullable();
            $table->string(Student::PERMANENT_ADDRESS_STATE)->nullable();
            $table->string(Student::PERMANENT_ADDRESS_PIN_CODE)->nullable();
            $table->string(Student::PERMANENT_ADDRESS_PHONE_NUMBER)->nullable();
            $table->string(Student::LOCAL_GAURDIAN_NAME)->nullable();
            $table->string(Student::LOCAL_GAURDIAN_MOBILE_NUMBER)->nullable();
            $table->text(Student::STUDENT_LOCAL_ADDRESS)->nullable();
            $table->string(Student::STUDENT_LOCAL_ADDRESS_DISTRICT)->nullable();
            $table->string(Student::STUDENT_LOCAL_ADDRESS_STATE)->nullable();
            $table->string(Student::STUDENT_LOCAL_ADDRESS_PIN_CODE)->nullable();
            $table->string(Student::STUDENT_LOCAL_ADDRESS_PHONE_NUMBER)->nullable();
            $table->string(Student::PREVIOUS_RESULT_STATUS)->nullable();
            $table->string(Student::FEE_RECEIPT_NUMBER)->nullable();
            $table->date(Student::FEE_RECEIPT_DATE)->nullable();
            $table->string(Student::AMOUNT_DEPOSITED)->nullable();
            $table->string(Student::REGISTRATION_STATUS)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
