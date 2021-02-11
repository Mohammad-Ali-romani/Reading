
<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header bg-light text-secondary">Search</h5>
    <div class="card-body ">
        <form action="{{route('search','as')}}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="value" placeholder="Search for...">
                <span class="input-group-append">
                    <button class="btn btn-success" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
</div>
<!-- Categories Widget -->
@isset($items)
<div class="card my-4">
    <h5 class="card-header bg-light text-dark">Categories</h5>
    <div class="card-body">
        <ul class="list-group mb-0">
            @foreach ($items as $item)
            <li class="list-group-item @isset($cate_id) @active($item->id,$cate_id) {{'active'}} @endactive @endisset p-1">
                    <a href="{{route('PostCategory.show',$item->id)}}" class="text-center  @isset($cate_id) @active($item->id,$cate_id) {{'text-light'}} @else {{'text-muted'}} @endactive @endisset nav-link">{{$item->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endisset
