<div class="bg-white p-3">
    @if ($quiz->questions->count() > 0 && $answers->count() == 0)
    <div style="text-align: center" id="countdown">
        <h1>Thời gian còn lại:</h1>
        <div id="timer" class="countdown">
            <span id="minutes">{{ $quiz->quiz_time }}</span> phút <span id="seconds">00</span> giây
        </div>

    </div>
    @endif
    <h3 style="text-align: center">Tên Bài Kiểm Tra: {{$quiz->quiz_name}}</h3>
    <p style="text-align: center">Điểm mỗi câu: {{$quiz->per_question_mark}}</p>
    <p style="text-align: center">Tổng Điểm: {{$quiz->per_question_mark * $quiz->questions->count()}}</p>
    @if ($answers->count() > 0)
        <p style="text-align: center">Tổng Điểm Đạt: {{$answers->sum('mark')}}</p>

        <table class="table table-striped shadow p-4">
            <thead>
            <tr>
                <th>TT</th>
                <th>Câu hỏi</th>
                <th>Đáp án bạn chọn</th>
                <th>Đáp án đúng</th>
                <th>Điểm</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($answers->where('long_question_answer',null)->where('missing_word',0) as $answer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{Str::limit($answer->question, 100, '...')}}</td>
                    <td>{{$answer->short_question_answer}}</td>
                    <td>{{$answer->short_question_correct}}</td>
                    <td>{{$answer->mark}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3 style="text-align: center">Câu hỏi điền từ thiếu:</h3>
            @if(count($answers->where('missing_word', 1)) > 0)
                <table class="table table-striped shadow p-4">
                    <thead>
                    <tr>
                        <th>TT</th>
                        <th>Câu hỏi</th>
                        <th>Đáp án bạn chọn</th>
                        <th>Đáp án đúng</th>
                        <th>Điểm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($answers->where('missing_word', 1) as $answer)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{Str::limit($answer->question, 100, '...')}}</td>
                            <td>{{$answer->short_question_answer}}</td>
                            <td>{{$answer->short_question_correct}}</td>
                            <td>{{$answer->mark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 style="text-align: center">Không có câu trả lời cho câu hỏi điền từ còn thiếu !</h6>
            @endif

            <h3 style="text-align: center">Câu trả lời dài:</h3>
            @if(count($answers->where('long_question_answer','!=',null)) > 0)
                <table class="table table-striped shadow p-4">
                    <thead>
                    <tr>
                        <th>TT</th>
                        <th>Câu hỏi</th>
                        <th>Đáp án</th>
                        <th>Điểm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($answers->where('long_question_answer','!=',null) as $answer)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{Str::limit($answer->question, 100, '...')}}</td>
                            <td>{{$answer->long_question_answer}}</td>
                            <td>{{$answer->mark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 style="text-align: center">Không có câu trả lời dài.</h6>
            @endif

        @else
        @if ($quiz->questions->count() > 0)
            <form id="submit-form-js" method="POST" action="{{ asset('/classroom/'.$quiz->id.'/quiz') }}">
                {{ csrf_field() }}
                @php
                    $i = 0;
                @endphp
                @foreach ($quiz->questions->where('long_written',0)->where('missing_word',0) as $questions)
                    @php
                        $q=0;
                    @endphp
                    <div class="mt-3 bg-white p-3">
                        @if (!$questions->long_written)
                            <p>Câu {{$loop->iteration}}. {{$questions->question}}</p>
{{--                            @if ($questions->image)--}}
{{--                                <img src="{{Storage::url($questions->image)}}" height="200px" width="300px" class="m-3"--}}
{{--                                     alt="">--}}
{{--                            @endif--}}
                            <input type="hidden" name="question[]" id="" value="{{$questions->question}}">
                            <input type="hidden" name="short_question_correct[]" id="" value="{{$questions->answer}}">
                            <input type="hidden" name="missing_word[]" id="" value="0">
                            @foreach ($questions->questionOptions as $questionOptions)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="short_question_answer[{{$i}}][0]"
                                           value="{{$questionOptions->option_name}}">
                                    <label class="form-check-label">
                                        {{$questionOptions->option_name}}
                                    </label>
                                </div>
                                @php
                                    $q++;
                                @endphp
                            @endforeach
                        @endif
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
                @foreach ($quiz->questions->where('missing_word',1) as $questions)
                    @php
                        $q=0;
                    @endphp
                    <div class="mt-3 bg-white p-3">
                        @if ($questions->missing_word)

                            <p>Câu hỏi điền từ {{$loop->iteration}}.{{$questions->question}}</p>
                            <input type="hidden" name="question[]" id="" value="{{$questions->question}}">
{{--                            @if ($questions->image)--}}
{{--                                <img src="{{Storage::url($questions->image)}}" height="200px" width="300px" class="m-3"--}}
{{--                                     alt="">--}}
{{--                            @endif--}}
                            <div class="form-group">
                                <label for="answer">Câu trả lời</label>
                                <input type="text" class="form-control" name="short_question_answer[{{$i}}][0]"
                                       id="answer">
                                <input type="hidden" name="short_question_correct[]" id=""
                                       value="{{$questions->answer}}">
                                <input type="hidden" name="missing_word[]" id="" value="1">
                            </div>
                        @endif
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
                @foreach ($quiz->questions->where('long_written',1) as $questions)
                    @php
                        $q=0;
                    @endphp
                    <div class="mt-3 bg-white p-3">
                        @if ($questions->long_written)
                            <p>Câu hỏi viết {{$loop->iteration}}. {{$questions->question}}</p>
                            {{-- image --}}
{{--                            @if ($questions->image)--}}
{{--                                <img src="{{Storage::url($questions->image)}}" height="200px" width="300px" class="m-3"--}}
{{--                                     alt="">--}}
{{--                            @endif--}}
                            <input type="hidden" name="long_question[]" id="" value="{{$questions->question}}">
                            <div class="form-group">
                                <label for="answer">Câu trả lời</label>
                                <textarea class="form-control" name="long_question_answer[]" id="answer"
                                          rows="3"></textarea>
                            </div>
                        @endif
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
                <button type="submit" class="btn btn-success mt-3">Nạp Bài</button>
            </form>
        @else
            <p class="text-danger text-center mt-5">Không có câu hỏi nào !</p>
        @endif
    @endif
</div>
<style>
    .countdown {
        font-size: 50px;
        text-align: center;
    }
</style>

