@section('title', __('Các Vai Trò'))
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">{{__('Danh Sách Các Vai Trò')}}</h3>
                </div>
                 <div>
                    @can('role-create')
                    <button type="button" href="#" data-bs-toggle="modal" wire:click.prevent="resetInput()"
                        data-bs-target="#staticBackdrop" class="btn btn-white"><i class="fa fa-plus"></i> {{__('Tạo Vai Trò Mới')}}</button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.roles.create')
                    @include('livewire.roles.update')
                    @include('livewire.roles.view')
                    <div class="table-responsive">
                        <div class="mb-4">
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="{{__('Tìm')}}">
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>{{__('Tên')}}</th>
                                    <th>{{__('Hành Động')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td width="200">

                                        {{-- <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdropShow" class="btn btn-warning btn-sm"
                                            wire:click="show({{ $row->id }})"><i class="fa fa-eye"></i></button>--}}
                                        @can('role-edit')
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdropUpdate" class="btn btn-success btn-sm"
                                            wire:click="edit({{ $row->id }})">Sửa   <i class="fa fa-edit"></i></button>
                                        @endcan

                                        @can('role-delete')

                                        <button class="btn btn-danger btn-sm"
                                            wire:click="triggerConfirm({{ $row->id }})">Xóa   <i class="fa fa-trash"></i>
                                        </button>
                                        @endcan

                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
