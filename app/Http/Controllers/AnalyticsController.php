<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index()
    {
        $analyticsData = app(Analytics::class)->fetchTotalVisitorsAndPageViews(Period::days(7));

        foreach ($analyticsData as $data) {
            echo "Fecha: " . $data['date'] . " - Visitantes: " . $data['visitors'] . " - Páginas vistas: " . $data['pageViews'];
        }
    }
}
