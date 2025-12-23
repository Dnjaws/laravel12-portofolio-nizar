<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationGallery;
use App\Models\Facility;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
// use Intervention\Image\Drivers\Gd\Driver;


// use App\Models\Location;
// use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $country_list = DB::table('locations')->select('province')->distinct()->get();
        // $data = Destination::with('provinsi', 'category', 'kota')->get();
        $data = Destination::all();
        return view('Destination.index', ['data'=> $data,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $facilities=Facility::all();
        $province=Provinsi::all();
        $city=Kota::all();
        $state=Kecamatan::all();
        // $country_list = DB::table('locations')->select('province')->groupBy('province')->get();

        return view('Destination.create', ['categories'=>$categories, 'facilities'=>$facilities, 'province'=>$province, 'city'=>$city, 'state'=>$state]);
    }


    public function userCreate()
    {
        $categories=Category::all();
        $facilities=Facility::all();
        $provinsis=Provinsi::all();
        $cities=Kota::all();
        $states=Kecamatan::all();

        $destinations = Destination::all()->take(10);

        return view('user.create', compact(
            'categories',
            'facilities',
            'provinsis',
            'cities',
            'states',
            'destinations'
        ));
    }

    public function userStore(Request $request)
    {
        $data=$request->all();
        $data['status']='pending';
        $data['user_id']=Auth::id();

        $manager= new ImageManager(new ImagickDriver());

        if ($request->hasFile('img_url')) {
            $file     = $request->file('img_url');
            $filename = time() . '_' . $file->getClientOriginalName();

            $img=$manager->read($file->getRealPath())->resizeDown(1280)->toJpeg(75)->save(public_path('image/destination/' .$filename));

            $data['img_url'] = 'image/destination/' . $filename;
        }

        $destination = Destination::create($data);

        if ($request->filled('facility_id')) {
            $destination->facilities()->attach($request->facility_id);
        }

        if ($request->hasFile('gallery_imgs')) {
            foreach ($request->file('gallery_imgs') as $img) {
                $filename = time().'_'.$img->getClientOriginalName();

                $manager->read($img->getRealPath())
                        ->scaleDown(1280)
                        ->toJpeg(75)
                        ->save(public_path('image/destination/gallery/' . $filename));

                DestinationGallery::create([
                    'user_id' => Auth::id(),
                    'destination_id' => $destination->id,
                    'img_src' => 'image/destination/gallery/'.$filename,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Input pending....');
    }


    public function approve($id)
    {
        $data = Destination::findOrFail($id);
        $data->status = 'approved';
        $data->save();

        return redirect()->back()->with('success', 'Destinasi disetujui!');
    }

    public function reject($id)
    {
        $data = Destination::findOrFail($id);
        $data->status = 'rejected';
        $data->save();

        return redirect()->back()->with('success', 'Destinasi ditolak!');
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'open_hours'  => 'required|string|max:255',
                'price'       => 'required|numeric',
                'website'     => 'nullable|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'provincy_id' => 'required|exists:provinsis,id',
                'city_id'     => 'required|exists:kotas,id',
                'state_id'    => 'required|exists:kecamatans,id',
                'img_url'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'gallery_imgs.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            $data = $request->all();

            if ($request->hasFile('img_url')) {
                $file     = $request->file('img_url');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('image/destination'), $filename);
                $data['img_url'] = 'image/destination/' . $filename;
            }

            $destination = Destination::create($data);

            if ($request->facility_id) {
                $destination->facilities()->attach($request->facility_id);
            }

            if ($request->hasFile('gallery_imgs')) {
                foreach ($request->file('gallery_imgs') as $img) {
                    $filename = time().'_'.$img->getClientOriginalName();
                    $img->move(public_path('image/destination/gallery'), $filename);

                    DestinationGallery::create([
                        'user_id' => Auth::id(),
                        'destination_id' => $destination->id,
                        'img_src' => 'image/destination/gallery/'.$filename,
                    ]);
                }
            }

            // $data=new Destination;
            // $data->category_id=$request->c_id;
            // $data->provincy_id=$request->p_id;
            // $data->city_id=$request->k_id;
            // $data->state_id=$request->s_id;
            // $data->title=$request->title;
            // $data->description=$request->description;
            // $data->open_hours=$request->open_hours;
            // $data->price=$request->price;
            // $data->website=$request->website;
            // $data->img_url=$imgPath;
            // $data->save();

            // $data->facilities()->attach($request->f_id);

            // dd($request->file('img_url'));
            return redirect('admin/destination/create')->with('sukses', 'data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $facilities=Facility::all();
        $data=Destination::find($id);
        return view('Destination.create', ['data'=>$data, 'categories'=>$categories, 'facilities'=>$facilities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Destination::where('id', $id)->delete();
        return redirect('admin/destination')->with('success', 'Data berhasil dihapus!');
    }

    // Funcion Eksternal
    public function getKota($provincy_id)
    {
        $cities=Kota::where('provincy_id', $provincy_id)->orderBy('city_name', 'asc')->get();
        return response()->json($cities);
    }

    public function getKecamatan($city_id)
    {
        $states=Kecamatan::where('city_id', $city_id)->orderBy('kecamatan_name', 'asc')->get();
        return response()->json($states);
    }

    // public function fetch(Request $request)
    // {
    //     $select=$request->get('select');
    //     $value=$request->get('value');
    //     $dependent=$request->get('dependent');

    //     if($select == "province"){
    //         $data=Kota::where('provincy_id', $value)->get();
    //     } else if($select == "city"){
    //         $data=Kecamatan::where('city_id', $value)->get();
    //     }

    //     $output='<option value="">-- Pilih '.ucfirst($dependent).' --</option>';
    //     foreach($data as $row){
    //         $fieldName=$dependent.'_name';
    //         $output.='<option value="'.$row->id.'">'.$row->$fieldName.'</option>';
    //     }

    //     echo $output;

    //     $data = DB::table('locations')
    //         ->select($select, $value)
    //         ->distinct()
    //         ->get();
    //     $output='<option value=""> Select ' .ucfirst($dependent). '</option>';
    //     foreach($data as $row)
    //     {
    //         $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    //     }
    //     echo $output;
    // }

    public function userShow($id)
    {
        $destination=Destination::with(['category', 'kota', 'provinsi', 'kecamatan', 'galleries', 'facilities'])->where('id', $id)->where('status', 'approved')->firstOrFail();
        return view('user.show', compact('destination'));
    }
}
