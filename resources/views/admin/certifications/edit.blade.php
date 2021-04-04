@extends('admin.admins.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.edit')}} {{__(($TheName))}}</h4>
                </div>
                <div class="card-content">
                    <form action="{{url($redirect.'/'.$Object->id)}}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="name" class="control-label">{{__('Certification.name')}} *</label>
                                    <input type="text" id="name" name="name" required class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$Object->name}}">
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
                                    <input type="text" id="civil_registry" name="civil_registry" required class="form-control {{ $errors->has('civil_registry') ? ' is-invalid' : '' }}" value="{{$Object->civil_registry}}">
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
                                            <option value="{{$category->id}}" @if($category->id == $Object->category_id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="status" class="control-label">{{__('Certification.status')}} *</label>
                                    <input type="text" id="status" name="status" required class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" value="{{$Object->status}}">
                                </div>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="level" class="control-label">{{__('Certification.level')}} *</label>
                                    <input type="text" id="level" name="level" required class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}" value="{{$Object->level}}">
                                </div>
                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label for="is_passed" class="control-label">{{__('Certification.is_passed')}} *</label>
                                    <input type="text" id="is_passed" name="is_passed" required class="form-control {{ $errors->has('is_passed') ? ' is-invalid' : '' }}" value="{{$Object->is_passed}}">
                                </div>
                                @if ($errors->has('is_passed'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_passed') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="details" class="control-label">{{__('Certification.details')}}  *</label>
                                    <input type="text" id="details" name="details" required class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}" value="{{$Object->details}}">
                                </div>
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label for="period_from" class="control-label">{{__('Certification.period_from')}}  *</label>
                                    <input type="text" id="period_from" name="period_from" required class="form-control {{ $errors->has('period_from') ? ' is-invalid' : '' }}" value="{{$Object->period_from}}">
                                </div>
                                @if ($errors->has('period_from'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('period_from') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label for="period_to" class="control-label">{{__('Certification.period_to')}}  *</label>
                                    <input type="text" id="period_to" name="period_to" required class="form-control {{ $errors->has('period_to') ? ' is-invalid' : '' }}" value="{{$Object->period_to}}">
                                </div>
                                @if ($errors->has('period_to'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('period_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row submit-btn">
                            <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
