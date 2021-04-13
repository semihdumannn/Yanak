<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class SettingsController extends BackendController
{
    private $repo;

    /**
     * SettingsController constructor.
     * @param $repo
     */
    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return view('backend.settings.index');
    }

    public function update()
    {
        $type = \request('type');
        switch ($type) {
            case 1:
                $this->repo->update(\request()->except('type'));
                break;
            case 2:
                $this->repo->update(\request()->except('type'));
                break;
            case 3:
                $this->repo->update([
                    'socailMedya' => json_encode(\request()->except('_token', 'type'))
                ]);
                break;

            case 4:
                $this->repo->update([
                    'seo' => json_encode([
                        'meta' => \request('meta'),
                        'gtm' => \request('gtm')
                    ]),
                    'maps' => \request('maps')
                ]);
                break;
        }

        return redirect()->route('settings.index');
    }
}
