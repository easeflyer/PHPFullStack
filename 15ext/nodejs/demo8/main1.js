/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var util = require('util');
function Person() {
    this.name = 'byvoid';
    this.toString = function () {
        return this.name;
    };
}
var obj = new Person();

console.log(util.inspect(obj));
console.log(util.inspect(obj, true,2,true)); 


console.log("-------------------------------------------------------");
//util.isArray(object)
//如果给定的参数 "object" 是一个数组返回true，否则返回false。

console.log( util.isArray([]) );
  // true
console.log( util.isArray(new Array) );
  // true
console.log( util.isArray({}) );
  // false 