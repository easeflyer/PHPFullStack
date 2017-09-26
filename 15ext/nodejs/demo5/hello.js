/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// 本模块 hello 通过 exports 对象开放了 world 这个方法，也就是hello 模块的接口
exports.world = function() {
  console.log('Hello World!');
}