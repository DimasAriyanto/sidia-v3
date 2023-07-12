<x-dashboard.layout>
  <x-dashboard.breadcrumb />
  <div class="row row-col-5 d-4">
    @foreach ($countData as $item)
      <div class="col my-2">
        <div class="card" style="width: 18rem;">
          <div class="card-body row col-12 align-items-center">
            <div class="col-10">
              <span class="fw-bold fs-4">{{ $item['count'] }}</span>
              <p class="card-text fw-light">{{ $item['name'] }}</p>
              {!! $item['link'] !!}
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
          <p class="fs-4">Pembelian & Penjualan per Bulan</p>
          <canvas id="line-chart-harga" width="100%"></canvas>
        </div>
        <div class="col-4">
          <p class="fs-4">Perbandingan Pembelian & Penjualan</p>
          <canvas id="doughnut-chart-harga" width="100%"></canvas>
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

      const doughnutChartData = {{ Js::from($doughnutChartData) }}
      const doughnutChartCtx = document
        .getElementById('doughnut-chart-harga')
        .getContext('2d')

      new Chart(doughnutChartCtx, {
        type: 'doughnut',
        data: {
          labels: [
            'Penjualan',
            'Pembelian',
          ],
          datasets: [{
            label: 'Total Harga',
            data: [
              doughnutChartData.penjualan.total,
              doughnutChartData.pembelian.total,
            ],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
            ],
            hoverOffset: 4
          }]
        }
      })
    </script>
  @endpush
</x-dashboard.layout>
