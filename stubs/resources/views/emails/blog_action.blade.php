<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Your Blog is ') . ucwords($blog->status) . __(' by ') .  ucwords($blog->admin->name)}}
        </div>

        <div class="mt-4 flex items-center justify-between">
            <a href="{{route('blogs.show',[$blog])}}" class="btn btn-xs">
                View Blog
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>
