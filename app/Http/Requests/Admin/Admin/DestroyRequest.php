<?php

namespace App\Http\Requests\Admin\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DestroyRequest extends FormRequest
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
            'id' => 'required|exists:users,id',
        ];
    }
    public function preset($redirect){
        $Object = User::find($this->id);
        if($Object->id == Auth::guard('admin')->user()->id){
            return redirect($redirect)->withErrors(__('admin.messages.you_cant_delete_your_account'));
        }
        $Object->delete();
        return redirect($redirect)->with('status', __('admin.messages.deleted_successfully'));
    }
}
