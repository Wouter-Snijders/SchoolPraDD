<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(5);

        return view('cars.index', compact('cars'));
    }

    public function createStep1(Request $request)
    {
        return view('car.create-step1');
    }

    public function postCreateStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required',
        ]);


        $carDetails = [
            'license_plate' => $request->input('license_plate'),
            'brand' => 'Toyota',
            'model' => 'Corolla',
            'production_year' => 2015,
            'color' => 'Rood',
            'mileage' => 100
        ];

        Session::put('carDetails', $carDetails);

        return redirect()->route('car.create.step2');
    }

    public function createStep2(Request $request)
    {
        $carDetails = Session::get('carDetails');

        return view('car.create-step2', compact('carDetails'));
    }

    public function postCreateStep2(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $carDetails = $request->session()->get('carDetails', []);
        $carDetails['price'] = $validated['price'];
        $request->session()->put('carDetails', $carDetails);

        return redirect()->route('car.create.step3');
    }

    public function showCreateStep3(Request $request)
    {
        $carDetails = $request->session()->get('carDetails', []);
        return view('car.create-step3', compact('carDetails'));
    }

    public function postCreateStep3(Request $request)
    {
        $validated = $request->validate([
            'color' => 'required|string|max:255',
        ]);

        $carDetails = $request->session()->get('carDetails', []);
        $carDetails['color'] = $validated['color'];

        $car = new Car();
        $car->license_plate = $carDetails['license_plate'] ?? null;
        $car->brand = $carDetails['brand'] ?? null;
        $car->model = $carDetails['model'] ?? null;
        $car->production_year = $carDetails['production_year'] ?? null;
        $car->color = $carDetails['color'] ?? null;
        $car->mileage = $carDetails['mileage'] ?? null;
        $car->price = $carDetails['price'] ?? null;
        if (auth()->check()) {
            $car->user_id = auth()->id();
        }
        $car->save();

        $request->session()->forget('carDetails');

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }

    public function mijnAanbod()
    {
        $cars = Car::where('user_id', auth()->id())->get();
        return view('cars.mijn-aanbod', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }
}
