function validateEmail(email) {
    var re_mail = /^[a-zA-Z0-9_\.]+@[a-zA-Z]+\.[a-zA-Z]+(\.[a-zA-Z]+)*$/;
    return re_mail.test(email);
}
function validatePhone(phone) {
    var re_phone = /^(\+84|0)[3|5|7|8|9][1-9]\d{7}$/;
    return re_phone.test(phone);
}
function check_name(name) {
    var message_name="";
    if (name.value==="") {
        name.style.border='1px solid red';
        message_name="Please enter your name !";
        document.getElementById('message_name').innerHTML=message_name;
        return 0;
    } 
    // else if (name.value.length<7) {
    //     name.style.border='1px solid red';
    //     message_name="Please enter your full name !";
    //     document.getElementById('message_name').innerHTML=message_name;
    //     return 0;
    // } 
    else {
        name.style.border='1px solid green';
        message_name="";
        document.getElementById('message_name').innerHTML=message_name;
        return true;
    }
}
function check_email(mail) {
    var message_mail="";
    if (mail.value==="") {
        mail.style.border='1px solid red';
        message_mail="Please enter your Email !";
        document.getElementById('message_mail').innerHTML=message_mail;
        return 0;
    } else if (!validateEmail(mail.value)) {
        mail.style.border='1px solid red';
        message_mail="Email invalid !";
        document.getElementById('message_mail').innerHTML=message_mail;
        return 0;
    } else {
        mail.style.border='1px solid green';
        message_mail="";
        document.getElementById('message_mail').innerHTML=message_mail;
        return 1;
    }
}
function check_address(address) {
    var message_address="";
    if (address.value==="") {
        address.style.border='1px solid red';
        message_address="Please enter your address !";
        document.getElementById('message_address').innerHTML=message_address;
        return 0;
    } else {
        address.style.border='1px solid green';
        message_address="";
        document.getElementById('message_address').innerHTML=message_address;
        return 1
    }
}
function check_phone(phone) {
    var message_phone="";
    if (phone.value==="") {
        phone.style.border='1px solid red';
        message_phone="Please enter your phone number !";
        document.getElementById('message_phone').innerHTML=message_phone;
        return 0;
    } else if (!validatePhone(phone.value)) {
        phone.style.border='1px solid red';
        message_phone="Number phone invalid !";
        document.getElementById('message_phone').innerHTML=message_phone;
        return 0;
    } else {
        phone.style.border='1px solid green';
        message_phone="";
        document.getElementById('message_phone').innerHTML=message_phone;
        return 1;
    }
}
function check_username(username) {
    var message_username="";
    if (username.value==="") {
        username.style.border='1px solid red';
        message_username="Please enter your username !";
        document.getElementById('message_username').innerHTML=message_username;
        return 0;
    } else {
        username.style.border='1px solid green';
        message_username="";
        document.getElementById('message_username').innerHTML=message_username;
        return 1;
    }
}
function check(){
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    check_name(name);
    if (check_name(name)==0) {
        return;
    };
    check_email(email);
    if (check_email(email)==0) {
        return;
    };
    // window.location.reload(); //Refresh page
}
