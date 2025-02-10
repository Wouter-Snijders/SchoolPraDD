<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn Auto\'s') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kenteken</th>
                            <th>Merk</th>
                            <th>Model</th>
                            <th>Prijs</th>
                            <th>Kilometerstand</th>
                            <th>Kleur</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->license_plate }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->price }}</td>
                                <td>{{ $car->mileage }}</td>
                                <td>{{ $car->color }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Bewerken</a>
                                    <a href="#" class="btn btn-danger btn-sm">Verwijderen</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
