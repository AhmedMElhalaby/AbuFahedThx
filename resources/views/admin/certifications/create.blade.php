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
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="name" class="control-label">{{__('Certification.name')}} *</label>
                                    <input type="text" id="name" name="name" required class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="civil_registry" class="control-label">{{__('Certification.civil_registry')}} *</label>
                                    <input type="text" id="civil_registry" name="civil_registry" required class="form-control {{ $errors->has('civil_registry') ? ' is-invalid' : '' }}" value="{{old('civil_registry')}}">
                                </div>
                                @if ($errors->has('civil_registry'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('civil_registry') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="category_id" class="control-label">{{__('Category.the_category')}} *</label>
                                    <select id="category_id" name="category_id" required class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="details" class="control-label">{{__('Certification.details')}}  *</label>
                                    <input type="text" id="details" name="details" required class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}" value="{{old('details')}}">
                                </div>
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
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
