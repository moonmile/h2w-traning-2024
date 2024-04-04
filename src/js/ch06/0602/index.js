function greet(name = "Anonymous") {
    console.log(`Hello, ${name}!`);
}

greet(); // Output: Hello, Anonymous!
greet("John"); // Output: Hello, John!
greet(name = "Alice"); // Output: Hello, Alice!


const person = {
    name: "Alice",
    age: 25,
};

function hello( p = { name: "Anonymous"} ) {
    console.log(`Hello, ${p.name}!`);
}

hello(); // Output: Hello, Anonymous!
hello(person); // Output: Hello, Alice!

