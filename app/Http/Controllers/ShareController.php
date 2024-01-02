<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Advice;
use App\Models\Feeling;
use App\Models\User;

class ShareController extends Controller
{
    public function index() {

        return view('share', ['userNotFound' => null]);

    }

    public function create(Request $request){

        $validated = $request->validate([
            'feelings' => ['required'],
            'advice' => ['required']
        ]);

        if (!$validated) {
            return view('share', [
                'errors' => 'Required fields missing for sharing new advice.'
            ]);
        }

        $feels = $request->input('feelings');
        $feels = strtolower($feels);
        $feelings = explode(', ', $feels);

        if (count($feelings) < 10) {
            return view('share', [
                'errors' => 'Required minimum of 10 feelings.'
            ]);
        }

        $advice = $request->input('advice');
        $newAdvice = Advice::create([
            'advice' => $request->input('advice'),
            'user_id' => \Auth::user()->id,
        ]);

        foreach($feelings as $feeling) {
            Feeling::create([
                'feeling' => $feeling,
                'user_id' => \Auth::user()->id,
                'advice_id' => $newAdvice->id,
            ]);
        }

        session()->flash('addedAdvice', 'Added advice successfully!'); 

        return redirect()->back();
    }
}
