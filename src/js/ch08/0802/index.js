const obj = {
    name: 'GitHub Copilot',
    greet: () => {
        console.log(`Hello, ${this.name}!`);
    }
};

obj.greet(); // Output: Hello, undefined!

const boundGreet = obj.greet.bind(obj);
boundGreet(); // Output: Hello, GitHub Copilot!