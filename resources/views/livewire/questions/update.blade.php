<!-- Modal -->
<div wire:ignore.self class="modal fade" id="questionUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="questionUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Cập Nhật Câu Hỏi')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                @endif
                <form>

                    <div class="form-group mt-3">
                        <label for="quiz_id">{{__('Bài Kiểm Tra')}}</label>

                        <select wire:model="quiz_id"  class="form-select" id="quiz_id">
                            <option value="">{{__('Chọn bài kiểm tra')}}</option>
                            @foreach($quizzes as $quiz)
                                <option value="{{$quiz->id}}">{{$quiz->quiz_name}}</option>
                            @endforeach
                        </select>

                        @error('quiz_id') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="question">{{__('Câu hỏi')}}</label>
                        <textarea wire:model="question" placeholder="{{__('Câu hỏi')}}" id="question"
                            class="form-control" cols="10" rows="1"></textarea>
                        @error('question') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
{{--                    <div class="form-group mt-3">--}}
{{--                        <label for="image">{{__('Image')}}</label>--}}
{{--                        <input type="file" wire:model="image" id="image"--}}
{{--                        class="form-control">--}}
{{--                        @error('image') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                    </div>--}}
                    @if ($long_written || $missing_word)
                        @if ($missing_word)
                        <div class="form-group mt-3">
                            <label for="question">{{__('Câu trả lời ')}}</label>
                            <textarea wire:model="answer" placeholder="{{__('Câu trả lời')}}" id="answer"
                                class="form-control" cols="10" rows="1"></textarea>
                            @error('answer') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        @endif
                    @else
                    {{-- options  --}}
                    <div class="form-group mt-3">
                        <label for="options mb-2">{{__('Các Lựa Chọn')}}</label>

                        @foreach($inputs as $key => $key)
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <input wire:model="option.{{ $key }}" type="text"
                                    placeholder="{{__('Option ')}}{{ $key+1 }}" id="option{{ $key }}"
                                    class="form-control">

                                @error('option.{{ $key }}') <span class="error text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="row col-md-1">
                                <button wire:click="removeOption({{$key}})" type="button"
                                    class="btn btn-danger btn-sm btn-remove-option">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- add option btn  --}}
                    <div class="form-group mt-3 mt-2">
                        <button wire:click="add()" type="button"
                            class="btn btn-primary btn-sm">{{__('Thêm Lựa Chọn')}}</button>
                    </div>

                    @isset($option)
                        @if ($answerOptionShow)
                            <div class="form-group mt-3">
                                <label for="answer">{{__('Câu trả lời')}}</label>
                                <select wire:model="answer" class="form-select" id="answer">
                                    <option value="">{{__('Chọn câu trả lời')}}</option>
                                    @foreach($option as $key => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('answer') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        @endif
                    @endisset
                    @endif

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" wire:click.prevent="update()" data-bs-dismiss="modal"
                    class="btn btn-primary close-modal">{{__('Cập Nhật')}}</button>
            </div>
        </div>
    </div>
</div>
