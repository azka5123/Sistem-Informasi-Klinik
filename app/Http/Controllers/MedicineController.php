<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:obat-list|obat-create|obat-edit|obat-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:obat-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:obat-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:obat-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Medicine::latest()->paginate(5);
        return view('medicines.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'name' => 'required',
        ]);

        $input = $request->all();

        Medicine::create($input);

        return redirect()->route('medicines.index')->with('success', 'Medicine created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kode' => 'required',
            'name' => 'required',
        ]);

        $input = $request->all();

        $medicine = Medicine::find($id);
        $medicine->update($input);

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Medicine::find($id)->delete();
        return back()->with('success','Medicine deleted successfully');
    }
}
