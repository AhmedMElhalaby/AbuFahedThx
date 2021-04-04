<?php

namespace App\Http\Requests\Admin\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'required|max:255|confirmed|min:6',
            'id' => 'required|exists:users,id',
        ];
    }
    public function preset($redirect){
        $Object = User::find($this->id);
        $Object->update(array('password' => Hash::make($this->password)));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
