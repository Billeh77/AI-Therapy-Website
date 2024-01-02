<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advice;
use App\Models\Feeling;
use App\Models\User;

class SupportController extends Controller
{
    public function index() {

        $feels = null;
        $advice = null;
        return view('dashboard')->with('advice', $advice)->with('feels', $feels);

    }

    public function support(Request $request){

        $validated = $request->validate([
            'feels' => ['required']
        ]);

        if (!$validated) {
            $feelse = null;
            $advicee = null;
            return view('dashboard')->with('advice', $advicee)->with('feels', $feelse);;
        }

        $feels = $request->input('feels');
        $feelstext = strtolower($feels);
        
        $feelings = \Auth::user()->feelings;

        $adviceIds = [];

        foreach ($feelings as $feeling) {
            // Check if the lowercase representation of $feeling is in $feelstext
            if (strpos(strtolower($feelstext), strtolower($feeling->feeling)) !== false) {
                // Add $feeling->advice_id to the end of the array
                $adviceIds[] = $feeling->advice_id;
            }
        }

        if (count($adviceIds) > 0) {
            // Count the occurrences of each advice ID
            $adviceIdCounts = array_count_values($adviceIds);

            // Find the advice ID with the highest count
            $mostCommonAdviceId = array_search(max($adviceIdCounts), $adviceIdCounts);

            $advice = Advice::where('id', $mostCommonAdviceId)->value('advice');
        } else {
            $advice = 'Please be more descriptive about how you feel.';
        }

        return view('dashboard')->with('advice', $advice)->with('feels', $feels);
    }
}
