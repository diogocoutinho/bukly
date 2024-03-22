<?php

namespace App\Http\Controllers\Hotel\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\Room\StoreRoomFormRequest;
use App\Http\Requests\Hotel\Room\UpdateRoomFormRequest;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room\Room;

/**
 * Controlador para gerenciar quartos de hotel.
 *
 * Este controlador é responsável por manipular as solicitações HTTP relacionadas aos quartos de hotel.
 * Ele fornece métodos para listar, criar, atualizar e excluir quartos de hotel.
 */
class RoomController extends Controller
{
    /**
     * Exibe uma lista de quartos de um hotel.
     *
     * Este método retorna uma view com a lista de quartos de um hotel paginada.
     *
     * @param int $hotelId O ID do hotel.
     * @return \Illuminate\View\View A view da lista de quartos de um hotel.
     */
    public function index(int $hotelId)
    {
        $rooms = Room::where('hotel_id', $hotelId)->paginate(10);
        $hotel = Hotel::findOrFail($hotelId);

        return view('hotel.room.index', [
            'rooms' => $rooms,
            'hotel' => $hotelId,
            'hotelName' => $hotel->name
        ]);
    }

    /**
     * Mostra o formulário para criar um novo quarto de hotel.
     *
     * Este método retorna uma view com o formulário para criar um novo quarto de hotel.
     *
     * @param int $hotelId O ID do hotel.
     * @return \Illuminate\View\View A view do formulário de criação de quarto de hotel.
     */
    public function create(int $hotelId)
    {
        return view('hotel.room.create', ['hotel' => $hotelId]);
    }

    /**
     * Armazena um novo quarto de hotel no banco de dados.
     *
     * Este método tenta criar um novo quarto de hotel com os dados da solicitação.
     * Se a criação for bem-sucedida, redireciona para a página de exibição do quarto de hotel.
     * Se ocorrer um erro, redireciona de volta para a página de criação com os erros.
     *
     * @param StoreRoomFormRequest $request A solicitação com os dados do quarto de hotel.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a página de exibição do quarto de hotel ou de volta para a página de criação com erros.
     */
    public function store(StoreRoomFormRequest $request)
    {
        try {
            $room = Room::create($request->all());
            return redirect()->route('hotels.rooms.show', ['hotel' => $room->hotel_id, 'room' => $room->id]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Exibe um quarto de hotel específico.
     *
     * Este método retorna uma view com os detalhes de um quarto de hotel específico.
     *
     * @param int $hotelId O ID do hotel.
     * @param int $roomId O ID do quarto de hotel.
     * @return \Illuminate\View\View A view do quarto de hotel.
     */
    public function show(int $hotelId, int $roomId)
    {
        return view('hotel.room.show', [
            'room' => Room::where('hotel_id', $hotelId)->findOrFail($roomId),
            'hotel' => $hotelId
        ]);
    }

    /**
     * Mostra o formulário para editar um quarto de hotel específico.
     *
     * Este método retorna uma view com o formulário para editar um quarto de hotel específico.
     *
     * @param int $hotelId O ID do hotel.
     * @param int $roomId O ID do quarto de hotel.
     * @return \Illuminate\View\View A view do formulário de edição de quarto de hotel.
     */
    public function edit(int $hotelId, int $roomId)
    {
        return view('hotel.room.edit', [
            'room' => Room::where('hotel_id', $hotelId)->findOrFail($roomId),
            'hotel' => $hotelId
        ]);
    }

    /**
     * Atualiza um quarto de hotel específico no banco de dados.
     *
     * Este método tenta atualizar um quarto de hotel com os dados da solicitação.
     * Se a atualização for bem-sucedida, redireciona para a página de exibição do quarto de hotel.
     * Se ocorrer um erro, redireciona de volta para a página de edição com os erros.
     *
     * @param UpdateRoomFormRequest $request A solicitação com os dados do quarto de hotel.
     * @param int $hotelId O ID do hotel.
     * @param int $roomId O ID do quarto de hotel.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a página de exibição do quarto de hotel ou de volta para a página de edição com erros.
     */
    public function update(UpdateRoomFormRequest $request, string $hotelId, string $roomId)
    {
        try {
            $room = Room::where('hotel_id', $hotelId)->findOrFail($roomId);
            $room->update($request->all());
            return redirect()->route('hotels.rooms.show', ['room' => $room->id, 'hotel' => $room->hotel_id]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove um quarto de hotel específico do banco de dados.
     *
     * Este método exclui um quarto de hotel específico do banco de dados.
     * Se a exclusão for bem-sucedida, redireciona para a página de lista de quartos de hotel.
     * Se ocorrer um erro, redireciona de volta para a página de exibição do quarto de hotel com os erros.
     *
     * @param int $hotelId O ID do hotel.
     * @param int $roomId O ID do quarto de hotel.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a página de lista de quartos de hotel ou de volta para a página de exibição do quarto de hotel com erros.
     */
    public function destroy(int $hotelId, int $roomId)
    {
        try {
            $room = Room::where('hotel_id', $hotelId)->findOrFail($roomId);
            $room->delete();
            return redirect()->route('hotels.rooms.index', ['hotel' => $hotelId]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
