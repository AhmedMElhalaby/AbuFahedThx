<?php

namespace App\Http\Requests\Admin\Certification;

use App\Models\Certification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'civil_registry' => 'required|string|max:255',
            'details' => 'nullable|string|max:255',
        ];
    }
    public function preset($redirect,$id){
        $Object = Certification::find($id);
        if(!$Object)
            return redirect($redirect)->withErrors(__('admin.messages.wrong_data'));
        $Object->update(array(
            'category_id' => $this->category_id,
            'name' => $this->name,
            'civil_registry' => $this->civil_registry,
            'details' => @$this->details,
        ));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
