<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth']);
        // $this->middleware(['auth', 'admin'])->only('index');
    }
    public function dashboard(){
        
        return view('siswas.dashboard');
    }

    public function index(Request $request)
    {
        
        return view('siswas.index');
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $messages = [
            'required'  => ' :attribute <b>Harus di isi</b>',
            'unique'    => ' :attribute <b>sudah ada</b>',
        ];

        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'required',
        ], $messages)->validate();

        $user = new User;
        $user->name = $request->nama_depan.''.$request->nama_belakang;
        $user->email = $request->email;
        $user->admin = 0;
        $user->password = bcrypt('password');
        $user->remember_token = Str::random(10);
        $user->save();

        $data = $request->all();
        if ( $request->hasFile('avatar') ) {
            // image
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            
            $moved = $avatar->move('siswa/avatar', $avatar_new_name);
            // dd($avatar_new_name);
            $data['avatar'] = $avatar_new_name;            
            // endimage
        }
        
        $data['user_id'] = $user->id;
        $siswa = Siswa::create($data);
        
        return redirect()->route('siswas.index')->with('success', 'Data berhasil disimpan');

    }

    
    public function show(Siswa $siswa)
    {
        $mapel = \App\Mapel::all();
        $categories = [];

        $data = [];
        foreach ($siswa->mapel as $m) {
            $categories[] = $m->nama;
            $data[] = $siswa->mapel()->wherePivot('mapel_id', $m->id)->first()->pivot->nilai;
        }

        //dd( $siswa->mapel()->withPivot(['nilai'])->first()->pivot );
        //dd(json_encode($data));
        return view('siswas.show')
        ->with('siswa', $siswa)
        ->with('mata_pelajaran', $mapel)
        ->with('categories', $categories)
        ->with('data', $data);
    }

    public function edit($id)
    {
        //
        $edit = Siswa::findOrFail($id);
        return view('siswas.edit')->with('edit', $edit);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $messages = [
            'required' => ' :attribute <b>Harus di isi</b>',
        ];

        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ], $messages)->validate();

        $data = $request->all();
        if ($request->hasFile('avatar') ) {
            
            $image_path = public_path('siswa/avatar/'.$siswa->avatar);

                if (File::exists($image_path)) {
                    //File::delete($image_path);
                    unlink($image_path);
                    
                }

            
            // image
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $moved = $avatar->move('siswa/avatar', $avatar_new_name);
            $data['avatar'] = $avatar_new_name;
            
            // endimage
        }
        $siswa->update($data);
        return redirect()->route('siswas.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswas.index')->with('success', 'Data berhasil dihapus');
    }
    public function addNilai(Request $request, $id){
        //validasi---------------------------------------------
        $messages = [
            'required'  => ' :attribute <b>Harus di isi</b>',
            'unique'    => ' :attribute <b>sudah ada</b>',
        ];

        $validator = Validator::make($request->all(), [
            'mapel_id' => 'required',
            'nilai' => 'required',
        ], $messages)->validate();
        //endvalidasi-------------------------------------------
        //temukan siswa
        $siswa = \App\Siswa::find($id);

        if ($siswa->mapel()->where('mapel_id', $request->mapel_id)->exists()) {
            return redirect()->route('siswas.show', $siswa->id)->with('warning', 'Nilai sudah ada');
        }
        $siswa->mapel()->attach($request->mapel_id, ['nilai' => $request->nilai]);
        return redirect()->route('siswas.show', $siswa->id)->with('success', 'Nilai berhasil ditambah');

    }
    public function hapus($siswa_id, $mapel_id){
        $siswa = \App\Siswa::find($siswa_id);
        $siswa->mapel()->detach($mapel_id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
      public function export() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
    public function exportPdf(){
        $siswa = Siswa::all();
        $siswa->map(function($s){
            $s->nilaiRataRata = $s->nilaiRataRata();
                return $s;      
        });
        $siswa = $siswa->sortByDesc('nilaiRataRata');
        $pdf = PDF::loadView('export.siswaPdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function ajaxRequest(Request $request)
    {
        if ($request->ajax()) {
            $data = Siswa::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('ajaxRequest',compact('siswa'));
    }

    public function ajaxstore(Request $request)
    {
        Product::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name, 'detail' => $request->detail]);        
        return response()->json(['success'=>'Product saved successfully.']);
    }
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();

        // return response()->json(['success'=>'Got Simple Ajax Request.']);
        return response()->json($input); 
    }


}
