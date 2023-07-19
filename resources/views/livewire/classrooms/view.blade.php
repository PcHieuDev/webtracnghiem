<!-- Modal -->
@include('flash::message')

<div wire:ignore.self class="modal fade" id="classroomShowModal" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="classroomShowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Xem Lớp Học')}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  border-0">{{__('Tên Lớp Học')}}:</span>
                    <div class="form-control  border-0">{{$classroom_name}}</div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  border-0">{{__('ID Lớp Học')}}:</span>
                    <div class="form-control  border-0">{{$classroom_unique_id}}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Thoát')}}</button>
            </div>
        </div>
    </div>
</div>
