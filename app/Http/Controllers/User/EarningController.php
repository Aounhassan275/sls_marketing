<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EarningController extends Controller
{
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    public function directEarning()
    {
        return view($this->directory.'.earning.direct');
    }
    public function indirectEarning()
    {
        return view($this->directory.'.earning.indirect');
    }
}
