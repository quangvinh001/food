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
        $categorys=Category::all();
        return view('food.create',compact('categorys'));
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
          $attributes = request()->validate(
            [
                'name' => 'required|max:100',
                'price' => 'required|min:10000|integer',
                'sale_price' => 'integer|lt:price',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required',
                'origin' => 'required',
                'standard' => 'required',
                'image' => 'required|image'
            ]
        );

        $name = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images');
            // dd($destinationPath);
            $file->move($destinationPath, $name);
        }
        $attributes['image'] = $name;
        Food::create($attributes);
        return redirect('foods')->with('success', 'Bạn đã thêm thành công');
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
