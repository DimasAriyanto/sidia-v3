function ucfirst(str) {
  if (typeof str !== 'string') {
    return str;
  }

  return str.charAt(0).toUpperCase() + str.slice(1);
}

function format_number(data, fixedPoint = 2) {
  var number = Number(data)
  var options = { minimumFractionDigits: fixedPoint, maximumFractionDigits: fixedPoint };
  return number.toLocaleString(undefined, options);
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