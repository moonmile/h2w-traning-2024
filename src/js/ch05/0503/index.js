for (let i = 0; i < 10; i++) {
    console.log(i);
}



const person = {
    name: 'John',
    age: 30,
    occupation: 'Developer'
};

for (let key in person) {
    console.log(key + ': ' + person[key]);
}

const numbers = [1, 2, 3, 4, 5];

for (let number of numbers) {
    console.log(number);
}