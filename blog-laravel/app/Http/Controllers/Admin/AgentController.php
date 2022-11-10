<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserAgent\UserAgentInterface;
use App\Models\Visit;

class AgentController extends Controller
{
    public function index(UserAgentInterface $userAgent)
    {
        $ip = request()->ip();
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }

        $browser = $userAgent->getBrowser();
        $platform = $userAgent->getPlatform();

        if (!empty($browser) && !empty($platform)) {
            Visit::create([
                'Browser' => $browser,
                'Platform' => $platform,
            ]);
        }
    }
}

