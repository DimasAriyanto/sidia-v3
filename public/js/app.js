function ucfirst(str) {
  if (typeof str !== 'string') {
    return str;
  }

  return str.charAt(0).toUpperCase() + str.slice(1);
}

function formatNumber(data, fixedPoint = 2) {
  var number = Number(data)
  var options = { minimumFractionDigits: fixedPoint, maximumFractionDigits: fixedPoint };
  return number.toLocaleString(undefined, options);
}

function toIndonesianDateTanggal(dateStr) {
  const options = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
  };

  const locale = 'id-ID';
  const dateObject = new Date(dateStr);
  const formatter = new Intl.DateTimeFormat(locale, options);

  return formatter.format(dateObject);
}

function toIndonesianDateWaktu(dateStr) {
  const options = {
    hour: 'numeric',
    minute: 'numeric',
  };

  const locale = 'id-ID';
  const dateObject = new Date(dateStr);
  const formatter = new Intl.DateTimeFormat(locale, options);

  return formatter.format(dateObject);
}

function alertDeleteForm(e) {
  Swal.fire({
    title: 'Hapus data ?',
    text: 'Data akan dihapus dari aplikasi !',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: `Tidak`,
  }).then((result) => {
    if (result.isConfirmed) {
      $(e.target).parent().trigger('submit')
    }
  })
  e.preventDefault()
}