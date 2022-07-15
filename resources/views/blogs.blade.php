<x-layout>
    <?php foreach($blogs as $blog) :?>
    <h1><a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
    <div>
        <p><a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
    </div>
    <div>
        <h4><a href="/users/{{$blog->author->username}}">Author - {{$blog->author->name}}</a></h5>
    </div>
    <p>published at - {{$blog->created_at->diffForHumans()}}</p>
    <p>{{ $blog->intro }}</p>
    <?php endforeach ?>
</x-layout>
