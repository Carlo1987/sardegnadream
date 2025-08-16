<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HomeHelper;

use App\Http\Requests\Home\Step1Request;
use App\Http\Requests\Home\Step2Request;
use App\Http\Requests\Home\Step3Request;
use App\Http\Requests\Home\Step4Request;

use App\Models\Home;

class HomeController extends Controller
{
    use HomeHelper;

    private $steps_home; 

    public function __construct() {
        $this->steps_home = [
            __('home.home_data'),
            __('home.home_rooms'),
            __('home.home_services'),
            __('home.home_files'),
            __('home.home_calendary'),
        ];
    }

    public function show()
    {
        if(session('home_session')){
            session()->forget('home_session');
        }
     
        $homes = Home::all();
        return view('homes.show', compact('homes'));
    }

    public function step1($id = null)
    {
        if(!session()->has('home_session')) {
            $home = [];
            $home = $id ? Home::find($id) : new Home();
            session(['home_session' => $home->toArray()]);
        }
        
        return view('homes.steps.step1',[
            'steps' => $this->steps_home,
            'states' => $this->getStates(),
        ]);
    }

    public function postStep1(Step1Request $request)
    {
        $homeData = session('home_session', []);
        
        $homeData = array_merge($homeData, $request->except('_token'));
        session(['home_session' => $homeData]);
        return redirect()->route('home.step2');
    }

    public function step2($id = null)
    {
        return view('homes.steps.step2',[
            'steps' => $this->steps_home,
        ]);
    }

    public function postStep2(Step2Request $request)
    {}

    public function step3($id = null)
    {}

    public function postStep3(Step3Request $request)
    {}

    public function step4($id = null)
    {}

    public function upsert(Step4Request $request) 
    {}


    public function destroy(Request $request) 
    {}
}
