<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipPercentage extends Controller {

    /**
    * Properties
    */
    private $percent;

    /**
    * Methods
    */

    /**
    * Get the percentage based on the service level from the form
    */
    public function get($serviceLevel) {

        # assign the service score to a percentage for calculation
        switch ($serviceLevel) {
            case 'Exceptional':
                $this->percent = 0.20;
                break;
            case 'Good':
                $this->percent = 0.15;
                break;
            case 'Poor':
                $this->percent = 0.10;
                break;
            case 'Awful':
                $this->percent = 0;
                break;
        }
        return $this->percent;
    }
} # end of class
