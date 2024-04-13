<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LojaSubmenuRequest;
use App\Models\LojaSubmenu;
use App\Models\LojaMenu;
use App\Models\LojaCategoria;
use Illuminate\Support\Facades\DB;

class LojaSubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $submenus = LojaSubmenu::filters($request->only('menu_principal', 'nome_submenu', 'descricao'))
            ->orderBy('order')
            ->sortable('name')
            ->get();
        $mainMenus = LojaMenu::where('is_single', false)->get();
        return view('admin/lojasubmenus/index', compact('submenus', 'mainMenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtoCategorias = LojaCategoria::all();
        $mainMenus = LojaMenu::where('is_single', false)->get();
        return view('admin/lojasubmenus/create', [
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
    public function store(LojaSubmenuRequest $request)
    {       
        $submenu = LojaSubmenu::create([
            'name' => $request->name,
            'description' => $request->description,
            'menu_id' => $request->menu_id,
            'slug' => \Str::slug($request->name),
            'order' => LojaSubmenu::pluck('order')->max() + 1,
        ]);

        \DB::table('lojasubmenu_lojacategoria')->insert([
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
            \DB::table('lojasubmenu_lojasubcategoria')->insert($insertData);
        }

        // return redirect()->route('admin.lojasubmenus.index')
        //     ->with('success', 'Um submenu foi criado com sucesso');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(LojaSubmenu $submenu)
    {
        $produtoCategorias = LojaCategoria::all();
        $produtoSubcategorias = $submenu->categoria->first()
            ? $submenu->categoria->first()->Subcategoria->all()
            : [];
        $mainMenus = LojaMenu::where('is_single', false)->get();
        return view('admin/lojasubmenus/edit', [
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
    public function update(LojaSubmenuRequest $request, LojaSubmenu $submenu)
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

            return redirect()->route('admin.lojasubmenus.index')
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
    public function destroy(LojaSubmenu $submenu)
    {
        $submenu->delete();

        return back()->with('success', 'Um submenu foi excluído');
    }

    public function rearrange(Request $request)
    {
        $targetRowID = $request->target_row;
        $prevRowID = $request->prev_row;
        $nextRowID = $request->next_row;

        $targetRow = LojaSubmenu::find($targetRowID);
        $prevRow = LojaSubmenu::find($prevRowID);
        $nextRow = LojaSubmenu::find($nextRowID);

        if ($prevRow && $targetRow->order < $prevRow->order) {
            $submenus = LojaSubmenu::where('menu_id', '=', $request->mainmenu_id)
                ->where('order', '<=', $prevRow->order)
                ->where('order', '>', $targetRow->order)
                ->decrement('order');
            $targetRow->update(['order' => $prevRow->order]);
        } else if ($nextRow && $targetRow->order > $nextRow->order) {
            $submenus = LojaSubmenu::where('menu_id', '=', $request->mainmenu_id)
                ->where('order', '>=', $nextRow->order)
                ->where('order', '<', $targetRow->order)
                ->increment('order');

            $targetRow->update(['order' => $nextRow->order]);
        }

        return response()->json(['success' => true]);
    }
}
