<?php

namespace App\Http\Requests\Admin\Category;

use App\Master;
use App\Models\Category;
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
            'description' => 'required|string|max:255',
            'signature_name' => 'required|string|max:255',
            'signature' => 'sometimes|image|mimes:png|max:2048',
            'stamp' => 'sometimes|image|mimes:png|max:2048',
            'image' => 'sometimes|image|mimes:png',
        ];
    }
    public function preset($redirect,$id){
        $Object = Category::find($id);
        if(!$Object)
            return redirect($redirect)->withErrors(__('admin.messages.wrong_data'));
        $Object->update(array(
            'description' => $this->description,
            'name' => $this->name,
            'signature_name' => $this->signature_name,
            'signature' => $this->hasFile('signature')?$this->signature:$Object->signature,
            'stamp' => $this->hasFile('stamp')?$this->stamp:$Object->stamp,
            'image' => $this->hasFile('image')?$this->image:$Object->image,
            'show_identity' => $this->filled('show_identity'),
        ));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
