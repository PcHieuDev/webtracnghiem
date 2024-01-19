<div>

    <div class="card card-body">
        <p>Tổng điểm đạt được: {{$answers->sum('mark')}}</p>
        <h5>Câu hỏi trắc nghiệm và thiếu từ :</h5>
        <table class="table table-striped shadow p-4">
            <thead>
            <tr>
                <th>TT</th>
                <th>Câu Hỏi</th>
                <th>Học Sinh Trả Lời</th>
                <th>Đáp án đúng</th>
                <th>Điểm</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($answers->where('long_question_answer',null) as $answer)
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
        <h5>Câu trả lời dài:</h5>
        <table class="table table-striped shadow p-4">
            <thead>
            <tr>
                <th>TT</th>
                <th>Câu hỏi</th>
                <th>Học Sinh Trả lời</th>
                <th>Điểm</th>
                <th>Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($answers->where('long_question_answer','!=',null) as $answer)
                <tr>
                    <td>{{$loop->iteration}}.</td>
                    <td>{{Str::limit($answer->question, 100, '...')}}</td>
                    <td>{{$answer->long_question_answer}}</td>
                    <td>{{$answer->mark}}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#studentResultModal"
                                class="btn btn-success btn-sm" wire:click='show({{$answer->id}})'><i
                                class="fa fa-edit"></i></button>
                    </td>
{{--                    nút chấm điếm--}}
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    @include('livewire.answers.create')
</div>
