<div class="container">
    <x-comment-layout>
        <h5 class="text-secondary">Commets({{ $comments->count() }})</h3>
            @foreach ($comments as $comment)
                <x-single-comment :comment="$comment" />
            @endforeach
            {{ $comments->links() }}
    </x-comment-layout>
</div>
