<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\PriceList;
use App\Models\PriceListPosition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PriceListPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceListPosition::insert([
            [
                'name' => 'Чашки',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Ложки',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Стулья',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Столы',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Лампы',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Коробки',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Ножи',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Ручки',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Кастрюли',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Часы',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Колонки',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Телевизоры',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
            [
                'name' => 'Компьютеры',
                'price_list_id' => PriceList::query()->orderBy(DB::raw('RAND()'))->first()->id,
                'article' => Str::random(10),
                'price' => rand(10, 1000)

            ],
        ]);
    }
}
