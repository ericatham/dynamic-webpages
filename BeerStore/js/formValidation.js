const ERROR_FNAME = "ERROR-FIRST NAME: Numbers, special characters or whitespace are not accepted as a first name <br>";
const ERROR_LNAME = "ERROR-LAST NAME: Numbers, special characters or whitespace are not accepted as a last name <br>";
const ERROR_PCODE = "ERROR-POSTAL CODE: It is required that you enter a Postal Code in valid format( e.g.: M2M 2M2) <br>";
const ERROR_EMAIL = "ERROR-E-MAIL ADDRESS: Please type a valid E-mail address: e.g.: johndoe@gmail.com <br>";
const ERROR_PHONE = "ERROR-PHONE NUMBER: It is required that you enter Telephone Number in valid format ( e.g.: 888 888 8888) <br>";
const ERROR_ADDRESS = "ERROR-ADDRESS: It is required that you enter your proper address: e.g.: 555 some street <br>";
const ERROR_CITY = "ERROR-CITY: This field is required, please type a city name with more than 2 characters.<br>";

function TrimString(str1) {
    str1.value = TrimString2(str1.value);
}

function TrimString2(inputString) {
    return inputString.trim();
}

function CheckPostalCode() {
    var regEx = /^[A-Z]\d[A-Z]\s?\d[A-Z]\d$/;
    var pCode;

    pCode = document.getElementById("pcode").value;
    if ((regEx.test(pCode)) === false || pCode === "") {
        document.getElementById("errormessage").innerHTML += ERROR_PCODE;
        document.getElementById("pcode").focus();
    }
}

function CheckPhoneNumber() {
    var regEx = /^\(?\d{3}\)?[\.\-\/\s]?\d{3}[\.\-\/\s]?\d{4}$/;
    var phoneNum;

    phoneNum = document.getElementById("phone").value;
    if (regEx.test(phoneNum) == false || phoneNum === "") {
        document.getElementById("errormessage").innerHTML += ERROR_PHONE;
        document.getElementById("phone").focus();
    }
}

function ValidateFName() {
    var firstName;

    firstName = document.getElementById("fname").value;
    if (firstName.length < 2 || firstName === "" || !isNaN(parseInt(firstName))) {
        document.getElementById("errormessage").innerHTML += ERROR_FNAME;
        document.getElementById("fname").focus();
    }
}

function ValidateLName() {
    var lastName;

    lastName = document.getElementById("lname").value;
    if (lastName.length < 2 || lastName === "" || !isNaN(parseInt(lastName))) {
        document.getElementById("errormessage").innerHTML += ERROR_LNAME;
        document.getElementById("lname").focus();
    }
}


function ValidateEmail() {
    var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email;

    email = document.getElementById("email").value;
    if (regEx.test(email) == false || email === "") {
        document.getElementById("errormessage").innerHTML += ERROR_EMAIL;
        document.getElementById("email").focus();
    }
}

function ValidateAddress()
{
    var address;
    address = document.getElementById("address").value;
    if (address.length < 5 || address === "") {
        document.getElementById("errormessage").innerHTML += ERROR_ADDRESS;
        document.getElementById("address").focus();
    }
}

function ValidateCity() {
    var city;
    city = document.getElementById("city").value;
    if (city.length < 2 || address === "") {
        document.getElementById("errormessage").innerHTML += ERROR_CITY;
        document.getElementById("city").focus();
    }
}


//Function to validate all form
function ValidateForm() {
    document.getElementById("errormessage").innerHTML = "";
    ValidateEmail();
    CheckPhoneNumber();
    CheckPostalCode();
    ValidateCity();
    ValidateAddress();
    ValidateLName();
    ValidateFName();
    

    //If the script finds an error, it will not send the form
    if (document.getElementById("errormessage").innerHTML != "") {
        return false;
    }
    else
    {
        return true;
    }

}


