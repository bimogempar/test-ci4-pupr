function previewImage(params) {
    const carImage = document.querySelector('#car_image')
    const carImageLabel = document.querySelector('.car-image-label')
    const imgPreview = document.querySelector('.img-preview')

    carImage.textContent = carImage.files[0].name

    const preview = new FileReader()
    preview.readAsDataURL(carImage.files[0])
    preview.onload = function (e) {
        imgPreview.src = e.target.result
    }
}

function deleteCar(params) {
    if (confirm('delete ?')) {
        $.ajax({
            type: "DELETE",
            url: '/delete-car/' + params,
            success: function (response) {
                console.log('success delete')
                location.reload('/')
            }
        });
    } else {
        console.log('cancel', params)
    }
}