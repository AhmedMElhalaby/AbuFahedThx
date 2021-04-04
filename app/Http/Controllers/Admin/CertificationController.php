<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Certification\DestroyRequest;
use App\Http\Requests\Admin\Certification\SearchRequest;
use App\Http\Requests\Admin\Certification\StoreRequest;
use App\Http\Requests\Admin\Certification\UpdateRequest;
use App\Http\Requests\Admin\Certification\ExportRequest;
use App\Master;
use App\Models\Certification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CertificationController extends Controller
{
    protected $view_index = 'admin.certifications.index';
    protected $view_show = 'admin.certifications.show';
    protected $view_create = 'admin.certifications.create';
    protected $view_edit = 'admin.certifications.edit';
    protected $view_export = 'admin.exports.certifications';
    protected $Params = [
        'Names'=>'Certification.certifications',
        'TheName'=>'Certification.the_certification',
        'Name'=>'Certification.certification',
        'redirect'=>'admin/certifications',
    ];

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Factory|View
     */
    public function index(SearchRequest $request)
    {
        return $request->preset($this->view_index,$this->Params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view($this->view_create)->with($this->Params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        return $request->preset($this->Params['redirect']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $Object = Certification::find($id);
        if(!$Object)
            return redirect($this->Params['redirect'])->withErrors(__('admin.messages.wrong_data'));
        return view($this->view_show,compact('Object'))->with($this->Params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Object = Certification::find($id);
        if(!$Object)
            return redirect($this->Params['redirect'])->withErrors(__('admin.messages.wrong_data'));
        return view($this->view_edit,compact('Object'))->with($this->Params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        return $request->preset($this->Params['redirect'],$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequest $request
     * @return Response
     */
    public function destroy(DestroyRequest $request)
    {
        return $request->preset($this->Params['redirect']);
    }

    /**
     * Export resource in storage.
     *
     * @param ExportRequest $request
     * @return Master|Factory|View|BinaryFileResponse
     */
    public function export(ExportRequest $request)
    {
        return  $request->preset($this->view_export,$this->Params);
    }
}
