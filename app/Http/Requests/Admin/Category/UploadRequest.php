<?php

namespace App\Http\Requests\Admin\Category;

use App\Imports\CertificationImport;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UploadRequest extends FormRequest
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
            'upload' => 'required',
        ];
    }
    public function preset($redirect,$id){
        $Object = Category::find($id);
        if(!$Object)
            return redirect($redirect)->withErrors(__('admin.messages.wrong_data'));
        Excel::import(new CertificationImport($Object->id),$this->file('upload'));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
