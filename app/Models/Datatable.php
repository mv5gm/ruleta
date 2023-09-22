<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animalito;
use Illuminate\Support\Facades\Storage;

class Datatable extends Model
{
    use HasFactory;

    public function Consulta($tabla,$campo){

    }

    public function Animalito($request){

        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        $totalRecords = Animalito::select('count(*) as allcount')->count();
        $totalRecordsWithFilter = Animalito::select('count(*) as allcount')->where('nombre','like','%'.$searchValue.'%')->count();

        $records = Animalito::orderBy($columnName,$columnSortOrder)
                    ->where('nombre','like','%'.$searchValue.'%')
                    ->select('*')
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();

        $data_arr = array();

        foreach ($records as $record) {
            
            $id = $record->id;
            $nombre = $record->nombre;
            $numero = $record->numero;
            $imagen = '<img src="'.Storage::url($record->imagen).'" width="70" height="70" >';
            $c = "'";
            
            $var = '<button class="btn btn-primary btn-editar" 
            title="Editar" data-toggle="modal" data-target="#modal-primary-editar"    
            onclick="editar( '.$id.' ) "  >
                <i class="fa fa-edit"></i>
            </button>    
            <button data-toggle="modal" data-target="#modal-primary-eliminar" class="btn btn-danger" title="Eliminar" onclick="eliminar( '.$id.' )" >
                <i class="fa fa-trash"></i> 
            </button>';

            $data_arr[] = array(
            'id' => $id,
            'nombre' => $nombre,    
            'numero' => $numero,    
            'imagen' => $imagen,    
            'btn' => $var
            );  
        }

        $response = array(
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordsWithFilter,
            'aaData' => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    public function Loteria($request){

        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        $totalRecords = Loteria::select('count(*) as allcount')->count();
        $totalRecordsWithFilter = Loteria::select('count(*) as allcount')->where('nombre','like','%'.$searchValue.'%')->count();

        $records = Loteria::orderBy($columnName,$columnSortOrder)
                    ->where('nombre','like','%'.$searchValue.'%')
                    ->select('*')
                    ->skip($start)
                    ->take($rowperpage)
                    ->get();

        $data_arr = array();

        foreach ($records as $record) {
            
            $id = $record->id;
            $nombre = $record->nombre;
       			
            $c = "'";
            
            $var = '<button class="btn btn-primary btn-editar" 
            title="Editar" data-toggle="modal" data-target="#modal-primary-editar"    
            onclick="editar( '.$id.' ) "  >
                <i class="fa fa-edit"></i>
            </button>    
            <button data-toggle="modal" data-target="#modal-primary-eliminar" class="btn btn-danger" title="Eliminar" onclick="eliminar( '.$id.' )" >
                <i class="fa fa-trash"></i> 
            </button>';

            $data_arr[] = array(
            'id' => $id,
            'nombre' => $nombre,   
            'btn' => $var
            );  
        }

        $response = array(
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordsWithFilter,
            'aaData' => $data_arr
        );

        echo json_encode($response);
        exit;
    }
}
