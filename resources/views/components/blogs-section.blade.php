@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <x-drop-down />
    </div>
    <form action="" class="my-3">
        <div class="input-group mb-3">
            @if (request('categories'))
                <input type="hidden" name="categories" value="{{ request('categories') }}" />
            @endif
            @if (request('users'))
                <input type="hidden" name="users" value="{{ request('users') }}" />
            @endif
            <input type="text" name="search" autocomplete="false" value="{{ request('search') }}"
                class="form-control" placeholder="Search Blogs..." />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">
        @forelse ($blogs as $blog)
            <x-blog-card :blog="$blog" />
        @empty
            <p class="alert alert-danger">Not blog found</p>
        @endforelse
        {{$blogs->links()}}
    </div>
</section>
