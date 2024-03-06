@section('title', __('Người Dùng'))
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">Danh Sách Người Dùng</h3>
                </div>
                 <div>
                    @can('user-create')
                        <button type="button" href="#" data-bs-toggle="modal" wire:click.prevent="resetInput()"
                            data-bs-target="#staticBackdrop" class="btn btn-white"><i class="fa fa-plus"></i>Tạo người dùng mới</button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.users.create')
                    @include('livewire.users.update')
                    @include('livewire.users.view')
                    <div class="table-responsive">
                        <div class="mb-4">
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Tìm người dùng">
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Vai Trò</th>
                                    <td>Hành Động</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            <img src="{{ Storage::url($row->image) }}" class="img-thumbnail"
                                                alt="image" height="100px" width="70px">
                                        </td>
                                        <td>
                                            @if (!empty($row->getRoleNames()))
                                                @foreach ($row->getRoleNames() as $val)
                                                    <label class="badge bg-dark">{{ $val }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td width="200">

                                            {{-- <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdropShow" class="btn btn-warning btn-sm"
                                                wire:click="show({{ $row->id }})"><i
                                                    class="fa fa-eye"></i></button> --}}

                                            @can('user-edit')

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdropUpdate" class="btn btn-success btn-sm"
                                                    wire:click="edit({{ $row->id }})">Sửa<i
                                                        class="fa fa-edit"></i></button>
                                            @endcan

                                            @can('user-delete')

                                            <button class="btn btn-danger btn-sm"
                                                wire:click="triggerConfirm({{ $row->id }})">Xóa   <i class="fa fa-trash"></i> </button>
                                            @endcan

                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
