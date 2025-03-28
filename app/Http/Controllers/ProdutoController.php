<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{

    /**
     * Exibir listagem de produtos.
     */
    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->get();
        return view('/index', ['produtos' => $produtos]);
    }




    /**
     * Salvar um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        // Substituir vírgula por ponto no valor
        $valor = str_replace(',', '.', $request->input('valor'));

        // Criar produto com valor formatado corretamente
        Produto::create([
            'nome' => $request->input('nome'),
            'categoria' => $request->input('categoria'),
            'validade' => $request->input('validade'),
            'valor' => $valor,
        ]);

        return redirect()->route('index');
    }




    /**
     * Editar produtos existente
     */
    public function edit(string $id)
    {
        // Busca o produto pelo ID
        $produtos = Produto::find($id);

        // Verifica se o produto existe
        if ($produtos) {
            // Redireciona para a view de edição com os dados do produto
            return view('edit', compact('produtos'));
        }

        // Redireciona para a página inicial caso o ID não exista
        return redirect()->route('index')->with('error', 'Produto não encontrado.');
    }




    /**
     * Atualiza os dados de um produto existente no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Substituir vírgula por ponto no valor
        $valor = str_replace(',', '.', $request->input('valor'));

        // Criação do array de dados para atualização
        $data = [
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'validade' => $request->validade,
            'valor' => $valor,
        ];

        // Busca o produto pelo ID
        $produtoS = Produto::find($id);

        if (!$produtoS) {
            return redirect()->route('index')->with('error', 'Produto não encontrado.');
        }

        // Atualiza o produto
        $produtoS->update($data);

        return redirect()->route('index');
    }





    /**
     * Deletar um produto do banco de dados.
     */
    public function destroy($id)
    {
        // Busca o produto pelo ID
        $produto = Produto::find($id);

        if ($produto) {
            // Deleta o produto
            $produto->delete();
            return redirect()->route('index');
        }

        // Caso o produto não seja encontrado
        return redirect()->route('index')->with('error', 'Produto não encontrado.');
    }
}
