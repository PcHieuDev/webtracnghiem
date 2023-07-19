<div>
    <div class="card bg-light text-dark shadow">
        <div class="card-body">
            <h1 class="card-title">Tham Gia Lớp Học :</h1>
            <p class="card-text">
            <form wire:submit.prevent="store">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" wire:model='classroom_id' placeholder="Nhập mã lớp của bạn">
                    <button class="btn btn-outline-secondary" type="submit">Tham gia</button>
                </div>
                @error('classroom_id')
                <span class="error">{{ $message }}</span>
                @enderror

                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle"></i> <!-- Biểu tượng cảnh báo -->
                        {{ session('error') }}
                    </div>
                @endif
            </form>
            </p>
        </div>
    </div>
</div>
