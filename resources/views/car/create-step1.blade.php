<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auto Aanbieden - Stap 1') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('car.create.step1') }}" method="POST">
                    @csrf
                    <div class="p-6">
                        <label for="license_plate">Kenteken:</label>
                        <input type="text" id="license_plate" name="license_plate" required>
                    </div>
                    <div class="p-6">
                        <button type="submit" class="btn btn-primary">Volgende</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
