<?php

namespace App\Http\Controllers;

use App\Models\Arrow;
use App\Models\Room;
use App\Models\RoomSymbol;
use App\Models\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create(Request $request){
        $error='Error al crear sala: ';
        if (is_null($request->name) || is_null($request->id_user) || is_null($request->link)){
            return response()->json($error.'Verifica los datos', 500);
        }

        $user=User::find($request->id_user);
        if (is_null($user)){
            return response()->json($error.'No existe el usuario', 500);
        }

        $room=Room::where('link',$request->link)->first();
        if (!is_null($room)){
            return response()->json($error.'Sala existente', 400);
        }

        $datos=[
            'link'=>$request->link,
            'name'=>$request->name,
            'id_user'=>$request->id_user,
            'password'=>''
        ];

        if (!is_null($request->password)){
            $datos['password']=$request->password;
        }

        $room=Room::create($datos);
        return response()->json($room, 200);
    }

    public function get(Request $request){
        $error='Error al encontrar la sala: ';
        if (is_null($request->link)){
            return response()->json($error.'Verifica los datos', 500);
        }
        $room=Room::where('name',$request->link)->first();
        if (is_null($room)){
            return response()->json($error.'Sala inexistente', 400);
        }
        return response()->json($room, 200);
    }

    
    public function all(Request $request){
        $error='Error al encontrar el usuario: ';
        if (is_null($request->id_user)){
            return response()->json($error.'Verifica los datos', 500);
        }
        $rooms=Room::where('id_user',$request->id_user)->get();
        $datos=[
            'rooms'=>$rooms
        ];
        
        return response()->json($datos, 200);
    }

    public function delete(Request $request){
        $error='Error al encontrar el usuario: ';
        if (is_null($request->id_room)){
            return response()->json($error.'Verifica los datos', 500);
        }
        $room=Room::find($request->id_room)->first();
        if (is_null($room)){
            return response()->json($error.'No existe la sala', 500);
        }

        Arrow::join('room_symbols','arrows.id_parent','room_symbols.id')
        ->where('room_symbols.id_room',$room->id)->delete();
        RoomSymbol::where('id_room',$room->id)->delete();
        $room->delete();
        
        return response()->json('Eliminado con exito', 200);
    }

}
