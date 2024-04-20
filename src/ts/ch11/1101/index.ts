// 5秒後に Hello, world!
// 更に5秒後に Goodbye, world!
// と表示する。
// ただし、コールバック地獄が待っている。

console.log("start " + new Date());
setTimeout(() => {
    console.log("Hello, world!");
    setTimeout(() => {
        console.log("Goodbye, world!");
    }, 5000);
}, 5000);
console.log("end " + new Date());
