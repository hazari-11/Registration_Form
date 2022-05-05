function clearErrors(){
    errors = document.getElementsByClassName('formerror');
    for(let item of errors){
        item.innerHTML = "";
    }
}

function seterror(id, error){
    // sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function validateForm(){
    var returnval = true;
    clearErrors();

   // perform validation and if the validation fails, set the value of returnval to false
    var name = document.forms['myForm']['name'].value;

    var letters = /^[a-zA-z]+([\s][a-zA-Z]+)*$/
    if(!name.match(letters)){
        seterror("name", "*Only letters and one white space between them allowed");
        returnval=false;
        
    }
    if(name.length<2){
        seterror("name", "*Length of name is too short!");
        returnval=false;
    }
    

    var email = document.forms['myForm']['email'].value;
    if(email.length<10){
        seterror("email", "*Length of email is too short!");
        returnval=false;
    }
    if(email.length>45){
        seterror("email", "*Length of email is too long!");
        returnval=false;
    }

    var phone = document.forms['myForm']['phone'].value;
    if(phone.length!=10){
        seterror("phone", "*Phone number should be of 10 digits!");
        returnval=false;
    }

    var password = document.forms['myForm']['password'].value;
    if(password.length<8 || password.length>20){
        seterror("password", "*Password should be of 8 to 20 characters long!");
        returnval=false;
    }
    // var regularExpression = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    // if(!password.match(regularExpression)){
    //     seterror("password", "*PW should contain atleast one digit, one LowerCase letter, one UpperCase letter and a special character!");
    //     returnval=false;
    // }

    var pinCode = document.forms['myForm']['pinCode'].value;
    if(pinCode.length!=6){
        seterror("pinCode", "*Pin Code should be of 6 digits!");
        returnval=false;
    }

    var address = document.forms['myForm']['address'].value;
    if(address.length<3){
        seterror("address", "*Length of address is too short!");
        returnval=false;
    }

    return returnval;
}