@if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span>{{ $error }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    @endforeach
@endif
