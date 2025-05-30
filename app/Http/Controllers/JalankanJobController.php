<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\InsertDataBanyak;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Process;

class JalankanJobController extends Controller
{
    public function __invoke()
    {
        $result = Process::run('ls');
        info($result->errorOutput());
        return $result->output();
        // Benchmark::dd(
            // [
                // "InsertDataBanyak Job" => fn() => InsertDataBanyak::dispatch(),
                // "InsertDataBanyak Tanpa Job" => fn() => User::factory()->count(10)->create(),
            // ]
        // );
    }
}
