<!-- Modal -->
<div wire:ignore.self class="modal fade" id="studentResultModal" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="studentResultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Trả Lời')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if(isset($answer))
                <div class="modal-body">
                    <h3>Câu Hỏi:</h3>
                    <p>{{ $answer->question ?? '' }}</p>
                    <h3>Trả Lời:</h3>
                    <p>{{ $answer->long_question_answer ?? '' }}</p>
                    <h3>Điểm:</h3>
                    <p><input type="number" wire:model='mark'></p>
                </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" wire:click.prevent="storeMark()"
                        class="btn btn-primary  close-modal">{{__('Lưu Lại')}}</button>
            </div>
        </div>
    </div>
</div>
