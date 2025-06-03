<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Auto details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-8">
                <h3 class="text-2xl font-bold mb-6">{{ $car->brand }} {{ $car->model }}</h3>
                <table class="table-auto w-full mb-6">
                    <tbody>
                        <tr>
                            <td class="font-semibold pr-4">ID:</td>
                            <td>{{ $car->id }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Kenteken:</td>
                            <td>{{ $car->license_plate }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Merk:</td>
                            <td>{{ $car->brand }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Model:</td>
                            <td>{{ $car->model }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Prijs:</td>
                            <td>€ {{ number_format($car->price, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Kilometerstand:</td>
                            <td>{{ $car->mileage }} km</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Kleur:</td>
                            <td>{{ $car->color }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pr-4">Bouwjaar:</td>
                            <td>{{ $car->production_year }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Terug naar overzicht</a>
            </div>
        </div>
    </div>

    <script>
    function melding() {
      alert("12 mensen hebben deze auto mobiel bekeken!");
    }
    setTimeout(melding, 10000);
    </script>
</x-app-layout>

