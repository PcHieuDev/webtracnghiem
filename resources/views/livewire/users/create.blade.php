<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tạo người dùng mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model="name" type="text" class="form-control" id="name"
                            placeholder="Tên">@error('name') <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input wire:model="email" type="email" class="form-control" id="email"
                            placeholder="Email">@error('email') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="image"></label>--}}
{{--                        <input wire:model="image" type="file" class="form-control" id="image"--}}
{{--                            placeholder="Image">@error('image') <span--}}
{{--                            class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="password"></label>

                        <input wire:model="password" type="text" class="form-control" id="password"
                            placeholder="mật khẩu">@error('password') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"></label>

                        <input wire:model="password_confirmation" type="password" class="form-control"
                            id="password_confirmation"
                            placeholder="Nhập lại mật khẩu">@error('password_confirmation') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <strong>Vai Trò:</strong>
                        <br />
                        @foreach ($roles as $key => $value)
                            <label>
                                <input wire:model.defer='selected_roles.{{$key}}' type="checkbox" value="{{$value}}">
                                {{ $value }}
                            </label>
                            <br />
                        @endforeach
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn bg-primary close-modal text-white">Save</button>
            </div>
        </div>
    </div>
</div>
