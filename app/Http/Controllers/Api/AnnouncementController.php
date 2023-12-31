<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    public function index(){
        $announcement=Announcement::latest()->get();

        return AnnouncementResource::collection($announcement);
    }

    public function todayAnnouncement()
    {
        $today = Carbon::today();
        $announcement = Announcement::whereDate('created_at', $today)->latest()->get();

        return AnnouncementResource::collection($announcement);
    }

    
    public function store(Request $request){

        try{
            $announcement=DB::transaction(function()use($request){
                $announcement=Announcement::create([
                    'title'=>$request->title,
                    'announcement'=>$request->announcement
                    
                ]);
                return $announcement;
                
            });
            if($announcement){
                return responseSuccess($announcement,200,'Announcement created successfully!');
            }
            
        }
        catch(\Exception $e){
            return responseError($e->getMessage(),500);
            
        }
        
    }
}