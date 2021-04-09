<style>
    p{
        margin: 0 !important;
        font-size: 21px;
        font-weight: bolder
    }
</style>
<div style="background: url('{{asset($Objects['image'])}}') top center no-repeat;background-size: contain;width: 100%;height: 900px;position: relative">
    <div style="padding-left:50px;padding-right: 300px;padding-top: 230px;text-align: center;position: relative">
        <p>{!! $Objects['line_one'] !!}</p>
        <p>
            <span style="color: red;">{!! $Objects['name'] !!}</span>
            @if($Objects['show_identity'])
            <span>{!! $Objects['line_two'] !!} </span>
            <span style="color: red;font-family: Arial,serif">{!! $Objects['civil_registry'] !!}</span>
            @endif
        </p>
        {{--        <p>--}}
        {{--            <span>{!! $Objects['line_three_1'] !!} </span>--}}
        {{--            <span style="color:red;">{!! $Objects['is_passed'] !!}</span>--}}
        {{--            <span>{!! $Objects['line_three_2'] !!} </span>--}}
        {{--            <span style="color: red">{!! $Objects['category_name'] !!}</span>--}}
        {{--            @if($Objects['has_level'])--}}
        {{--            <span>{!! $Objects['line_three_3'] !!} </span>--}}
        {{--            <span style="color:red;">{!! $Objects['level'] !!}</span>--}}
        {{--            @endif--}}
        {{--        </p>--}}
        <p>
            <span>{!! $Objects['line_four'] !!} </span>
        </p>
        <p>
            <span>{!! $Objects['line_five'] !!} </span>
        </p>
        <p>
            <span>{!! $Objects['line_six_1'] !!} </span>
            {{--            <span style="color: red;font-family: Arial,serif">{!! $Objects['hours_num'] !!}</span>--}}
            {{--            <span>{!! $Objects['line_six_2'] !!} </span>--}}
        </p>
        <p>
            <span>{!! $Objects['line_seven_1'] !!} </span>
            {{--            <span style="color: red;font-family: Arial,serif">{!! $Objects['period_from'] !!}</span>--}}
            {{--            <span>{!! $Objects['line_seven_2'] !!} </span>--}}
            {{--            <span style="color: red;font-family: Arial,serif">{!! $Objects['period_to'] !!}</span>--}}
        </p>
        <table style="width: 100%;padding-top: 25px">
            <tr>
                <td style="width: 15%;">
                    <p>
                        <span> </span>
                    </p>
                </td>
                <td style="width: 35%;padding-right: 50px;text-align: center">
                    <p style="text-align: center">
                        <span>{!! $Objects['line_eight_1'] !!} </span>
                    </p>
                </td>
                <td style="width: 50%;padding-right: 75px;text-align: center">
                    <p style="text-align: center">
                        <span>{!! $Objects['line_eight_2'] !!} </span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 15%;height: 150px;padding-right: 10px">
                    <p>

                    </p>
                    <p style="">
                        <img src="{{asset('public/3aref.png')}}" style="width: 50px;height: 130px;padding-top: 0px" alt="">
                    </p>

                </td>
                <td style="width: 35%;height: 150px;padding-right: 50px;text-align: center">
                    <p style="text-align: center">

                    </p>
                    <p  style="text-align: center">
                        <img src="{{asset($Objects['stamp'])}}" style="width: 130px;height: 130px;padding-top: 0px" alt="">
                    </p>

                </td>
                <td style="width: 50%;height: 150px;padding-right: 75px;text-align: center">
                    <p style="text-align: center">
                        <img src="{{asset($Objects['signature'])}}" style="width: 185px;height: 85px;padding-top: -55px;" alt="">
                    </p>
                    <p style="text-align: center">
                        <span style="color:#31706C;font-size: 25px;padding-top: -55px;">{!! $Objects['signature_name'] !!}</span><br>
                    </p>
                </td>
            </tr>
        </table>


    </div>
</div>

