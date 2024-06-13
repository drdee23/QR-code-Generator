<x-app-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('dashboard') }}">Dashboard </a>
        </li>

    </x-slot>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>





</x-app-layout>
