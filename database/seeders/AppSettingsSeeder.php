<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Seeder;

class AppSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [

            // ── Analytics ──────────────────────────────────────────────
            [
                'group'       => 'analytics',
                'key'         => 'gtm_id',
                'value'       => '',
                'type'        => 'text',
                'label'       => 'GTM Container ID',
                'description' => 'Google Tag Manager Container ID (format: GTM-XXXXXXX).',
                'is_public'   => false,
            ],
            [
                'group'       => 'analytics',
                'key'         => 'meta_pixel_id',
                'value'       => '',
                'type'        => 'text',
                'label'       => 'Meta Pixel ID',
                'description' => 'Your Facebook/Meta Pixel numeric ID.',
                'is_public'   => false,
            ],
            [
                'group'       => 'analytics',
                'key'         => 'meta_pixel_head',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'Meta Pixel Full Snippet',
                'description' => 'Full Meta Pixel <head> code from Events Manager. Overrides auto-generated code.',
                'is_public'   => false,
            ],
            [
                'group'       => 'analytics',
                'key'         => 'tiktok_pixel_id',
                'value'       => '',
                'type'        => 'text',
                'label'       => 'TikTok Pixel ID',
                'description' => 'Your TikTok Pixel ID from TikTok Ads Manager.',
                'is_public'   => false,
            ],
            [
                'group'       => 'analytics',
                'key'         => 'tiktok_pixel_head',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'TikTok Pixel Full Snippet',
                'description' => 'Full TikTok Pixel <head> code. Overrides auto-generated code.',
                'is_public'   => false,
            ],

            // ── SEO ────────────────────────────────────────────────────
            [
                'group'       => 'seo',
                'key'         => 'google_verification',
                'value'       => '',
                'type'        => 'text',
                'label'       => 'Google Search Console Verification',
                'description' => 'Content value of the google-site-verification meta tag.',
                'is_public'   => false,
            ],
            [
                'group'       => 'seo',
                'key'         => 'facebook_verification',
                'value'       => '',
                'type'        => 'text',
                'label'       => 'Facebook Domain Verification',
                'description' => 'Content value of the facebook-domain-verification meta tag.',
                'is_public'   => false,
            ],

            // ── Custom Code ────────────────────────────────────────────
            [
                'group'       => 'custom',
                'key'         => 'head_scripts',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'Head Scripts',
                'description' => 'Raw HTML injected inside <head> before </head>.',
                'is_public'   => false,
            ],
            [
                'group'       => 'custom',
                'key'         => 'body_start_scripts',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'Body Start Scripts',
                'description' => 'Raw HTML injected immediately after <body>.',
                'is_public'   => false,
            ],
            [
                'group'       => 'custom',
                'key'         => 'body_end_scripts',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'Body End Scripts',
                'description' => 'Raw HTML injected just before </body>.',
                'is_public'   => false,
            ],
            [
                'group'       => 'custom',
                'key'         => 'custom_css',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'Custom CSS',
                'description' => 'Plain CSS rules. Wrapped in <style> automatically.',
                'is_public'   => false,
            ],
            [
                'group'       => 'custom',
                'key'         => 'custom_js',
                'value'       => '',
                'type'        => 'code',
                'label'       => 'Custom JS',
                'description' => 'Plain JS code. Wrapped in <script> automatically.',
                'is_public'   => false,
            ],
        ];

        foreach ($settings as $s) {
            AppSetting::updateOrCreate(
                ['group' => $s['group'], 'key' => $s['key']],
                $s
            );
        }
    }
}
