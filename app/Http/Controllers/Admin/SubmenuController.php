<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SubmenuRequest;
use App\Models\Submenu;
use App\Models\Menu;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $submenus = Submenu::filters($request->only('menu_principal', 'nome_submenu', 'descricao'))
            ->orderBy('order')
            ->sortable('name')
            ->get();
        $mainMenus = Menu::where('is_single', false)->get();
        return view('admin/submenus/index', compact('submenus', 'mainMenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtoCategorias = Categoria::all();
        $mainMenus = Menu::where('is_single', false)->get();
        return view('admin/submenus/create', [
            'produtoCategorias' => $produtoCategorias,
            'mainMenus' => $mainMenus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SubmenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmenuRequest $request)
    {
        $submenu = Submenu::create([
            'name' => $request->name,
            'description' => $request->description,
            'menu_id' => $request->menu_id,
            'slug' => \Str::slug($request->name),
            'order' => Submenu::pluck('order')->max() + 1,
        ]);

        \DB::table('submenu_categoria')->insert([
            'submenu_id' => $submenu->id,
            'categoria_id' => $request->categoria_id
        ]);

        if ($request->subcategoria_ids) {
            $insertData = [];
            foreach ($request->subcategoria_ids as $subcategoria_id) {
                array_push($insertData, [
                    'submenu_id' => $submenu->id,
                    'subcategoria_id' => $subcategoria_id
                ]);
            }
            \DB::table('submenu_subcategoria')->insert($insertData);
        }

        return redirect()->route('admin.submenus.index')
            ->with('success', 'Um submenu foi criado com sucesso');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        $produtoCategorias = Categoria::all();
        $produtoSubcategorias = $submenu->categoria->first()
            ? $submenu->categoria->first()->Subcategoria->all()
            : [];
        $mainMenus = Menu::where('is_single', false)->get();
        return view('admin/submenus/edit', [
            'submenu' => $submenu,
            'mainMenus' => $mainMenus,
            'produtoCategorias' => $produtoCategorias,
            'produtoSubcategorias' => $produtoSubcategorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SubmenuRequest  $request
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(SubmenuRequest $request, Submenu $submenu)
    {
        DB::beginTransaction();
        try {
            $submenu->update([
                'name' => $request->name,
                'description' => $request->description,
                'menu_id' => $request->menu_id,
                'slug' => \Str::slug($request->name),
            ]);
            $submenu->categoria()->sync([$request->categoria_id]);
            $submenu->subcategorias()->sync($request->subcategoria_ids);
            DB::commit();

            return redirect()->route('admin.submenus.index')
                ->with('success', 'Um submenu foi atualizado com sucesso');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Falha na atualização');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();

        return back()->with('success', 'Um submenu foi excluído');
    }

    public function rearrange(Request $request)
    {
        $targetRowID = $request->target_row;
        $prevRowID = $request->prev_row;
        $nextRowID = $request->next_row;

        $targetRow = Submenu::find($targetRowID);
        $prevRow = Submenu::find($prevRowID);
        $nextRow = Submenu::find($nextRowID);

        if ($prevRow && $targetRow->order < $prevRow->order) {
            $submenus = Submenu::where('menu_id', '=', $request->mainmenu_id)
                ->where('order', '<=', $prevRow->order)
                ->where('order', '>', $targetRow->order)
                ->decrement('order');
            $targetRow->update(['order' => $prevRow->order]);
        } else if ($nextRow && $targetRow->order > $nextRow->order) {
            $submenus = Submenu::where('menu_id', '=', $request->mainmenu_id)
                ->where('order', '>=', $nextRow->order)
                ->where('order', '<', $targetRow->order)
                ->increment('order');

            $targetRow->update(['order' => $nextRow->order]);
        }

        return response()->json(['success' => true]);
    }
}
