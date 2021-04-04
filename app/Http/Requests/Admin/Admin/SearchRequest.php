<?php

namespace App\Http\Requests\Admin\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        ];
    }
    public function preset($view,$params){
        $Objects = new User();
        if($this->has('q')){
            $Objects = $Objects->where('name','LIKE','%'.$this->q.'%')->orwhere('email','LIKE','%'.$this->q.'%');
        }
        if($this->has('name')){
            $Objects = $Objects->where('name','LIKE','%'.$this->name.'%');
        }
        if($this->has('email')){
            $Objects = $Objects->where('email','LIKE','%'.$this->email.'%');
        }
        if($this->has('active')){
            $Objects = $Objects->where('active','LIKE','%'.$this->active.'%');
        }

        $Objects = $Objects->paginate(($this->per_page)?$this->per_page:10);
        return view($view,compact('Objects'))->with($params);
    }
}
