<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Currency;

class MainController extends Controller
{
    public function dashboard(Request $request)
    {
        $date = Carbon::now()->subDays(30);
        $curentday = Carbon::now();
        $curency = Currency::paginate(15);

        if ($request->input('valuteid')) {
            $curency = Currency::where('valuteID', $request->valuteid)->whereBetween('date', [Carbon::parse($request->start), Carbon::parse($request->end)])->paginate(15)->appends(request()->query());
        }

        return view('dashboard')
            ->withDate($date)
            ->withCurency($curency)
            ->withCurentday($curentday);
    }

    public function updateBase(Request $request)
    {


        $date = Carbon::now()->subDays(30);
        $curentday = Carbon::now();

        Currency::truncate();

        while ($date <= $curentday) {
            $page = file_get_contents('https://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $date->format('d/m/Y'));
            $xml = simplexml_load_string($page);
            $json = json_encode($xml);
            $array = json_decode($json, TRUE);
            foreach ($array['Valute'] as $value) {
                Currency::create([
                    'valuteID' => $value['@attributes']['ID'],
                    'numCode' => $value['NumCode'],
                    'charCode' => $value['CharCode'],
                    'name' => $value['Name'],
                    'value' => $value['Value'],
                    'date' => $date
                ]);
            }

            $date->addDay();
        }


    }
}
