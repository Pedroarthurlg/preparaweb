<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prova;

class ProvaController extends Component
{
    public $materia = "";
    public $valor = "";
    public $curso = "";
    public $editId = "";

    protected $rules = [
        'materia' => 'required|min:5|max:255',
        'valor' => 'required',
        'curso' => 'required|min:5|max:255',
    ];

    public function render()
    {
        $provas = Prova::all();
        return view('livewire.prova-controller', compact('provas'))
            ->layout('livewire.layout');
    }

    public function store() 
    {
        $this->validate();
        if ($editId == 0)
        {
            $prova = new Prova();
        } else {
            $prova = Prova::findOrFail($this->editId);
        }
        $prova = new Prova();
        $prova->materia = $this->materia;
        $prova->valor = $this->valor;
        $prova->curso = $this->curso;
        $prova->save();
    }

    public function limpar() 
    {
        $this->materia = "";
        $this->valor = "";
        $this->curso = "";
    }

    public function editar(Prova $prova)
    {
        $this->materia = $prova->materia;
        $this->valor = $prova->valor;
        $this->curso = $prova->curso;
    }

    public function remover(Prova $prova)
    {
        $prova->delete();
    }
}
