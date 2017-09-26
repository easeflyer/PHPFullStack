/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


buf = new Buffer(26);   //26个字节： 1个英文字母占据1个字节，可以存储 10进制的 255 16进制的 ff
for (var i = 0; i < 26; i++) {
    buf[i] = i + 97;
}

console.log(buf); // 输出16进制内存数据  

console.log(buf.toString('ascii')); // 输出: abcdefghijklmnopqrstuvwxyz
console.log(buf.toString('ascii', 0, 5)); // 输出: abcde
console.log(buf.toString('utf8', 0, 5)); // 输出: abcde
console.log(buf.toString(undefined, 0, 5)); // 使用 'utf8' 编码, 并输出: abcde

console.log(buf.toJSON());