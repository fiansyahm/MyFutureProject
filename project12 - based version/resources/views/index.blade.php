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
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- sampah2 -->
    <!-- <div class="min-h-screen bg-gray-100"> -->
    <!-- "@includei('layouts.navigation')" -->

    <!-- <h1>"{{ Auth::user()->name }}"</h1>
            <h1>"{{ Auth::user()->email }}"</h1> -->
    <!-- Page Heading -->
    <!-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    "{{ $header }}"
                </div>
            </header> -->

    <!-- Page Content -->
    <!-- <main>
                "{{ $slot }}"
            </main> -->
    <!-- </div> -->