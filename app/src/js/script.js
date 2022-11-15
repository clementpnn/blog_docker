document.querySelector('#new').addEventListener('submit', function(event) {
    event.preventDefault()
    fetch('./feed.php', {
        method: 'POST',
        body: new FormData(this)
    }) .then(() => {
        document.querySelector('#textArea').value = ''
    })
    setTimeout(window.location.reload(), 3000)
})

document.querySelector('#check').addEventListener('submit', function(event) {
    event.preventDefault()
    fetch('./feed.php', {
        method: 'POST',
        body: new FormData(this)
    }) .then(() => {
        document.querySelector('#edit').value = ''
    })
    setTimeout(window.location.reload(), 3000)
})