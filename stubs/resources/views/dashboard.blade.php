<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(! auth()->user()->email_verified_at)
                    <a href="{{route('verification.notice')}}" class="btn mb-2 btn-dark d-flex justify-content-center"> {{ __('Verify Email') }}</a>
                @endif
                    <img src="https://www.pushengage.com/wp-content/uploads/2022/02/Best-Website-Welcome-Message-Examples.png"></img>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
