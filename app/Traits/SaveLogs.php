<?php

namespace App\Traits;
use App\Models\Log;

trait SaveLogs {
    public function saveActivityInfo($menssage,$querytype,$query)
    {
        Log::create([
            'user_id' =>auth()->user()->id,
            'ip'=> request()->ip(),
            'query_type'=>$querytype,
            'form_name'=> url()->getRequest()->path(),
            'method'=> request()->method(),
            'http_estatus'=>response($query)->status(),
            'message'=>strtoupper($menssage),
            'duration_ms'=>request()->request->get('timequery')
        ]);
    }
}