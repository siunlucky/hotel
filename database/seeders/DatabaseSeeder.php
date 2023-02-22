<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Models\Bed;
use App\Models\Room;
use App\Models\User;
use App\Models\Amenity;
use App\Models\Booking;
use App\Models\RoomBed;
use Nette\Utils\Random;
use App\Models\RoomType;
use App\Models\Complement;
use App\Models\RoomAmenity;
use App\Models\BookingDetail;
use App\Models\RoomComplement;
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

        Amenity::create([
            'name' => 'Unlimited WiFi',
        ]);

        Amenity::create([
            'name' => 'AC'
        ]);

        Amenity::create([
            'name' => 'Washing Machine',
        ]);

        Amenity::create([
            'name' => 'Swimming Pool',
        ]);

        Amenity::create([
            'name' => 'TV',
        ]);

        RoomType::create([
            'name' => 'Executive Suite',
            'price' => '100',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '3',
            'photo' => 'list1.jpg'
        ]);

        RoomType::create([
            'name' => 'President Suite',
            'price' => '250',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '2',
            'photo' => 'list2.jpg'
        ]);

        RoomType::create([
            'name' => 'Murphy',
            'price' => '230',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '3',
            'photo' => 'list3.jpg'
        ]);

        RoomType::create([
            'name' => 'Mini Suite',
            'price' => '12',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur optio id amet voluptas beatae modi ab corrupti repellat sequi, nobis neque cupiditate ullam sed animi maiores rerum hic nemo nam odio dolore itaque cumque molestias! Inventore delectus deleniti soluta, quasi natus at et veritatis quae atque esse? Suscipit, distinctio libero!',
            'person' => '1',
            'photo' => 'list4.jpg'
        ]);

        RoomAmenity::create([
            'room_type_id' => '1',
            'amenity_id' => '1'
        ]);
        RoomAmenity::create([
            'room_type_id' => '1',
            'amenity_id' => '2'
        ]);
        RoomAmenity::create([
            'room_type_id' => '1',
            'amenity_id' => '3'
        ]);
        RoomAmenity::create([
            'room_type_id' => '1',
            'amenity_id' => '4'
        ]);
        RoomAmenity::create([
            'room_type_id' => '2',
            'amenity_id' => '1'
        ]);
        RoomAmenity::create([
            'room_type_id' => '2',
            'amenity_id' => '3'
        ]);
        RoomAmenity::create([
            'room_type_id' => '2',
            'amenity_id' => '4'
        ]);
        RoomAmenity::create([
            'room_type_id' => '3',
            'amenity_id' => '1'
        ]);
        Bed::create([
            'name' => 'Single'
        ]);
        Bed::create([
            'name' => 'Double'
        ]);
        RoomBed::create([
            'room_type_id' => '1',
            'bed_id' => '1'
        ]);
        RoomBed::create([
            'room_type_id' => '1',
            'bed_id' => '2'
        ]);
        RoomBed::create([
            'room_type_id' => '2',
            'bed_id' => '2'
        ]);
        RoomBed::create([
            'room_type_id' => '3',
            'bed_id' => '1'
        ]);
        RoomBed::create([
            'room_type_id' => '4',
            'bed_id' => '1'
        ]);
        RoomBed::create([
            'room_type_id' => '4',
            'bed_id' => '2'
        ]);

        Complement::create([
            'name' => 'Breakfast'
        ]);

        Complement::create([
            'name' => 'Dinner'
        ]);

        Complement::create([
            'name' => 'Messages'
        ]);

        Complement::create([
            'name' => 'Parking and Transportation'
        ]);

        Complement::create([
            'name' => 'Lunch'
        ]);

        Complement::create([
            'name' => 'Coffe'
        ]);

        RoomComplement::create([
            'room_type_id' => '1',
            'complement_id' => '1'
        ]);

        RoomComplement::create([
            'room_type_id' => '1',
            'complement_id' => '2'
        ]);

        RoomComplement::create([
            'room_type_id' => '1',
            'complement_id' => '3'
        ]);

        RoomComplement::create([
            'room_type_id' => '1',
            'complement_id' => '4'
        ]);

        RoomComplement::create([
            'room_type_id' => '1',
            'complement_id' => '5'
        ]);

        RoomComplement::create([
            'room_type_id' => '1',
            'complement_id' => '6'
        ]);

        RoomComplement::create([
            'room_type_id' => '2',
            'complement_id' => '2'
        ]);

        RoomComplement::create([
            'room_type_id' => '2',
            'complement_id' => '3'
        ]);

        RoomComplement::create([
            'room_type_id' => '2',
            'complement_id' => '5'
        ]);

        RoomComplement::create([
            'room_type_id' => '2',
            'complement_id' => '6'
        ]);

        RoomComplement::create([
            'room_type_id' => '3',
            'complement_id' => '1'
        ]);

        RoomComplement::create([
            'room_type_id' => '3',
            'complement_id' => '3'
        ]);

        RoomComplement::create([
            'room_type_id' => '3',
            'complement_id' => '4'
        ]);

        RoomComplement::create([
            'room_type_id' => '3',
            'complement_id' => '6'
        ]);

        RoomComplement::create([
            'room_type_id' => '4',
            'complement_id' => '1'
        ]);

        RoomComplement::create([
            'room_type_id' => '4',
            'complement_id' => '2'
        ]);

        RoomComplement::create([
            'room_type_id' => '4',
            'complement_id' => '5'
        ]);

        RoomComplement::create([
            'room_type_id' => '4',
            'complement_id' => '6'
        ]);

        Room::create([
            'room_number' => "101",
            'room_type_id' => '1',
            'status' => 'available',
        ]);
        Room::create([
            'room_number' => "102",
            'room_type_id' => '1',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "103",
            'room_type_id' => '1',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "151",
            'room_type_id' => '2',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "152",
            'room_type_id' => '2',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "153",
            'room_type_id' => '2',
            'status' => 'available',
        ]);
        Room::create([
            'room_number' => "154",
            'room_type_id' => '2',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "155",
            'room_type_id' => '2',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "171",
            'room_type_id' => '3',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "172",
            'room_type_id' => '3',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "173",
            'room_type_id' => '3',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "201",
            'room_type_id' => '4',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => "202",
            'room_type_id' => '4',
            'status' => 'available',
        ]);
        Room::create([
            'room_number' => "203",
            'room_type_id' => '4',
            'status' => 'available',
        ]);

        Booking::create([
            'booking_number' => '75128717',
            'booking_name' => 'Faiz',
            'booking_email' => 'faizelfahad2@gmail.com',
            'booking_phone' => '081358273422',
            'check_in_date' => Carbon::today()->addDays(7),
            'check_out_date' => Carbon::today()->addDays(9),
            'total_room' => '1',
            'room_type_id' => '1',
            'booking_status' => 'requested',
            'user_id' => null,
        ]);

        BookingDetail::create([
            'booking_id' => '1',
            'room_id' => '4',
            'access_date' => now(),
            'price' => '52'
        ]);

        Booking::create([
            'booking_number' => '0471276282',
            'booking_name' => 'Lala Charman',
            'booking_email' => 'lalachar2@gmail.com',
            'booking_phone' => '081358273422',
            'check_in_date' => Carbon::today()->addDays(10),
            'check_out_date' => Carbon::today()->addDays(12),
            'total_room' => '2',
            'room_type_id' => '2',
            'booking_status' => 'approved',
            'user_id' => null,
        ]);

        BookingDetail::create([
            'booking_id' => '2',
            'room_id' => '4',
            'access_date' => now(),
            'price' => '100'
        ]);

        BookingDetail::create([
            'booking_id' => '2',
            'room_id' => '1',
            'access_date' => now(),
            'price' => '100'
        ]);

        Booking::create([
            'booking_number' => '0623431282',
            'booking_name' => 'Sigma Male',
            'booking_email' => 'sigmamale@gmail.com',
            'booking_phone' => '081358273422',
            'check_in_date' => Carbon::today()->addDays(10),
            'check_out_date' => Carbon::today()->addDays(12),
            'total_room' => '1',
            'room_type_id' => '1',
            'booking_status' => 'cancelled',
            'user_id' => null,
        ]);

        BookingDetail::create([
            'booking_id' => '3',
            'room_id' => '2',
            'access_date' => now(),
            'price' => '100'
        ]);

        Booking::create([
            'booking_number' => '6121282',
            'booking_name' => 'Sigma Female',
            'booking_email' => 'sigmafemale@gmail.com',
            'booking_phone' => '081358273422',
            'check_in_date' => Carbon::today()->addDays(10),
            'check_out_date' => Carbon::today()->addDays(12),
            'total_room' => '1',
            'room_type_id' => '4',
            'booking_status' => 'check_in',
            'user_id' => null,
        ]);

        BookingDetail::create([
            'booking_id' => '4',
            'room_id' => '2',
            'access_date' => now(),
            'price' => '100'
        ]);

        Booking::create([
            'booking_number' => '67371112',
            'booking_name' => 'Yeye Ichy',
            'booking_email' => 'yeyeichy1@gmail.com',
            'booking_phone' => '081358273422',
            'check_in_date' => Carbon::today()->addDays(10),
            'check_out_date' => Carbon::today()->addDays(12),
            'total_room' => '1',
            'room_type_id' => '2',
            'booking_status' => 'check_out',
            'user_id' => null,
        ]);

        BookingDetail::create([
            'booking_id' => '5',
            'room_id' => '1',
            'access_date' => now(),
            'price' => '100'
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'photo' => 'default-profile.png',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'receptionist',
            'username' => 'receptionist',
            'email' => 'receptionist@gmail.com',
            'password' => bcrypt('receptionist'),
            'photo' => 'default-profile.png',
            'role' => 'receptionist'
        ]);
    }
}
