<x-layout>
    <x-single-blog :blog="$blog" />
    @guest
        <p class="text-center">Please <a href="/login">login </a> your account.</p>
    @else
        <x-comment-form :blog="$blog" />
    @endguest
    @if ($blog->comment->count())
        <x-comment :comments="$blog
            ->comment()
            ->latest()
            ->paginate(3)" />
    @endif
    <section class="blogs_you_may_like">
        <div class="container">
            <h3 class="text-center my-4 fw-bold">Blogs You May Like</h3>
            <div class="row text-center">
                @foreach ($randomBlogs as $blog)
                    <x-blog-card :blog="$blog" />
                @endforeach
            </div>
        </div>
    </section>

</x-layout>
