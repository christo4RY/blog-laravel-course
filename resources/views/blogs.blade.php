<x-layout>
    <?php foreach($blogs as $blog) :?>
    <h1><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
    <p>{{ $blog->intro }}</p>
    <?php endforeach ?>
</x-layout>
