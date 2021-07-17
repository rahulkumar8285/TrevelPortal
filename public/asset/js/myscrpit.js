function Calculate(){
    // alert("hello");
    var day = document.forms["FormName"]["holdday"].value;
    var price = document.forms["FormName"]["mainprice"].value;
    var total = price*day;
    var totalfare = document.getElementById('prise');
    var intotalfare = document.getElementById('totalfare');
    intotalfare.value =+ total;
    totalfare.innerText =+total; 
}