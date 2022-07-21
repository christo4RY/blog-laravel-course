<x-admin-layout>
    <div class="container">
        <h3 class="text-center">Blogs Create</h3>
        <div class="card p-3">
            <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-input name="title" value="{{$blog->title}}" />
                <x-input name="slug" value="{{$blog->slug}}"/>
                <x-input name="intro" value="{{$blog->intro}}"/>
                <x-textarea name="body" value="{{$blog->body}}"/>
                <x-input name="thumbnail" type="file" />
                <img src='{{asset("storage/$blog->thumbnails")}}' width="200" height="200" alt="">
                <select name="category_id" id="category" class="form-control mt-3">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id',$blog->category->id) ? 'selected' : '' }}>
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
