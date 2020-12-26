<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Covid19 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nation='nepal')
    {
        $this->nation = $nation;

        $api = 'https://covid19-server.chrismichael.now.sh/api/v1/ReportsByCountries/'.$nation;
        $response = Http::get($api);
        $this->report = $response->json()['report'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.covid19');
    }
}
