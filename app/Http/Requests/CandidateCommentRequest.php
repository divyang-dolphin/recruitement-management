<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateCommentRequest extends FormRequest
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
            'comment' => 'required',
        ];
    }

    // protected function getValidatorInstance()
    // {
    //     $validator = parent::getValidatorInstance();
    //     $validator->after(function ($validator) {
    //         $data = $this->all();
    //         $data['candidate_id'] = $data['candidate'];
    //         $this->getInputSource()->replace($data);
    //     });
    //     return $validator;
    // }
}
