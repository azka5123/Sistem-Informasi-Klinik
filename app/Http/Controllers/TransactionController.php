<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Tindakan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:transaction-list|transaction-create|transaction-edit|transaction-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:transaction-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:transaction-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:transaction-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::latest()->paginate(5);
        return view('transactions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::role('Pasien')->get();
        $obats = Medicine::all();
        $tindakans = Tindakan::all();
        return view('transactions.create',compact('data','obats','tindakans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pasien' => 'required',
            'apoteker' => 'required',
            'obat' => 'required',
            'tindakan' => 'required',
        ]);

        $transaction = new Transaction();
        $transaction->pasien_id = $request->input('pasien');
        $transaction->apoteker_id = Auth::id();
        $transaction->medicine_id = $request->input('obat');
        $transaction->tindakan_id = $request->input('tindakan');
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::find($id);
        $data = User::role('Pasien')->get();
        $obats = Medicine::all();
        $tindakans = Tindakan::all();
        return view('transactions.edit', compact('transaction','data','obats','tindakans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'pasien' => 'required',
            'apoteker' => 'required',
            'obat' => 'required',
            'tindakan' => 'required',
        ]);


        $transaction = Transaction::find($id);
        $transaction->pasien_id = $request->input('pasien');
        $transaction->apoteker_id = Auth::id();
        $transaction->medicine_id = $request->input('obat');
        $transaction->tindakan_id = $request->input('tindakan');

        $transaction->update();

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaction::find($id)->delete();
        return back()->with('success','Transaction deleted successfully');
    }

}
