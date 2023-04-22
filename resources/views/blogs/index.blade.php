    <x-layout>
        @if(session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @endif
        <x-hero/>
        <x-blog-section :blogs="$blogs" />
        <x-subscribe />
    </x-layout>