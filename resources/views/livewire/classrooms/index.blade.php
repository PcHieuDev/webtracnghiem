@section('title', __('Danh Sách Lớp Học')   )
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">{{__('Danh Sách Lớp Học')}}</h3>
                </div>
                <div>
                    @can('classroom-create')
                        <button type="button" data-bs-toggle="modal" wire:click.prevent="resetInput()"
                                data-bs-target="#classroomCreateModal"
                                class="btn btn-white"><i class="fa fa-plus"></i> {{__('Tạo Lớp Học')}}</button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.classrooms.create')
                    @include('livewire.classrooms.update')
                    @include('livewire.classrooms.view')
                    <div class="col-md-12">
                        <div class="row mb-2 mt-2 justify-content-md-between">
                            <div class="col-md-2 pb-sm-3">
                                <div class="row g-3 align-items-center border-1 ">
                                    @can('classroom-delete')
                                        <button class="btn btn-danger btn-sm mb-2"
                                                {{ count($checked) == 0 ? 'disabled' : '' }}
                                                wire:click='bulkDeleteTriggerConfirm()'><i class="fa fa-trash"
                                                                                           aria-hidden="true"></i> {{__('Xóa tất cả')}}
                                            ({{ count($checked) }})
                                        </button>
                                    @endcan
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-right-0 border">
                                        <i class="fa fa-search"></i></span>
                                    <input wire:model='keyWord' type="text" class="form-control border-left-0 border"
                                           name="search" id="search"
                                           placeholder="{{__('Tìm')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                            <tr>
                                @can('classroom-delete')

                                    <td><input type="checkbox" value="1" wire:model="checkedAll"></td>

                                @endcan
                                <td>#</td>
                                <th>{{__('Tên Lớp Học')}}</th>
                                <th>{{__('ID Lớp Học')}}</th>
                                <th>{{__('Giáo Viên')}}</th>
                                <th>{{__('Hành Động')}}</th>
                                <th>{{__('Học Sinh')}}</th>
                                <th>{{__('Các Bài Kiểm Tra')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classrooms as $row)
                                <tr>
                                    @can('classroom-delete')

                                        <td><input type="checkbox" value="{{ $row->id }}" wire:model="checked">
                                        </td>
                                    @endcan
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->classroom_name }}</td>
                                    <td>{{ $row->classroom_unique_id }}</td>
                                    <td>{{ $row->teacher->name }}</td>

                                    <td width="200">

                                        @can('classroom-edit')

                                            <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#classroomUpdateModal"
                                                    class="btn btn-success btn-sm" wire:click="edit({{ $row->id }})">Sửa
                                                <i class="fa fa-edit"></i></button>

                                        @endcan

                                        @can('classroom-delete')

                                            <button class="btn btn-danger btn-sm"
                                                    wire:click="triggerConfirm({{ $row->id }})">Xóa <i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                    <td>
                                        @foreach ($row->students as $student)
                                            <span class="badge bg-success">{{ $student->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($row->quizzes as $quiz)
                                            <span class="badge bg-success">{{ $quiz->quiz_name }}</span>
                            @endforeach
                            @endforeach
                            </tbody>
                        </table>
                        {{ $classrooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
