<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HomeHelper;

use App\Http\Requests\Home\Step1Request;
use App\Http\Requests\Home\Step2Request;
use App\Http\Requests\Home\Step3Request;
use App\Http\Requests\Home\Step4Request;

use App\Models\Home;
use App\Models\HomeService;
use App\Models\Service;

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
            $home = $id ? Home::find($id) : new Home();
            session(['home_session' => $home->toArray()]);
        }
        $states = ['states' => $this->getStates()];
        return $this->viewStep('step1', $states);
    }

    public function postStep1(Step1Request $request)
    {
        $this->setHomeSession($request);
        return redirect()->route('home.step2');
    }

    public function step2()
    {
        return $this->viewStep('step2');
    }

    public function postStep2(Step2Request $request)
    {
        $this->setHomeSession($request);
        return redirect()->route('home.step3');
    }

    public function step3()
    {
        $home = session('home_session');
        $home_services = [ 'home_services' => $this->getHomeServices($home) ];
        return $this->viewStep('step3', $home_services);
    }

    private function getHomeServices($home)
    {  
        $array_homeServices = [];
        $home_services = [];

        if(!$home['check_services']){
            $query_homeServices = HomeService::where('home_id', $home['id'])->first();
            if($query_homeServices && $query_homeServices->count() > 0) {
                $array_homeServices = explode('-', $query_homeServices->services);
            }
        }else{
            $array_homeServices = $home['check_services'];
        }
        
        $services = Service::all();
        $haveServices = count($array_homeServices) > 0;
        foreach($services as $service) {
            $category = $service->service_category->name;
            $service_value = $haveServices ? in_array($service->id, $array_homeServices) : false;

            $home_services[$category][$service->id] = [
                'name' => $service->name,
                'image' => $service->image,
                'value' => $service_value,
            ];  
        }

        return $home_services;
    }

    public function postStep3(Request $request)   
    {
        if($request->check_services){
            $this->setHomeSession($request);
        }
        return redirect()->route('home.step4');
    }

    public function step4()
    {
        return $this->viewStep('step4');
    }

    public function postStep4(Step4Request $request)
    {
        dd($request->all());
    }

    public function step5()
    {}

    public function upsert(Step4Request $request) 
    {}

    private function viewStep($view, $itemsPlus = null)
    {
        $items = [ 'steps' => $this->steps_home ];
        if($itemsPlus) $items = array_merge($items, $itemsPlus);
        return view("homes.steps.$view", $items);
    }

    private function setHomeSession($request)
    {
        $homeData = session('home_session', []);
        $homeData = array_merge($homeData, $request->except('_token'));
        session(['home_session' => $homeData]);
    }


    public function destroy(Request $request) 
    {}
}
