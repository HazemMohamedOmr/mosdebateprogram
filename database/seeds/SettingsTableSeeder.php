<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::updateOrCreate(['key' => 'invitation_form'], ['value' => true]);
        Setting::updateOrCreate(['key' => 'students_form'], ['value' => true]);
    }
}
