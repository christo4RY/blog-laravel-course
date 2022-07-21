<x-admin-layout>
    <div class="container">
        <h3 class="text-center">Blogs Create</h3>
        <div class="card p-3">
            <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input name="title" />
                <x-input name="slug" />
                <x-input name="intro" />
                <x-textarea name="body" />
                <x-input name="thumbnail" type="file" />
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>
