'use strict';

const tester = /^[-!#$%&'*+\/0-9=?A-Z^_a-z`{|}~](\.?[-!#$%&'*+\/0-9=?A-Z^_a-z`{|}~])*@[a-zA-Z0-9](-*\.?[a-zA-Z0-9])*\.[a-zA-Z](-?[a-zA-Z0-9])+$/;


// To validate email addresses
export function emailValidation(email) {
    if (!email) return false;

    const emailParts = email.split('@');

    if (emailParts.length !== 2) {
        console.log("Please enter a valid email")
        return false
    }

    const address = emailParts[1];

    if (emailParts.length > 100) {
        console.log("The entered email is too long")
        return false
    }


    const domainParts = address.split('.');
    if (domainParts.some(function (part) {
        return part.length > 63;
    })) {
        console.log("Please enter a valid email")
        return false
    }


    if (!tester.test(email)) {
        console.log("Please enter a valid email")
        return false
    }

    return true;
}

// To validate user names
export function nameValidation(name, nameType) {


    // Check if name contains only alphabetic characters
    if (/[^a-zA-Z]/.test(name.replaceAll(" ", ""))) {
        console.log("Please enter a valid name.")
        return false
    }

    if (name.replaceAll(" ", "") < 1) {
        console.log(`Please enter your ${nameType}`)
        return false
    }
    if (name.length > 50) {
        console.log(`Your ${nameType} exceeds the character limit which is 50.`)
        return false
    }

    return true
}

export function userNameValidation(username) {

    if (username.includes(" ")) {
        console.log("Please make sure that your username does not contain any whitespaces.")
        return false
    }
    if (/[^a-zA-Z]/.test(name.replaceAll(" ", ""))) {
        console.log("Make sure your username does not contain any special characters or numbers.")
        return false
    }

    if (!username.replaceAll(" ", "")) {
        console.log("This input is required")
        return false
    }
}

export function passwordValidation(password) {
    if (!password.value) {
        console.log("Please enter a valid password.")
        return false
    }
    if (password.length > 10) {
        console.log("Please make sure that your password does not exceed 10 characters.")
        return false
    }
    return true
}