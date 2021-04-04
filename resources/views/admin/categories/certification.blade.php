@extends('admin.admins.main')
@section('content')
    <style>
        @font-face {
            font-family: "Droid Arabic Kufi";
            src: url({{asset('public/fonts/droidkufiregular.ttf')}});
        }
        p{
            font-family: 'Droid Arabic Kufi',sans-serif !important
        }
        .border-none{
            border: none;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <form action="{{url($redirect.'/'.$Object->id.'/certification')}}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="" style="background:  url('{{asset($Object->image)}}') top center no-repeat;background-size: contain;width: 100%;height: 750px;">
                            <div style="padding-left:50px;padding-right: 300px;padding-top: 180px;text-align: right;position: relative;font-size: 18px;">
                                <p><input type="text" name="line_one" class="btn-block border-none" value="{{$Object->line_one}}"></p>
                                <p>
                                    <span style="color: red;">{{__('اسم صاحب الشهادة')}}</span>
                                    @if($Object->show_identity)
                                    <span><input type="text" name="line_two" class="border-none" value="{{$Object->line_two}}" style="width: 150px;"> </span>
                                    <span style="color: red;font-family: Arial,serif">{{__('123456789')}}</span>
                                    @endif
                                </p>
                                {{--                                <p>--}}
                                {{--                                    <span><input type="text" name="line_three_1" class="border-none" value="{{$Object->line_three_1}}" style="width: 25px"></span>--}}
                                {{--                                    <span style="color:red;">{{__('اجتاز')}}</span>--}}
                                {{--                                    <span><input type="text" name="line_three_2" class="border-none" value="{{$Object->line_three_2}}" style="width: 135px"></span>--}}
                                {{--                                    <span style="color: red">{{$Object->name}}</span>--}}
                                {{--                                    @if($Object->has_level)--}}
                                {{--                                    <span><input type="text" name="line_three_3" class="border-none" value="{{$Object->line_three_3}}" style="width: 95px;"></span>--}}
                                {{--                                    <span style="color:red;">{{__('الأول')}}</span>--}}
                                {{--                                    @endif--}}
                                {{--                                </p>--}}
                                <p>
                                    <span><input type="text" name="line_four" class="btn-block border-none" value="{{$Object->line_four}}"></span>
                                </p>
                                <p>
                                    <span><input type="text" name="line_five" class="btn-block border-none" value="{{$Object->line_five}}"></span>
                                </p>
                                <p>
                                    <span><input type="text" name="line_six_1" class="btn-block border-none" value="{{$Object->line_six_1}}"></span>
                                    {{--                                    <span style="color: red;font-family: Arial,serif">{{$Object->hours_num}}</span>--}}
                                    {{--                                    <span><input type="text" name="line_six_2" class="border-none" value="{{$Object->line_six_2}}" style="width: 350px"></span>--}}
                                </p>
                                <p>
                                    <span><input type="text" name="line_seven_1" class="btn-block border-none" value="{{$Object->line_seven_1}}"></span>
                                    {{--                                    <span style="color: #31706C;font-family: Arial,serif">{{__('20 / 10 / 1440 هـ')}}</span>--}}
                                    {{--                                    <span><input type="text" name="line_seven_2" class="border-none" value="{{$Object->line_seven_2}}" style="width: 35px;"></span>--}}
                                    {{--                                    <span style="color: #31706C;font-family: Arial,serif">{{__('8 / 11 / 1440 هـ')}}</span>--}}
                                </p>
                                <table style="width: 100%;margin-top: 25px">
                                    <tr>
                                        <td style="width: 15%;">
                                            <p>
                                                <span></span>
                                            </p>
                                        </td>
                                        <td style="width: 35%;padding-right: 100px">
                                            <p>
                                                <span><input type="text" name="line_eight_1" class="border-none" value="{{$Object->line_eight_1}}" style="width: 120px;"></span>
                                            </p>
                                        </td>
                                        <td style="width: 50%;padding-right: 100px">
                                            <p>
                                                <span ><input type="text" name="line_eight_2" class="border-none" value="{{$Object->line_eight_2}}" style="width: 250px;"></span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%;height: 150px;">
                                            <p>

                                            </p>
                                            <p style="">
                                                <img src="{{asset('public/3aref.png')}}" style="width: 50px;height: 130px;padding-top: 0px" alt="">
                                            </p>
                                        </td>
                                        <td style="width: 35%;height: 150px;padding-right: 100px">
                                            <p>

                                            </p>
                                            <p style="">
                                                <img src="{{asset($Object->stamp)}}" style="width: 130px;height: 130px;padding-top: 0px" alt="">
                                            </p>

                                        </td>
                                        <td style="width: 50%;height: 150px;padding-right: 80px">
                                            <p>
                                                <img src="{{asset($Object->signature)}}" style="width: 185px;height: 85px;padding-top: -55px;" alt="">
                                            </p>
                                            <p>
                                                <span style="color:#31706C;font-size: 20px;padding-top: -55px;">{!! str_replace('.','<span style="font-family: Arial,serif">.</span>',$Object->signature_name) !!}</span><br>
                                            </p>
                                        </td>
                                    </tr>
                                </table>


                            </div>

                        </div>

                        <div class="row submit-btn">
                            <button type="submit" class="btn btn-block btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
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
