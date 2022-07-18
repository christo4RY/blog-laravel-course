<div class="container my-3">
    <x-comment-layout>
        <div class="card p-3 shadow-sm">
            <form action="/blogs/{{ $blog->slug }}/comment" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="body" class="form-control border border-0" id="" cols="30" rows="6"
                        placeholder="say something..."></textarea>
                </div>
                <x-error name="body" />
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </x-comment-layout>
</div>
