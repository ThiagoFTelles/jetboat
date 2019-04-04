<?php

use Illuminate\Support\Str;

function flash($message)
   {
       session()->flash('message', $message);
   }

   function uuid()
   {
    return (string) Str::uuid();
   }