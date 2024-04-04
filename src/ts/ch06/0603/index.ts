// Define a function that takes a callback as an argument
function performOperation(x: number, y: number, callback: (result: number) => void) {
    // Perform some operation
    let result = x + y;

    // Call the callback function with the result
    callback(result);
}

// Define a callback function
function displayResult(result: number) {
    console.log("The result is: " + result);
}

// Call the performOperation function and pass the displayResult function as the callback
performOperation(5, 3, displayResult);

// Call the performOperation function and pass an anonymous function as the callback
performOperation(5, 3, function(result) {
    console.log("The result is: " + result);
});
