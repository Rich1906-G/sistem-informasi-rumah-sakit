<?php

namespace App\View\Components\mycomponents;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tabel extends Component
{
    public string $title;
    public string $dataUrl;
    public array $headers;
    public array $availableFilters;
    public array $activeFilters;

    public function __construct(
        string $title,
        string $dataUrl,
        array $headers,
        array $activeFilters = ['date_range', 'search'],
        array $availableFilters = []
    ) {
        $this->title = $title;
        $this->dataUrl = $dataUrl;
        $this->headers = $headers;
        $this->activeFilters = $activeFilters;
        $this->availableFilters = $availableFilters;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mycomponents.tabel');
    }

    //   Pengecekan untuk menampilkan filter tertentu.

    public function hasFilter(string $filterName): bool
    {
        return in_array($filterName, $this->activeFilters);
    }
}
