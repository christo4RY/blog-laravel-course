<x-layout>
    @if (session('success'))
        <p class="alert alert-success text-center">{{session('success')}}</p>
    @endif
    <x-hero-section />
    <x-blogs-section :blogs="$blogs" />
    <x-subscribe />
</x-layout>
