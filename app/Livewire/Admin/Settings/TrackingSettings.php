<?php

namespace App\Livewire\Admin\Settings;

use App\Services\Settings\SettingsService;
use Livewire\Component;

class TrackingSettings extends Component
{
    // ── Active tab ────────────────────────────────────────────────
    public string $activeTab = 'analytics';

    // ── Analytics ─────────────────────────────────────────────────
    public string $gtm_id            = '';
    public string $meta_pixel_id     = '';
    public string $meta_pixel_head   = '';
    public string $tiktok_pixel_id   = '';
    public string $tiktok_pixel_head = '';

    // ── SEO Verification ──────────────────────────────────────────
    public string $google_verification   = '';
    public string $facebook_verification = '';

    // ── Custom Code ───────────────────────────────────────────────
    public string $head_scripts        = '';
    public string $body_start_scripts  = '';
    public string $body_end_scripts    = '';
    public string $custom_css          = '';
    public string $custom_js           = '';

    public bool $saved = false;

    // ── Validation ────────────────────────────────────────────────
    protected function rules(): array
    {
        return [
            'gtm_id'               => 'nullable|string|max:30|regex:/^(GTM-[A-Z0-9]+)?$/',
            'meta_pixel_id'        => 'nullable|string|max:20|regex:/^[0-9]*$/',
            'meta_pixel_head'      => 'nullable|string|max:5000',
            'tiktok_pixel_id'      => 'nullable|string|max:30',
            'tiktok_pixel_head'    => 'nullable|string|max:5000',
            'google_verification'  => 'nullable|string|max:200',
            'facebook_verification'=> 'nullable|string|max:200',
            'head_scripts'         => 'nullable|string|max:50000',
            'body_start_scripts'   => 'nullable|string|max:50000',
            'body_end_scripts'     => 'nullable|string|max:50000',
            'custom_css'           => 'nullable|string|max:50000',
            'custom_js'            => 'nullable|string|max:50000',
        ];
    }

    protected $messages = [
        'gtm_id.regex'          => 'GTM ID must be in format GTM-XXXXXXX.',
        'meta_pixel_id.regex'   => 'Meta Pixel ID must contain only digits.',
    ];

    public function mount(SettingsService $settings): void
    {
        // Load all settings from cache/db into component properties
        $this->gtm_id             = $settings->get('analytics.gtm_id', '');
        $this->meta_pixel_id      = $settings->get('analytics.meta_pixel_id', '');
        $this->meta_pixel_head    = $settings->get('analytics.meta_pixel_head', '');
        $this->tiktok_pixel_id    = $settings->get('analytics.tiktok_pixel_id', '');
        $this->tiktok_pixel_head  = $settings->get('analytics.tiktok_pixel_head', '');

        $this->google_verification    = $settings->get('seo.google_verification', '');
        $this->facebook_verification  = $settings->get('seo.facebook_verification', '');

        $this->head_scripts       = $settings->get('custom.head_scripts', '');
        $this->body_start_scripts = $settings->get('custom.body_start_scripts', '');
        $this->body_end_scripts   = $settings->get('custom.body_end_scripts', '');
        $this->custom_css         = $settings->get('custom.custom_css', '');
        $this->custom_js          = $settings->get('custom.custom_js', '');
    }

    public function save(SettingsService $settings): void
    {
        $this->validate();

        $settings->setMany([
            'analytics.gtm_id'             => trim($this->gtm_id),
            'analytics.meta_pixel_id'      => trim($this->meta_pixel_id),
            'analytics.meta_pixel_head'    => trim($this->meta_pixel_head),
            'analytics.tiktok_pixel_id'    => trim($this->tiktok_pixel_id),
            'analytics.tiktok_pixel_head'  => trim($this->tiktok_pixel_head),
            'seo.google_verification'      => trim($this->google_verification),
            'seo.facebook_verification'    => trim($this->facebook_verification),
            'custom.head_scripts'          => trim($this->head_scripts),
            'custom.body_start_scripts'    => trim($this->body_start_scripts),
            'custom.body_end_scripts'      => trim($this->body_end_scripts),
            'custom.custom_css'            => trim($this->custom_css),
            'custom.custom_js'             => trim($this->custom_js),
        ]);

        $this->saved = true;

        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => 'Settings saved & cache cleared.',
        ]);
    }

    public function clearCache(SettingsService $settings): void
    {
        $settings->clearCache();

        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => 'Settings cache cleared.',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.settings.tracking-settings')
            ->layout('layouts.admin.admin');
    }
}
