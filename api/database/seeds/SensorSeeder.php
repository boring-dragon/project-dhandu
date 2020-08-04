<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sensors = [
            [
                'name' => 'DHT11',
                'type' => 'temperature/humidity',
                'description' => 'The DHT11 is a basic, ultra low-cost digital temperature and humidity sensor. It uses a capacitive humidity sensor and a thermistor to measure the surrounding air, and spits out a digital signal on the data pin (no analog input pins needed). ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'name' => 'SoilMoisture',
                'type' => 'moisture',
                'description' => 'soil moisture (definition) A soil moisture sensor measures the quantity of water contained in a material, such as soil on a volumetric or gravimetric basis. To obtain an accurate measuremen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'name' => 'MQ-4',
                'type' => 'gas',
                'description' => 'MQ-4 Sensor is highly sensitive to Methane - CH4.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'name' => 'MQ-9',
                'type' => 'gas',
                'description' => 'The MQ-9 Analog Gas Sensor has high sensitity to Carbon Monoxide, Methane and LPG. The sensor can be used to detect different gases containing MQ-9 gas sensor is SnO2, which has a lower conductivity in clean air.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'name' => 'LDR',
                'type' => 'light',
                'description' => 'A photoresistor or photocell is a light-controlled variable resistor. The resistance of a photoresistor decreases with increasing incident light intensity.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]
        ];


        foreach($sensors as $sensor)
        {
            DB::table('sensors')->insert($sensor);
        }
    }
}
