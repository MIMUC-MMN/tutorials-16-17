/**
 * Created by Tobi on 18.12.2016.
 */

var iGoFirst = function() {
  return 'Call me first!'
};

var first = iGoFirst();
var fun = iDontCare();

console.log(first, fun);

console.log(iHaveAProblem());

var iHaveAProblem = function() {
  return 'Call me later!'
};

function iDontCare() {
  return 'Call me any time!'
}

