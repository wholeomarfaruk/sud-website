   {{-- ======================== Page Layout Start From Here ======================== --}}
   <div x-data x-init="$store.pageName = { name: 'Dashboard', slug: 'dashboard' }">
       {{-- ======================== Page Header Start From Here ======================== --}}
       <div class="flex flex-wrap justify-between gap-6 ">
           {{-- Page Name  --}}
           <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''">
           </h1>
           {{-- Breadcrumb  --}}
           <nav>
               <ol class="flex items-center gap-1.5">
                   <li>
                       <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                           href="{{ route('admin.dashboard') }}">
                           Dashboard
                           {{-- <svg class="stroke-current" width="17" height="16" xmlns="http://www.w3.org/2000/svg"
                               fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                               class="size-6">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                           </svg> --}}

                       </a>
                   </li>
                   {{-- <li class="text-sm text-gray-800 dark:text-white/90" x-text="$store.pageName?.name ?? ''"></li> --}}
               </ol>
           </nav>
       </div>
       {{-- ======================== Page Header End Here ======================== --}}

       <div class="flex-1 w-full bg-white rounded-lg min-h-[80vh] pt-2">
           {{-- ======================== Content Start From Here ======================== --}}
           <div class="space-y-6 my-4 mx-2">
               <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                   <div class="rounded-lg border  border-gray-300 shadow-sm hover:shadow-lg transition-shadow">
                       <div class="p-6">
                           <div class="flex items-center justify-between">
                               <div class="">
                                   <p class=" text-sm font-medium text-gray-600">Total Visits</p>
                                   <p class="text-2xl font-bold text-gray-900">{{ $total_visits }}</p>
                                   {{-- <div class="flex items-center mt-1"><svg xmlns="http://www.w3.org/2000/svg"
                                           width="24" height="24" viewBox="0 0 24 24" fill="none"
                                           stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round"
                                           class="lucide lucide-trending-up h-3 w-3 text-green-500 mr-1">
                                           <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                           <polyline points="16 7 22 7 22 13"></polyline>
                                       </svg><span class="text-xs text-green-600 font-medium">+12.5%</span>
                                    </div> --}}
                               </div>
                               <div class=" p-3 rounded-full bg-blue-500">
                                

                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"  class="lucide lucide-dollar-sign h-6 w-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>

                                </div>
                           </div>
                       </div>
                   </div>
                   <div
                       class="rounded-lg border  border-gray-300 bg-card text-card-foreground shadow-sm hover:shadow-lg transition-shadow">
                       <div class="p-6">
                           <div class="flex items-center justify-between">
                               <div>
                                   <p class="text-sm font-medium text-gray-600">Total Visitors</p>
                                   <p class="text-2xl font-bold text-gray-900">{{ $total_visitors }}</p>
                                   {{-- <div class="flex items-center mt-1"><svg xmlns="http://www.w3.org/2000/svg"
                                           width="24" height="24" viewBox="0 0 24 24" fill="none"
                                           stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round"
                                           class="lucide lucide-trending-up h-3 w-3 text-green-500 mr-1">
                                           <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                           <polyline points="16 7 22 7 22 13"></polyline>
                                       </svg><span class="text-xs text-green-600 font-medium">+3.2%</span>
                                    </div> --}}
                               </div>
                               <div class="p-3 rounded-full bg-green-500">
                                
                                
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="lucide lucide-dollar-sign h-6 w-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
</svg>

                                </div>
                           </div>
                       </div>
                   </div>
                   <div
                       class="rounded-lg border  border-gray-300 bg-card text-card-foreground shadow-sm hover:shadow-lg transition-shadow">
                       <div class="p-6">
                           <div class="flex items-center justify-between">
                               <div>
                                   <p class="text-sm font-medium text-gray-600">Today Properties</p>
                                   <p class="text-2xl font-bold text-gray-900">{{ $total_properties }}</p>
                                   {{-- <div class="flex items-center mt-1"><svg xmlns="http://www.w3.org/2000/svg"
                                           width="24" height="24" viewBox="0 0 24 24" fill="none"
                                           stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round"
                                           class="lucide lucide-trending-up h-3 w-3 text-green-500 mr-1">
                                           <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                           <polyline points="16 7 22 7 22 13"></polyline>
                                       </svg><span class="text-xs text-green-600 font-medium">+5.8%</span>
                                    </div> --}}
                               </div>
                               <div class="p-3 rounded-full bg-purple-500">
                           
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="lucide lucide-dollar-sign h-6 w-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
</svg>

                                </div>
                           </div>
                       </div>
                   </div>
                   <div
                       class="rounded-lg border  border-gray-300 bg-card text-card-foreground shadow-sm hover:shadow-lg transition-shadow">
                       <div class="p-6">
                           <div class="flex items-center justify-between">
                               <div>
                                   <p class="text-sm font-medium text-gray-600">Total Blogs</p>
                                   <p class="text-2xl font-bold text-gray-900">{{ $total_blogs }}</p>
                                   {{-- <div class="flex items-center mt-1"><svg xmlns="http://www.w3.org/2000/svg"
                                           width="24" height="24" viewBox="0 0 24 24" fill="none"
                                           stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round"
                                           class="lucide lucide-trending-up h-3 w-3 text-green-500 mr-1">
                                           <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                           <polyline points="16 7 22 7 22 13"></polyline>
                                       </svg><span class="text-xs text-green-600 font-medium">+2.1%</span>
                                    </div> --}}
                               </div>
                               <div class="p-3 rounded-full bg-orange-500">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="lucide lucide-dollar-sign h-6 w-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
</svg>


                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                   <div class="rounded-lg border  border-gray-300 shadow-sm hover:shadow-lg transition-shadow">
                       <div class="p-6">
                           <h3 class="mb-3 text-sm font-semibold text-gray-700">
                               Montly Visits
                           </h3>

                           <div wire:ignore class="relative h-[300px] w-full overflow-hidden">
                               <canvas id="chart_canvas"></canvas>
                           </div>
                       </div>
                   </div>
                   <div class="rounded-lg border  border-gray-300 shadow-sm hover:shadow-lg transition-shadow">
                       <div class=" px-6 py-3">
                           <div class="space-y-1.5 mb-2 flex flex-row items-center justify-between">
                               <div>
                                   <h3 class="text-2xl font-semibold leading-none tracking-tight">Popular Properties</h3>
                                  
                               </div>
                           </div>
                           <div class="space-y-1">
                               @if (isset($popular_properties) && $popular_properties->count() > 0)
                                   @foreach ($popular_properties as $item)
                                       <div
                                           class="flex items-center justify-between p-2 rounded-lg border border-gray-200 hover:shadow-sm transition-shadow">
                                          
                                           <div class="flex gap-2 items-center">
                                              <img class="h-15 w-15 rounded" src="{{ file_path($item->featured_image_id) }}" alt="">

                                               <p class="text-sm font-medium text-gray-900">
                                                   {{ $item?->title }} </p>
                                             
                                           </div>
                                           <div class="text-right">
                                               <p class="text-sm font-medium text-gray-900"> {{ $item->total }} Visits
                                               </p>
                                              
                                           </div>
                                          
                                       </div>
                                   @endforeach
                               @endif
                           </div>
                       </div>
                   </div>
               </div>

           </div>
           {{-- =========================== Content End Here ============================ --}}
       </div>
   </div>
   {{-- =========================== Page Layout End Here ============================ --}}
   @push('scripts')
       <script>
           document.addEventListener('DOMContentLoaded', () => {

               const ctx = document.getElementById('chart_canvas').getContext('2d');

               let salesChart = new Chart(ctx, {
                   type: 'bar',
                   data: {
                       labels: @json($chartData['date']), // ✅ only first time
                       datasets: [{
                           label: 'Visits',
                           data: @json($chartData['amount']), // ✅ only first time
                           borderWidth: 2
                       }]
                   },
                   options: {
                       //    responsive: true, // ✅ MUST be true
                       //    maintainAspectRatio: false, // ✅ MUST be false
                       scales: {
                           y: {
                               beginAtZero: true
                           }
                       }
                   }
               });

               document.addEventListener('livewire:init', () => {
                   Livewire.on('chartRefreshed', (payload) => {

                       // 🔁 REPLACE DATA
                       salesChart.data.labels = payload[0].labels;
                       salesChart.data.datasets[0].data = payload[0].data;

                       salesChart.update();



                   });


               });
           });
       </script>
   @endpush
