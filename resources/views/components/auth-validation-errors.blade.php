@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>


        <ul class="mt-2 fade show ">

            @foreach ($errors->all() as $error)
                <li class='alert alert-danger'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
