<?php

namespace App\Http\Controllers;

use App\Button;
use App\ButtonBar;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ButtonBarRequest;
use App\RDA\RDA;
use Illuminate\Http\Request;

class ButtonBarController extends Controller
{
    public $buttonBars, $RDA;

    public function __construct()
    {
        $buttonBars = ButtonBar::orderBy('title')->get();

        $RDA = new RDA(config('RDA.user'),config('RDA.password'),config('RDA.server'));

        $this->RDA = $RDA;

        $this->buttonBars = $buttonBars;

        view()->share('buttonBars',$this->buttonBars);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view()->make('buttonBar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $allZones = $this->RDA->GetZoneList();

        $bulletinZones = array_filter($allZones,function($zone){
            return $zone['ZoneType'] === 'Bulletin';
        });

        $alertZones = array_filter($allZones,function($zone){
            return $zone['ZoneType'] === 'FullAlert';
        });

        return view()->make('buttonBar.create')->with([
                'bulletinZones'=>$bulletinZones,
                'alertZones'=>$alertZones
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ButtonBarRequest $request)
    {

        $bar = ButtonBar::create([
            'title'=>$request->input('title'),
            'zone_GUID'=>$request->input('zone_GUID'),
            'alert_GUID'=>$request->input('alert_GUID'),
        ]);

        return redirect()->route('admin.index')->with('message',"$bar->title created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $bar = ButtonBar::find($id);

        return view()->make('buttonBar.show')->with('bar',$bar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $bar = ButtonBar::find($id);

        $allZones = $this->RDA->GetZoneList();

        $bulletinZones = array_filter($allZones,function($zone){
            return $zone['ZoneType'] === 'Bulletin';
        });

        $alertZones = array_filter($allZones,function($zone){
            return $zone['ZoneType'] === 'FullAlert';
        });

        return view()->make('buttonBar.edit')->with([
                'bulletinZones'=>$bulletinZones,
                'alertZones'=>$alertZones,
                'bar'=>$bar
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ButtonBarRequest $request, $id)
    {
        $bar = ButtonBar::find($id);
        $bar->title = $request->input('title');
        $bar->zone_GUID = $request->input('zone_GUID');
        $bar->alert_GUID = $request->input('alert_GUID');

        $bar->save();

        return redirect()->route('admin.index')->with('message',"$bar->title edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $bar = ButtonBar::find($id);

        $bar->buttons()->delete();
        
        $bar->delete();

        return redirect()->route('admin.index')->with('warning',"$bar->title deleted");
    }
}
