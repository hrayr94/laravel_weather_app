<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherCityRequest;
use App\Models\Weather;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(WeatherCityRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $apiKey = env('WEATHER_KEY');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$validated['city']}&appid={$apiKey}&units=metric");
        if($response->status() == 200){
            $data = json_decode($response->getBody(), true);
            Weather::query()->updateOrCreate(
                ['city' => $data['name']],
                [
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description']
                ]
            );
            return response()->json([
                'success' => true,
            ]);
        }
        return response()->json([
            'success' => false,
        ], 404);
    }

    public function searchedCities(): JsonResponse
    {
        return response()->json(Weather::all());
    }
}
