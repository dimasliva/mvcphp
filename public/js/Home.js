jQuery(function($) {

    $(document).ready(function() {
        $(".owl-carousel").owlCarousel();
    });

});
    
const alertSuccess = document.getElementById('alertSuccess');
alertSuccess.style.display = 'none';

// Submit button
const submitBtn = document.getElementById('btnSubmit');
submitBtn.style.backgroundColor = "#474559";
submitBtn.style.cursor = 'default';
submitBtn.disabled = true
// Form
const form = document.getElementById('myForm');

form.addEventListener("keyup", (e) => {
    if (form.elements['name'].value !== '' && form.elements['message'].value !== '' && form.elements['email'].value !== '') {
        submitBtn.style.backgroundColor = null;
        submitBtn.style.cursor = 'pointer';
        submitBtn.disabled = false
    }
})

submitBtn.onclick = () => {
    sessionStorage.setItem('alert', 'success');
}
if (sessionStorage.getItem('alert')) {
    alertSuccess.style.display = 'block';
}
// Close alert (btn)
const btnClose = document.getElementById('close').onclick = function() {
    console.log('hi')
    alertSuccess.remove(alertSuccess);
    sessionStorage.removeItem('alert');
};
