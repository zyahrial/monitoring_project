<?php
namespace App\Http\Controllers;

use App\Prj_activity;
use App\Prj_ib;
use App\Prj_termin;

use Illuminate\Http\Request;

class Prj_activityController extends Controller
{
public function index(Request $request)
    {
    $data = Prj_activity::orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')->get();
    return view('prj_activity.index', compact('data'));
    }

        function destroy(Request $request, $kd_activity)
    {
 $activity1 = Prj_ib::where('kd_activity',$kd_activity)->count();

if (($activity1) > 0){
\Session::flash('warning','Tidak dapat menghapus data, activity terdapat pada modul Internal Budget');
        return redirect('activity');
}else{
        $data = Prj_activity::find($kd_activity);
        $data->delete();
    \Session::flash('success','Data Successfully Deleted');
        return redirect('activity');
}
}
    function store(Request $request)
    {
    $data = new Prj_activity();
    $data->activity = $request->get('activity');
    $data->sub_activity = $request->get('sub_activity');
    $data->cost_activity = $request->get('cost_activity');
    $data->save();
    \Session::flash('success','Data Successfully Added');
    return redirect('activity');
    }
    function show($kd_activity)
    {
        $data = Prj_activity::orderBy('activity', 'asc')->get();  
        $dt = Prj_activity::where('kd_activity',$kd_activity)->get();
        return view('prj_activity.edit',compact('data','dt'));
    }

        function update(Request $request, $kd_activity) 
    {
    $data = Prj_activity::find($kd_activity);
    $data->activity = $request->get('activity');
    $data->sub_activity = $request->get('sub_activity');
    $data->cost_activity = $request->get('cost_activity');

    $data->save();  
    \Session::flash('success','Data Successfully Updated');
    return redirect('activity');   
    }

       function lookup_activity(Request $request)
    {

    if ($request->has('activity'))
    {        
    $query = ($request->input('activity'));
    $data = Prj_activity::where('activity', 'LIKE', '%' . $query . '%')->
    orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')->get();
    }else{
    $data = Prj_activity::orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')->get();

    }
        return view('proyek.lookup.lookup_activity', compact('data'));
}

    function lookup_activity_store(Request $request)
    {
    $data = new Prj_activity();
    $data->activity = $request->get('activity');
    $data->sub_activity = $request->get('sub_activity');
    $data->cost_activity = $request->get('cost_activity');
    $data->save();
    \Session::flash('success','Data Successfully Added');
    return redirect('/add_ib/lookup_activity');
    }
}