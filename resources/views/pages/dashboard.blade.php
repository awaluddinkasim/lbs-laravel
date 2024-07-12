<x-layout>
    <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">apps</span>
                    <h6 class="text-muted text-sm uppercase">Total Events</h6>
                    <h3 class="text-2xl mb-3" data-plugin="counterup">{{ $totalEvents }}</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">event</span>
                    <h6 class="text-muted text-sm uppercase">Event Active</h6>
                    <h3 class="text-2xl mb-3"><span data-plugin="counterup">{{ $eventsAktif }}</span></h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">archive</span>
                    <h6 class="text-muted text-sm uppercase">Event Selesai</h6>
                    <h3 class="text-2xl mb-3"><span data-plugin="counterup">{{ $eventsSelesai }}</span></h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">person</span>
                    <h6 class="text-muted text-sm uppercase">Jumlah Pengguna</h6>
                    <h3 class="text-2xl mb-3" data-plugin="counterup">{{ $users }}</h3>
                </div>
            </div>
        </div>
    </div>

    <x-component.card>

    </x-component.card>
</x-layout>
