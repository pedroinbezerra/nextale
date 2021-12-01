<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FileStore extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $MAX_FILE_SIZE = env('MAX_FILE_UPLOAD_SIZE');
        $ALLOWED_EXTENSIONS = env('ALLOWED_EXTENSIONS');

        return [
            'fk_tale_id' => 'required|int',
            'title' => 'required|string',
            'is_enabled' => 'required|boolean',
            'file' => "required|mimes:$ALLOWED_EXTENSIONS|max:$MAX_FILE_SIZE",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
