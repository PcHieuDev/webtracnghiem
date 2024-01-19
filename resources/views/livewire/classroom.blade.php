<div>
    <div class="row">
        <h4>Tên lớp học: {{$classroom->classroom_name}}</h4>
        @foreach ($classroom->quizzes as $item)
            <div class="col-md-4">
                <div class="card text-left mt-4 shadow">
{{--                    @if (now() > $item->expired_quiz)--}}
{{--                        <img class="card-img-top" src="{{ asset('quiz3.jpg') }}" alt="">--}}
{{--                    @elseif ($item->start_quiz <= now() || $item->start_quiz == now())--}}
{{--                        <a href="{{ asset('classroom/'.$item->id.'/quiz') }}" class="text-decoration-none">--}}
{{--                            <img class="card-img-top" src="{{ asset('quiz2.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                    @else--}}
{{--                        <img class="card-img-top" src="{{ asset('quiz4.jpg') }}" alt="">--}}
{{--                    @endif--}}
                    @php
                        $expiredTime = \Carbon\Carbon::parse($item->expired_quiz);
                        $startQuizTime = \Carbon\Carbon::parse($item->start_quiz);
                    @endphp

{{--                    Start Quiz Time: {{ $startQuizTime }} <br>--}}
{{--                    Expired Time: {{ $expiredTime }} <br>--}}
{{--                    Current Time: {{ now() }} <br>--}}

                    @if (now()->greaterThan($expiredTime))
                        <img class="card-img-top" src="{{ asset('quiz3.jpg') }}" alt="">
                    @elseif (now()->lessThan($startQuizTime))
                        <img class="card-img-top" src="{{ asset('quiz4.jpg') }}" alt="">
                    @else
                        <a href="{{ asset('classroom/'.$item->id.'/quiz') }}" class="text-decoration-none">
                            <img class="card-img-top" src="{{ asset('quiz2.jpg') }}" alt="">
                        </a>
                    @endif
                    <div class="card-body">
                        <p>
                        </p>
                        @if (now() > $item->expired_quiz || $item->start_quiz > now())
                            <h4 class="card-title">{{$item->quiz_name}}</h4>
                        @else
                            <a href="{{ asset('classroom/'.$item->id.'/quiz') }}" class="text-decoration-none">
                                <h4 class="card-title">{{$item->quiz_name}}</h4>
                            </a>
                        @endif
                        <div class="card-body-bottom">
                            <h4 class="card-text">Điểm/câu:{{$item->per_question_mark}}</h4>
                            @if(now() > $item->expired_quiz)
                                {{--                                <h4 class="card-text">Hạn: {{$item->expired_quiz}}</h4>--}}
                                <h4 class="card-text">Đã hết hạn</h4>
                            @elseif ($item->start_quiz > now())
                                <h4 class="card-text">Chưa mở</h4>
                            @else
                                <h4 class="card-text">Đang mở</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
    .card-body-bottom {
        display: flex;
        justify-content: space-between;
    }
    p {
        text-align: center; /* Căn giữa nội dung trong phần tử p */
        font-size: 24px; /* Đặt kích thước font chữ */
        font-weight: bold; /* In đậm chữ */
        color: red; /* Đổi màu chữ sang màu đỏ */
    }
</style>
