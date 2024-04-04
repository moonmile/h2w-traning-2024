// Sample code for conditional branching

// Define a variable
let num = 10;

// Check if the number is greater than 0
if (num > 0) {
    console.log("The number is positive.");
} else if (num < 0) {
    console.log("The number is negative.");
} else {
    console.log("The number is zero.");
}

// Use a switch statement to check the value of num
switch (num) {
    case 0:
        console.log("The number is zero.");
        break;
    case 1:
    case 2:
    case 3:
        console.log("The number is a small positive number.");
        break;
    case 4:
    case 5:
    case 6:
        console.log("The number is a medium positive number.");
        break;
    default:
        console.log("The number is a large positive number.");
        break;
}