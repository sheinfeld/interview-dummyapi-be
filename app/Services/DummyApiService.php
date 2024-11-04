<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class DummyApiService
{
    protected $baseURL;
    protected $appId;

    public function __construct()
    {
        $this->baseURL = config('services.dummyapi.base_url');
        $this->appId = config('services.dummyapi.app_id');
    }

    /**
     * @throws ConnectionException
     */
    public function fetchUsers()
    {
        $response = Http::withHeaders([
            'app-id' => $this->appId
        ])->get($this->baseURL . '/user', [
            'limit' => 10
        ]);

        return $response->json();
    }
}
