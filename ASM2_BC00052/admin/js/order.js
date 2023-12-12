function Clearf(){
    document.getElementsByTagName('form')[0].reset();
}

function Checkf(){
    var user = document.getElementById("useror").value,
        date = document.getElementById("dateor").value,
        address = document.getElementById("addor").value,
        phone = document.getElementById("phoneor").value,
        detail = document.getElementById("detailor").value,
        price = document.getElementById("priceor").value;
    if ((price == "") || (detail == "") || (phone == "") (date == "") || (address == "") || (user == ""))
    {
        alert("Please full-fill all the information");
        return false;
    }
    return true;
    
}