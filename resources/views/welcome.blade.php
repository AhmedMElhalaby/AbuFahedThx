<!doctype HTML>
<html lang="ar" data-color="{{ config('app.color') }}">
<head>
    <meta charset="UTF-8">
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
</head>

<body>
<div class="container">
    <div class="row center-block mt-50">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="text-center bg-white border-rounded box-shadow">
                {{--<!--login form-->--}}
                <img src="{{asset('public/logo.jpeg')}}" class="p-10" width="250" height="200" alt="">


                <!--login form-->
            </div>
            <!--Login-->
        </div>
        <div class="col-md-4"></div>
        <!--center-block-->
    </div>
    <div class="row center-block mt-50">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success border-rounded" style="margin: 0" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger border-rounded" style="margin: 0" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger text-center border-rounded" style="margin: 0;font-size: 19px">
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

    <div class="row center-block mt-50">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white border-rounded box-shadow">
            <form class="text-center row" method="get" action="{{ url('certifications') }}">
                @csrf

                <div class="col-md-9 text-center">
                    <div class="form-group label-floating text-center">
                        <label class="control-label text-center" for="civil_registry">{{__('Certification.civil_registry')}}</label>
                        <input class="form-control {{ $errors->has('civil_registry') ? ' is-invalid' : '' }}" style="text-align: center" type="text" id="civil_registry" name="civil_registry" required>
                    </div>
                    @if ($errors->has('civil_registry'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('civil_registry') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="form-group  text-center">
                        <input type="submit" class="btn btn-primary btn-block border-rounded" value="{{__('الشهادات')}}">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!--container-->
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
