<x-dashboard.layout>
  <x-dashboard.breadcrumb />
  <div class="card">
    <div class="card-header bg-dark text-light fw-bold">Manage Users</div>
    <div class="card-body">
      {!! $dataTable->table(['class' => 'table table-bordered']) !!}
    </div>
  </div>
  @push('scripts')
    {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
  @endpush
</x-dashboard.layout>
