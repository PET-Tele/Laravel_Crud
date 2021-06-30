<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    /**
     * Requer autenticação para EntradaController.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = DB::table('entradas')->Paginate(5);
        return view('index', ['entradas' => $entradas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->get('nome');
        $descricao = $request->get('descricao');
        $autor = $request->get('autor');
        $entradas = DB::insert('insert into entradas(nome, descricao, autor) value(?,?,?)', [$nome, $descricao, $autor]);
        if($entradas){
            $red = redirect('entradas')->with('success', 'Os dados foram adicionados com sucesso.');
        } else {
            $red = redirect('entradas/create')->with('danger', 'falha em adicionar os dados, tente novamente.');
        }
        return $red;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entradas = DB::select('select * from entradas where id=?', [$id]);
        return view('show', ['entradas' => $entradas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entradas = DB::select('select * from entradas where id=?', [$id]);
        return view('edit', ['entradas' => $entradas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nome = $request->get('nome');
        $descricao = $request->get('descricao');
        $autor = $request->get('autor');
        $entradas = DB::update('update entradas set nome=?, descricao=?, autor=? where id=?', [$nome, $descricao, $autor, $id]);
        if($entradas){
            $red = redirect('entradas')->with('success', 'Os dados foram atualizados com sucesso.');
        } else {
            $red = redirect('entradas/'.$id.'/edit/')->with('danger', 'Falha em atualizar os dados, tente novamente.');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entradas = DB::delete('delete from entradas where id=?', [$id]);
        $red = redirect('entradas');
        return $red;
    }

    /**
     * Search for a specific entry in the storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $entradas = DB::table('entradas')->where('nome', 'like', '%'.$search.'%')->paginate(5);
        return view('index', ['entradas' => $entradas]);
    }
}
