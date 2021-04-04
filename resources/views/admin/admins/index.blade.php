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
                        <th>{{__('Admin.name')}} </th>
                        <th>{{__('Admin.email')}}</th>
                        <th>{{__('Admin.status')}}</th>
                        <th><a href="#" onclick="AdvanceSearch()">{{__('admin.advance_search')}} <i id="advance_search_caret" class="fa fa-caret-down"></i></a></th>
                    </thead>
                    <tbody>
                        <tr id="advance_search">
                            <form action="{{url($redirect)}}" >
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="name" class="hidden"></label>
                                        <input type="text" name="name" style="margin: 0;padding: 0" id="name" placeholder="{{__('Admin.name')}}" class="form-control" value="{{app('request')->input('name')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="email" class="hidden"></label>
                                        <input type="text" name="email" style="margin: 0;padding: 0" id="email" placeholder="{{__('Admin.email')}}" class="form-control" value="{{app('request')->input('email')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="active" class="hidden"></label>
                                        <select type="active" name="active" style="margin: 0;padding: 0" id="active" class="form-control">
                                            <option value=""@if(app('request')->has('active') && app('request')->input('active') == '') selected @endif>-</option>
                                            <option value="1" @if(app('request')->has('active') && app('request')->input('active') == '1') selected @endif>{{__('Admin.active')}}</option>
                                            <option value="0" @if(app('request')->has('active') && app('request')->input('active') == '0') selected @endif>{{__('Admin.in_active')}}</option>
                                        </select>
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
                        <td><a href="mailto:{{$item->email}}" target="_blank">{{$item->email}}</a></td>
                        <td>@if($item->active) <span class="label label-success">{{__('Admin.active')}}</span>@else  <span class="label label-danger">{{__('Admin.in_active')}}</span> @endif</td>
                        <td class="text-primary">
                            <a href="{{url($redirect.'/'.$item->id.'/edit')}}" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.edit')}}" class="fs-20"><i class="fa fa-edit"></i></a>
                            <a href="{{url($redirect.'/'.$item->id.'/activation')}}" data-toggle="tooltip" data-placement="bottom" title="@if($item->active) {{__('Admin.do_in_active')}} @else {{__('Admin.do_active')}} @endif" class="fs-20"><i class="fa @if($item->active) fa-window-close @else fa-check-square @endif"></i></a>
                            <a href="#" class="fs-20" data-toggle="modal" data-target="#EditPassword" onclick="document.getElementById('UserName').innerHTML = '{{$item->name}}';document.getElementById('user_id').value = '{{$item->id}}'"><i class="fa fa-key" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.change_password')}}"></i></a>
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

