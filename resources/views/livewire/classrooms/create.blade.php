<!-- Modal -->
<div wire:ignore.self class="modal fade" id="classroomCreateModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="classroomCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Tạo Mới Lớp Học')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>

            <div class="form-group mt-3">
                <label for="classroom_name">{{__('Tên Lớp Học')}}</label>
                <input wire:model="classroom_name" type="text" class="form-control" id="classroom_name" placeholder="{{__('Tên Lớp Học')}}">@error('classroom_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="classroom_unique_id">{{__('ID Lớp Học')}}</label>
                <input wire:model="classroom_unique_id" readonly type="text" class="form-control" id="classroom_unique_id" placeholder="{{__('ID Lớp Học')}}">@error('classroom_unique_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary  close-modal">{{__('Lưu')}}</button>
            </div>
        </div>
    </div>
</div>
