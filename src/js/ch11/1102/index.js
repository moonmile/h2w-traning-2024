// Create a Promise
const myPromise = new Promise((resolve, reject) => {
    // Perform an asynchronous operation
    setTimeout(() => {
        const randomNumber = Math.random();
        
        // Resolve the Promise if the random number is greater than 0.5
        if (randomNumber > 0.2) {
            resolve(randomNumber);
        } else {
            // Reject the Promise if the random number is less than or equal to 0.5
            reject(new Error('Random number is too small'));
        }
    }, 5000);
});

// Use the Promise
myPromise
    .then((result) => {
        console.log('Resolved:', result);
    })
    .catch((error) => {
        console.error('Rejected:', error);
    });
