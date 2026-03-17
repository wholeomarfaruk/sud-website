<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Property;
use App\Models\Visit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Dashboard extends Component
{
    public $startDate;
    public $endDate;
    public $dateRange;
    public $chartData = [];
    public $total_properties, $total_blogs, $total_visitors, $total_visits, $popular_properties;
    public function mount()
    {
        $this->total_properties = Property::count();
        $this->total_blogs = \App\Models\Blog::count();
        $this->total_visitors = Visit::distinct('session_id')->count();
        $this->total_visits = Visit::count();
        $this->popular_properties = Visit::selectRaw('page_id, count(*) as total')
            ->where('page_type', 'property')
            ->leftJoin('properties', 'visits.page_id', '=', 'properties.id')
            ->selectRaw('COALESCE(properties.title, properties.featured_image_id) as title, featured_image_id, count(*) as total')
            ->groupBy('page_id')
            ->orderByDesc('total')
            ->limit(4)
            ->get();
        $this->startDate = date('Y-m-01');
        $this->endDate = date('Y-m-t');
        $this->dateRange = date('Y-m-d');
        $this->getChartDataProperty();
        // dd($this->popular_properties);
    }
    public function getChartDataProperty()
    {
        // dd($this->startDate, $this->endDate);

$data = Visit::selectRaw('DATE(visited_at) as date, COUNT(session_id) as unique_visitors')
    ->where('visited_at', '>=', now()->subDays(30))
    ->groupBy(DB::raw('DATE(visited_at)')) 
    ->orderBy('date')
    ->get();
        $chartData = [
            'date' => $data->pluck('date')->toArray(),
            'amount' => $data->pluck('unique_visitors')->toArray()
        ];
        $this->chartData = $chartData;
        // $this->dispatch('chartRefreshed');
        $this->dispatch('chartRefreshed', [
            'type' => 'success',
            'message' => 'Chart Refreshed',
            'labels' => $chartData['date'],
            'data' => $chartData['amount'],
        ]);
        // dd(response()->json($chartData));
        return $chartData;
    }
    public function render()
    {
        return view('livewire.admin.dashboard.dashboard')->layout('layouts.admin.admin');
    }
}
