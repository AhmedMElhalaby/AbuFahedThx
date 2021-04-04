<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Category\CertificationRequest;
use App\Http\Requests\Admin\Category\DestroyRequest;
use App\Http\Requests\Admin\Category\SearchRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Requests\Admin\Category\ExportRequest;
use App\Http\Requests\Admin\Category\UploadRequest;
use App\Master;
use App\Models\Category;
use App\Models\Certification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CategoryController extends Controller
{
    protected $view_index = 'admin.categories.index';
    protected $view_show = 'admin.categories.show';
    protected $view_create = 'admin.categories.create';
    protected $view_edit = 'admin.categories.edit';
    protected $view_upload = 'admin.categories.upload';
    protected $view_certification = 'admin.categories.certification';
    protected $view_export = 'admin.exports.categories';
    protected $Params = [
        'Names'=>'Category.categories',
        'TheName'=>'Category.the_category',
        'Name'=>'Category.category',
        'redirect'=>'admin/categories',
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
        $Object = Category::find($id);
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
        $Object = Category::find($id);
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
     * Show the form for Uploading the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function upload($id)
    {
        $Object = Category::find($id);
        if(!$Object)
            return redirect($this->Params['redirect'])->withErrors(__('admin.messages.wrong_data'));
        return view($this->view_upload,compact('Object'))->with($this->Params);
    }

    /**
     * Show the form for Certification the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function certification($id)
    {
        $Object = Category::find($id);
        if(!$Object)
            return redirect($this->Params['redirect'])->withErrors(__('admin.messages.wrong_data'));
        return view($this->view_certification,compact('Object'))->with($this->Params);
    }

    /**
     * Certification the specified resource in storage.
     *
     * @param CertificationRequest $request
     * @param int $id
     * @return Response
     */
    public function postCertification(CertificationRequest $request, $id)
    {
        return $request->preset($this->Params['redirect'],$id);
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param UploadRequest $request
     * @param int $id
     * @return Response
     */
    public function postUpload(UploadRequest $request, $id)
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
