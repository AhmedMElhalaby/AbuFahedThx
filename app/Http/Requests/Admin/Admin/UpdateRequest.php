<?php

namespace App\Http\Requests\Admin\Admin;

use App\Models\User;
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
            'email' => 'required|string|max:255|unique:users,email,'.$this->route('admin'),
        ];
    }
    public function preset($redirect,$id){
        $Object = User::find($id);
        if(!$Object)
            return redirect($redirect)->withErrors(__('admin.messages.wrong_data'));
        $Object->update(array('email' => $this->email,'name' => $this->name));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
