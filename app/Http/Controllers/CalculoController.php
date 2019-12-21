<?php

namespace App\Http\Controllers;
use App\Calculo;
use Illuminate\Http\Request;

class CalculoController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {   
        $this->validate($request, [
            'cep_origem' => 'required|numeric|digits_between:3,8',
            'cep_destino' => 'required|numeric|digits_between:3,8',
            'uf_origem' => 'required|regex:/^[a-zA-Z]+$/u|size:2',
            'uf_destino' => 'required|regex:/^[a-zA-Z]+$/u|size:2',
            'peso' => 'required|numeric|digits_between:2,5|min:50|max:30000',
            'altura' => 'numeric|digits_between:1,3|min:2|max:105',
            'largura' => 'numeric|digits_between:2,3|min:11|max:105',
            'comprimento' => 'numeric|digits_between:2,3|min:16|max:105',
            'contrato' => 'required|numeric|between:1.0,9.9',
            'codigo_postagem' => 'required|numeric|digits:5'
           
        ]);
        // return $request;
        $resultado = [
                        'cep_origem' => $request->cep_origem,
                        'uf_origem' => strtoupper($request->uf_origem),
                        'cep_destino' => $request->cep_destino,
                        'uf_destino' => strtoupper($request->uf_destino),
                        'peso' => $request->peso,
                        'altura' => $request->altura,
                        'largura' => $request->largura,
                        'comprimento' => $request->comprimento,
                        'versaoContrato' => (float)$request->contrato,
                        'codigo_postagem' => $request->codigo_postagem
                    ];
        return $resultado;
    }
}
