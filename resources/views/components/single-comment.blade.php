<div class="card d-flex my-4 shadow-sm p-3">
    <div class="d-flex">
        <div>
            <img src="{{$comment->author->avator}}" width="50" class="rounded-circle" height="50" alt="">
        </div>
        <div>
            <h6 class="ms-2">{{$comment->author->name}}</p>
                <p class="text-secondary">{{$comment->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <p>{{$comment->body}}</p>
</div>
