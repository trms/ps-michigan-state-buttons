<?php

namespace App\Http\Controllers;

use App\Button;
use App\ButtonBar;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ButtonRequest;
use Illuminate\Http\Request;

class ButtonController extends Controller
{

    public $RDA;

    
    public function __construct(ButtonBarController $buttonBarController)
    {
        $this->RDA = $buttonBarController->RDA;
        view()->share('buttonBars',$buttonBarController->buttonBars);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($buttonBar)
    {

        $buttons = ButtonBar::find();

        return view()->make('button.index')->with(['buttons'=>$buttons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $barId = $request->input('barId');
        if(!$barId) return redirect()->back()->with('warning','no button barId found in url');

        $bar = ButtonBar::find($barId);

        if(!$bar) return redirect()->route('admin.index')->with('warning',"no Button Bar found with id $barId");

        $bulletins = $this->getNormalizedBulletinList($bar->zone_GUID);
        
        // $alerts = $this->getNormalizedBulletinList($bar->alert_GUID);

        // $allBulletins = array_merge($bulletins,$alerts);

        return view()->make('button.create')->with(['bar'=>$bar,'allBulletins'=>$bulletins]);
    }

    private function is_assoc(array $array) {
      return (bool)count(array_filter(array_keys($array), 'is_string'));
    }

    private function getNormalizedBulletinList($zoneID)
    {
        $this->RDA->setZoneIds($zoneID);
        $bulletins = $this->RDA->GetBulletinList()[$zoneID];
        $bulletins = isset($bulletins[$zoneID])?$bulletins[$zoneID]:$bulletins;
        $bulletins = $this->is_assoc($bulletins)?[$bulletins]:$bulletins;
        return $bulletins;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ButtonRequest $request)
    {
        $bulletin_name = explode('|', $request->input('bulletin_GUID'))[0];
        $bulletin_GUID = explode('|', $request->input('bulletin_GUID'))[1];

        $button = Button::create([
            'title'=>$request->input('title'),
            'button_bar_id'=>$request->input('button_bar_id'),
            'bulletin_GUID'=>$bulletin_GUID,
            'bulletin_name'=>$bulletin_name,
            'order'=>$request->input('order'),
            'icon'=>$request->input('icon'),
        ]);

        return redirect()->route('admin.buttonBar.show',$button->button_bar_id)->with('message',"$button->title created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $button = Button::find($id);

        $bulletins = $this->getNormalizedBulletinList($button->buttonBar->zone_GUID);
        
        // $alerts = $this->getNormalizedBulletinList($button->buttonBar->alert_GUID);

        // $allBulletins = array_merge($bulletins,$alerts);

        return view()->make('button.edit')->with(['allBulletins'=>$bulletins,'button'=>$button]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ButtonRequest $request, $id)
    {
        $button = Button::find($id);

        $bulletin_name = explode('|', $request->input('bulletin_GUID'))[0];
        $bulletin_GUID = explode('|', $request->input('bulletin_GUID'))[1];

        
        $button->title = $request->input('title');
        $button->button_bar_id = $request->input('button_bar_id');
        $button->bulletin_GUID = $bulletin_GUID;
        $button->bulletin_name = $bulletin_name;
        $button->order = $request->input('order');
        $button->icon = $request->input('icon');

        $button->save();

        return redirect()->route('admin.buttonBar.show',$button->button_bar_id)->with('message',"$button->title edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $button = Button::find($id);
        $button->delete();

        return redirect()->route('admin.buttonBar.show',$button->button_bar_id)->with('warning',"$button->title deleted");
    }
}
