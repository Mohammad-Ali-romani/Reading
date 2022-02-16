<div>
    <a class="nav-link" wire:click="update" href="{{route('category.index')}}" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">notifications</i>
        @if ($numnoti !== 0)
            <span class="notification">{{$numnoti}}</span>
            <p class="d-lg-none d-md-block">
                Some Actions
            </p>
        @endif

    </a>
{{--    @if(count($comments) > 1)--}}
        <div class="dropdown-menu dropdown-menu-right {{$show}}" aria-labelledby="navbarDropdownMenuLink">
            @foreach ($comments as $comment)
                <a class="dropdown-item" href="{{route('comment.index')}}">{{$comment->comment}}</a>
            @endforeach

        </div>
{{--    @else--}}
{{--        <div class="dropdown-menu dropdown-menu-right {{$show}} text-center" aria-labelledby="navbarDropdownMenuLink">--}}
{{--            <span class="text-gray">no comments ...</span>--}}
{{--        </div>--}}
{{--    @endif--}}
    <script>
        setInterval(function () {
            Livewire.emit('mount')
        }, 2000);
    </script>
</div>
