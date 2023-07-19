<!-- Modal -->
<div wire:ignore.self class="modal fade" id="quizUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="quizUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Cập Nhật Bài Kiểm Tra')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Thoát"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group mt-3">
                        <label for="quiz_name">{{__('Tên Bài Kiểm Tra')}}</label>
                        <input wire:model="quiz_name" type="text" class="form-control" id="quiz_name"
                            placeholder="{{__('Tên')}}">@error('quiz_name') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="per_question_mark">{{__('Điểm Mỗi Câu')}}</label>
                        <input wire:model="per_question_mark" type="text" class="form-control" id="per_question_mark"
                            placeholder="{{__('Điểm mỗi câu')}}">@error('per_question_mark') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>



                    <div class="form-group mt-3">
                        <label for="classroom_id">{{__('Lớp Học')}}</label>
                        <select wire:model="classroom_id" class="form-select" id="classroom_id">
                            @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id}}">{{$classroom->classroom_name}}</option>
                            @endforeach
                        </select>
                    </div>


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
