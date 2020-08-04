<div class="w-full md:w-1/2 xl:w-1/2 p-3">
    <!--Table Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
        <h5 class="font-bold uppercase text-gray-600">{{$sensor_name}}</h5>
        </div>
        <div class="p-5">
            <table class="table-auto">
                <thead>
                  <tr>
                    <th class="px-4 py-2 text-blue-900">Sensor Name</th>
                    <th class="px-4 py-2 text-blue-900">Type</th>
                    <th class="px-4 py-2 text-blue-900">Reading</th>
                    <th class="px-4 py-2 text-blue-900">Created_at</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $sensor_data as $item)
                    <tr>
                    <td class="border px-4 py-2">{{$sensor_name}}</td>
                    <td class="border px-4 py-2">{{$item->type}}</td>
                    <td class="border px-4 py-2">{{$item->reading}}</td>
                    <td class="border px-4 py-2">{{$item->created_at->diffforhumans()}}</td>
                    </tr>
                    @endforeach
                
                </tbody>
              </table>
  
        </div>
    </div>
    <!--/table Card-->
  </div>