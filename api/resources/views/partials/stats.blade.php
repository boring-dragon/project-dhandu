<h3 class="text-gray-600 text-center">Last Updated: {{$temperature->created_at->diffforhumans()}}</h3>
<div class="flex flex-wrap">
        <x-stats-component :reading="$temperature->reading" label="Temperature" icon="<div class='rounded p-3 bg-orange-500'><i class='fas fa-thermometer-half fa-2x fa-fw fa-inverse'></i></div>" textcolor="text-orange-500"/>
   
        <x-stats-component :reading="$humidity->reading" label="Humidity" icon="<div class='rounded p-3 bg-blue-500'><i class='fas fa-tint fa-2x fa-fw fa-inverse'></i></div>" textcolor="text-blue-500"/>

        <x-stats-component :reading="$carbonmonoxide->reading" label="Co2" icon="<div class='rounded p-3 bg-indigo-600'><i class='fa fa-burn fa-2x fa-fw fa-inverse'></i></div>" textcolor="text-indigo-600"/>
        <x-stats-component :reading="$moisture->reading" label="Soil Moisture" icon="<div class='rounded p-3 bg-green-400'><i class='fa fa-seedling fa-2x fa-fw fa-inverse'></i></div>" textcolor="text-green-400"/>

        <x-stats-component :reading="$methane->reading" label="Methane" icon="<div class='rounded p-3 bg-red-600'><i class='fa fa-burn fa-2x fa-fw fa-inverse'></i></div>" textcolor="text-red-600"/>
        <x-stats-component reading="150" label="Light" icon="<div class='rounded p-3 bg-yellow-500'><i class='fa fa-sun fa-2x fa-fw fa-inverse'></i></div>" textcolor="text-yellow-500"/>

        
</div>