<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Http\Requests\AdRequest;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ads.index')->only('index');
        $this->middleware('can:admin.ads.create')->only('create', 'store');
        $this->middleware('can:admin.ads.edit')->only('edit', 'update');
        $this->middleware('can:admin.ads.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();

        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $ad = Ad::create($request->all());

        //almacenamos la imagen en el storage y la ruta en la variable $url
        $url = Storage::put('ads', $request->file('image'));

        //creamos la relacion en la tabla images
        $ad->image()->create([
            'url' => $url
        ]);

        return redirect()->route('admin.ads.index')
                ->with('info', 'La publicidad se creo correctamente.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdRequest $request, Ad $ad)
    {
        $ad->update($request->all());

        if($request->file('image')){

            //almacenamos la imagen en el storage y la ruta en la variable $url
            $url = Storage::put('ads', $request->file('image'));

            if ($ad->image) {
                
                Storage::delete($ad->image->url);
                
                $ad->image()->update([
                    'url' => $url
                ]);
            } else {
                $ad->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.ads.index')->with('info', 'La publicidad se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        if ($ad->image) {
            Storage::delete($ad->image->url);
        }

        $ad->delete();

        return redirect()->route('admin.ads.index')->with('info', 'La publicidad se eliminó correctamente.');
    }
}
