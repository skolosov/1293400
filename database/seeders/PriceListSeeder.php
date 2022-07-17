<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\PriceList;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceList::insert([
            [
                'name' => 'Прайс 1',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 2',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 3',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 4',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 5',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 6',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 7',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 8',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 9',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ],
            [
                'name' => 'Прайс 10',
                'provider_id' => Provider::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'duration' => Carbon::now()->addDay(rand(1, 10)),
                'currency_id' => Currency::query()->orderBy(DB::raw('RAND()'))->first()->id,

            ]
        ]);
    }
}
