<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @hasrole(['Apoteker','Pasien'])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @endhasrole
    @hasrole('Admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                <div class="p-6 text-gray-900 flex flex-wrap justify-center gap-28  text-center">
                    <div class="w-96">
                        <p class="font-bold text-lg text-slate-600">Data User</p>
                        <canvas id="rolesChart"></canvas>
                    </div>
                    <div class="w-96 pt-24">
                        <p class="font-bold text-lg text-slate-600">Data Transaksi Seminggu Terakhir</p>
                        <canvas id="transactionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endhasrole
    @push('scripts')
        <script>
            // Roles Chart Data
            const rolesData = {
                labels: @json($dataRoles['labels']),
                datasets: [{
                    label: 'Users by Role',
                    backgroundColor: ['#FF6384', '#36A2EB'], // Colors for each role
                    data: @json($dataRoles['data']),
                }]
            };

            const rolesConfig = {
                type: 'pie',
                data: rolesData,
            };

            // Transactions Chart Data
            const transactionsData = {
                labels: @json($labelsTransactions),
                datasets: [{
                    label: 'Transactions per Day',
                    backgroundColor: 'rgba(54, 162, 235, 0.3)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1,
                    data: @json($dataTransactions),
                }]
            };

            const transactionsConfig = {
                type: 'bar',
                data: transactionsData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Render Charts
            var rolesChart = new Chart(
                document.getElementById('rolesChart').getContext('2d'),
                rolesConfig
            );

            var transactionsChart = new Chart(
                document.getElementById('transactionsChart').getContext('2d'),
                transactionsConfig
            );
        </script>
    @endpush
</x-app-layout>
