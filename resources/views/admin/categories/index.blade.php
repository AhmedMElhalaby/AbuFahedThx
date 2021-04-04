@extends('admin.admins.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="{{ config('app.color') }}">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="title">{{__($Names)}}</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="search" >
                            <form class="search form-group label-floating" action="{{url($redirect)}}">
                                <label for="q" class="control-label">{{__('admin.search')}} ...</label>
                                <input type="text" name="q" id="q" class="form-control" value="{{app('request')->input('q')}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <th>{{__('Category.name')}} </th>
                        <th>{{__('Category.description')}}</th>
                        <th>{{__('Category.signature_name')}}</th>
                        <th><a href="#" onclick="AdvanceSearch()">{{__('admin.advance_search')}} <i id="advance_search_caret" class="fa fa-caret-down"></i></a></th>
                    </thead>
                    <tbody>
                        <tr id="advance_search">
                            <form action="{{url($redirect)}}" >
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="name" class="hidden"></label>
                                        <input type="text" name="name" style="margin: 0;padding: 0" id="name" placeholder="{{__('Category.name')}}" class="form-control" value="{{app('request')->input('name')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="description" class="hidden"></label>
                                        <input type="text" name="description" style="margin: 0;padding: 0" id="description" placeholder="{{__('Category.description')}}" class="form-control" value="{{app('request')->input('description')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="signature_name" class="hidden"></label>
                                        <input type="text" name="signature_name" style="margin: 0;padding: 0" id="signature_name" placeholder="{{__('Category.signature_name')}}" class="form-control" value="{{app('request')->input('signature_name')}}">
                                    </div>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-sm btn-primary" style="margin: 0;" value="{{__('admin.search')}}">
                                </td>
                            </form>
                        </tr>
                    @foreach($Objects as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->signature_name}}</td>
                        <td class="text-primary">
                            <a href="{{url($redirect.'/'.$item->id.'/edit')}}" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.edit')}}" class="fs-20"><i class="fa fa-edit"></i></a>
                            <a href="{{url('admin/certifications?category_id='.$item->id)}}" data-toggle="tooltip" data-placement="bottom" title="{{__('Certification.certifications')}}" class="fs-20"><i class="fa fa-list"></i></a>
                            <a href="{{url($redirect.'/'.$item->id.'/upload')}}" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.upload')}}" class="fs-20"><i class="fa fa-upload"></i></a>
                            <a href="{{url($redirect.'/'.$item->id.'/certification')}}" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.certification')}}" class="fs-20"><i class="fa fa-file"></i></a>
                            <a href="#" class="fs-20" data-toggle="modal" data-target="#delete" onclick="document.getElementById('del_name').innerHTML = '{{$item->name}}';document.getElementById('id').value = '{{$item->id}}'"><i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.delete')}}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pagination-div">
        {{ $Objects->appends(['q' => request()->q,'name' => request()->name,'email' => request()->email,'active' => request()->active])->links() }}
    </div>
</div>
@endsection

