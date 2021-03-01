<?php

namespace App\Http\Controllers;

use App\Models\RoomSymbol;
use App\Models\Room;
use App\Models\Symbol;
use Illuminate\Http\Request;

class RoomSymbolController extends Controller
{
   public function create(Request $request){
        $error='Error al crear el simbolo en la sala: ';
        if (is_null($request->id_room) || is_null($request->id_symbol)
        || is_null($request->x) || is_null($request->y)){
            return response()->json($error.'Verifica los datos', 500);
        }

        $room=Room::find($request->id_room);
        if (is_null($room)){
            return response()->json($error.'No existe la sala', 400);
        }

        $symbol=Symbol::find($request->id_symbol);
        if (is_null($symbol)){
            return response()->json($error.'No existe el simbolo', 400);
        }
        $data=[
            'id_room'=>$request->id_room,
            'id_symbol'=>$request->id_symbol,
            'text'=>(is_null($request->text))? "" : $request->text,
            'x'=>$request->x,
            'y'=>$request->y,
        ];
        $room_symbol=RoomSymbol::create($data);
        return response()->json($room_symbol, 200);

   }

   public function get_room_symbols(Request $request){
    $error='Error al obtener los simbolos: ';
    if (is_null($request->id_room)){
        return response()->json($error.'Verifica los datos', 500);
    }

    $room_symbols=RoomSymbol::where('id_room',$request->id_room)->get();
    $data=[
        'symbols'=>$room_symbols
    ];
    return response()->json($data, 200);

}

}
