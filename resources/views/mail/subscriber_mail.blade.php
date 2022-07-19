<div class="container">
    <div class="col-md-8 mx-auto">
        <h3 class="text-primary">{{$blog->title}}</h3>
        <div class="d-flex justify-content-between g-3">
            <div>
                <img src="{{$blog->author->avator}}" width="100" height="100" class="rounded-circle" alt="">
                <div>
                    <h3 class="text-danger">{{$blog->author->name}}</h3>
                    <p class="badge text-primary">{{$blog->category->name}}</p>
                    <p class="text-secondary">{{$blog->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <div>
                <p>
                    {{$blog->body}}
                </p>
            </div>
        </div>
    </div>
</div>
