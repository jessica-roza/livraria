<?php

namespace App;

use App\Charts\graficosHighCharts;
use App\Charts\Teste;
use Illuminate\Database\Eloquent\Model;

class Grafico extends Model
{

    static public function EmprestimosReservasMensais()
    {
        $grafico = new graficosHighCharts();

        $emprestimo = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
            ->where('data_emprestimo', '>=', now()->subDays(30))
            ->count();
        $reserva = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
            ->where('data_emprestimo', '>=', now()->subDays(30))
            ->count();
        $data = [$emprestimo, $reserva];
        $grafico->dataset('Empréstimos/Reservas Mensal', 'pie', $data)->options([
            'color' => ['rgba(7, 136, 208, 0.1)', 'rgba(0, 0, 0, 0.075)'],
            'borderColor' => 'rgba(0, 0, 0, 0.1)',
            'borderWidth' => '1'

        ]);

        $grafico->options([
            'chart' => [
                'backgroundColor' => 'rgba(0, 0, 0, 0.055)',
                'borderRadius' => '5'
            ]
        ]);
        $grafico->labels(['Empréstimos', 'Reservas']);
        return $grafico;
    }

    static public function EmprestimosReservasTrimestre()
    {
        $grafico = new graficosHighCharts();
        $mes1 = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
            ->whereBetween('data_emprestimo', [now()->subDays(30), now()])
            ->count();
        $mes2 = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
            ->whereBetween('data_emprestimo', [now()->subDays(60), now()->subDays(30)])
            ->count();
        $mes3 = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
            ->whereBetween('data_emprestimo', [now()->subDays(90), now()->subDays(60)])
            ->count();

        $data = [$mes1, $mes2, $mes3];
        $grafico->dataset('Empréstimos', 'column', $data)->options([
            'color' => 'rgba(7, 136, 208, 0.1)',
            'borderColor' => 'rgba(0, 0, 0, 0.1)',
            'borderWidth' => '1'
        ]);

        $mes1 = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
            ->whereBetween('created_at', [now()->subDays(30), now()])
            ->count();
        $mes2 = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
            ->whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])
            ->count();
        $mes3 = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
            ->whereBetween('created_at', [now()->subDays(90), now()->subDays(60)])
            ->count();
        $data = [$mes1, $mes2, $mes3];
        $grafico->dataset('Reservas', 'column', $data)->options([
            'color' => 'rgba(0, 0, 0, 0.075)',
            'borderColor' => 'rgba(0, 0, 0, 0.1)',
            'borderWidth' => '1'
        ]);

        $grafico->options([
            'chart' => [
                'backgroundColor' => 'rgba(0, 0, 0, 0.055)',
                'borderRadius' => '5'
            ]
        ]);
        $date = now();
        $grafico->labels([$date->format('F'), $date->subMonth()->format('F'), $date->subMonth()->format('F')]);
        return $grafico;
    }

    static public function EmprestimosReservasPorCategoriaTrimestre()
    {
        $grafico =  new graficosHighCharts();

        foreach (Categoria::all() as $categoria) {
            $mes1[$categoria->nome] = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
                ->whereBetween('data_emprestimo', [now()->subDays(30), now()])
                ->whereHas('Exemplar.Livro.Categoria', function ($query) use ($categoria) {
                    $query->where('categoria.id', $categoria->id);
                })->count();

            $mes2[$categoria->nome] = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
                ->whereBetween('data_emprestimo', [now()->subDays(60), now()->subDays(30)])
                ->whereHas('Exemplar.Livro.Categoria', function ($query) use ($categoria) {
                    $query->where('categoria.id', $categoria->id);
                })->count();

            $mes3[$categoria->nome] = \App\Emprestimo::whereRaw('datediff(data_emprestimo,created_at) = 0')
                ->whereBetween('data_emprestimo', [now()->subDays(90), now()->subDays(60)])
                ->whereHas('Exemplar.Livro.Categoria', function ($query) use ($categoria) {
                    $query->where('categoria.id', $categoria->id);
                })->count();

        }
        foreach ($mes1 as $key => $value) {
            $data = [$mes1[$key], $mes2[$key], $mes3[$key]];
            $rgba = rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ",";
            $grafico->dataset('Empréstimos ' . $key, 'column', $data)->options([
                'color' => 'rgba(' . $rgba . '0.2)',
                'borderColor' => 'rgba(0, 0, 0, 0.075)',
                'borderWidth' => '1'
            ]);
        }


        foreach (Categoria::all() as $categoria) {
            $mes1[$categoria->nome] = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
                ->whereBetween('created_at', [now()->subDays(30), now()])
                ->whereHas('Exemplar.Livro.Categoria', function ($query) use ($categoria) {
                    $query->where('categoria.id', $categoria->id);
                })->count();

            $mes2[$categoria->nome] = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
                ->whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])
                ->whereHas('Exemplar.Livro.Categoria', function ($query) use ($categoria) {
                    $query->where('categoria.id', $categoria->id);
                })->count();

            $mes3[$categoria->nome] = \App\Emprestimo::whereRaw('data_emprestimo >  created_at')
                ->whereBetween('created_at', [now()->subDays(90), now()->subDays(60)])
                ->whereHas('Exemplar.Livro.Categoria', function ($query) use ($categoria) {
                    $query->where('categoria.id', $categoria->id);
                })->count();

        }
        foreach ($mes1 as $key => $value) {
            $data = [$mes1[$key], $mes2[$key], $mes3[$key]];
            $rgba = rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ",";
            $grafico->dataset('Reservas ' . $key, 'column', $data)->options([
                'color' => 'rgba(' . $rgba . '0.2)',
                'borderColor' => 'rgba(0, 0, 0, 0.075)',
                'borderWidth' => '1'
            ]);
        }

        $grafico->options([
            'chart' => [
                'backgroundColor' => 'rgba(0, 0, 0, 0.055)',
                'borderRadius' => '5'
            ]
        ]);
        $date = now();
        $grafico->labels([$date->format('F'), $date->subMonth()->format('F'), $date->subMonth()->format('F')]);
        return $grafico;
    }

}
