<div class="max-w-lg mx-auto">

@if(session()->has('success'))
    <div class="alert alert-success text-center mb-5" role="alert" >
        {{ session('success')}}
    </div>
@endif

</div>