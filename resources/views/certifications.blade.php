<!doctype HTML>
<html lang="ar" data-color="{{ config('app.color') }}">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/logo.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('public/logo.png')}}" />
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('public/assets/css/material-dashboard.css')}}" rel="stylesheet"/>
    <!-- Bootstrap rtl CSS - from (http://github.com/morteza) -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/css/rtl.css')}}">
    @endif
<!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('public/assets/css/custom.css')}}" rel="stylesheet" />
    <title>{{config('app.name')}}</title>
    <style>
        *{
            font-family: Cairo ,sans-serif;
        }
    </style>
</head>

<body>
<div class="container text-center">
    <div style="position: absolute;top: 35px;right: 35px;">
        <a href="{{url('/')}}" class="btn btn-default border-rounded"> الرجوع للرئيسية </a>
    </div>
    <div style="display: inline-block;margin-top: 20px">
        <div class="text-center bg-white border-rounded box-shadow">
                <img src="{{asset('public/logo.jpeg')}}" class="p-10" width="200" height="150" alt="">
        </div>
    </div>
    <div class="row mt-50">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p class="p-10 bg-white border-rounded box-shadow text-primary">{{$Name->name}}</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row center-block">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success border-rounded" style="margin: 0;margin-top: 20px" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger border-rounded" style="margin: 0;margin-top: 20px" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger text-center border-rounded" style="margin: 0;margin-top: 20px;font-size: 19px">
                    <ul style="list-style: none">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-1"></div>
    </div>

    <div class="row p-10 text-center" style="margin-top: 20px">
        @foreach($Objects as $Object)
            <div class="col-md-3 text-center">
                <div class="card mb-3 mx-10 bg-white border-rounded box-shadow" style="cursor: pointer" @if($Object->is_passed != 'لم تجتاز'  && $Object->is_passed !=  'لم يجتاز') data-toggle="modal" data-target="#Certifications{{$Object->id}}" @endif>
                    <div class="card-header btn btn-primary border-rounded" style="font-size: 18px;">{{$Object->category->name}}</div>
                    <div class="card-body">
                        <h5 class="card-title"><small>{{__('من')}} {{$Object->period_from}}</small><br><small>{{__('الى')}} {{$Object->period_to}}</small></h5>
                        <p class="card-text"><span class="text-primary">{{$Object->level}}</span> <span class="text-gray"> - </span> <span @if($Object->is_passed == 'لم تجتاز' || $Object->is_passed == 'لم يجتاز') class="text-danger" @else class="text-primary" @endif>{{$Object->is_passed}}</span></p>
                    </div>
                </div>
            </div>
            @if($Object->is_passed != 'لم تجتاز' && $Object->is_passed != 'لم يجتاز')
            <div class="modal fade border-rounded" id="Certifications{{$Object->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog border-rounded modal-sm" role="document">
                    <div class="modal-content border-rounded">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('تحميل الشهادة')}}</h5>
                        </div>
                        <div class="modal-body">
                            <p>{{__('هل تريد تحميل الشهادة ؟')}}</p>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-primary border-rounded" data-dismiss="modal" onclick="window.location= '{{url('download_certification/'.$Object->id)}}'">{{__('تحميل')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>


<!--   Core JS Files   -->
<script src="{{asset('public/assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/material.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('public/assets/js/chartist.min.js')}}"></script>

<!--  Notification Plugin    -->
<script src="{{asset('public/assets/js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('public/assets/js/material-dashboard.js')}}"></script>

<script src="{{asset('public/assets/js/custom.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>

</html>
