<?php

namespace App\Http\Controllers;

use App\Models\Arrow;
use App\Models\RoomSymbol;
use Illuminate\Http\Request;

class ArrowController extends Controller
{
    public function create(Request $request){
        $error='Error al crear la conexion: ';
        if (is_null($request->id_parent) || is_null($request->id_child)
        || is_null($request->position_parent) || is_null($request->position_child)){
            return response()->json($error.'Verifica los datos', 500);
        }

        /*$arrow=Arrow::join('arrows as hijo','arrows.id','hijo.id_parent')
        ->where('hijo.id_parent',$request->id_child)->fisrt();
        if (!is_null($arrow)){
            return response()->json($error.'Ya tiene un padre', 500);
        }*/

        $parent=RoomSymbol::find($request->id_parent);
        if (is_null($parent)){
            return response()->json($error.'No existe el simbolo padre', 500);
        }

        $child=RoomSymbol::find($request->id_child);
        if (is_null($child)){
            return response()->json($error.'No existe el simbolo hijo', 500);
        }

        $data=[
            'id_parent'=>$request->id_parent,
            'id_child'=>$request->id_child,
            'position_parent'=>$request->position_parent,
            'position_child'=>$request->position_child
        ];
        $arrow=Arrow::create($data);
        return response()->json($arrow, 200);
    }

    public function get(Request $request){
        $error='Error al crear la conexion: ';
        if (is_null($request->id_room_symbol)){
            return response()->json($error.'Verifica los datos', 500);
        }


        $parent=RoomSymbol::find($request->id_room_symbol);
        if (is_null($parent)){
            return response()->json($error.'No existe el simbolo padre', 500);
        }

        $arrows=Arrow::where('id_parent',$request->id_room_symbol)->get();
        $data=[
            'arrows'=>$arrows
        ];
        return response()->json($data, 200);
    }

}
