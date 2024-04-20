// Global scope
let globalVariable = "I'm in the global scope";

function outerFunction() {
    // Outer function scope
    let outerVariable = "I'm in the outer function scope";

    function innerFunction() {
        // Inner function scope
        let innerVariable = "I'm in the inner function scope";

        console.log(innerVariable); // Accessible within innerFunction
        console.log(outerVariable); // Accessible within innerFunction
        console.log(globalVariable); // Accessible within innerFunction
    }

    innerFunction();
    // console.log(innerVariable); // Not accessible outside innerFunction
    console.log(outerVariable); // Accessible within outerFunction
    console.log(globalVariable); // Accessible within outerFunction
}

outerFunction();
console.log(globalVariable); // Accessible in the global scope