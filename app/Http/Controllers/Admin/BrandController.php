<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use File;
use Session;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchTerm = request()->get('s');
        $brands = Brand::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
            return view('admin/brand/index')
            ->with(compact('brands'));
          
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin/brand/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'brand_type' => 'required|not_in:none',
            'brand_img' => 'required|mimes:png,jpg,jpeg,gif|max:2048'

        ]);
          $fileName = null;
        if (request()->hasFile('brand_img'))
        {
            $file = request()->file('brand_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/' , $fileName);    
        }

        Brand::create([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'brand_type' => request()->get('brand_type'),
            'description' => request()->get('description'),
            'brand_img' => $fileName,
            'status' => 'DEACTIVE',
        ]);
        Session::flash('success_alert','Your Record Add Successfully');

        return redirect()->to('/admin/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $brand = Brand::find($id);
            return view('admin/brand/edit')
            ->with(compact('brand'));
        
    }

     public function update(Request $request, $id)
    {
        $brand = brand::find($id);
         $currentImage = $brand->brand_img;

            $fileName = null;
            if (request()->hasFile('brand_img')) 
            {
                $file = request()->file('brand_img');
                $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
                $file->move('./uploads/', $fileName);
            }
        $brand->update([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'brand_type' => request()->get('brand_type'),
            'description' => request()->get('description'),
            'brand_img' => ($fileName) ? $fileName : $currentImage,

        ]);

        if ($fileName)
            File::delete('./uploads/' . $currentImage);
        Session::flash('success_alert','Your Record Edit Successfully');
        return redirect()->to('/admin/brand');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $brand = brand::find($id);
            $currentImage = $brand->brand_img;
            $brand->delete();
            File::delete('./uploads/' . $currentImage);
        Session::flash('danger_alert','Your Record Has been Deleted  Successfully');       

            return redirect()->back();
    }

     public function status($id)
    {
        $brand = brand::find($id);

        $newStatus = ($brand->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $brand->update([
            'status' => $newStatus
        ]);
        Session::flash('success_alert','Status '. $newStatus.' Successfully');

        return redirect()->back();
    }

   
}
