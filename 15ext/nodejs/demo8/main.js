/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var util = require('util'); 
// 定义 base 类的构造函数
function Base() { 
    this.name = 'base'; 
    this.base = 1991; 
    this.sayHello = function() { 
    console.log('Hello ' + this.name); 
    }; 
} 
// 为 base 添加了一个方法
Base.prototype.showName = function() { 
    console.log(this.name);
}; 
/* 另外一种语法
Base.prototype = {
    'name1':'1111',
    showName:function(){console.log(this.name)}
};
 */
// 定义 Sub 类
function Sub() { 
    this.name = 'sub'; 
} 

// Sub 继承自 Base
util.inherits(Sub, Base); 

var objBase = new Base(); 
objBase.showName(); 
objBase.sayHello(); 
console.log(objBase); 

/**
 * 注意：Sub 仅仅继承了Base 在原型中定义的函数，而构造函数内部创造的 base 属 性和 sayHello 函数都没有被 Sub 继承。
同时，在原型中定义的属性不会被console.log 作 为对象的属性输出。如果我们去掉 objSub.sayHello(); 这行的注释，将会看到：
 */


var objSub = new Sub(); 
objSub.showName(); 
//objSub.sayHello(); 
console.log(objSub); 