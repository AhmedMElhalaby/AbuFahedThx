<?php

namespace App\Http\Requests\Admin\Certification;

use App\Exports\CertificationExport;
use App\Models\Certification;
use Illuminate\Foundation\Http\FormRequest;
use Maatwebsite\Excel\Facades\Excel;

class ExportRequest extends FormRequest
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
            't' => 'required|in:print,pdf,xls',
        ];
    }
    public function preset($view,$params){
        $Objects   = Certification::all();
        $ext = $this->t;
        if ($ext == 'print')
            return view($view)->with(['Objects' => $Objects, 'names' => $params['Names'], 'print' => true]);
        elseif ($ext == 'pdf')
            return (new \App\Master)->exportPDF($Objects, $view, $params['Names']);
        elseif($ext == 'xls')
            if(count($Objects) > 0)
                return Excel::download(new CertificationExport(),$params['Names'].'-'.now().'.xlsx');
    }
}
