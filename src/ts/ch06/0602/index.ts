interface Person {
    name: string;
    age: number;
}

function greet(name: string = "Anonymous"): void {
    console.log(`Hello, ${name}!`);
}

greet(); // Output: Hello, Anonymous!
greet("John"); // Output: Hello, John!
greet("Alice"); // Output: Hello, Alice!


const person: Person = {
    name: "Alice",
    age: 25,
};

function hello(p: Person = { name: "Anonymous", age: 0 }): void {
    console.log(`Hello, ${p.name}!`);
}

hello(); // Output: Hello, Anonymous!
hello(person); // Output: Hello, Alice!
