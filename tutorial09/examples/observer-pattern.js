/**
 * Created by Tobi on 18.12.2016.
 */

var observers = [];

var subscribe = function(observer) {
  observers.push(observer);
};

var notify = function(value) {
  observers.forEach(function(observer) {
    observer(value);
  });
};

subscribe(function(value) {
  console.log('Do you want to build a ' + value + '?');
});

subscribe(function(value) {
  console.log('This ' + value + ' looks very nice.');
});


notify('snowman');