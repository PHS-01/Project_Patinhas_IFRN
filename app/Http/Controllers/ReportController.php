<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Adoption;

class ReportController extends Controller
{
    public function generateReport()
    {
        // Busca todas as adoções com os relacionamentos de usuário e pet
        $adoptions = Adoption::all();

        // Preparar os dados para o relatório
        $adoptionData = [];
        foreach ($adoptions as $adoption) {
            $adoptionData[] = [
                'id' => $adoption->id,
                'user' => $adoption->user->name ?? 'N/A', // Previne erros caso não tenha usuário
                'pet' => $adoption->pet->name ?? 'N/A', // Previne erros caso não tenha pet
                'status' => $adoption->status,
            ];
        }

        $data = [
            'title' => 'Relatório de Adoções',
            'date' => date('d/m/Y'),
            'adoptions' => $adoptionData,
        ];

        // Renderizar a view como PDF
        $pdf = Pdf::loadView('reports.adoption_report', $data);

        // Retornar o arquivo PDF para o navegador
        return $pdf->stream('relatorio_de_adocoes.pdf');
    }
}
