@extends('layouts.app')

@section('content')
<div class="mt-8"></div>
    <h1 class="font-bold text-blue-900 text-4xl text-center">Dhandu Control Section</h1>
    <div class="flex mb-4">
        <div class="w-full text-center">
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <img class="px-1 py-1" style="width:45%;"  src="https://image.flaticon.com/icons/svg/2299/2299254.svg">
                    <h3 class="font-bold text-blue-900 text-2xl">Pump: OFF</h3>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        ON
                      </button>
                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        OFF
                      </button>

                </div>
              </div>
        
        </div>
        </div>

        

    
   
@endsection
