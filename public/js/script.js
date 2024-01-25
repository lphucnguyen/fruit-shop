var currencyInput = document.querySelector('input[type="currency"]')
var navToggle = document.querySelector('.nav-toggle');
var html = document.querySelector('html');

 // format inital value
if (currencyInput){
  onBlur({target:currencyInput});
  currencyInput.addEventListener('focus', onFocus)
  currencyInput.addEventListener('blur', onBlur)
}

navToggle.addEventListener('click', function(e){
  e.preventDefault();
  html.classList.toggle('openNav');
  navToggle.classList.toggle('active');
});


function localStringToNumber( s ){
  return Number(String(s).replace(/[^0-9.,-]+/g,""))
}

function onFocus(e){
  var value = e.target.value;
  value = Number(value.replace(/,/g, ''));

  e.target.value = value;
}

function onBlur(e){
  var value = e.target.value;

  e.target.value = (value || value === 0)
    ? localStringToNumber(value).toLocaleString()
    : ''
}