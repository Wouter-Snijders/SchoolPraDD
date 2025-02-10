<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auto Aanbieden - Stap 2') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <p>Merk: {{ $carDetails['brand'] }}</p>
                    <p>Model: {{ $carDetails['model'] }}</p>
                    <p>Bouwjaar: {{ $carDetails['production_year'] }}</p>
                </div>
                <form action="{{ route('car.create.step2') }}" method="POST">
                    @csrf
                    <div class="p-6">
                        <label for="price">Prijs:</label>
                        <input type="number" id="price" name="price" required>
                    </div>
                    <div class="p-6">
                        <button type="submit" class="btn btn-primary">Verzenden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
