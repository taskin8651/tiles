<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTestimoniRequest;
use App\Http\Requests\StoreTestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use App\Models\Testimoni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestimoniController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('testimoni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonis = Testimoni::all();

        return view('admin.testimonis.index', compact('testimonis'));
    }

    public function create()
    {
        abort_if(Gate::denies('testimoni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonis.create');
    }

    public function store(StoreTestimoniRequest $request)
    {
        $testimoni = Testimoni::create($request->all());

        return redirect()->route('admin.testimonis.index');
    }

    public function edit(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonis.edit', compact('testimoni'));
    }

    public function update(UpdateTestimoniRequest $request, Testimoni $testimoni)
    {
        $testimoni->update($request->all());

        return redirect()->route('admin.testimonis.index');
    }

    public function show(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonis.show', compact('testimoni'));
    }

    public function destroy(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimoni->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestimoniRequest $request)
    {
        $testimonis = Testimoni::find(request('ids'));

        foreach ($testimonis as $testimoni) {
            $testimoni->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

     public function storeMedia(Request $request)
    {
        // validation
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:20480', // 20MB max
        ]);

        $model = new Testimoni();
        $model->id = $request->input('model_id', 0); // optional
        $model->exists = true;

        $media = $model->addMediaFromRequest('file')->toMediaCollection('image');

        return response()->json([
            'name' => $media->file_name,
            'url'  => $media->getUrl(),
        ]);
    }
}
