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
        $billAmount = null;
        $splitBy = null;
        $serviceScore = null;
        $roundChecked = false;

        return view('BillSplitter.show')->with([
            'billAmount' => $billAmount,
            'splitBy' => $splitBy,
            'serviceScore' => $serviceScore,
            'roundChecked' => $roundChecked,
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

        $percentage = new TipPercentage();

        # perform validation on the form entries
        $this->validate($request, [
            'billAmount' => 'required|numeric',
        ]);

        # get information from the form and put into variables
        $billAmount = $request->input('billAmount', null);
        $splitBy = $request->input('splitNumTimes', null);
        $serviceScore = $request->input('serviceScore', null);
        $roundChecked = $request->input('roundUp');

        # get the tip percentage based on the service score
        $tipPercent = $percentage->get($serviceScore);

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
            'billAmount' => $billAmount,
            'splitBy' => $splitBy,
            'serviceScore' => $serviceScore,
            'roundChecked' => $roundChecked,
            'billTotal' => $billTotal,
            'eachPaysRounded' => $eachPaysRounded,
            'billTotalRounded' => $billTotalRounded,
            'eachPays' => $eachPays,
        ]);
    }
}
