

function showLoading () {
    let timerInterval
Swal.fire({
  title: 'Loading Information...',
  html: 'I will close in <b></b> milliseconds.',
  timer: 10000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
}


function success_msg(msg){
    Swal.fire(
        msg,
        '',
        'success'
      )
      setTimeout(function () {
		Swal.close()
	}, 2800)
}

function error_msg(msg){
    Swal.fire(
        msg,
        '',
        'error'
      )
      setTimeout(function () {
		Swal.close()
	}, 2800)
}
