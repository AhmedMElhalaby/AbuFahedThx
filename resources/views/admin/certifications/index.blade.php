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
                        <th>{{__('Certification.name')}} </th>
                        <th>{{__('Category.category')}}</th>
                        <th>{{__('Certification.civil_registry')}}</th>
                        <th>{{__('Certification.level')}}</th>
                        <th>{{__('Certification.is_passed')}}</th>
                        <th><a href="#" onclick="AdvanceSearch()">{{__('admin.advance_search')}} <i id="advance_search_caret" class="fa fa-caret-down"></i></a></th>
                    </thead>
                    <tbody>
                        <tr id="advance_search">
                            <form action="{{url($redirect)}}" >
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="name" class="hidden"></label>
                                        <input type="text" name="name" style="margin: 0;padding: 0" id="name" placeholder="{{__('Certification.name')}}" class="form-control" value="{{app('request')->input('name')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="category_id" class="hidden"></label>
                                        <select name="category_id" style="margin: 0;padding: 0" id="name" class="form-control" value="{{app('request')->input('category_id')}}">
                                            <option value="">-</option>
                                            @foreach(\App\Models\Category::all() as $Category)
                                                <option value="{{$Category->id}}" @if(app('request')->input('category_id') == $Category->id) selected @endif>{{$Category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="civil_registry" class="hidden"></label>
                                        <input type="text" name="civil_registry" style="margin: 0;padding: 0" id="civil_registry" placeholder="{{__('Certification.civil_registry')}}" class="form-control" value="{{app('request')->input('civil_registry')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="level" class="hidden"></label>
                                        <input type="text" name="level" style="margin: 0;padding: 0" id="level" placeholder="{{__('Certification.level')}}" class="form-control" value="{{app('request')->input('level')}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin:0;padding: 0 ">
                                        <label for="is_passed" class="hidden"></label>
                                        <input type="text" name="is_passed" style="margin: 0;padding: 0" id="level" placeholder="{{__('Certification.is_passed')}}" class="form-control" value="{{app('request')->input('is_passed')}}">
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
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->civil_registry}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->is_passed}}</td>
                        <td class="text-primary">
                            <a href="{{url($redirect.'/'.$item->id.'/edit')}}" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.edit')}}" class="fs-20"><i class="fa fa-edit"></i></a>
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

