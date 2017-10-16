/**
 *  这段程序 模拟一个 node 进程。
 */


console.log("进程 " + process.argv[2] + " 执行。");


// argv[0] node 的位置 path
// argv[1] 当前脚本的 path
console.log("\n【1】" + process.argv[1] + "\n【0】"+ process.argv[0] );