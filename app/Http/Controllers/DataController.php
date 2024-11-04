<?php

namespace App\Http\Controllers;

use App\Services\DummyApiService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    protected DummyApiService $dummyApiService;

    public function __construct()
    {
        $this->dummyApiService = new DummyApiService();
    }

    /**
     * @throws ConnectionException
     */
    public function user(): JsonResponse
    {
        $users = $this->dummyApiService->fetchUsers();
        return response()->json($users);
    }

}
