<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CalculatorController extends Controller
{
    public function calculator()
    {
        return view ('calculator');
    }

    //penjumlahan
    public function add(Request $request)
    {
       $result = $request->number1 + $request->number2;
       return "Hasil " . $result;
    }

    //Pengurangan
    public function subtract(Request $request)
    {
        $result = $request->number1 - $request->number2;
        return "Hasil " . $result;
    }

    //perkalian
    public function multiply(Request $request)
    {
        $result = $request->number1 * $request->number2;
        return "Hasil " . $result;
    }

    //pembagian
    public function divide(Request $request)
    {
        if ($request->number2 == 0) {
            return "Tidak bisa membagi dengan nol";
        }
        $result = $request->number1 / $request->number2;
        return "Hasil " . $result;
    }
}