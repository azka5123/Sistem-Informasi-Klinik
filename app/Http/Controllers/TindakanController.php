<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:tindakan-list|tindakan-create|tindakan-edit|tindakan-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:tindakan-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:tindakan-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:tindakan-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tindakan::latest()->paginate(5);
        return view('tindakans.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tindakans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
        ]);

        $input = $request->all();

        Tindakan::create($input);

        return redirect()->route('tindakans.index')->with('success', 'Tindakan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tindakan = Tindakan::find($id);
        return view('tindakans.show', compact('tindakan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tindakan = Tindakan::find($id);
        return view('tindakans.edit', compact('tindakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
        ]);

        $input = $request->all();

        $tindakan = Tindakan::find($id);
        $tindakan->update($input);

        return redirect()->route('tindakans.index')->with('success', 'Tindakan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tindakan::find($id)->delete();
        return back()->with('success','Tindakan deleted successfully');
    }
}
