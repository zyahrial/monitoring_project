<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
class UserController extends Controller
    {	
       function index(Request $request)
    {       
    if ($request->has('name')) 
    {        
    $query = ($request->input('name'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $user = User::where('name', 'LIKE', '%' . $query . '%')
            ->orderBy('name', 'asc')
            ->paginate(10);
    }else{ 
    $user = User::orderBy('name', 'asc')->paginate(10);  
    } 
        return view('user/index',compact('user'));
    }

        function profile(Request $request)
{
    $email = (Auth::user()->email);
    $user = User::where('email', '=',$email )
    ->orderBy('email', 'asc')->get();
        return view('user/index',compact('user'));
}

    function store(Request $request)
    
    {
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_permission' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
    ]);

    $user = new User();
    $user->name = $request->get('name');
    $user->is_permission = $request->get('is_permission');
    $user->email = $request->get('email');
    $user->password = Hash::make($request->get('password'));
    $user->save();

    \Session::flash('success','User Berhasil Di Tambahkan');
    return redirect('user');
    
    }
  
    function show($id)
    {
        $user = User::orderBy('name', 'asc')->paginate(10);  
        $data = User::where('id',$id)->get();
        return view('user/edit',compact('data','user'));
    }
 
    function update(Request $request, $id) 
    { 
    $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_permission' => 'required',
            'password' => 'required|string|min:6',
    ]);

    $user = User::find($id);
    $user->name = $request->get('name');
    $user->is_permission = $request->get('is_permission');
    $user->password = Hash::make($request->get('password'));
    $user->save();

    
    \Session::flash('success','Data User Berhasil Di Ubah');
    return redirect('user/'.$id);   
    }
    
    function destroy(Request $request, $id)
    {
        $data = User::find($id);
        $data->delete();
        \Session::flash('success','Data User Berhasil Di Hapus');
        return redirect('user');
    }

        public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}