<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $foods=Food::all();
        // $categorys=Category::all();

        // $hoaQua = Food::where('category_id', 1)->get();
        // $huuCo = Food::where('category_id', 2)->get();
        // $thucPhamKho = Food::where('category_id', 3)->get();

        // return view('page.sanpham',compact('foods','categorys','hoaQua','huuCo','thucPhamKho'));  
        $food = Food::all();
        // dd($food);
        // return view('food.home_food', compact('food'));
        return view('food.food', ['food' => Food::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //
          $request->validate([
            'name'=>'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'price' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
        ]);

        [
            'name.required' => 'Ban chua nhap thong tin san pham',
            'image_file.minmes' => 'Chi chap nhan anh voi dung kich thuoc',
            'image_file.max' => 'Anh gioi han dung luong khoang 10000',
            'price.required' => 'Chua nhap gia',
            'sale_price.required' => 'Chua nhap gia khuyen mai',
            'description.required' => 'Chua nhap mo ta',
        ]; //kiểm tra file tồn tại
        $name='';
        if($request->hasfile('image_file'))
        {
            $file = $request->file('image_file');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('imgs'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
        }
            $food=new Food();
            $food->name=$request->input('name');
            $food->gia=$request->input('price');
            $food->gia_km=$request->input('sale_price');
            $food->category_id=$request->input('category_id');
            $food->image=$name;
            $food->save();
            return redirect('foods')->with('success','Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::all();
        $food = Food::find($id);
        // dd($car);
        return view('food.food-detail', ['food' => $food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
