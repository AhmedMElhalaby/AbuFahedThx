@extends('admin.admins.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.add')}} {{__($Name)}}</h4>
                </div>
                <div class="card-content">
                    <form action="{{url($redirect)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="name" class="control-label">{{__('Category.name')}} *</label>
                                    <input type="text" id="name" name="name" required class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="description" class="control-label">{{__('Category.description')}} *</label>
                                    <textarea id="description" name="description" required class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description')}}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="signature_name" class="control-label">{{__('Category.signature_name')}}  *</label>
                                    <input type="text" id="signature_name" name="signature_name" required class="form-control {{ $errors->has('signature_name') ? ' is-invalid' : '' }}" value="{{old('signature_name')}}">
                                </div>
                                @if ($errors->has('signature_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('signature_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="signature" class="control-label">{{__('Category.signature')}} *</label>
                                <input type="file" name="signature" style="display: none" id="signature"  class="form-control" onchange="readURL(this,1);">
                                <img id="blah1" onclick="document.getElementById('signature').click()" src="{{asset('public/assets/img/upload.jpg')}}" style="width: 120px;height: 120px" alt="upload image" class="thumbnail" />
                                @if ($errors->has('signature'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('signature') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="stamp" class="control-label">{{__('Category.stamp')}} *</label>
                                <input type="file" name="stamp" style="display: none" id="stamp"  class="form-control" onchange="readURL(this,2);">
                                <img id="blah2" onclick="document.getElementById('stamp').click()" src="{{asset('public/assets/img/upload.jpg')}}" style="width: 120px;height: 120px" alt="upload image" class="thumbnail" />
                                @if ($errors->has('stamp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stamp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="image" class="control-label">{{__('Category.image')}} *</label>
                                <input type="file" name="image" style="display: none" id="image"  class="form-control" onchange="readURL(this,3);">
                                <img id="blah3" onclick="document.getElementById('image').click()" src="{{asset('public/assets/img/upload.jpg')}}" style="width: 120px;height: 120px" alt="upload image" class="thumbnail" />
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="show_identity" class="control-label">{{__('Category.show_identity')}} *</label>
                                    <input type="checkbox" id="show_identity" name="show_identity" class="form-control {{ $errors->has('show_identity') ? ' is-invalid' : '' }}" value="1">
                                </div>
                                @if ($errors->has('show_identity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('show_identity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row submit-btn">
                            <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function readURL(input,id) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah'+id)
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
