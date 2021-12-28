<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'alternative_mobile' => 'required',
            'linkedin_profile' => 'url|nullable',
            'hometown' => 'required',
            'current_location' => 'required',
            'experience' => 'required',
            'selection_status' => 'required',
            'type' => 'required',
            'ctc' => 'required',
            'expected_ctc' => 'required',
            'dob' => 'required',
            'maritial_status' => 'required',
            'gender' => 'required',
            'CV_status' => 'required',
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->after(function ($validator) {
            $data = $this->all();
            if(isset($data['dob'])){
                $data['dob'] = Carbon::createFromFormat('d/m/Y',$data['dob'])->format('Y-m-d');
            }
            $this->getInputSource()->replace($data);
        });
        return $validator;
    }
}
