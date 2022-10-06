<?php

namespace App\Http\Controllers\Dashboard\other;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Cknow\Money\Money;

class MailController extends Controller
{
    public function index()
    {
        $test = Money::USD(500);

        dd($test);

        echo basename('test');

        $test = storage_path('app/JoyWood/2022-08-25-20-38-11');
        dd($test);

        $test = Storage::disk('local')->get('marquee.json');
        dd($test);

        $url = Storage::url('file.jpg');

        dd($url);

        Storage::disk('local')->put('example.txt', 'Contents');

        echo asset('storage/file.txt');

        return 'kok';
    }
}
