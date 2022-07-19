@props(['blog'])
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                class="card-img-top" alt="..." />
            <h3 class="my-3">{{ $blog->title }}</h3>
            <div>
                <h6>Author - <a href="/?users={{ $blog->author->username }}">{{ $blog->author->name }}</a></p>
            </div>
            <div>
                <a href="/?categories={{ $blog->category->slug }}">
                    <span class="badge bg-primary">{{ $blog->category->name }}</span>
                </a>
            </div>
            <div class="my-2">
                @auth
                    <form action="/blogs/{{ $blog->slug }}/subscriber" method="POST">
                        @csrf
                        @if (auth()->user()->isSubscribed($blog))
                            <button type="submit" class="btn btn-danger">UnSubscribe</button>
                        @else
                            <button type="submit" class="btn btn-warning">Subscribe</button>
                        @endif
                    </form>
                @endauth
            </div>
            <p class="lh-md">
                {{ $blog->body }}
            </p>
        </div>
    </div>
</div>
