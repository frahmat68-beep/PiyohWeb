<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Piyoh Kopi',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Nama Website',
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Cita Rasa Kopi Nusantara Terkini',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Tagline Website',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@piyohkopi.com',
                'group' => 'contact',
                'type' => 'text',
                'label' => 'Email Kontak Utama',
            ],
            [
                'key' => 'contact_phone',
                'value' => '081234567890',
                'group' => 'contact',
                'type' => 'text',
                'label' => 'Telepon Kontak Utama',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/piyohkopi',
                'group' => 'social',
                'type' => 'text',
                'label' => 'URL Instagram Brand',
            ],
            [
                'key' => 'meta_title',
                'value' => 'Piyoh Kopi - Cita Rasa Kopi Nusantara Terkini',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Default Meta Title',
            ],
            [
                'key' => 'meta_description',
                'value' => 'Temukan cita rasa kopi terbaik nusantara yang dikemas modern hanya di Piyoh Kopi.',
                'group' => 'seo',
                'type' => 'textarea',
                'label' => 'Default Meta Description',
            ],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(
                ['key' => $s['key']],
                $s
            );
        }
    }
}
