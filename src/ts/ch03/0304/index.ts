// String
let name: string = "John";

// Number
let age: number = 25;

// Boolean
let isStudent: boolean = true;

// Array
let numbers: number[] = [1, 2, 3, 4, 5];

// Tuple
let person: [string, number] = ["John", 25];

// Enum
enum Color {
    Red,
    Green,
    Blue,
}
let favoriteColor: Color = Color.Blue;

// Any
let dynamicValue: any = "Hello";
dynamicValue = 10;

// Void
function sayHello(): void {
    console.log("Hello!");
}

// Null and Undefined
let nullValue: null = null;
let undefinedValue: undefined = undefined;

// Object
let personObj: object = { name: "John", age: 25 };

// Type Assertion
let someValue: any = "Hello";
let strLength: number = (someValue as string).length;

// Output
console.log("Name:", name);
console.log("Age:", age);
console.log("Is Student:", isStudent);
console.log("Numbers:", numbers);
console.log("Person:", person);
console.log("Favorite Color:", favoriteColor);
console.log("Dynamic Value:", dynamicValue);
sayHello();
console.log("Null Value:", nullValue);
console.log("Undefined Value:", undefinedValue);
console.log("Person Object:", personObj);

console.log("Some Value:", someValue);
console.log("String Length:", strLength);


// object output
console.log("Person Object:", personObj);
// console.log("Person Name:", personObj["name"]);
// console.log("Person Age:", personObj["age"]);
