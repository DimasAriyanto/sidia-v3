<x-dashboard.layout>
  <div class="row row-cols-1 row-cols-md-5 gd-4">
    @foreach ($countData as $item)
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body row col-12 align-items-center">
            <div class="col-10">
              <h5>{{ $item['count'] }}</h5>
              <p class="card-text">{{ $item['name'] }}</p>
            </div>
            <div class="col-2 text-center">
              {!! $item['icon'] !!}
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="card mt-4">
    <div class="card-body">
      <div class="col-12 row">
        <div class="col-8">
          <p class="fs-4">Grafik Transaksi Harga Pembelian & Penjualan per Bulan</p>
          <canvas id="line-chart-harga" width="100%"></canvas>
        </div>
        <div class="col-4">
          <canvas id="pie-chart-harga" width="100%"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-body">
      <div class="col-12 row">
        <div class="col-8">
          <p class="fs-4">Grafik Transaksi Jumlah Pembelian & Penjualan per Bulan</p>
          <canvas id="line-chart-jumlah" width="100%"></canvas>
        </div>
        <div class="col-4">
          <canvas id="pie-chart-jumlah" width="100%"></canvas>
        </div>
      </div>
    </div>
  </div>


  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
      const labels = {{ Js::from($labels) }}
      const lineChartData = {{ Js::from($lineChartData) }}
      const lineChartHargaCtx = document
        .getElementById('line-chart-harga')
        .getContext('2d')
      new Chart(lineChartHargaCtx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
              label: 'Total Harga Pembelian',
              data: lineChartData.pembelian.harga
            },
            {
              label: 'Total Harga Penjualan',
              data: lineChartData.penjualan.harga
            },
          ]
        },
      })

      const lineChartJumlahCtx = document
        .getElementById('line-chart-jumlah')
        .getContext('2d')
      new Chart(lineChartJumlahCtx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
              label: 'Total Jumlah Pembelian',
              data: lineChartData.pembelian.jumlah
            },
            {
              label: 'Total Jumlah Penjualan',
              data: lineChartData.penjualan.jumlah
            },
          ]
        },
      })

      const pieChartData = {
        labels: labels,
        datasets: [{
          label: 'My First Dataset',
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1
        }]
      };
      const pieChartConfig = {
        type: 'bar',
        data: pieChartData,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },
      };
      const pieChartCtx = document
        .getElementById('pie-chart')
        .getContext('2d')
      const pieChart = new Chart(pieChartCtx, pieChartConfig)
    </script>
  @endpush
</x-dashboard.layout>
