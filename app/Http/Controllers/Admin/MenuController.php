<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Categoria;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::with('submenus')
            ->search($request->procurar)
            ->orderBy('order')
            ->sortable('name')
            ->get();
        return view('admin/menus/index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtoCategorias = Categoria::all();
        return view('admin/menus/create', [
            'produtoCategorias' => $produtoCategorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\MenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $mainMenu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => \Str::slug($request->name),
            'is_single' => $request->is_single ? true : false,
            'order' => Menu::pluck('order')->max() + 1,
        ]);

        if ($request->is_single) {
            \DB::table('menu_categoria')->insert([
                'menu_id' => $mainMenu->id,
                'categoria_id' => $request->categoria_id
            ]);

            if ($request->subcategoria_ids) {
                $insertData = [];
                foreach ($request->subcategoria_ids as $subcategoria_id) {
                    array_push($insertData, [
                        'menu_id' => $mainMenu->id,
                        'subcategoria_id' => $subcategoria_id
                    ]);
                }
                \DB::table('menu_subcategoria')->insert($insertData);
            }
            /*else {
                \DB::table('menu_categoria')->insert([
                    'menu_id' => $mainMenu->id,
                    'categoria_id' => $request->categoria_id
                ]);
            }*/
        }

        return redirect()->route('admin.menus.index')
            ->with('success', 'Um menu foi criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $produtoCategorias = Categoria::all();
        $produtoSubcategorias = $menu->categoria->first() ? $menu->categoria->first()->Subcategoria->all() : [];
       
        return view('admin/menus/edit', [
            'menu' => $menu,
            'produtoCategorias' => $produtoCategorias,
            'produtoSubcategorias' => $produtoSubcategorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\MenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        DB::beginTransaction();
        try {
            $menu->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => \Str::slug($request->name),
                'is_single' => $request->is_single ? true : false,
            ]);
            
            if ($request->is_single) {
                $menu->categoria()->sync([$request->categoria_id]);
                $menu->subcategorias()->sync($request->subcategoria_ids);
            } else {
                $menu->categoria()->detach(); 
                $menu->subcategorias()->detach();
            }

            DB::commit();

            return redirect()->route('admin.menus.index')
                ->with('success', 'Um menu foi atualizado com sucesso');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Falha na atualização');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()->with('success', 'Um menu foi excluído');
    }

    public function rearrange(Request $request)
    {
        $targetRowID = $request->target_row;
        $prevRowID = $request->prev_row;
        $nextRowID = $request->next_row;

        $targetRow = Menu::find($targetRowID);
        $prevRow = Menu::find($prevRowID);
        $nextRow = Menu::find($nextRowID);

        if ($prevRow && $targetRow->order < $prevRow->order) {
            $menus = Menu::where('order', '<=', $prevRow->order)
                ->where('order', '>', $targetRow->order)
                ->decrement('order');
            $targetRow->update(['order' => $prevRow->order]);
        } else if ($nextRow && $targetRow->order > $nextRow->order) {
            $menus = Menu::where('order', '>=', $nextRow->order)
                ->where('order', '<', $targetRow->order)
                ->increment('order');

            $targetRow->update(['order' => $nextRow->order]);
        }

        return response()->json(['success' => true]);
    }
}
