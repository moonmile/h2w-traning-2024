// Create a Promise
const myPromise2 = new Promise((resolve, reject) => {
        // Perform an asynchronous operation
        setTimeout(() => {
            const randomNumber = Math.random();

            // Resolve the Promise if the random number is greater than 0.2
            if (randomNumber > 0.2) {
                resolve(randomNumber);
            } else {
                // Reject the Promise if the random number is less than or equal to 0.2
                reject(new Error('Random number is too small'));
            }
        }, 5000);
    });


const myPromise = new Promise((resolve, reject) => {
        // Perform an asynchronous operation
        setTimeout(() => {
            const randomNumber = Math.random();

            // Resolve the Promise if the random number is greater than 0.2
            if (randomNumber > 0.2) {
                resolve(randomNumber);
            } else {
                // Reject the Promise if the random number is less than or equal to 0.2
                reject(new Error('Random number is too small'));
            }
        }, 5000);
    });

// Use the Promise with async/await
async function usePromise() {
    const result1 = await myPromise;
    console.log('Resolved:', result1);
    const result2 = await myPromise2;
    console.log('Resolved:', result2);
}

usePromise();


// url を fetch で呼び出す
const url = "https://www.jma.go.jp/bosai/forecast/data/forecast/130000.json";

fetch(url)
    .then((response) => {
        response.json().then((json) => {
            console.log(json);
        })
    })
    .catch((error) => {
        console.error('Error:', error);
    });
