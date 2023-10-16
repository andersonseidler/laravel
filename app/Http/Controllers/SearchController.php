<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Company;

class SearchController extends Controller
{
    //
    protected $model;

    public function __construct(Company $comp)
    {
        $this->model = $comp;
    }

    public function index(Request $request){

        //dd($request);
        $search = $request->search;
        dd($search);
        $companies = $this->model->getBusca(estabelecimento: $request->estabelecimento, localizacao: $request->localizacao ?? '');
        
        $title = 'Excluir!';
        $text = "Deseja excluir essa categoria?";
        confirmDelete($title, $text);
        //dd($cats);
        return view('category.index', compact('companies'));
    }


}
