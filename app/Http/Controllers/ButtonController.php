<?php

namespace App\Http\Controllers;

use App\Button;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ButtonRequest;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $buttons = Button::orderBy('screen')->orderBy('order')->get();

        return view()->make('button.index')->with(['buttons'=>$buttons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view()->make('button.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ButtonRequest $request)
    {
        $button = Button::create([
            'title'=>$request->input('title'),
            'tag'=>$request->input('tag'),
            'length'=>$request->input('length'),
        ]);

        return redirect()->route('admin.button.index')->with('message',"$button->title created");
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
        return view()->make('button.edit')->with(['button'=>$button]);        
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
        $button->title = $request->input('title');
        $button->tag = $request->input('tag');
        $button->length = $request->input('length');
        $button->save();

        return redirect()->route('admin.button.index')->with('message',"$button->title edited");
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

        return redirect()->route('admin.button.index')->with('message',"$button->title deleted");
    }
}
