<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $rooms = [
            ['id'=>1,'hostel_id'=>1,'room_no'=>111,'allocated'=>0],
            ['id'=>2,'hostel_id'=>1,'room_no'=>222,'allocated'=>0],
            ['id'=>3,'hostel_id'=>1,'room_no'=>333,'allocated'=>0],
            ['id'=>4,'hostel_id'=>1,'room_no'=>444,'allocated'=>0],
            ['id'=>5,'hostel_id'=>1,'room_no'=>555,'allocated'=>0],
            ['id'=>6,'hostel_id'=>1,'room_no'=>666,'allocated'=>0],
            ['id'=>7,'hostel_id'=>1,'room_no'=>777,'allocated'=>0],
            ['id'=>8,'hostel_id'=>1,'room_no'=>888,'allocated'=>0],
            ['id'=>9,'hostel_id'=>1,'room_no'=>999,'allocated'=>0],
            ['id'=>10,'hostel_id'=>2,'room_no'=>111,'allocated'=>0],
            ['id'=>11,'hostel_id'=>2,'room_no'=>222,'allocated'=>0],
            ['id'=>12,'hostel_id'=>2,'room_no'=>333,'allocated'=>0],
            ['id'=>13,'hostel_id'=>2,'room_no'=>444,'allocated'=>0],
            ['id'=>14,'hostel_id'=>2,'room_no'=>555,'allocated'=>0],
            ['id'=>15,'hostel_id'=>2,'room_no'=>666,'allocated'=>0],
            ['id'=>16,'hostel_id'=>2,'room_no'=>777,'allocated'=>0],
            ['id'=>17,'hostel_id'=>2,'room_no'=>888,'allocated'=>0],
            ['id'=>18,'hostel_id'=>2,'room_no'=>999,'allocated'=>0],
            ['id'=>19,'hostel_id'=>3,'room_no'=>111,'allocated'=>0],
            ['id'=>20,'hostel_id'=>3,'room_no'=>222,'allocated'=>0],
            ['id'=>21,'hostel_id'=>3,'room_no'=>333,'allocated'=>0],
            ['id'=>22,'hostel_id'=>3,'room_no'=>444,'allocated'=>0],
            ['id'=>23,'hostel_id'=>3,'room_no'=>555,'allocated'=>0],
            ['id'=>24,'hostel_id'=>3,'room_no'=>666,'allocated'=>0],
            ['id'=>25,'hostel_id'=>3,'room_no'=>777,'allocated'=>0],
            ['id'=>26,'hostel_id'=>3,'room_no'=>888,'allocated'=>0],
            ['id'=>27,'hostel_id'=>3,'room_no'=>999,'allocated'=>0],
            ['id'=>28,'hostel_id'=>4,'room_no'=>111,'allocated'=>0],
            ['id'=>29,'hostel_id'=>4,'room_no'=>222,'allocated'=>0],
            ['id'=>30,'hostel_id'=>4,'room_no'=>333,'allocated'=>0],
            ['id'=>31,'hostel_id'=>4,'room_no'=>444,'allocated'=>0],
            ['id'=>32,'hostel_id'=>4,'room_no'=>555,'allocated'=>0],
            ['id'=>33,'hostel_id'=>4,'room_no'=>666,'allocated'=>0],
            ['id'=>34,'hostel_id'=>4,'room_no'=>777,'allocated'=>0],
            ['id'=>35,'hostel_id'=>4,'room_no'=>888,'allocated'=>0],
            ['id'=>36,'hostel_id'=>4,'room_no'=>999,'allocated'=>0],
            ['id'=>37,'hostel_id'=>5,'room_no'=>111,'allocated'=>0],
            ['id'=>38,'hostel_id'=>5,'room_no'=>222,'allocated'=>0],
            ['id'=>39,'hostel_id'=>5,'room_no'=>333,'allocated'=>0],
            ['id'=>40,'hostel_id'=>5,'room_no'=>444,'allocated'=>0],
            ['id'=>41,'hostel_id'=>5,'room_no'=>555,'allocated'=>0],
            ['id'=>42,'hostel_id'=>5,'room_no'=>666,'allocated'=>0],
            ['id'=>43,'hostel_id'=>5,'room_no'=>777,'allocated'=>0],
            ['id'=>44,'hostel_id'=>5,'room_no'=>888,'allocated'=>0],
            ['id'=>45,'hostel_id'=>5,'room_no'=>999,'allocated'=>0],
            ['id'=>46,'hostel_id'=>6,'room_no'=>111,'allocated'=>0],
            ['id'=>47,'hostel_id'=>6,'room_no'=>222,'allocated'=>0],
            ['id'=>48,'hostel_id'=>6,'room_no'=>333,'allocated'=>0],
            ['id'=>49,'hostel_id'=>6,'room_no'=>444,'allocated'=>0],
            ['id'=>50,'hostel_id'=>6,'room_no'=>555,'allocated'=>0],
            ['id'=>51,'hostel_id'=>6,'room_no'=>666,'allocated'=>0],
            ['id'=>52,'hostel_id'=>6,'room_no'=>777,'allocated'=>0],
            ['id'=>53,'hostel_id'=>6,'room_no'=>888,'allocated'=>0],
            ['id'=>54,'hostel_id'=>6,'room_no'=>999,'allocated'=>0],
        ];

        foreach ($rooms as $room) {
            $room['created_at'] = now();
            $room['updated_at'] = now();
            DB::table('rooms')->insert($room);
        }
    }
}
