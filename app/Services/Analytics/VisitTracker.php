<?php

namespace App\Services\Analytics;

use App\Models\Visit;
use Detection\MobileDetect;

class VisitTracker
{

    public function track($type, $id = null, $slug = null)
    {

        $session = session()->getId();

        $url = request()->fullUrl();

        $ip = request()->ip();

        $userAgent = request()->userAgent();

        $referrer = request()->header('referer');

        $detect = new MobileDetect;

        if ($detect->isMobile()) {
            $device = 'mobile';
        } elseif ($detect->isTablet()) {
            $device = 'tablet';
        } else {
            $device = 'desktop';
        }


        // prevent refresh spam
        $recentVisit = Visit::where('session_id', $session)
            ->where('page_slug', $slug)
            ->where('visited_at', '>=', now()->subSeconds(30))
            ->first();

        if ($recentVisit) {
            return;
        }


        Visit::create([

            'page_type' => $type,
            'page_id' => $id,
            'page_slug' => $slug,

            'url' => $url,

            'visitor_ip' => $ip,

            'user_agent' => $userAgent,

            'device_type' => $device,

            'referrer_url' => $referrer,

            'session_id' => $session,

            'visited_at' => now()

        ]);

    }
}
