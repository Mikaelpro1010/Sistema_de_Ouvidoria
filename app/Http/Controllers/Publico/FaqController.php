<?php

namespace App\Http\Controllers\Publico;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function paginaInicial()
    {
        $faqs = Faq::where('ativo', true)->get();

        return view('Publico.pagina-inicial', ['faqs' => $faqs]);  
    }
}
