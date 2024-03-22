<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\StoreHotelFormRequest;
use App\Http\Requests\Hotel\UpdateHotelFormRequest;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;

/**
 * Controlador para gerenciar hotéis.
 *
 * Este controlador é responsável por manipular as solicitações HTTP relacionadas aos hotéis.
 * Ele fornece métodos para listar, criar, atualizar e excluir hotéis.
 */
class HotelController extends Controller
{
    /**
     * Exibe uma lista de hotéis.
     *
     * Este método retorna uma view com a lista de hotéis paginada.
     *
     * @return \Illuminate\View\View A view da lista de hotéis.
     */
    public function index()
    {
        return view('hotel.index', [
            'hotels' => Hotel::paginate(10)
        ]);
    }

    /**
     * Mostra o formulário para criar um novo hotel.
     *
     * Este método retorna uma view com o formulário para criar um novo hotel.
     *
     * @return \Illuminate\View\View A view do formulário de criação de hotel.
     */
    public function create()
    {
        return view('hotel.create');
    }

    /**
     * Armazena um novo hotel no banco de dados.
     *
     * Este método tenta criar um novo hotel com os dados da solicitação.
     * Se a criação for bem-sucedida, redireciona para a página de exibição do hotel.
     * Se ocorrer um erro, redireciona de volta para a página de criação com os erros.
     *
     * @param StoreHotelFormRequest $request A solicitação com os dados do hotel.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a página de exibição do hotel ou de volta para a página de criação com erros.
     */
    public function store(StoreHotelFormRequest $request)
    {
        try {
            $hotel = Hotel::create($request->all());
            return redirect()->route('hotels.show', $hotel->id);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Exibe um hotel específico.
     *
     * Este método retorna uma view com os detalhes de um hotel específico.
     *
     * @param string $id O ID do hotel.
     * @return \Illuminate\View\View A view do hotel.
     */
    public function show(string $id)
    {
        return view('hotel.show', [
            'hotel' => Hotel::findOrFail($id)
        ]);
    }

    /**
     * Mostra o formulário para editar um hotel específico.
     *
     * Este método retorna uma view com o formulário para editar um hotel específico.
     *
     * @param string $id O ID do hotel.
     * @return \Illuminate\View\View A view do formulário de edição de hotel.
     */
    public function edit(string $id)
    {
        return view('hotel.edit', [
            'hotel' => Hotel::findOrFail($id)
        ]);
    }

    /**
     * Atualiza um hotel específico no banco de dados.
     *
     * Este método tenta atualizar um hotel específico com os dados da solicitação.
     * Se a atualização for bem-sucedida, redireciona para a página de exibição do hotel.
     * Se ocorrer um erro, redireciona de volta para a página de edição com os erros.
     *
     * @param UpdateHotelFormRequest $request A solicitação com os dados do hotel.
     * @param string $id O ID do hotel.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a página de exibição do hotel ou de volta para a página de edição com erros.
     */
    public function update(UpdateHotelFormRequest $request, string $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->update($request->all());
            return redirect()->route('hotels.show', $hotel->id);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove um hotel específico do banco de dados.
     *
     * Este método tenta excluir um hotel específico do banco de dados.
     * Se a exclusão for bem-sucedida, redireciona para a página de lista de hotéis.
     * Se ocorrer um erro, redireciona de volta para a página de exibição do hotel com os erros.
     *
     * @param string $id O ID do hotel.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a página de lista de hotéis ou de volta para a página de exibição do hotel com erros.
     */
    public function destroy(string $id)
    {
        try {
            Hotel::findOrFail($id)->delete();
            return redirect()->route('hotels.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
