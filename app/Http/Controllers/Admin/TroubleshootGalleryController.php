<?php

namespace App\Http\Controllers\Admin;

use App\TroubleshootArticle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

use App\Http\Requests\Admin\TroubleshootGalleryRequest;
use App\User;
use App\TroubleshootCategories;
use App\TroubleshootArticleGallery;

class TroubleshootGalleryController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = TroubleshootArticleGallery::with(['article']);

            return Datatables::of($query)
                ->addcolumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <form action="'. route('troubleshoot-gallery-article.destroy', $item->id) .'" method="POST">
                                        ' . method_field('delete') . csrf_field() .'    
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })
                ->editColumn('photos', function($item){
                    return $item->photos ? '<img src="'. Storage::url($item->photos) .'" style="max-height: 80px;" />' : '';
                })
                ->rawColumns(['action','photos'])
                ->make();
        }

        return view('pages.admin.troubleshoot-article-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = TroubleshootArticle::all();

        return view('pages.admin.troubleshoot-article-gallery.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TroubleshootGalleryRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/article','public');
        

        TroubleshootArticleGallery::create($data);

        return redirect()->route('troubleshoot-gallery-article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(TroubleshootGalleryRequest $request, $id)
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
        $item = TroubleshootArticleGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('troubleshoot-gallery-article.index');
    }
}
