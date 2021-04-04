<?php

namespace App\Http\Requests\Admin\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreRequest extends FormRequest
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
            'password' => 'required|max:255|confirmed|min:6',
            'email' => 'required|email|max:255|unique:users',
        ];
    }
    public function preset($redirect){
        $Object = User::create(array('email' => $this->email,'name' => $this->name, 'password' => Hash::make($this->password)));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
