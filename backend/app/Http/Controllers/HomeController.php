<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\HomeHelper;
use App\Helpers\FullCalendarHelper;
use App\Helpers\FileHelper;

use App\Http\Requests\Home\Step1Request;
use App\Http\Requests\Home\Step2Request;
use App\Http\Requests\Home\Step5Request;

use App\Models\Home;
use App\Models\HomeService;
use App\Models\HomePrice;
use App\Models\Service;

class HomeController extends Controller
{
    use HomeHelper, FullCalendarHelper, FileHelper;

    private $steps_home; 

    public function __construct() {
       $this->setStepsHome();
    }

    private function setStepsHome() : void
    {
        $this->steps_home = [
            __('home.home_data'),
            __('home.home_rooms'),
            __('home.home_services'),
            __('home.home_calendary'),
            __('home.home_files'),
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
        $home_services = [ 'home_services' => $this->getHomeServices() ];
        return $this->viewStep('step3', $home_services);
    }

    public function postStep3(Request $request)   
    {
        if($request->services){
            $this->setHomeSession($request);
        }
        return redirect()->route('home.step4');
    }

    public function step4()
    {
        $selectYearsMonths = [ 
            'years' =>  $this->setYeasToSelect(),
            'months' => $this->setMonthsToSelect(),
            'home_prices' => $this->getHomePrices(),
        ];
        return $this->viewStep('step4', $selectYearsMonths);
    }

    public function postStep4(Request $request)
    {
        $request->merge([
            'home_prices' => json_decode($request->home_prices, true)
        ]);
        $this->setHomeSession($request);
          return redirect()->route('home.step5');
    }

    public function step5()
    {
        return $this->viewStep('step5');
    }

    public function upsert(Step5Request $request) 
    {
        $files;
        try {
            DB::transaction(function () use ($request, $files) {
                $home_session = session('home_session');
                $id = $home_session['id'] ?? null;
                $home = $id ? Home::find($id) : new Home();
               
                // 1. Dati generali
                $home->name = $home_session['name'];
                $home->province = $home_session['province'];
                $home->state = $home_session['state'];
                $home->city = $home_session['city'];
                $home->cap = $home_session['cap'];
                $home->address = $home_session['address'];
                $home->civ = $home_session['civ'];
                $home->description = $home_session['description'];
                
                // 2. Stanze
                $home->meters = $home_session['meters'];
                $home->rooms = $home_session['rooms'];
                $home->bathrooms = $home_session['bathrooms'];
                $home->single_beds = $home_session['single_beds'];
                $home->double_beds = $home_session['double_beds'];
                $home->bunk_beds = $home_session['bunk_beds'];
                $home->wall_beds = $home_session['wall_beds'];
                $home->sofa_beds = $home_session['sofa_beds'];

                // 3. Files
                #
                $home->save();
               
                // 4. Servizi
                $home_services = $id ? HomeService::where('home_id', $id)->first() : new HomeService();
                $home_services->home_id = $home->id;
                $home_services->services = $home_session['services'];
                $home_services->save();

                // 4. Calendario Prezzi
                $prices = $home_session['home_prices'];

                $frontend_ids = collect($prices)
                    ->pluck('id')          
                    ->filter()             
                    ->toArray();

                HomePrice::where('home_id', $home->id)
                        ->whereNotIn('id', $frontend_ids)
                        ->delete();

                foreach ($prices as $price) {
                    $home_prices = $price['id'] ? HomePrice::find($price['id']) : new HomePrice();
                    $home_prices->home_id = $home->id;
                    $home_prices->from = $price['from'];
                    $home_prices->to = $price['to'];
                    $home_prices->price = $price['price'];
                    $home_prices->save();
                }
            });

            return redirect()->route('homes.show');

        } catch (\Throwable $e) {
            # $this->deleteFiles($files);
            report($e);
            return back()->with('error', __('common.error'));
        }
    }

    private function upsertFiles($request)
    {
        $avatar = $request->file('avatar');
        $images = $request->file('images');
        $videos = $request->has('videos') ? $request->file('videos') : []; 

        $path_filesHome = '/homes';
        $this->saveFile($avatar, "$path_filesHome/avatars");
    }

    public function destroy(Request $request) 
    {}
}
