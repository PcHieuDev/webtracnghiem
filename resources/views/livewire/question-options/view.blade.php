<!-- Modal -->
<div wire:ignore.self class="modal fade" id="questionOptionShowModal" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="questionOptionShowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Hiển thị tùy chọn câu hỏi')}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  border-0">{{__('Tên tùy chọn')}}:</span>
                    <div class="form-control  border-0">{{$option_name}}</div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  border-0">{{__('ID Câu hỏi')}}:</span>
                    <div class="form-control  border-0">{{$question_id}}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Thoát')}}</button>
            </div>
        </div>
    </div>
</div>
