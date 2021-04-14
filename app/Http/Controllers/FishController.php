<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFishRequest;
use App\Models\Category;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $fishes = Fish::latest()->paginate(10);
        return View('dashboard.fishes.index', compact('fishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $categories = Category::find([1,2]);
        return view('dashboard.fishes.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFishRequest $request) {
        //

        $fish = Fish::create($request->except('_token','category'));
        $fish -> categories()->sync($request->category);
        return redirect()->back()->with('success','Fish Added Sucessfully');

  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $fish = Fish::findOrFail($id);

        $fishCategory = $fish->categories->first();
        $selectFishes = $fishCategory->fishes()->get();
        return view('dashboard.fishes.show',compact('fish','selectFishes','fishCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //

       $fish = Fish::findOrFail($id);
       $categories = Category::find([1,2]);
        return view('dashboard.fishes.edit',compact('fish','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFishRequest $request, $id) {
        //

        $fish =Fish::findORFail($id);
        $fish -> name =$request->name;
        $fish->categories()->sync($request->category);

        $fish->update();
        return redirect()->back()->with('success', 'Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //

        $fish = Fish::findOrFail($id);
        $fish->compactibilities()->detach();
        $fish->delete();
        return redirect()->back()->with('success', 'Updated Sucessfully');

    }

    public function saveCompactibility(Request $request, $id) {

        $mainFish = Fish::findOrFail($id);

        $compactFishes   = array();
        $moderateFishes  = array();
        $incompactFishes = array();

        if(!empty($request->compactible))
        {
            
        foreach($request['compactible'] as $key => $compactible)
        {
            $compactFishes[$key]['compactibility_id'] = 1;

            $compactFishes[$key]['compactible_fish_id'] = $compactible;

            
           

            
        }
       }



        if (!empty($request->moderate)) {
            foreach ($request['moderate'] as $key => $moderate) {
                $moderateFishes[$key]['compactibility_id'] = 2;

                $moderateFishes[$key]['compactible_fish_id'] = $moderate;
            }
        }

        if (!empty($request->incompactible)) {

            foreach ($request['incompactible'] as $key => $incompactible) {
                $incompactFishes[$key]['compactibility_id'] = 3;

                $incompactFishes[$key]['compactible_fish_id'] = $incompactible;
            }

        }

        $allAssignFish = array_merge($compactFishes,$moderateFishes,$incompactFishes);
        
        $reverseAllAssign = [];

        for($i=0; $i<sizeof($allAssignFish);$i++)
        {
            $reverseAllAssign[$i]['compactibility_id'] = $allAssignFish[$i] ['compactibility_id'] ;
            $reverseAllAssign[$i]['fish_id'] = $allAssignFish[$i] ['compactible_fish_id'] ;

        }

        $mainFish->compactibilities()->detach();
        $mainFish->reverseCompactibilities()->detach();


        $mainFish->compactibilities()->attach($allAssignFish);

        
        
        $mainFish->reverseCompactibilities()->attach($reverseAllAssign);
        
       

        return redirect()->back()->with('success', 'Updated Sucessfully');

    }
}
