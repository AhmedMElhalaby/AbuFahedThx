<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Admin\ActivationRequest;
use App\Http\Requests\Admin\Admin\DestroyRequest;
use App\Http\Requests\Admin\Admin\ExportRequest;
use App\Http\Requests\Admin\Admin\SearchRequest;
use App\Http\Requests\Admin\Admin\StoreRequest;
use App\Http\Requests\Admin\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\Admin\UpdateRequest;
use App\Master;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminController extends Controller
{
    protected $view_index = 'admin.admins.index';
    protected $view_show = 'admin.admins.show';
    protected $view_create = 'admin.admins.create';
    protected $view_edit = 'admin.admins.edit';
    protected $view_export = 'admin.exports.admins';
    protected $Params = [
        'Names'=>'Admin.admins',
        'TheName'=>'Admin.the_admin',
        'Name'=>'Admin.admin',
        'redirect'=>'admin/admins',
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
        $Object = User::find($id);
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
        $Object = User::find($id);
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
     * Update the Password resource in storage.
     *
     * @param UpdatePasswordRequest $request
     * @return UpdatePasswordRequest
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        return $request->preset($this->Params['redirect']);
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

    /**
     * @param ActivationRequest $request
     * @param $id
     * @return ActivationRequest
     */
    public function activation(ActivationRequest $request, $id)
    {
        return  $request->preset($this->Params['redirect']);
    }
}
