<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Redirect;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.home');
    }
    public function showSiswa(){
        return view('admin.siswa.show');
    }
    public function getSiswa(){
        $data = DB::table('m_siswa as a')
                ->JOIN('r_login as b','a.id_siswa','b.id_user')
                ->SELECT('a.*','b.username')
                ->get();
        return Datatables::of($data)
            ->escapeColumns([])
            ->addColumn('action', function ($user) {
                if($user->status == "OPN"){
                    $stat = '';
                }else{
                    $stat = '';
                }
                $token = csrf_token();
                return '
                <form action="/dashboard-admin/siswa/edit" method="post">
                <input type="hidden" value="'.$token.'" name="_token">
                <input type="hidden" value="'.$user->id_siswa.'" name="_id">
                
                <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                </form>

                <form action="/dashboard-admin/siswa/delete" method="post">
                <input type="hidden" value="'.$token.'" name="_token">
                <input type="hidden" value="delete" name="_method">
                <input type="hidden" value="'.$user->id_siswa.'" name="_id">
                
                <button type="submit" onclick="return confirm(\'yakin ingin menghapus data?\')" class="btn btn-xs btn-warning"><i class="fa fa-trash"></i> Hapus</button>
                </form>
                ';
            })
            ->addColumn('status', function ($user) {
                if($user->status == "OPN"){
                    $stat = '<center><a href="#" class="btn btn-xs btn-success">Active</a></center>';
                }else{
                    $stat = '<center><a href="#" class="btn btn-xs btn-warning">Non Active</a></center>';
                }
                return $stat;
            })
            ->editColumn('id_siswa', function($user){
                return  '<a href="ss">'.$user->id_siswa.'</a>';
            })
            ->make(true);
    }
    public function deleteSiswa(Request $request){
        $this->validate($request,[
            '_method' => 'required',
            '_id' => 'required',
        ]);
        if($request->_method == "delete"){
            $delete = DB::table('m_siswa')->where('id_siswa','=',$request->_id)->delete();
            $delete2 = DB::table('r_login')->where('id_user','=',$request->_id)->delete();
            if($delete && $delete2){
                return redirect()->back()->with('message','Berhasil Menghapus Data');
            }
            return redirect()->back()->withError('Gagal Menghapus Error Code [201]');
        }
        return redirect()->back()->withError('Gagal Menghapus Error Code [205]');
    }
    public function editSiswa(Request $request){

    }
}
