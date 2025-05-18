<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-xl sm:rounded-lg">
                <x-alert2 >
                    <x-slot name="title">Bienvenido</x-slot>
                    <p>¡Hola {{ Auth::user()->name }}! Bienvenido a tu panel de control.</p>
                    <p>Desde aquí podrás gestionar tu cuenta y acceder a todas las funcionalidades de la aplicación.</p>
                    <p>Si tienes alguna duda, no dudes en ponerte en contacto con nosotros.</p>
                    <p>¡Disfruta de tu experiencia!</p>
                    <p>Atentamente, el equipo de soporte.</p>
                </x-alert2>
            </div>
        </div>
    </div>
</x-app-layout>
