<?php

namespace App\Http\Controllers;
use App\Models\Presidents;
use Illuminate\Http\Request;

class PresidentsController extends Controller
{
    //
    public function index()
    {
        $presidents = Presidents::all();
        return view('presidents.index', compact('presidents'));
    }

    public function create()
    {
        return view('presidents.create');
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'n_telephone' => 'required',
            'email' => 'required|email',
            'adress' => 'required',
        ]);

        Presidents::create($validatedData);

       return redirect()->route("presidents.index")->with('success', "Presidents créée avec sucèss");

    }

    // public function edit(Presidents $presidents)
    // {
    //     $presidents = Presidents::all();
    //     return view('presidents.edit',compact('presidents'));
    // }
    public function edit($id)
{
    $presidents = Presidents::find($id);

    return view('presidents.edit', compact('presidents'));
}

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:25',
            'n_telephone' => 'required',
            'email' => 'required|email',
            'adress' => 'required',
        ]);

        // $presidents = Presidents::findOrFail($id);
        // $presidents->update($request->all());
        Presidents::where('id',$id)->update($validatedData);

        return redirect()->route('presidents.index')->with('success', 'President updated successfully.');
    }

    public function destroy(Presidents $presidents)
    {
        $result = $presidents->delete();
        if ($result) {
           
            return redirect()->route('presidents.index')->with('success',"Presidents supprimé avec sucèss");
        }else{
            return redirect()->route('presidents.index')->with('error',"Erreur lors de suppression de la Presidents");
        }
    }


}

