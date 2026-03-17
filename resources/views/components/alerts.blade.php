@if(session('success'))
    <div class="alert alert-dismissible fade show" style="background-color: var(--tracko-secondary); border-color: var(--tracko-secondary); color: white;" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))

    <div class="alert alert-dismissible fade show" style="background-color: var(--tracko-signal); border-color: var(--tracko-signal); color: white;" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-dismissible fade show" style="background-color: var(--tracko-accent); border-color: var(--tracko-accent); color: white;" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('warning') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-dismissible fade show" style="background-color: var(--tracko-signal); border-color: var(--tracko-signal); color: white;" role="alert">
        <i class="fas fa-times-circle me-2"></i>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
