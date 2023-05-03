<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
class OptionController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('option/index', compact('options'));
    }
    public function show($id)
    {
        $option = Option::find($id);
        return response()->json($option);
    }
    public function store(Request $request)
    {
        $option = Option::create($request->all());
        return response()->json($option);
    }
    public function update(Request $request, $id)
    {
        $option = Option::find($id);
        $option->name = $request->input('name');
        $option->save();
        return response()->json($option);
    }
    public function destroy($id)
    {
        $option = Option::find($id);
        $option->delete();
        return response()->json('Option removed successfully');
    }
}
