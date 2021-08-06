<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

use App\Http\Requests\Admin\ArticleRequest;
use App\User;
use App\TroubleshootArticle;
use App\TroubleshootCategories;

class TroubleshootController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = TroubleshootArticle::with(['user','category']);

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
                                    <a class="dropdown-item" href="' . route('troubleshoot-article.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="'. route('troubleshoot-article.destroy', $item->id) .'" method="POST">
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
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.troubleshoot-article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = TroubleshootCategories::all();

        return view('pages.admin.troubleshoot-article.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        
        
        TroubleshootArticle::create($data);

        return redirect()->route('troubleshoot-article.index');
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
        $item = TroubleshootArticle::findOrFail($id);
        $users = User::all();
        $categories = TroubleshootCategories::all();

        return view('pages.admin.troubleshoot-article.edit', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();

        $item = TroubleshootArticle::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('troubleshoot-article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TroubleshootArticle::findOrFail($id);
        $item->delete();

        return redirect()->route('troubleshoot-article.index');
    }
}
