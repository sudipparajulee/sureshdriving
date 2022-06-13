@extends('layouts.app')
@section('content')


    <div class="px-6 pt-6 flex-1">
        <div class="flex flex-col md:flex-row">
            <a href="" class="flex-1">
            <div class=" mx-4 mt-4 p-2 py-4 shadow-md shadow-emerald-300 dark:shadow-gray-600 rounded-md bg-emerald-600 hover:shadow-sm hover:cursor-pointer">
                <h2 class="text-2xl font-bold pb-2 text-white">No of Items</h2>
                <div class="flex justify-between">
                    <i class="fa fa-bars fa-3x text-white opacity-70"></i>
                <h1 class="text-5xl font-bold text-right text-white mr-4">1</h1>
                </div>
            </div>
            </a>

            <a href="" class="flex-1">
            <div class="  mx-4 mt-4 p-2 py-4 shadow-md shadow-yellow-300 dark:shadow-gray-600 rounded-md bg-yellow-600 hover:shadow-sm hover:cursor-pointer">
                <h2 class="text-2xl font-bold pb-2 text-white">No of Categories</h2>
                <div class="flex justify-between">
                    <i class="fa fa-list fa-3x text-white opacity-70"></i>
                <h1 class="text-5xl font-bold text-right text-white mr-4"> 2 </h1>
                </div>
            </div>
            </a>

           

            <a href="#" class="flex-1">
            <div class="mx-4 mt-4 p-2 py-4 shadow-md shadow-orange-300 dark:shadow-gray-600 rounded-md bg-orange-600 hover:shadow-sm hover:cursor-pointer">
                <h2 class="text-2xl font-bold pb-2 text-white">No of Scans</h2>
                <div class="flex justify-between">
                    <i class="fas fa-qrcode fa-3x text-white opacity-70"></i>
                <h1 class="text-5xl font-bold text-right text-white mr-4">{{$totalvisits}}</h1>
                </div>
            </div>
            </a>
            

        </div>

        
        
        <div class="flex items-center justify-center py-8 px-4 ">
            
                        <div class="w-full">
                            <div class="flex flex-col justify-between h-full">
                                <div>
                                    <div class="lg:flex w-full justify-between">
                                        <h3 class="text-gray-600 dark:text-gray-400 leading-5 text-base md:text-xl font-bold">Details of Visits</h3>
                                        
                                    </div>
                                    
                                </div>
                                <div class="mt-2">
                                    <canvas id="myChart" width="1025" height="400" role="img" aria-label="line graph to show selling overview in terms of months and numbers" ></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>const chart = new Chart(document.getElementById("myChart"), {
type: "line",
data: {
labels: {!! json_encode($visitdate) !!}
datasets: [
  {
    label: "No of Scans",
    borderColor: "#6b7482",
    data: {!! json_encode($visits) !!}
    fill: true,
    pointBackgroundColor: "#6b7482",
    borderWidth: "3",
    pointBorderWidth: "4",
    pointHoverRadius: "6",
    pointHoverBorderWidth: "8",
    pointHoverBorderColor: "rgb(74,85,104,0.2)"
  }
]
},
options: {
legend: {
  position: false
},
scales: {
  yAxes: [
    {
      gridLines: {
        display: true
      },
      display: false
    }
  ]
}
}
});
</script>
@endsection