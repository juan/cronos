<?php
   function statusColor($status){
       $status = strtolower($status);
       return match (true){
           $status === 'activo' => $color = 'font-bold text-green-700',
           $status === 'bloqueado' => $color = 'font-bold text-purple-900',
           $status === 'suspendido' => $color = 'font-bold text-red-700',
           default => 'font-bold text-black-700'
       };
      
   }
   
   function sidebaricon($nameopcion){
       if ($nameopcion === 'Registro') {
           $icon = 'M12 6v12m6-6H6';
       }
       if ($nameopcion === 'Consulta') {
           $icon = 'M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z';
       }
     
       
       return $icon;
   }
