<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFishRequest;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fishes = Fish::all();
        return View('dashboard.fishes.index',compact('fishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('dashboard.fishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFishRequest $request)
    {
        //
        Fish::create($request->except('_token'));
        return redirect()->back()->with('success','Fisg Added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fish = Fish::findOrFail($id);
        if($fish->category == 'swf')
        {
            $selectFishes = Fish::where('category','swf')->get();
        }
        else{
            $selectFishes = Fish::where('category','fwf')->get();

        }
        return view('dashboard.fishes.show',compact('fish','selectFishes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $fish = Fish::findOrFail($id);
       return view('dashboard.fishes.edit',compact('fish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFishRequest $request, $id)
    {
        //
        $fish =Fish::findORFail($id);
        $fish -> name =$request->name;
        $fish->category = $request->category;
        $fish->update();
        return redirect()->back()->with('success','Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $fish= Fish::findOrFail($id);
        $fish->compactibilities()->detach();
        $fish->delete();
        return redirect()->back()->with('success','Updated Sucessfully');

    }

    public function saveCompactibility(Request $request,$id)
    {

        $mainFish = Fish::findOrFail($id);

        $compactFishes = array();
        $moderateFishes =array();
        $incompactFishes = array();
        if(!empty($request->compactible))
        {
            
        foreach($request['compactible'] as $key => $compactible)
        {
            $compactFishes[$key]['compactibility_id'] = 1;

            $compactFishes[$key]['compactible_fish_id'] = $compactible;
        }
       }

  
       


        if(!empty($request->moderate))
        {
            foreach($request['moderate'] as $key => $moderate)
            {
                $moderateFishes[$key]['compactibility_id'] = 2;
    
                $moderateFishes[$key]['compactible_fish_id'] = $moderate;
            }
        }


        if(!empty($request->incompactible))
        {


            foreach($request['incompactible'] as $key => $incompactible)
            {
                $incompactFishes[$key]['compactibility_id'] = 3;
    
                $incompactFishes[$key]['compactible_fish_id'] = $incompactible;
            }
            
        }

        $mainFish->compactibilities()->detach();
        $mainFish->compactibilities()->attach($compactFishes);
        $mainFish->compactibilities()->attach($moderateFishes);
        $mainFish->compactibilities()->attach($incompactFishes);

        return redirect()->back()->with('success','Updated Sucessfully');

    }
}
