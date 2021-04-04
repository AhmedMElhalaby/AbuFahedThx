@extends('admin.layouts.app')
@section('style')
@endsection
@section('head-icon')
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display: inline-block" aria-expanded="false">
        <i class="material-icons text-primary" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.export')}}" style="font-size: 30px">cloud_download</i>
    </a>
    <ul class="dropdown-menu" role="menu" style="min-width: auto;">
        <li><a class="dropdown-item"  href="{{ url($redirect.'/option/export') }}?t=xls" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.excel')}}"><i class="material-icons">table_chart</i> </a></li>
        <li><a class="dropdown-item" href="{{ url($redirect.'/option/export') }}?t=pdf" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.pdf')}}"><i class="material-icons">picture_as_pdf</i> </a></li>
        <li><a class="dropdown-item" target="_blank" href="{{ url($redirect.'/option/export') }}?t=print" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.print')}}"><i class="material-icons">print</i> </a></li>
    </ul>
    <a href="{{url($redirect.'/create')}}" style="display: inline-block;">
        <i class="material-icons text-primary" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.add')}} {{__($Name)}}" style="font-size: 30px">add_box</i>
        <p class="hidden-lg hidden-md">Dashboard</p>
    </a>
@endsection
@section('out-content')
    <div class="modal fade" id="EditPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{url($redirect.'/update/password')}}" method="post">
                <input name="_method" type="hidden" value="PATCH">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{__('admin.change_password')}} :  <span id="UserName"></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="user_id" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="password" class="control-label">{{__('Admin.password')}} *</label>
                                    <input type="password" id="password" name="password" required class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" >
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="password_confirmation" class="control-label">{{__('Admin.password_confirmation')}} *</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" >
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('admin.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{url($redirect.'/destroy')}}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{__('admin.delete')}} {{__($TheName)}} :  <span id="del_name"></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" >
                        <p>{{__('admin.sure_to_delete')}} {{__($TheName)}} !! </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('admin.cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{__('admin.delete')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function AdvanceSearch(){
            let x =$( "#advance_search" );
            let y =$( "#advance_search_caret" );
            x.fadeToggle();
            if(x.is(":visible")){
                y.removeClass('fa-caret-down');
                y.addClass('fa-caret-up');
            }else {
                y.removeClass('fa-caret-up');
                y.addClass('fa-caret-down');
            }
        }
        @if(app('request')->has('active') || app('request')->has('name') || app('request')->has('email'))
            $( "#advance_search" ).fadeToggle();
        @endif
    </script>
@endsection
