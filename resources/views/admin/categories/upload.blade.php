@extends('admin.admins.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.upload')}} {{__('Certification.certifications')}}</h4>
                </div>
                <div class="card-content">
                    <form action="{{url($redirect.'/'.$Object->id.'/upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="upload" class="control-label hidden"></label>
                                <input type="file" name="upload" style="display: none" id="upload"  class="form-control" onchange="readURL(this,1);">
                                <img id="blah1" onclick="document.getElementById('upload').click()" src="{{asset('public/assets/img/upload.svg')}}" style="width: 100%;height: 250px;cursor: pointer;" alt="upload image" class="" />
                                @if ($errors->has('upload'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('upload') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary">{{__('admin.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
