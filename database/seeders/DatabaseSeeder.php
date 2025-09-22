<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\AccommodationOption;
use App\Models\AccommodationType;
use App\Models\AccommodationTypeImage;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Itinerary;
use App\Models\ItineraryItem;
use App\Models\Opportunity;
use App\Models\Provider;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        Account::factory(10)->create();

        Contact::factory(10)->create();

        Provider::factory()->count(10)->create();
        Service::factory()->count(10)->create();
        ServiceImage::factory()->count(10)->create();

        Accommodation::factory()->count(15)->create();
        AccommodationType::factory()->count(15)->create();
        AccommodationTypeImage::factory()->count(15)->create();
        AccommodationOption::factory()->count(15)->create();

        Opportunity::factory()->count(15)->create();
        Itinerary::factory()->count(15)->create();
        ItineraryItem::factory()->count(15)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
