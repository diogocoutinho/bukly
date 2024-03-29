<?php

namespace App\Http\Controllers\Api\Hotel\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\Room\StoreRoomFormRequest;
use App\Http\Requests\Hotel\Room\UpdateRoomFormRequest;
use App\Http\Resources\Hotel\Room\RoomResource;
use App\Models\Hotel\Room\Room;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Rooms",
 *     description="API Endpoints of Rooms"
 * )
 */
class RoomController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/hotels/{hotel}/rooms",
     *     tags={"Rooms"},
     *     summary="Get list of rooms",
     *     description="Returns list of rooms",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoomResource")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="An error occurred",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function index()
    {
        try {
            $rooms = Room::all();
            return RoomResource::collection($rooms);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/hotels/{hotel}/rooms",
     *     tags={"Rooms"},
     *     summary="Create new room",
     *     description="Create new room and return room data",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreRoomFormRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Room created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/RoomResource")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="An error occurred",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function store(StoreRoomFormRequest $request)
    {
        try {
            $room = Room::create($request->all());
            return new RoomResource($room);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/hotels/{hotel}/rooms/{room}",
     *     tags={"Rooms"},
     *     summary="Get room details",
     *     description="Returns room details",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoomResource")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="An error occurred",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        try {
            $room = Room::findOrFail($id);
            return new RoomResource($room);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/hotels/{hotel}/rooms/{room}",
     *     tags={"Rooms"},
     *     summary="Update room",
     *     description="Update room and return room data",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateRoomFormRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Room updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/RoomResource")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="An error occurred",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function update(UpdateRoomFormRequest $request, string $id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->update($request->all());
            return new RoomResource($room);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/hotels/{hotel}/rooms/{room}",
     *     tags={"Rooms"},
     *     summary="Delete room",
     *     description="Delete room",
     *     @OA\Response(
     *         response=200,
     *         description="Room deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Room deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="An error occurred",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->delete();
            return response()->json(['message' => 'Room deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}
