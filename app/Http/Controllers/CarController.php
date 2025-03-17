<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('user_id', auth()->id())->get();
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
        $request->validate([
            'price' => 'required|numeric',
        ]);

        // Hier kun je de gegevens opslaan in de database
        $carDetails = Session::get('carDetails');
        $carDetails['price'] = $request->input('price');
        $carDetails['user_id'] = auth()->id();

        Car::create($carDetails);

        return redirect()->route('cars.index');
    }

    public function createStep3(Request $request)
    {
        $carDetails = $request->session()->get('carDetails');
        return view('car.create-step3', compact('carDetails'));
    }

    public function postCreateStep3(Request $request)
    {
        $validatedData = $request->validate([
            'color' => 'required|string|max:255',
        ]);

        $carDetails = $request->session()->get('carDetails');
        $carDetails['color'] = $validatedData['color'];
        $request->session()->put('carDetails', $carDetails);

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
