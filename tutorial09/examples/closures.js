/**
 * Created by Tobi on 18.12.2016.
 */
function interestMaker(contract) {
  return function (years) {
    return (contract.startCapital * Math.pow(1 + contract.rate / 100, years))
      .toFixed(2);
  }
}

var aliceCapital = 1500, bobCapital = 1000;

// now we use the function factory. calculateAlice and calculateBob become closures;
var calculateAlice = interestMaker({startCapital: aliceCapital, rate: 4});
var calculateBob = interestMaker({startCapital: bobCapital, rate: 5});

var year = 0;

while (aliceCapital >= bobCapital) {
  year++;
  aliceCapital = calculateAlice(year);
  bobCapital = calculateBob(year);
  console.log("year: %d, calculateAlice: %d, calculateBob: %d", year, aliceCapital, bobCapital);
}

console.log("It takes " + year + " years until Bob has more money than Alice.");