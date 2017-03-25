<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillSplitterController extends Controller
{
    /**
    * GET /
    */
    public function show() {
        $billTotal = null;
        return view('BillSplitter.show')->with([
            'billTotal' => $billTotal,
        ]);
    }

    /**
    * GET /calculate
    */
    public function calculate(Request $request) {

        $eachPaysRounded = null;
        $billTotalRounded = null;
        $eachPays = null;

        # perform validation on the form entries
        $this->validate($request, [
            'billAmount' => 'required|numeric',
        ]);

        # get information from the form and put into variables
        $billAmount = $request->input('billAmount', null);
        $splitBy = $request->input('splitNumTimes', null);
        $serviceScore = $request->input('serviceScore', null);
        $roundChecked = $request->input('roundUp');

        # perform validation on the form entries
        $this->validate($request, [
            'billAmount' => 'required|numeric',
        ]);

        # assign the service score to a percentage for calculation
        switch ($serviceScore) {
            case 'Exceptional':
                $tipPercent = 0.20;
                break;
            case 'Good':
                $tipPercent = 0.15;
                break;
            case 'Poor':
                $tipPercent = 0.10;
                break;
            case 'Awful':
                $tipPercent = 0;
                break;
        }

        # calculate bill total and amount each pays
        $billTotal = ($billAmount * $tipPercent) + $billAmount;

        if($roundChecked) {
            $eachPaysRounded = ceil($billTotal / $splitBy);
            $billTotalRounded = number_format($eachPaysRounded * $splitBy, 2);
        }
        else {
            $eachPays = number_format($billTotal / $splitBy, 2);
        }

        # display calculations, formatted to two decimal places
        $billTotal = number_format($billTotal, 2);

        return view('BillSplitter.show')->with([
            'billTotal' => $billTotal,
            'roundChecked' => $roundChecked,
            'eachPaysRounded' => $eachPaysRounded,
            'billTotalRounded' => $billTotalRounded,
            'eachPays' => $eachPays,
        ]);
    }
}
