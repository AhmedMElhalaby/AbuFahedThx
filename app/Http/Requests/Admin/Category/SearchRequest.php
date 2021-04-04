<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
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
        $Objects = new Category();
        if($this->has('q')){
            $Objects = $Objects->where('name','LIKE','%'.$this->q.'%')->orwhere('signature_name','LIKE','%'.$this->q.'%');
        }
        if($this->has('name')){
            $Objects = $Objects->where('name','LIKE','%'.$this->name.'%');
        }
        if($this->has('description')){
            $Objects = $Objects->where('description','LIKE','%'.$this->description.'%');
        }
        if($this->has('signature_name')){
            $Objects = $Objects->where('signature_name','LIKE','%'.$this->signature_name.'%');
        }

        $Objects = $Objects->paginate(($this->per_page)?$this->per_page:10);
        return view($view,compact('Objects'))->with($params);
    }
}
