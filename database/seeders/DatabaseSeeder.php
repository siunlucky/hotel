<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Beds;
use App\Models\Amenities;
use App\Models\Room_Type;
use App\Models\Room_Beds;
use App\Models\Room_Amenities;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Amenities::create([
            'amenities_name' => 'Unimited WiFi',
        ]);

        Amenities::create([
            'amenities_name' => 'AC'
        ]);

        Amenities::create([
            'amenities_name' => 'Washing Machine',
        ]);

        Amenities::create([
            'amenities_name' => 'Swimming Pool',
        ]);

        Amenities::create([
            'amenities_name' => 'TV',
        ]);

        Room_Type::create([
            'room_type_name' => 'Executive Suite',
            'price' => '100',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '3',
            'photo' => 'list1.jpg'
        ]);

        Room_Type::create([
            'room_type_name' => 'President Suite',
            'price' => '250',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '2',
            'photo' => 'list2.jpg'
        ]);

        Room_Type::create([
            'room_type_name' => 'Murphy',
            'price' => '230',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '3',
            'photo' => 'list3.jpg'
        ]);

        Room_Type::create([
            'room_type_name' => 'Mini Suite',
            'price' => '12',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '1',
            'photo' => 'list4.jpg'
        ]);

        Room_Amenities::create([
            'id_room_type' => '1',
            'id_amenities' => '1'
        ]);
        Room_Amenities::create([
            'id_room_type' => '1',
            'id_amenities' => '2'
        ]);
        Room_Amenities::create([
            'id_room_type' => '1',
            'id_amenities' => '3'
        ]);
        Room_Amenities::create([
            'id_room_type' => '1',
            'id_amenities' => '4'
        ]);
        Room_Amenities::create([
            'id_room_type' => '2',
            'id_amenities' => '1'
        ]);
        Room_Amenities::create([
            'id_room_type' => '2',
            'id_amenities' => '3'
        ]);
        Room_Amenities::create([
            'id_room_type' => '2',
            'id_amenities' => '4'
        ]);
        Room_Amenities::create([
            'id_room_type' => '3',
            'id_amenities' => '1'
        ]);
        Beds::create([
            'beds_name' => 'single'
        ]);
        Beds::create([
            'beds_name' => 'double'
        ]);
        Room_Beds::create([
            'id_room_type' => '1',
            'id_beds' => '1'
        ]);
        Room_Beds::create([
            'id_room_type' => '1',
            'id_beds' => '2'
        ]);
        Room_Beds::create([
            'id_room_type' => '2',
            'id_beds' => '2'
        ]);
        Room_Beds::create([
            'id_room_type' => '3',
            'id_beds' => '1'
        ]);
        Room_Beds::create([
            'id_room_type' => '4',
            'id_beds' => '1'
        ]);
        Room_Beds::create([
            'id_room_type' => '4',
            'id_beds' => '2'
        ]);
    }
}
