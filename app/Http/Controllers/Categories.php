<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class Categories extends Controller
{
    /*
     * index = visualiza todas as categorias
     * create = exibe o form de criar categoria
     * edit = exibe o form de editar
     * store = salva a categoria
     * update = atualiza a categoria no db
     * delete = deleta a categoria
     */

    /**
     * exibe a lista de todas as categorias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * exibe o form de criar categoria
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view( 'pages.categories.create' );
    }

    /**
     * Exibe o form de editar categoria
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id )
    {
        $category = Category::find( $id );
        return view('pages.categories.update', [
            'category' => $category
        ]);
    }

    /**
     * Cria os dados da categoria
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request )
    {
        if( $request->all() ) {
            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');

            if( $category->save() ) {
                session()->flash('success', 'Categoria criada com sucesso!');
                return redirect('panel/categories/update/'. $category->id);
            } else {
                session()->flash('error', 'Não foi possível criar a categoria');
                return redirect('panel/categories/new');
            }
        }
    }

    /**
     * Salva os dados da categoria
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id )
    {
        if( $request->all() ) {
            $category = Category::find( $id );
            $category->name = $request->input('name');
            $category->description = $request->input('description');

            if( $category->save() ) {
                session()->flash('success', 'Categoria salvada com sucesso!');
                return redirect('panel/categories/update/'. $category->id);
            } else {
                session()->flash('error', 'Não foi possível salvar a categoria');
                return redirect('panel/categories/update/'. $category->id);
            }
        }
    }

    /**
     * Deleta a categoria
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id )
    {
        if( Category::find( $id )->delete() ) {
            session()->flash('success', 'Categoria deletada com sucesso!');
            return redirect('panel/categories');
        }
    }
}
