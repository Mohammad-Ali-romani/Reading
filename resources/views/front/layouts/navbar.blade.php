<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        {{-- <a class="navbar-brand" href="#">Start Bootstrap</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <a href="/" class="navbar-brand">Reading</a>
            <ul class="navbar-nav m-auto">
                {{-- @if(@section('title') == 'Reading >> Home') {{'active'}} @endif --}}
                {{-- <li class="nav-item ml-2 mr-2 @yield('home')">
                    <a class="nav-link" href="{{route('home')}}">Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li> --}}
                <li class="nav-item ml-2 mr-2 @yield('posts')">
                    <a class="nav-link" href="{{route('posts')}}">Home</a>
                </li>
                {{-- the items is the category to navbar and sidebar --}}
                @foreach ($items as $item)
                <li class="nav-item ml-2 mr-2 @yield('category.'.$item->id)">
                    <a href="{{route('PostCategory.show',$item->id)}}" class="nav-link">{{$item->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
