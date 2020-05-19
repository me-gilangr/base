<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Datatables;

class JsonController extends Controller
{
    public function trashedUser()
    {
        $category = User::onlyTrashed()->orderBy('name', 'ASC');
        return Datatables::eloquent($category)
            ->addColumn('level', function($data) {
                return $data->roles->first()->name;
            })
            ->editColumn('deleted_at', function($data) {
                return date('d-m-Y | H:i:s', strtotime($data->deleted_at));
            })
            ->addColumn('action', function($data) {
                $btn = '
                <div class="btn-group text-center">  
                    <button class="btn btn-outline-info btn-sm flat ml-1" id="data-restore" data-id="'.$data->id.'">
                        <i class="fa fa-undo"></i> Pulihkan
                    </button> 
                    <button class="btn btn-outline-danger btn-sm flat ml-1" id="data-permanent" data-id="'.$data->id.'">
                        <i class="fa fa-times"></i>
                    </button> 
                </div>
                ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
