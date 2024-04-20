class MyClass {
    static staticProperty = 'Hello, world!';

    static staticMethod() {
        console.log('This is a static method.');
    }
}

console.log(MyClass.staticProperty); // Output: Hello, world!
MyClass.staticMethod(); // Output: This is a static method.


// クラスの継承の例
// extends キーワード
// super キーワード
class MyDerivedClass extends MyClass { 
    constructor() { 
        super(); 
        this.instanceProperty = 'I am an instance property.'; 
    }
}

const myDerivedObject = new MyDerivedClass(); 
console.log(myDerivedObject.instanceProperty); 
// Output: I am an instance property. myDerivedObject.instanceMethod(); 
// Output: This is an instance method.
