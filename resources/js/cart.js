$('.addCart').on('click', function() {
    var productId = $(this).attr('data-id')

    addCart(productId)
})

function addCart(productId) {
    axios.post('/addtocart/' + productId)
        .then(function (response) {
            $('#notEmptyProduct').html(response.data)
            $('#modalCart').fadeIn()
            $('#modalCart').css('display', 'flex')
            if($('.cartItem').length > 0) {
                $('#notEmptyProduct').fadeIn()
                $('#emptyProduct').css('display', 'none')
            }
        })
        .catch(function (error) {
            console.log(error)
        })
}

$('.modalClose').on('click', function () {
    $('#modalCart').fadeOut()
})


$('#openCart').on('click', function () {
    $('body, html').animate({
        scrollTop: 0
    }, 1000)
    $('#cartProducts').fadeIn()
})

$(document).ready(function(){
    $('.openCart').on('click', function () {
        $('body, html').animate({
            scrollTop: 0
        }, 1000)
        $('#cartProducts').fadeIn()
    })
    });

$(document).on('click', '#deletProductCart', function () {
    var productId = $(this).attr('data-id')
    deletCart(productId, $(this))
})

function deletCart(productId, object) {
    axios.post('/delettocart/' + productId)
        .then(function (response) {
            object.parent().parent().parent().remove()
            if($('.cartItem').length === 0) {
                $('#notEmptyProduct').css('display', 'none')
                $('#emptyProduct').fadeIn()
            }
            console.log()    
        })
        .catch(function (error) {
            console.log(error)
        })
}

$(document).on('click', '#plusCart', function() {
    var oldTextCount = $(this).prev().text()
    var newTextCount = parseInt(oldTextCount) + 1
    $(this).prev().text(newTextCount)
    var productId = $(this).attr('data-id')
    var productPrice = $(this).parent().prev().children()
    console.log()
    productPrice.text($(this).prev().attr('data-price') * newTextCount + ' ₽')

    updateCart(productId, 'add')
})

$(document).on('click', '#minusCart', function() {
    var oldTextCount = $(this).next().text()
    if(oldTextCount != 1) {
        var newTextCount = parseInt(oldTextCount) - 1
        $(this).next().text(newTextCount)
        var productId = $(this).attr('data-id')
        var productPrice = $(this).parent().prev().children()
        productPrice.text($(this).next().attr('data-price') * newTextCount + ' ₽')
    
        updateCart(productId, 'minus')
    }
})

function updateCart(productId, type) {
    axios.post('/updatetocart/' + productId, {
        type: type
    })
        .then(function (response) {
        })
        .catch(function (error) {
            console.log(error)
        })
}
