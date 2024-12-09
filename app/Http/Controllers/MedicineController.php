<?php

namespace App\Http\Controllers\Api;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return response()->json($medicines);
    }

    public function show(Medicine $medicine)
    {
        return response()->json($medicine);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'seller' => 'required',
        'image' => 'required|image',
        'brand_option' => 'required',
        'brand' => 'required',
        'name' => 'required',
        'brief' => 'nullable',
        'unit_of_measurement' => 'required',
        'unit' => 'required',
        'weight' => 'required|numeric',
        'weight_in' => 'required',
        'tax_category' => 'required',
        'mrp_b2b' => 'required|numeric',
        'mrp_b2c' => 'required|numeric',
        'mrp_b2d' => 'required|numeric',
        'b2c_price' => 'required|numeric',
        'b2b_price' => 'required|numeric',
        'b2b2c_price' => 'required|numeric',
        'collection' => 'nullable',
        'description' => 'nullable',
        'features' => 'nullable',
        'benefits' => 'nullable',
        'ingredients' => 'nullable',
        'additional_information' => 'nullable',
        'inventory_management' => 'required|boolean',
        'inventory_allow_out_of_stock' => 'required|boolean',
        'inventory_quantity' => 'required|integer',
        'inventory_low_stock_quantity' => 'required|integer',
        'option_and_variants' => 'nullable',
    ]);

    $medicine = Medicine::create($validatedData);

    // Handle image upload if needed
    if ($request->hasFile('image')) {
        $medicine->image = $request->file('image')->store('public/medicines');
        $medicine->save();
    }

    return response()->json($medicine, 201);
}

public function update(Request $request, Medicine $medicine)
{
    $validatedData = $request->validate([
        'seller' => 'required',
        'image' => 'nullable|image', // Optional image update
        'brand_option' => 'required',
        'brand' => 'required',
        'name' => 'required',
        'brief' => 'nullable',
        'unit_of_measurement' => 'required',
        'unit' => 'required',
        'weight' => 'required|numeric',
        'weight_in' => 'required',
        'tax_category' => 'required',
        'mrp_b2b' => 'required|numeric',
        'mrp_b2c' => 'required|numeric',
        'mrp_b2d' => 'required|numeric',
        'b2c_price' => 'required|numeric',
        'b2b_price' => 'required|numeric',
        'b2b2c_price' => 'required|numeric',
        'collection' => 'nullable',
        'description' => 'nullable',
        'features' => 'nullable',
        'benefits' => 'nullable',
        'ingredients' => 'nullable',
        'additional_information' => 'nullable',
        'inventory_management' => 'required|boolean',
        'inventory_allow_out_of_stock' => 'required|boolean',
        'inventory_quantity' => 'required|integer',
        'inventory_low_stock_quantity' => 'required|integer',
        'option_and_variants' => 'nullable',
    ]);

    $medicine->update($validatedData);

    if ($request->hasFile('image')) {
        $medicine->image = $request->file('image')->store('public/medicines');
        $medicine->save();
    }

    return response()->json($medicine);
}

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return response()->json(['message' => 'Medicine deleted successfully']);
    }

    public function categoryWise($categoryId)
    {
        $medicines = Medicine::where('category_id', $categoryId)->get();
        return response()->json($medicines);
    }

    public function brandWise($brandId)
    {
        $medicines = Medicine::where('brand_id', $brandId)->get();
        return response()->json($medicines);
    }
}