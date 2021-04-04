<?php

namespace App\Http\Requests\Admin\Category;

use App\Master;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

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
            'description' => 'required|string|max:255',
            'signature_name' => 'required|string|max:255',
            'signature' => 'required|image|mimes:png|max:2048',
            'stamp' => 'required|image|mimes:png|max:2048',
            'image' => 'required|image|mimes:png|max:2048',
        ];
    }
    public function preset($redirect){
        $Object = Category::create(array(
            'description' => $this->description,
            'name' => $this->name,
            'signature_name' => $this->signature_name,
            'signature' => $this->signature,
            'stamp' => $this->stamp,
            'image' => $this->image,
            'show_identity' => $this->filled('show_identity'),
        ));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
