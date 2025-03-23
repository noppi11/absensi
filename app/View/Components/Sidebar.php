<?php

namespace App\View\Components;

use App\Models\Kelas;
use App\Models\Kopetensi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $kelas;
    public $kopentensis;
    public function __construct()
    {
        $this->kelas = Kelas::all();
        $this->kopentensis = Kopetensi::with(["classs"])->get();
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar', ["kopetensis" => $this->kopentensis]);

    }
}
