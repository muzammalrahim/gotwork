<?php
$verified = false;
if (Auth::user()->email_verified_at) {
    $verified = true;
}

$google_id = false;
if (Auth::user()->google_id) {
    $google_id = true;
}
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($verified || $google_id)
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                @else
                <div class="p-6 bg-red-400 border-b border-gray-200">
                    Please Verify Email First!
                </div>
                @endif
            </div>
        </div>
    </div>
    
</x-app-layout>
