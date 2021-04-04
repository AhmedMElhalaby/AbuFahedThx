<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CertificationRequest extends FormRequest
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
            'line_one' => 'nullable|string|max:255',
            'line_two' => 'nullable|string|max:255',
            'line_three_1' => 'nullable|string|max:255',
            'line_three_2' => 'nullable|string|max:255',
//            'line_three_3' => 'required|string|max:255',
            'line_four' => 'nullable|string|max:255',
            'line_five' => 'nullable|string|max:255',
            'line_six_1' => 'nullable|string|max:255',
            'line_six_2' => 'nullable|string|max:255',
            'line_seven_1' => 'nullable|string|max:255',
            'line_seven_2' => 'nullable|string|max:255',
            'line_eight_1' => 'nullable|string|max:255',
            'line_eight_2' => 'nullable|string|max:255',
        ];
    }
    public function preset($redirect,$id){
        $Object = Category::find($id);
        if(!$Object)
            return redirect($redirect)->withErrors(__('admin.messages.wrong_data'));
        $Object->update(array(
            'line_one' => @$this->line_one,
            'line_two' => @$this->line_two,
            'line_three_1' => @$this->line_three_1,
            'line_three_2' => @$this->line_three_2,
            'line_three_3' => @$this->line_three_3,
            'line_four' => @$this->line_four,
            'line_five' => @$this->line_five,
            'line_six_1' => @$this->line_six_1,
            'line_six_2' => @$this->line_six_2,
            'line_seven_1' => @$this->line_seven_1,
            'line_seven_2' => @$this->line_seven_2,
            'line_eight_1' => @$this->line_eight_1,
            'line_eight_2' => @$this->line_eight_2,
        ));
        return redirect($redirect)->with('status', __('admin.messages.saved_successfully'));
    }
}
