<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Variation;
use File;
use Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $searchTerm = request()->get('s');
        $products = Product::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
        return view('admin/product/index')
        ->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variations = Variation::get();
        // print_r($variations); exit;

        return view('admin/product/create')->with(compact('variations'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

         $fileName = null;
        if (request()->hasFile('mobile_img'))
        {
            // $file = request()->file('mobile_img');
            // $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            // $file->move('./uploads/' , $fileName);    
             $mobile_img       = $request->file('mobile_img');
        $filename    =  md5($mobile_img->getClientOriginalName()) . time() . "." . $mobile_img->getClientOriginalExtension();

        //Fullsize
        $mobile_img->move(public_path().'/uploads/',$filename);

        $image_resize = \Image::make(public_path().'/uploads/'.$filename);
        $image_resize->resize(323, 263);
        $image_resize->save(public_path('/uploads/' .$filename));

        }


        Product::create([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),

            'designation' => request()->get('designation'),
            'availability' => request()->get('availability'),
            'edition_number' => request()->get('edition_number'),
            'battery_mah' => request()->get('battery_mah'),
            'camera' => request()->get('camera'),
            'price' => request()->get('price'),

            'variation' => request()->get('variation'),
            'mobile_img' => $filename,
            'description' => request()->get('description'),
            'status' => 'DEACTIVE',
        ]);
            Session::flash('success_alert','Your Record Add Successfully');
        return redirect()->to('/admin/product');
    }

    /**

     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


     public function edit($id)
    {
        $variations = Variation::get();

          $product = Product::find($id);
            return view('admin/product/edit')
            ->with(compact('product', 'variations'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
       $product = Product::find($id);
            return view('admin/product/view')
            ->with(compact('product'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
         $currentImage = $product->mobile_img;

            $fileName = null;
            if (request()->hasFile('mobile_img')) 
            {
                $file = request()->file('mobile_img');
                $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
                $file->move('./uploads/', $fileName);
            }
        $product->update([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),

            'designation' => request()->get('designation'),
            'availability' => request()->get('availability'),
            'edition_number' => request()->get('edition_number'),
             'battery_mah' => request()->get('battery_mah'),
            'camera' => request()->get('camera'),
            'price' => request()->get('price'),
            
            'variation' => request()->get('variation'),
            'mobile_img' => ($fileName) ? $fileName : $currentImage,
            'description' => request()->get('description'), 
        ]);

        if ($fileName)
            File::delete('./uploads/' . $currentImage);
             Session::flash('success_alert','Your Record Edit Successfully');
        return redirect()->to('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
            $currentImage = $product->mobile_img;
            $product->delete();
            File::delete('./uploads/' . $currentImage);
            Session::flash('danger_alert','Your Record Has been Deleted  Successfully'); 
            return redirect()->back();
    }

    public function status($id)
    {
        $product = Product::find($id);

        $newStatus = ($product->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $product->update([
            'status' => $newStatus
        ]);
        Session::flash('success_alert','Status '. $newStatus.' Successfully');
        return redirect()->back();
    }
}
