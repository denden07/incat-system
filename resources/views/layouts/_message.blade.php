@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p style="display: inline-block;padding: auto;font-weight: bolder">Success!</p> {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if(session('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p style="display: inline-block;padding: auto;font-weight: bolder">Success!</p> {{session('fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif