<div>
    @if(session()->has('failed'))
    <div class="bg-danger rounded-3 p-3">
        <p class="text-light text-center">
            {{session('failed')}}
        </p>
    </div>
    @elseif(session()->has('success'))
    <div class="bg-primary rounded-3 p-3">
        <p class="text-light text-center">
            {{session('success')}}
        </p>
    </div>
    @endif
</div>
