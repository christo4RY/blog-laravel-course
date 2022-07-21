@props(['blog'])
<div class="col-md-4 mb-4">
    <div class="card">
        <img src='{{asset("/storage/$blog->thumbnails")}}'
            class="card-img-top" alt="..." width="200" height="200" />
        <div class="card-body">
            <h3 class="card-title">{{ $blog->title }}</h3>
            <p class="fs-6 text-secondary">
                <a href="/?users={{ $blog->author->username }}{{request('search') ? "&search=".request('search') : ''}}{{request('categories') ? "&categories=".request('categories') : ''}}">{{ $blog->author->name }}</a>
                <span> - {{ $blog->created_at->diffForHumans() }}</span>
            </p>
            <div class="tags my-3">
                <a href="/?categories={{ $blog->category->slug }}">
                    <span class="badge bg-primary">{{ $blog->category->name }}</span>
                </a>
            </div>
            <p class="card-text">
                Some quick example text to build on the Blog title and make up
                the bulk of the card's content.
            </p>
            <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>
