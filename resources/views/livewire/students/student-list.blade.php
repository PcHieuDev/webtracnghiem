@section('title', __('Students'))
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">Danh Sách Học Sinh</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.students.create')
                    <div class="table-responsive">
                        <div class="mb-4">
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Tìm Học Sinh">
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Hành Động</th>
                                    <th>Học Lớp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $row)
                                @if (checkOwnStudent($row->id))
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
{{--                                        @can('student-mail')--}}

{{--                                            <button type="button" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#studentCreateModal" class="btn btn-success btn-sm"--}}
{{--                                                wire:click="edit('{{ $row->email }}')">Email  <i--}}
{{--                                                    class="fa fa-envelope"></i></button>--}}
{{--                                        @endcan--}}

                                        @can('student-delete')

                                            <button class="btn btn-danger btn-sm"
                                                wire:click="triggerConfirm({{ $row->id }})">Xóa   <i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                    <td>
                                        @foreach ($row->classrooms as $classroom)
                                            <span class="badge bg-success">{{ $classroom->classroom_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>

                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $students->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
