<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            <form class="row g-3" method="{{ $method }}" action="{{ $action }}">
               {{ $slot }}
                <div class="text-end">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>