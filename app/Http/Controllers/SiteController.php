<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteInfoRequest;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\File as File;

class SiteController extends Controller
{
    //
    public function index()
    {
        $siteInfo = SiteInfo::findOrFail(1);
        return view('siteinfo.index',compact('siteInfo'));
    }

    public function store(StoreSiteInfoRequest $request)
    {
        $siteInfo = SiteInfo::find(1);
        $data                   = $request->except('banner', '_token');
        if($request->banner)
        {
            $image_name             = time() . "-" . $request->banner->getClientOriginalName();
            $images                 = $request->banner->storeAs('images', $image_name, 'public');
            $data['banner'] = "/storage/" . $images;
            
       

        }
        if($siteInfo == null)
        {
            SiteInfo::create($data);
        }
        else{
            $siteInfo->update($data);
        }

        return redirect()->back()->with('message','Site Info Updated Sucessfully');
    }

}
