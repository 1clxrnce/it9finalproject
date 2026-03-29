<?php

namespace App\Http\Controllers;

use App\Models\ComputerPart;
use Illuminate\Http\Request;

class ComputerPartController extends Controller
{
    // Display all computer parts (READ)
    public function index()
    {
        $parts = ComputerPart::all();
        return view('computer_parts.index', compact('parts'));
    }

    // Show form to create new part (CREATE - form)
    public function create()
    {
        return view('computer_parts.create');
    }

    // Store new computer part (CREATE - save)
    public function store(Request $request)
    {
        $request->validate([
            'part_name' => 'required',
            'part_type' => 'required',
            'manufacturer' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        ComputerPart::create($request->all());
        return redirect()->route('computer-parts.index')->with('success', 'Computer part added successfully!');
    }

    // Show form to edit existing part (UPDATE - form)
    public function edit($id)
    {
        $part = ComputerPart::findOrFail($id);
        return view('computer_parts.edit', compact('part'));
    }

    // Update existing computer part (UPDATE - save)
    public function update(Request $request, $id)
    {
        $request->validate([
            'part_name' => 'required',
            'part_type' => 'required',
            'manufacturer' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        $part = ComputerPart::findOrFail($id);
        $part->update($request->all());
        return redirect()->route('computer-parts.index')->with('success', 'Computer part updated successfully!');
    }

    // Delete computer part (DELETE)
    public function destroy($id)
    {
        $part = ComputerPart::findOrFail($id);
        $part->delete();
        return redirect()->route('computer-parts.index')->with('success', 'Computer part deleted successfully!');
    }
}
