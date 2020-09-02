const number = 13;

// converting to binary string
var binary = number.toString(2)
console.log(number);
console.log(binary);

// reversing the binary string
var reversedBinary = binary.split("").reverse().join("");
console.log(reversedBinary);

// converting binary to int
var finalNumber = parseInt(reversedBinary, 2)
console.log(finalNumber);
