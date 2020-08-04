@extends('layouts.app')

@section('content')
<div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

    @include('partials.stats')

    <!--Divider-->
    <hr class="border-b-2 border-gray-400 my-8 mx-4">

    <div class="flex flex-row flex-wrap flex-grow mt-2">

        <x-sensor-table sensorname="DHT Sensor" :sensordata="$dht"/>
        <x-sensor-table sensorname="Soil Moisture Sensor" :sensordata="$soilmoisturesensor"/>
        <x-sensor-table sensorname="MQ-4 Sensor" :sensordata="$mq4"/>
        <x-sensor-table sensorname="MQ-9 Sensor" :sensordata="$mq9"/>
        
    </div>

    <div class="flex flex-row flex-wrap flex-grow mt-2">

        @include('graphs.barline')

        @include('graphs.line')

        @include('graphs.bar')
    </div>

    <!--/ Console Content-->

</div>
@endsection
        